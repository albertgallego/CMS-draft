<?php
$link = new mysqli('127.0.0.1', 'root','2lexivore','english_girona');

switch ($_GET['a']) {
    case "edit":
        $newCode=$_GET['nc'];
        $newName=$_GET['nn'];
        $code=$_GET['code'];
        $query= "UPDATE Languages SET idLanguages='".htmlentities($newCode)."', LanguageName='".htmlentities($newName)."' WHERE idLanguages='".htmlentities($code)."' LIMIT 1";
        if ($stm = $link->prepare($query)) {
            $stm->execute();
            if($stm->affected_rows==1){
                if($code!=$newCode){
                    echo "ok";
                    $columnNameQuery[1] =  "Alter table Posts change PostTitle_".$code."  PostTitle_".$newCode." VARCHAR(128)";
                    $columnNameQuery[2] = "Alter table Posts change PostContent_".$code." PostContent_".$newCode." LONGTEXT";
                    $columnNameQuery[3] =  "Alter table Sections change SectionName_".$code." SectionName_".$newCode." VARCHAR(45)";
                    foreach ($columnNameQuery as $key=>$value) {
                        $queryName = $link->prepare($value);
                        $queryName->execute();
                    }
                }
            }
            else {
                echo "ko";
            }
        }
        break;
    case "flag":
        break;
    case "delete":
        $code=$_GET['code'];
        $query="DELETE FROM Languages WHERE idLanguages='".htmlentities($code)."' LIMIT 1";
        if ($stm = $link->prepare($query)) {
            $stm->execute();
            if($stm->affected_rows==1){
                echo "ok";
                    $columnNameQuery[1] =  "Alter table Posts drop column PostTitle_".$code;
                    $columnNameQuery[2] = "Alter table Posts drop PostContent_".$code;
                    $columnNameQuery[3] =  "Alter table Sections drop SectionName_".$code;
                    foreach ($columnNameQuery as $key=>$value) {
                        $queryName = $link->prepare($value);
                        $queryName->execute();
                    }

            }
            else {
                echo "ko";
            }
        }
        break;
    case "default":
        break;
    case "undefault":
        break;
    case "new":
        $newCode=$_GET['nc'];
        $newName=$_GET['nn'];
        $query= "INSERT INTO Languages (idLanguages, LanguageName) VALUES ('".htmlentities($newCode)."', '".htmlentities($newName)."')";
        if ($stm = $link->prepare($query)) {
            $stm->execute();
            if($stm->affected_rows==1){
                if($code!=$newCode){
                    echo "ok";
                    $columnNameQuery[1] =  "Alter table Posts add column PostTitle_".$newCode."  VARCHAR(128)";
                    $columnNameQuery[2] = "Alter table Posts add column PostContent_".$newCode." LONGTEXT";
                    $columnNameQuery[3] =  "Alter table Sections add column SectionName_".$newCode." VARCHAR(45)";
                    foreach ($columnNameQuery as $key=>$value) {
                        $queryName = $link->prepare($value);
                        $queryName->execute();
                    }
                }
            }
            else {
                echo "ko";
            }
        }
        break;
    default:
        break;
}
