<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Samcrosoft\Placeholder\Placeholder;


$app->get('/', function() use ($app) {

    $oPlaceholder = new Placeholder();

    /*
     * Create the placeholder image
     */
    $oImage = $oPlaceholder->makePlaceholderFromURL();

    ob_start();
    imagepng($oImage);
    imagedestroy($oImage);

    $oImageContent = ob_get_contents();
    ob_end_clean();

    return response($oImageContent, 200)
        ->header('Content-Type', "image/png");

    //return $app->welcome();
});
