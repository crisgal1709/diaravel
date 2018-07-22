<?php  


namespace App\Cubic;

use Illuminate\Broadcasting\Broadcasters\Broadcaster;
use Illuminate\Broadcasting\BroadcastException;

class Cubic extends Broadcaster{

    private $server = "";


    public function __construct(){
        //$this->server = "http://crisgal-chat-node.herokuapp.com";
        $this->server = "http://crigalnode.herokuapp.com";
        //$this->server = "localhost:3000";
    }

	/**
     * Authenticate the incoming request for a given channel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function auth($request)
    {
        
    }

    /**
     * Return the valid authentication response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $result
     * @return mixed
     */
    public function validAuthenticationResponse($request, $result)
    {
        
    }

    // /**
    //  * Broadcast the given event.
    //  *
    //  * @param  array  $channels
    //  * @param  string  $event
    //  * @param  array  $payload
    //  * @return void
    //  */
    // public function broadcast(array $channels, $event, array $payload = [])
    // {
    	
    // 	$rand = rand(0000,9999); 

    // 	//$server = "localhost:3000";
    // 	$server = "http://crisgal-chat-node.herokuapp.com";

    //     $comentario = $payload['comentario'];

    //     $body = $comentario->body;
    //     $user = $comentario->user->name;

    //     $url = $server."/prueba?event=".urlencode($event)."&user=".urlencode($user)."&comentario=".urlencode($body);

        

    // 	$ch = curl_init($url);  
    // 	curl_exec($ch);
    // 	curl_close($ch);

    //     return;

    	
    // }

    public function broadcast(array $channels, $event, array $payload = [])
    {
        
        $payload['event']    = $event;
        $payload['channels'] = $channels;

        $data = http_build_query($payload);

        

        //$server = "http://crisgal-chat-node.herokuapp.com";
        //url contra la que atacamos
        $ch = curl_init($this->server . '/event-post');
        //a true, obtendremos una respuesta de la url, en otro caso, 
        //true si es correcto, false si no lo es
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //establecemos el verbo http que queremos utilizar para la petición
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        //enviamos el array data
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        //obtenemos la respuesta
        $response = curl_exec($ch);


        
        // Se cierra el recurso CURL y se liberan los recursos del sistema
        curl_close($ch);

        return;
    }

}