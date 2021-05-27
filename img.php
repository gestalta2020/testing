<?php
    if($_SERVER["REMOTE_ADDR"]=="192.168.9.85"){
        ini_set("display_errors",1);
        error_reporting(E_ALL);
    }

    $tmpArray=explode(".",$_GET['img_src']);
    $ext=$tmpArray[count($tmpArray)-1];
    if($ext=="png"){
        $image=imagecreatefrompng($_GET['img_src']);
        if(!isset($_GET['disabled'])) $_GET['disabled']=0;
        if($_GET['disabled']==1){
            imagefilter($image,IMG_FILTER_GRAYSCALE);
        }
        imagepng($image);
    }
    if($ext=="jpg"){
        $image=imagecreatefromjpeg($_GET['img_src']);
        if(!isset($_GET['disabled'])) $_GET['disabled']=0;
        if($_GET['disabled']==1){
            imagefilter($image,IMG_FILTER_GRAYSCALE);
        }
        imagejpeg($image);
    }
    imagedestroy($image);
?>
