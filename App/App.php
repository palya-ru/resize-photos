<?php


namespace App;

use App\Test;
use App\FileAp;
class App
{
    public static function init()
    {
        $go = new FileAp();
        $go->info();
        $imgRe = new Test();
        $imgRe->img();
    }
}
