<?php
    if($_SERVER["REMOTE_ADDR"]=="192.168.9.85"){
        ini_set("display_errors",1);
        error_reporting(E_ALL);
    }
    $disabled=0;
    include "db/var.php";
    include "pdo.php";
    include "title_creator.php";
    include "fotohub.php";
    include "pdf.php";
    Session_start();
    $glb_pg_name="";
    $glb_spg_name="";
    $mobile_path="";
    $mobile_upath="http://altag.ru/";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru-RU">
<head profile="http://gmpg.org/xfn/11" prefix="og:http://ogp.me/ns# fb:http://ogp.me/ns/fb# product:http://ogp.me/ns/product#">
  <base href="http://altag.ru/" />
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Crack1" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />

  <link rel="alternate" hreflang="ru" href="http://altag.ru" />
  <link rel="alternate" hreflang="en" href="http://altag.ru/en" />
  <link href="favicon.ico" rel="icon" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="css/table.css" />
  <link rel="stylesheet" type="text/css" href="css/main.css" />
  <link rel="stylesheet" type="text/css" href="css/frame.css" />
  <link rel="stylesheet" type="text/css" href="css/pdf.css" />
<?php
    if($_GET['top']=="news" AND isset($_GET['news'])) include "sn.php";
    list($s1,$s2)=explode(".",$_SERVER["REMOTE_ADDR"]);
    if($s1.$s2=="192168"){
      echo "<link rel='stylesheet' type='text/css' href='css/skydns.css' />";
      echo "<meta http-equiv='Cache-Control' content='no-cache'>";
    }
?>
  <script src="https://apis.google.com/js/platform.js" async defer>
      {lang: 'ru'}
  </script>
  <!-- Yandex.Metrika counter -->
  <script type="text/javascript" >
     (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
     m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
     (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

     ym(48401684, "init", {
          clickmap:true,
          trackLinks:true,
          accurateTrackBounce:true,
          webvisor:true
     });
  </script>
  <noscript><div><img src="https://mc.yandex.ru/watch/48401684" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
  <!-- /Yandex.Metrika counter -->
  <!--[if IE]>
      <link href="css/ie2.css" rel="stylesheet" type="text/css" />
  <![endif]-->

	<title><?php echo $var_name_med." - ".trim(join(" - ",$title_array)," - "); ?></title>

  <meta name="keywords" content="алтайская, академия, гостеприимства, барнаул, ааг, altag, программы, профессионального, обучения" />
  <meta name="description" content="" />
<?php
  if(isset($_GET['spg'])){
    if($_GET['spg']!="distant"){
      echo "<script type='text/javascript' src='highslide/highslide-with-html.js'></script>";
      echo "<script type='text/javascript'>";
          echo "hs.graphicsDir = 'highslide/graphics/';";
          echo "hs.outlineType = 'rounded-white';";
          echo "hs.wrapperClassName = 'draggable-header';";
      echo "</script>";
    }
  }else{
    echo "<script type='text/javascript' src='highslide/highslide-with-html.js'></script>";
    echo "<script type='text/javascript'>";
        echo "hs.graphicsDir = 'highslide/graphics/';";
        echo "hs.outlineType = 'rounded-white';";
        echo "hs.wrapperClassName = 'draggable-header';";
    echo "</script>";
  }
?>
  <link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
</head>

<body>
<?php include_once("analyticstracking.php"); ?>
    <div class="shadow"></div>
<?php
     list($s1,$s2,$s3,$s4)=explode(".",$_SERVER["REMOTE_ADDR"]);
     if($s1.$s2=="192168" || $s1.$s2.$s3.$s4=="93189217166") include "search.skydns.ru.php";
     if($s1.$s2=="192168" || $s1.$s2.$s3.$s4=="4623155252") include "local.resource.php";
     if($s1.$s2.$s3.$s4=="192168985"){
        $res=$pdo->prepare("SELECT COUNT(id) AS cnt FROM feedback WHERE flag0=0");
        $res->execute();
        $result=$res->FETCH(PDO::FETCH_ASSOC);
        if($result['cnt']>0){
            echo "<div class='float_messages'>";
            echo $result['cnt'];
            echo "</div>";
        }
     }
     if($s1.$s2.$s3.$s4=="1921688102"){
        $res=$pdo->prepare("SELECT COUNT(id) AS cnt FROM `mfc.bar` WHERE flag0=0");
        $res->execute();
        $result=$res->FETCH(PDO::FETCH_ASSOC);
        if($result['cnt']>0){
            echo "<div class='float_messages'>";
            echo $result['cnt'];
            echo "</div>";
        }
     }
?>
    <div class='main_container'>
        <div class='header'>
            <div class="logo"></div>
<?php
    $gp="<a href='https://plus.google.com/116973244427676123892' target='_blank' class='gp' title='Страница в Google+' alt='Страница в Google+'></a>";
    $ok="<a href='https://ok.ru/group/55110927778035' target='_blank' class='ok' title='Наша группа в Одноклассники' alt='Наша группа в Одноклассники'></a>";
    $vk="<a href='https://vk.com/aag22' target='_blank' class='vk' title='Наша группа в ВКонаткте' alt='Наша группа в ВКонаткте'></a>";
    $fb="<a href='https://www.facebook.com/groups/423343464779551/' target='_blank' class='fb' title='Наша группа в Facebook' alt='Наша группа в Facebook'></a>";
    $ig="<a href='https://www.instagram.com/kgbpou_aag/' target='_blank' class='ig' title='Мы в Instagram' alt='Мы в Instagram'></a>";
    $yt="<a href='https://www.youtube.com/channel/UCT7dn4_6amyjggsW5Wwe6dw' target='_blank' class='yt' title='Мы на YouTube' alt='Мы на YouTube'></a>";
    //---
    $map="<a href='index.php?top=main&pg=map' class='map' title='Карта сайта' alt='Карта сайта'></a>";
    $eng="<a href='en/index.php' class='eng' title='English site' alt='English site'></a>";
    $dis="<a href='special".$_SERVER['REQUEST_URI']."' class='eye' title='ВЕРСИЯ САЙТА ДЛЯ СЛАБОВИДЯЩИХ' alt='ВЕРСИЯ САЙТА ДЛЯ СЛАБОВИДЯЩИХ'></a>";
    $line=$vk.$ok.$fb.$gp.$ig.$yt.$map.$eng.$dis."<div style='clear:both;'></div>";
    //$search="<form action='search.php' method='get' enctype='text/plain'><input type='text' placeholder='Поиск' /><input type='button' value='поиск' /></form>";
    echo "<div class='favhome'>".$line."</div>";
    echo "<div class='menu'>";
    $file=file("menu/top.menu");
    $file[(count($file))+1]="&nbsp;||";
    $count=0;
    $glb_top_name="";
    foreach($file as $q){
        list($name,$link,$flag0)=explode("|",$q);
        if($flag0==0){
            $ret=(trim($name)!="&nbsp;")?"<div class='item' id='selectL".$count."'><a href='index.php?top=".$link."'>".$name."</a></div>":"<div class='item' id='selectL".$count."'>".$name."</div>";
            if(trim($_GET['top'])==trim($link)){
                $ret="<div class='item' id='select'>".$name."</div>";
                if($count!=0) echo "<style>.container .header .menu #selectL".($count-1)."{background:url('img/head_select_left.png') no-repeat bottom right;}</style>";
                echo "<style>.container .header .menu #selectL".($count+1)."{background:url('img/head_select_right.png') no-repeat bottom left;}</style>";
                $glb_top_name=$name;
                $glb_top_link=$link;
            }
            $count++;
            echo $ret;
        }
    }
?>
            </div>
        </div>
        <div class='main'>
            <div class="menu">
                <div class="block">
<?php
    $include=($_GET['top']=="news")?"menu/news.php":"menu/left.php";
    $include=($_GET['top']=="pck")?"menu/pck.php":$include;
    include $include;
?>
                    <div class="bot"></div>
                    <div class="xshadow"></div>
                </div>
            </div>
            <div class="text">
                <div class="heads">
<?php
    echo "<p style='font-weight: bold;font-size: 24px;line-height: 23px;margin: 0px 30px;text-indent:0px;'>".$glb_top_name."</p>";
    echo "<p style='font-weight: bold;font-size: 20px;line-height: 20px;margin: 8px 40px;text-indent:0px;'>".$glb_pg_name."</p>";
    echo "<p style='font-weight: bold;font-size: 16px;line-height: 15px;margin: 0px 50px;text-indent:0px;'>".$glb_spg_name."</p>";
?>
                </div>
                <div class="headsline"></div>
                <div class="mtext">
<?php
    $page="pages/".$glb_top_link."/".$pg.".php";
    $page=($spg!="")?"pages/".$glb_top_link."/".$pg."/".$spg.".php":$page;
    if(!file_exists($page)) $page="pages/nf404.php";
    include $page;
?>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class='bottom'>КГБПОУ "Алтайская академия гостеприимства" - 2021</div>
    </div>
</body>
</html>
