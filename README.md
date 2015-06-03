# PHP-Placeholder-Lumen
This is a lumen project using the [samcrosoft/placeholder] (http://samcrosoft.github.io/Placeholder/) package to create image placeholders


### Where the magic happens
```php
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

```


**Note** the use of output buffering, this is just to allow lumen to be able to respond with the image.
