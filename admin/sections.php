<?php
header('Content-Type: text/html; charset=latin9');
/*
 function fetch_array() {
        $data = mysqli_stmt_result_metadata($this->stmt);
        $count = 1; //start the count from 1. First value has to be a reference to the stmt. because bind_param requires the link to $stmt as the first param.
        $fieldnames[0] = &$this->stmt;
        while ($field = mysqli_fetch_field($data)) {
            $fieldnames[$count] = &$array[$field->name]; //load the fieldnames into an array.
            $count++;
        }
        call_user_func_array(mysqli_stmt_bind_result, $fieldnames);
        mysqli_stmt_fetch($this->stmt);
        return $array;
    }
session_start();
if(!isset($_SESSION['user']) or !$_SESSION['user']=="ok") {
    header("location: index.php");
}*/
?>

<!doctype html>
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
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
        display:none;
    }
    </style>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--white mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Seccions</span>
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

<?php
// Primer hem de saber quants idiomes tenim i quins son.
$link = new mysqli('codigironanet.ipagemysql.com', 'eguser','2lexivore','english_girona');
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

?>
      <main class="page-content mdl-layout__content mdl-color--grey-100">
         <div class="demo-card-wide mdl-card mdl-shadow--2dp">
              <div class="mdl-card__title2">
                <h2 class="mdl-card__title-text">Llista de seccions</h2>
              </div>
              <div class="mdl-card__supporting-text">
          <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
              <thead>
                <tr>
                  <th class="mdl-data-table__cell--non-numeric">Base Url</th>
<?php
    foreach ($language as $key=>$value) {
        echo "<th class='mdl-data-table__cell--non-numeric'>".$value['name']."</th>";

    }
     echo "<th class='mdl-data-table__cell--non-numeric'>Accions</th>";
?>
                </tr>
              </thead>
              <tbody>
<?php
$sectionNames='';
$codeList=array();
foreach ($language as $key=>$value) {
    $sectionNames.="SectionName_".$value['code'].", ";
    $foo = array_push($codeList, $value['code']); // Tenim un array amb tots els codis, per iterar-hi.
    //echo "foo: $foo<br />";
    $languageList[$foo]=$value['code'];
    $codi="name_".$value['code'];
    $$codi=''; //Inicialitzem una variable amb el nom $name_<codi> (p.e. $name_cat)
}

$sectionNames = substr($sectionNames,0,-2);
$query = "select idSection, SectionUrl, $sectionNames from Sections";
/*echo $query;
die();/**/

if ($stmt = $link->prepare($query)) {

    /* execute statement */
    $stmt->execute();

    /* bind result variables */
    /*echo "<h1>FOO: $foo</h1>";
    print_r($codeList);
    print_r($codi);
    die();/**/
    //FUTURE: this is a ugly workarround, fix it!
    switch($foo){ //$i conté el num de idiomes.
        case 1:
            $stmt->bind_result($idSection, $sectionURL, $lang1);
            break;
        case 2:
            $stmt->bind_result($idSection, $sectionURL, $lang1, $lang2);
            break;
        case 3:
            $stmt->bind_result($idSection, $sectionURL, $lang1, $lang2, $lang3);
            break;
        case 4:
            $stmt->bind_result($idSection, $sectionURL, $lang1, $lang2, $lang3, $lang4);
            break;
        case 5:
            $stmt->bind_result($idSection, $sectionURL, $lang1, $lang2, $lang3, $lang4, $lang5);
            break;
        case 6:
            $stmt->bind_result($idSection, $sectionURL, $lang1, $lang2, $lang3, $lang4, $lang5, $lang6);
            break;
        case 7:
            $stmt->bind_result($idSection, $sectionURL, $lang1, $lang2, $lang3, $lang4, $lang5, $lang6, $lang7);
            break;
        case 8:
            $stmt->bind_result($idSection, $sectionURL, $lang1, $lang2, $lang3, $lang4, $lang5, $lang6, $lang7, $lang8);
            break;
        case 9:
            $stmt->bind_result($idSection, $sectionURL, $lang1, $lang2, $lang3, $lang4, $lang5, $lang6, $lang7, $lang8, $lang9);
            break;
        case 10:
            $stmt->bind_result($idSection, $sectionURL, $lang1, $lang2, $lang3, $lang4, $lang5, $lang6, $lang7, $lang8, $lang9, $lang10);
            break;
        default:
            echo "errar";
            break;
    }

    /* fetch values */
    while ($stmt->fetch()) {
        $section[$idSection]['url']=$sectionURL;
        $section[$idSection]['lang1']=$lang1;
        $section[$idSection]['lang2']=$lang2;
        $section[$idSection]['lang3']=$lang3;
        $section[$idSection]['lang4']=$lang4;
        $section[$idSection]['lang5']=$lang5;
        $section[$idSection]['lang6']=$lang6;
        $section[$idSection]['lang7']=$lang7;
        $section[$idSection]['lang8']=$lang8;
        $section[$idSection]['lang9']=$lang9;
        $section[$idSection]['lang10']=$lang10;
    }

    /* close statement */
    $stmt->close();
}


/*echo "<pre>";
print_r($section);
echo "</pre>";/**/
foreach($section as $key=>$value){
    echo "<tr>";
    echo "<td class='mdl-data-table__cell--non-numeric'>".$value['url']."</td>";
    $t=1;
    while($t<=$foo){

        echo "<td class='mdl-data-table__cell--non-numeric'>".$value['lang'.$t]."</td>";
        $t++;
    }
    echo "<td class='mdl-data-table__cell--non-numeric'><form><button class=\"mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-button--mini-fab\" id='editBtn$key'>
                          <i class=\"material-icons\">edit</i>
                        </button><button class=\"mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-button--mini-fab\" id='deleteBtn$key'><i class=\"material-icons\">delete</i>
                        </button></form></td>";
  echo "</tr>";
}

?>
              </tbody>
        </table>
             </div></div>


          <div class="demo-card-wide mdl-card mdl-shadow--2dp">
              <div class="mdl-card__title2">
                <h2 class="mdl-card__title-text">Nova secció</h2>
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
  </body>
</html>
