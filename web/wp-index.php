<?php
ob_start();
require_once __DIR__ . '/../vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;
use App\App as App;
App::init();

/*$testDir = './testDir';
$del = new Jsnlib\Del;
$del->get(['./testDir', './']);
$del->under();*/

$dir = './imgMin';
$files = scandir($dir);
$testDir = './testDir';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<style>
    img{
        display: none;
    }
</style>
<?foreach ($files as $key):{
    if($key === '.' || $key === '..'){
        continue;
    }
}?>
<div class="diplomas-block">
<img src="<?='/wp-content/uploads/2021/09/'.$key?>" width="<?=Image::make('imgMin/'.$key)->width();?>" height="<?=Image::make('imgMin/'.$key)->height();?>" alt="">
</div>
<?endforeach?>
<form style="margin-top: 45px" action="/index.php" method="post" enctype="multipart/form-data">

    <input type="file" name="img[]" multiple>

    <input type="submit" value="Отправить">

</form>

</body>
</html>
