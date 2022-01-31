<?php

namespace Drupal\module_hero\Controller;

use Drupal\Core\Controller\ControllerBase;
use PhpParser\Node\Expr\Cast\String_;

/**
 * This is our hero controller API.
 */
class HeroControllerApi extends ControllerBase {

  public function heroApi() {

    try{
        $request_uri = "https://jsonplaceholder.typicode.com/photos";

        $response = \Drupal::httpClient()
        ->get($request_uri);

        if($response->getStatusCode()== 200){
            $response_body = (string) $response -> getBody();
            $apiData = json_decode($response_body);
        }
    }
    catch(\Exception $error){
        $errorResponse = $error -> getResponse();
        $responseErrorAsString = $errorResponse->getBody()->getContents();
        $errorData = json_decode($responseErrorAsString);
        return $errorData;
    }

    // print '<pre>';
    // print_r($apiData);
    // print '</pre>';
    foreach( $apiData as $data ){
        print_r('<h1>'.$data->title.'</h1></br>');
    }
    return array(
        '#markup' => '<p>This is html markup</p>',
      );
}
}
