<?php
if ($_GET['user']=="admin" and $_GET['pass']=="123"){
    session_start();
    $_SESSION['user']='ok';
}
else if (isset($_GET['user'])) {
}
session_start();
if(isset($_SESSION['user']) and $_SESSION['user']=="ok") {

    header("location: dashboard.php");

}
?><!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://englishgirona.test/css/material.min.css" />
        <script src="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel='stylesheet' href='http://englishgirona.test/css/styles.css' />
        <title><?= $conf['title']; ?></title>
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <div class="mdl-grid">
           <div class="mdl-layout-spacer"></div>
              <div class="mdl-cell mdl-cell--3-col cont">
                <form action="." id='login' method='get'>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name='user' id="user" />
                    <label class="mdl-textfield__label" for="sample3">User</label>
                  </div>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="password" name='pass' id="pass" />
                    <label class="mdl-textfield__label" for="sample3">Password</label>
                  </div>
                    <input class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab login material-icons" type='submit' value='send' />
                </form>
              </div>
           <div class="mdl-layout-spacer"></div>
        </div>
    </body>
    <script>
      /*  $(document).ready(function(){
            $(".login").click(function(){
                $("#login").send();
            });
        });*/
    </script>
</html>
