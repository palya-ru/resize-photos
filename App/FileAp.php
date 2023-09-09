<?php


namespace App;

use Jsnlib\Del;
class FileAp
{

    public function info()
    {
        $this->cls('./img');

        $img = $_FILES['img'];

        if (!empty($img)) {
            $img_desc = $this->reArrayFiles($img);
            //print_r($img_desc);

            foreach ($img_desc as $val) {
                $newName = base_convert(microtime(),10,32) . '.jpg';
                move_uploaded_file($val['tmp_name'], './img/' . $newName);
            }
            header('Location: /index.php');
        }
    }

    public function reArrayFiles($file)
    {
        $file_ary = array();
        $file_count = count($file['name']);
        $file_key = array_keys($file);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_key as $val) {
                $file_ary[$i][$val] = $file[$val][$i];
            }
        }
        return $file_ary;
    }

    public function cls($patch)
    {
        $del = new Del();
        $del->get($patch);
        $del->under();
    }

}
