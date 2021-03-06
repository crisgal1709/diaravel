<?php 

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

//Trait para manejar los modelos que permiten guardar archivos en el filesystem y la base de
//datos. 

trait HasArchives {

//En algunos casos puede que se necesite setear esta propiedad para guardar los archivos en otro lugar
  public function setDestino($destino){
    $this->destino = $destino;
  }

//Relación polimórfica al model Archivos.
  public function archives(){
      return $this->morphMany(\App\Models\Archive::class, 'archivable');
  }

  //Guarda los archivos tanto en la base de datos como en el disco

  public function saveArchives($request){
    if(is_null($request->file('archives'))){ return;}
      $archives = $request->file('archives');
      foreach($archives as $archive){
      //Guarda en la base de datos y sube al servidor de paso
      $this->saveArchive($archive);
     }
   }

   public function saveArchive($archive){

      if ($this->disk() == 'public') {
        $path = 'uploads/' . $this->setDestinoArchivos();

        $name = time() . '_' . $archive->getClientOriginalName();

        $upload = Storage::url(
          $archive->storeAs(
            $path, 
            $name,
            $this->disk()
          )
        );

        $this->archives()->create([
          'route' => 'uploads/' . $this->setDestinoArchivos() . '/' . $name,
          'name' => $archive->getClientOriginalName()
        ]);
      } else if($this->disk() == 'drive'){
        $this->saveInDrive($archive);
      }

   }

   protected function setDestinoArchivos(){

    if(method_exists($this, 'setCustomDestino')){
      return $this->setCustomDestino();
    }

    $destino = isset($this->destino) ? $this->destino : $this->table;

    if(method_exists($this, 'getNumeroDocumentoPaciente')){
      $destino .= '/' . $this->getNumeroDocumentoPaciente();
    }
    return $destino;
   }

   private function disk(){
      return 'drive';
   }


   private function saveInDrive($file){
    $archive = $file;
    $filename = Storage::cloud()->put('', $file);
    // Get the file to find the ID
    $dir = '/';
    $recursive = false; // Get subdirectories also?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));
    $file = $contents
          ->where('type', '=', 'file')
          ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
          ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
          ->first(); // there can be duplicate file names!
    // Change permissions
    // - https://developers.google.com/drive/v3/web/about-permissions
    // - https://developers.google.com/drive/v3/reference/permissions
      $service = Storage::cloud()->getAdapter()->getService();
      $permission = new \Google_Service_Drive_Permission();
      $permission->setRole('reader');
      $permission->setType('anyone');
      $permission->setAllowFileDiscovery(false);
      $permissions = $service->permissions->create($file['basename'], $permission);

      $this->archives()->create([
          'route' => Storage::cloud()->url($file['path']),
          'name' => $archive->getClientOriginalName()
      ]);
   }
   
}