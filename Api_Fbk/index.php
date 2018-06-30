<?php
//framework Slim
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
// Autoload de vendor
require_once '../vendor/autoload.php';
//Aplicacion
$app= new \Slim\App;
//Endpoint => Con ID_USUARIO (perfil solicitado) como parametro en el GET
$app->get('/profile/facebook/{id}', function (Request $request, Response $response, array $args) 
{
    //Datos de la App Creada
    $app_id = '1869889059772796';
    $appi_secret = '85d6768df400f793f68b9dbd96ba9450';
    $tk = 'EAAakp3ktWXwBAN006ntVQAfuAMzHvwCsJbhojD3VZBEmuVwZBjHW0keaIVTpjxRvqxZASp692Xu2afsb8Tw5P9XXnyRjIORKXATSpoGBuG0b3IpBmN1x883MRWXZADsHVILbfXH27QYqfCLzpY3gjPPAC5GuHS0ofJJJvRFaCgZDZD'; 

    //Objeto facebook para acceder a los datos de perfil
    $fb = new Facebook\Facebook([
      'app_id' => $app_id ,
      'app_secret' => $appi_secret,
      'default_graph_version' => 'v2.12',
     ]);
    // ID solicitado
    $id = $args['id'];
    // Conectando...
    try {

          $response = $fb->get('/'.$id.'?fields= id,name,first_name,last_name',$tk);
      
        } catch(FacebookExceptionsFacebookResponseException $e) 

        {
           echo 'Graph returned an error: ' . $e->getMessage();
           exit;
        } catch(FacebookExceptionsFacebookSDKException $e) 

        {
           echo 'Facebook SDK returned an error: ' . $e->getMessage();
           exit;
        }catch(Exception $e) 

        {
           echo 'Slim error: ' . $e->getMessage();
           exit;
    }
    $x = $response->getGraphNode();
    //Datos en Jason
    $obj = array(
          'id'=> $x['id'],
          'firtsname'=> $x['first_name'],
          'lastName'=> $x['last_name'],
        );
      // Salida
      echo json_encode($obj);
    });
// Ejecutando la aplicacion
$app->run();
?>
