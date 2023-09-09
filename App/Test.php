<?php


namespace App;

use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
class Test
{
    public function test ()
    {
        Image::make('./img/fff.jpg')
            ->resize(100,100)
            ->save('./imgMin/Min-fff.jpg');
    }

    public function img()
    {
        $patch = './img';
        $files = scandir($patch);
        //$newName = base_convert(microtime(), 10, 20) . '.jpg';
        foreach ($files as $key){
            if($key === '.' || $key === '..'){
                continue;
            }

            Image::make('./img/'.$key)
                ->resize(338, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save('./imgMin/'.$key);

            /*Image::make('./imgMin/'.$key)
                ->encode('webp')
                ->save('./webp/'. substr($key,0,-4). '.webp');*/
        }
    }
}
