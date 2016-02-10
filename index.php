<?php
header('Content-Type: text/html; charset=latin9');
// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set('Europe/Madrid');
$link = new mysqli('codigironanet.ipagemysql.com', 'eguser','2lexivore','english_girona');
$tlink = new mysqli('codigironanet.ipagemysql.com', 'eguser','2lexivore','english_girona');
$query = "select * from Languages";
if ($stmt = $link->prepare($query)) {

    /* execute statement */
    $stmt->execute();

    /* bind result variables */
    $stmt->bind_result($codi, $nom, $flag);

    /* fetch values */
    while ($stmt->fetch()) {
        $language[$codi]['name']=$nom;
        $language[$codi]['flag']=$flag;
        $language[$codi]['code']=$codi;
    }

    /* close statement */
    $stmt->close();
}
else {
    $lang = "ERROR";
}
$Site = "select * from Site";
if ($stmt2 = $link->prepare($Site)) {

    /* execute statement */
    $stmt2->execute();

    /* bind result variables */
    $stmt2->bind_result($id, $defLang, $home, $title,$logo);

    /* fetch values */
    $stmt2->fetch();
    $conf['defLang'] = $defLang;
    $conf['home'] = $home;
    $conf['title']=$title;
    $conf['logo']=$logo;

    session_start();

    if(isset($_SESSION['currLang']) && isset($_GET['language']) && $_SESSION['currLang']!=$_GET['language']) {
        $_SESSION['currLang']=$_GET['language'];
    }

    if(isset($_SESSION['currLang'])){
        $conf['currLang']=$_SESSION['currLang'];
    }
    else {
        $conf['currLang']=$defLang;
    }

    /* close statement */
    $stmt2->close();
}
else {
    $lang = "ERROR";
}
?><!DOCTYPE html>
<html>
    <head>
        <script src="/javascript/jquery-2.2.0.min.js"></script>
        <link rel="stylesheet" href="http://preview.englishgirona.net/css/material.min.css" />
        <script src="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link href="/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href='/css/mdl-selectfield.min.css' media='all' rel='stylesheet' type="text/css" />
        <script src='/javascript/mdl-selectfield.min.js'></script>
        <link rel='stylesheet' href='http://preview.englishgirona.net/css/styles.css' />
        <link rel="shortcut icon" href="http://preview.englishgirona.net/favicon.ico" />
        <link rel="apple-touch-icon" href="touch-icon-iphone.png">
        <link rel="apple-touch-icon" sizes="76x76" href="touch-icon-ipad.png">
        <link rel="apple-touch-icon" sizes="120x120" href="touch-icon-iphone-retina.png">
        <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad-retina.png">
        <title><?= $conf['title']; ?></title>
    </head>
    <body>
        <!-- The drawer is always open in large screens. The header is always shown,
       even in small screens. -->
     <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
                 mdl-layout--fixed-header">
       <header class="mdl-layout__header" style='height:50px'>

         <div class="mdl-layout__header-row" style='margin-top:15px;'>
             <div class='social' style='position:relative; top:-15px;'>
             <label class='mdl-button mdl-js-button mdl-button--icon'><a href="https://www.facebook.com/englishgironaprofessionalteachers" target="_blank"><i class="mdi mdi-facebook" style="padding-left:5px;margin-right:5px;font-size:20px; position:relative; top:-2px; color:#FFF;"></i></a></label>
                 <label class='mdl-button mdl-js-button mdl-button--icon'><a href="https://twitter.com/EnglishGirona" target="_blank"><i class="mdi mdi-twitter" style="padding-left:5px;margin-right:5px;font-size:20px; position:relative; top:-2px; color:#FFF;"></i></a></label>
            </div>
           <div class="mdl-layout-spacer"></div>
           <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                       mdl-textfield--floating-label mdl-textfield--align-right lang-menu">
             <label class="mdl-button mdl-js-button mdl-button--icon lang"
                    for="fixed-header-drawer-exp">
               <i class="material-icons">language</i>
             </label>
             <!-- Right aligned menu below button -->
            <button id="demo-menu-lower-right"
                    class="mdl-button mdl-js-button mdl-button--icon">
            </button>

            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                for="demo-menu-lower-right">
                <?php

                foreach ($language as $key=>$value) {
                    if(strtolower($value['code'])==strtolower($conf['currLang'])){
                        echo "<li disabled class='mdl-menu__item'><i class='material-icons lang-check'>check</i> ".$value['name']."</li>";
                    }
                    else {
                        echo "<li class='mdl-menu__item'><a href='/actions/language.action.php?newLang=".strtolower($value['code'])."&refereer=".$_GET['section']."'>".$value['name']."</a></li>";
                    }
                }
                ?>
            </ul>
           </div>
             <!-- Social zone -->

         </div>

       </header>
       <div class="mdl-layout__drawer">

         <span class="mdl-layout-title">
             <a href='/' class='title'><img id='logo' src='/images/<?= $conf['logo']; ?>' title='<?= $conf['title']; ?> logo' alt='<?= $conf['title']; ?> logo' width=150 />
             </a></span>
         <nav class="mdl-navigation">
<?php
    $Site = "select SectionName_".$conf['currLang']." as name, SectionUrl, MaterialLogo from Sections";
if ($stmt2 = $link->prepare($Site)) {

    /* execute statement */
    $stmt2->execute();

    /* bind result variables */
    $stmt2->bind_result($name,$url, $ml);

    /* fetch values */
    while ($stmt2->fetch()) {
        if($url!=''){ // Eliminem la portada dels resultats...
            echo '<a class="mdl-navigation__link" href="/page/'.$conf['currLang'].'/'.$url.'"><i class="material-icons" style="margin-right:5px;">'.$ml.'</i><span style="position:relative; top:-6px;">'.$name.'</span></a>';
        }
    }
    /* close statement */
    $stmt2->close();
}
else {
    $lang = "ERROR";
}
                        echo '<div class="mdl-spacer"></div>';

 echo '<a class="mdl-navigation__link" target="_blank" href="/chamilo/"><i class="mdi mdi-book-open" style="margin-right:5px;font-size:26px; position:relative; top:-2px;"></i><span style="position:relative; top:-6px;">Campus Online</span></a>';

?>

         </nav>
       </div>
       <main class="mdl-layout__content">
         <div class="page-content">
<?php



    $query = "select PostTitle_".$conf['currLang']." as title, PostContent_".$conf['currLang']." as content, Post_Section as section, PostDateTime as datetime, PostUrl as url, users.name as author, PostType as type, MediaUrl as media, MediaPosition as position from Posts, users where Post_Section in (select idSection from Sections where SectionUrl='".$_GET['section']."') and users.name in (select name from users where PostAuthor=users.id) or 0 order by datetime";
/*echo $query;
/*die();/**/
$section= (isset($_GET['section']))?$_GET['section']:"asda";
if ($stmt2 = $link->prepare($query)) {

    /* execute statement */
    $stmt2->execute();

    /* bind result variables */
    $stmt2->bind_result($title,$content,$section,$datetime,$url,$author,$type,$media,$mediaPosition);

    /* fetch values */
    while ($stmt2->fetch()) {
        if($type=="header") {
            echo "<div class='mdl-card mdl-shadow--2dp'>\n";
              echo "<div class='mdl-card__title' style=\"background:url('$media') center center\">\n";
                echo "<h2 class='mdl-card__title-text'>".$title."</h2>\n";
              echo "</div>\n";
              echo "<div class='mdl-card__supporting-text'>\n";
                echo $content;
              echo "</div>\n";
            echo "</div>\n";
        }
        else if ($type=="normal") {
            echo "<div class='mdl-card mdl-shadow--2dp'>\n";
              echo "<div class='mdl-card__title2'>\n";
                echo "<h2 class='mdl-card__title-text'><a class='anchor' id='$title'>".$title."</a></h2>\n";
              echo "</div>\n";
              echo "<div class='mdl-card__supporting-text'>\n";
             if($media!='' && $mediaPosition=='top'){
                 echo "<img src='$media' alt='$title' title='$title' style='max-width:70%; padding:10px;  margin:0px auto;' /><br />";
             }
            else if($media!='' && $mediaPosition=='left'){
             echo "<img src='$media' alt='$title' title='$title' style='max-width:30%; padding:10px;  position:relative;float:left;' />";
                }
            else if ($media!='' && $mediaPosition=='right'){
             echo "<img src='$media' alt='$title' title='$title' style='max-width:30%; padding:10px;  position:relative;float:right;' />";
            }
                echo $content;

            if ($media!='' && $mediaPosition=='bottom'){
             echo "<br /><img src='$media' alt='$title' title='$title' style='max-width:70%; padding:10px;  margin:0px auto;' />";
            }
              echo "</div>\n";
            echo "</div>\n";
        }
        else if($type=="menu") {
            echo "<div class='index'>\n";
              echo $content;
            echo "</div>\n";
        }
        else if($type=='blog'){
            echo "<div class='mdl-card mdl-shadow--2dp'>\n";
              echo "<div class='mdl-card__title2'>\n";
                echo "<h2 class='mdl-card__title-text'><a class='anchor' id='$title'>".$title."</a></h2>\n";
              echo "</div>\n";
              echo "<div class='mdl-card__supporting-text'>\n";
                echo $content;
              echo "</div>\n";
              echo "<div class='mdl-card__actions mdl-card--border'>\n";
                echo "Written by ";
               echo "<a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>\n";
                echo $author;
                echo "</a>";
                echo " at " . $datetime;
              echo "</div>";
            echo "</div>";
        }
        else if($type=='nadal'){ // Nadal
            echo "<div class='mdl-card mdl-shadow--2dp'>\n";
              echo "<div class='mdl-card__title2'>\n";
                echo "<h2 class='mdl-card__title-text'><a class='anchor' id='$title'>".$title."</a></h2>\n";
              echo "</div>\n";
              echo "<div class='mdl-card__supporting-text'>\n";
                echo "<img src='/images/posts/christmas.png' alt='Nadal' title='Nadal' style='width:15%; padding:10px;  position:relative;float:left;' />";
            echo $content;

              echo "</div>\n";

            echo "</div>";
        }
        else if($type=='taula'){
            echo "<div class='mdl-card' style='width:50%; margin:25px auto;'>\n";
            echo $content;
            echo "\n</div>";
        }
        else if($type=='image'){
            echo '<div class="demo-card-image mdl-card mdl-shadow--2dp" style="float:left; margin-right:15px; background:url(\'' . $media . '\') center/cover">
              <div class="mdl-card__title mdl-card--expand"></div>
              <div class="mdl-card__actions">
                <span class="demo-card-image__filename">'.$title.'</span>
              </div>
            </div>';

        }
    }
    /* close statement */
    $stmt2->close();
}
else {
    echo "ERROR";
}
//die();
            if($_GET['section']=="contacte") {
                 echo "<div class='mdl-card mdl-shadow--2dp' style='height:450px'>
<div class='mdl-card__titleMap'>
<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1482.8058507113278!2d2.8242242509887054!3d41.9871459634068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12bae6e0b3287aed%3A0x8570bc2991799192!2sEnglish+Girona!5e0!3m2!1sca!2ses!4v1453285682475' width='600' height='450' frameborder='0' style='border:0' allowfullscreen></iframe>
</div>

         </div>
         <script>
             $(document).ready(function(){
                $('#contacte').delegate('#sendConsulta','click',function(){
                    vnom=$('#nom').val();
                    vtelf=$('#tel').val();
                    vemail=$('#email').val();
                    vempresa=$('#empresa').val();
                    vconeguts=$('#coneguts').val();
                    vcontent=$('#content').val();
                    $.post('/actions/contacte.action.php', {nom: vnom, telf: vtelf, email: vemail, empresa: vempresa, con: vconeguts, comentari: vcontent}).done(function(data) {
                        alert('Data:' + data);
                    });
                });
             });
         </script>
         ";
             }


             ?>

       </main>
    </div>
     </body>
</html>
