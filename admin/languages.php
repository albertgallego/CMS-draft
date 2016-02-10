<?php
header('Content-Type: text/html; charset=latin9');
session_start();
if(!isset($_SESSION['user']) or !$_SESSION['user']=="ok") {
    header("location: index.php");
}
$link = new mysqli('codigironanet.ipagemysql.com', 'eguser','2lexivore','english_girona');

$Site = "select * from Site";
if ($stmt2 = $link->prepare($Site)) {

    /* execute statement */
    $stmt2->execute();

    /* bind result variables */
    $stmt2->bind_result($id, $defLang, $home, $title,$icon);

    /* fetch values */
    $stmt2->fetch();
    $conf['defLang'] = $defLang;
    $conf['home'] = $home;
    $conf['title']=$title;
    $conf['icon']=$icon;
}
$stmt2->close();

?><!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Onyar Dashboard</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/material.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel='stylesheet' href='/css/snackbar.min.css'>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--white mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title"><i class='material-icons' style='position:relative;top:5px;'>language</i>&nbsp;Languages</span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search" />
              <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
          </div>
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item">About</li>
            <li class="mdl-menu__item">Contact</li>
            <li class="mdl-menu__item">Legal information</li>
          </ul>
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img src="images/user.jpg" class="demo-avatar">
          <div class="demo-avatar-dropdown">
            <span>hello@example.com</span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons" role="presentation">arrow_drop_down</i>
              <span class="visuallyhidden">Accounts</span>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
              <li class="mdl-menu__item">hello@example.com</li>
              <li class="mdl-menu__item">info@example.com</li>
              <li class="mdl-menu__item"><i class="material-icons">add</i>Add another account...</li>
            </ul>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link" href="/admin/"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</a>
          <a class="mdl-navigation__link" href="sections.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">folder_open</i>Sections</a>
          <a class="mdl-navigation__link" href="languages.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">language</i>Languages</a>
          <a class="mdl-navigation__link" href="contents.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">view_quilt</i>Contents</a>
          <a class="mdl-navigation__link" href="seo.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">pages</i>SEO</a>
          <a class="mdl-navigation__link" href="gent.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Gent</a>
        <a class="mdl-navigation__link" href="pagaments.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">attach_money</i>Pagaments</a>
          <a class="mdl-navigation__link" href="calendari.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">event</i>Calendari</a>
          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100 page-content">


          <div class="demo-card-wide mdl-card mdl-shadow--2dp">
              <div class="mdl-card__title2">
                <h2 class="mdl-card__title-text">Editor d'idiomes</h2>
              </div>
              <div class="mdl-card__supporting-text">
<?php
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
$i=1;
 foreach ($language as $key=>$value) {
     $code = strtolower($value['code']);
     echo '<form action="#">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="editName'.$code.'" value='.$value['name'].' />
                        <label class="mdl-textfield__label" for="editName'.$code.'">Nom</label>
                      </div>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="txt2">
                        <input class="mdl-textfield__input" type="text" id="editCode'.$code.'" value='.$code.' />
                        <label class="mdl-textfield__label" for="editCode'.$code.'">Codi</label>
                      </div>
                      <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-button--mini-fab" id="editUploadBtn'.$code.'">';
      if(file_exists($_SERVER['DOCUMENT_ROOT'].'/admin/images/language_flags/'.$code.'.jpg')) {
          echo "<img width=40 src='/admin/images/language_flags/".$code.'.jpg\' />';
      }
     else {
                          echo '<i class="material-icons">file_upload</i>';
      }

                        echo '</button>
                      <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-button--mini-fab" id="editSaveBtn'.$code.'">';
                          echo '<i class="material-icons" id="save-'.$code.'">save</i>';
                        echo '</button>';
       echo '</button>
                      <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-button--mini-fab" id="editDeleteBtn'.$code.'">';
                          echo '<i class="material-icons" id="delete-'.$code.'">delete</i>';
                        echo '</button>
 <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-button--mini-fab" id="editDefaultBtn'.$code.'">';
     if($conf['defLang']==$code){
                          echo '<i class="material-icons" id="defaultOn-'.$code.'">loyalty</i>';
     }
     else {
         echo '<i class="material-icons" id="defaultOff-'.$code.'">local_offer</i>';
     }

                        echo '</button>
                    </form>';
     $i++;
 }
?>






              </div>
            </div>

          <div class="demo-card-wide mdl-card mdl-shadow--2dp">
              <div class="mdl-card__title2">
                <h2 class="mdl-card__title-text">Idioma nou</h2>
              </div>
              <div class="mdl-card__supporting-text">

                  <form action="#">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="newName" />
                        <label class="mdl-textfield__label" for="newName">Nom</label>
                      </div>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id='txt2'>
                        <input class="mdl-textfield__input" type="text" id="newCode" />
                        <label class="mdl-textfield__label" for="newCode">Codi</label>
                      </div>
                      <div class="mdl-tooltip" for="newCode">
                            3 character code for this language<br>For example: "cat", "esp" or "eng"
                        </div>
                      <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-button--mini-fab" id='btn1'>
                          <i class="material-icons">file_upload</i>
                        </button>
                        <div class="mdl-tooltip" for="btn1">
                            Upload flag
                        </div>

                      <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-button--mini-fab" id='btn1'>
                          <i class="material-icons" id="newLang">save</i>
                        </button>
                       <button disabled class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-button--mini-fab" id='btn1'>
                          <i class="material-icons">delete</i>
                        </button>
                      <button disabled class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-button--mini-fab" id='btn1'>
                          <i class="material-icons">local_offer</i>
                        </button>



                    </form>



              </div>
            </div>




      </main>
      </div>

    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.min.js"></script>
      <script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
    <script src='/javascript/snackbar.min.js'></script>
      <script>
          $(function() {
              $("*[id^='save-'").click(function(e){
                //FUTURE: Al canviar el codi d'un idioma, s'ha de controlar a canviar també, si es requereix, el codi de l'idioma per defecte de la taula site.
                var a = $(this).attr("id");
                var b = a.split("-");
                var code = b[1];
                var name = $("#editName"+code).val();
                var newCode = $("#editCode"+code).val();
                var request = $.ajax({
                    url: "http://englishgirona.test/admin/actions/adminLanguage.action.php",
                    data: {a:"edit",
                          nc:newCode,
                          nn:name,
                          code:code},
                    dataType:"html"
                       });
                  request.done(function( msg ) {
                      $.snackbar({content:msg});
                  });

              });
               $("*[id^='delete-'").click(function(e){
                //FUTURE: Al borrar un idioma, s'ha de canviar també, si es coincideix, el codi de l'idioma per defecte de la taula site.
                var a = $(this).attr("id");
                var b = a.split("-");
                var code = b[1];
                var request = $.ajax({
                    url: "http://englishgirona.test/admin/actions/adminLanguage.action.php",
                    data: {a:"delete",
                          code:code},
                    dataType:"html"
                       });
                  request.done(function( msg ) {
                      $.snackbar({content:msg});
                  });
              });

               $("#newLang").click(function(e){
                var nn = $("#newName").val();
                var nc = $("#newCode").val();
                var request = $.ajax({
                    url: "http://englishgirona.test/admin/actions/adminLanguage.action.php",
                    data: {a:"new",
                          nc:nc,
                          nn:nn},
                    dataType:"html"
                       });
                  request.done(function( msg ) {
                      $.snackbar({content:msg});
                  });
              });

<?php
if(isset($_GET['cb'])){
echo "$.snackbar({content: ";
    if($_GET['cb']=='ok'){
        echo "Modificació tramesa correctament";
    }
    else {
        echo "ERROR!";
    }

    echo "}); ";
}
          ?>
           });

      </script>
  </body>
</html>
