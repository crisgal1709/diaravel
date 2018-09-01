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

  public function saveArvhives($request){
    if(is_null($request->file('archives'))){ return;}
      $archives = $request->file('archives');
      foreach($archives as $archive){
      //Guarda en la base de datos y sube al servidor de paso
      $this->saveArchive($archive);
     }
   }

   public function saveArchive($archive){

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
    return 'public';
   }
   
}