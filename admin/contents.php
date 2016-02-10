<?php
session_start();
if(!isset($_SESSION['user']) or !$_SESSION['user']=="ok") {
    header("location: index.php");
}
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
    <meta charset="utf-8">
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
          <span class="mdl-layout-title">Contents</span>
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
                  <button id="menu-sections" class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">folder</i>
</button>
<ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right per_sobre" for="menu-sections">
    <?php

$link = new mysqli('127.0.0.1', 'root','2lexivore','english_girona');

$query = "select idSection, SectionUrl, SectionName_cat from Sections";
/*echo $query;
die();/**/

if ($stmt = $link->prepare($query)) {

    /* execute statement */
    $stmt->execute();
    $stmt->bind_result($idSection, $sectionURL, $name);
    while ($stmt->fetch()) {
        echo "<li  class='mdl-menu__item mdl-js-ripple-effect'>$name</li>";
    }
}
    ?>

</ul>
<button id="menu-language" class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">language</i>
</button>
<ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="menu-language">



</ul>





                <h2 class="mdl-card__title-text">Filtres</h2>


              </div>
              <div class="mdl-card__supporting-text">


              </div>
          </div>




          <div class="demo-card-wide mdl-card mdl-shadow--2dp">
              <div class="mdl-card__title2">
                <h2 class="mdl-card__title-text">Nou Contingut</h2>
              </div>
              <div class="mdl-card__supporting-text">

                  <form action="#">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="newName" />
                        <label class="mdl-textfield__label" for="newName">Titol</label>
                      </div>

                      <select>
                          <!--todo:HERE! -->

                      </select>

                      <br />
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id='txt2'>
                          <textarea  class="mdl-textfield__input" type="text" rows= "10" id="newContent"></textarea>
                        <label class="mdl-textfield__label" for="newCode">Contingut</label>
                      </div>

                      <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-button--mini-fab" id='btn1'>
                          <i class="material-icons">file_upload</i>
                        </button>


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
