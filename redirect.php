<?php
include_once "app/database/database.php";
 function redirect($nome){
    $db = new Database();
    $link = $db->findLink($nome);
    return $link;
 }

 
?>