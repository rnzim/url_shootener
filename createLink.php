<?php 
include_once "app/database/database.php";
include_once "app/funcs/filter.php";
$db = new Database();
if(isset($_POST['link'])){
    if(strlen($_POST['link']) >0){
     //codigo do database
     $db = new Database();
     $nome =  strlen($_POST['nome']) > 0 ? $_POST['nome'] : uniqid();
     $clearNome = sqlInjectionRemove($nome);
     if(urlCheck($_POST['link']) == true){
        $db->create($clearNome,$_POST['link']);
        header("Location: index.php?status=success&url=$nome");
        exit;
     }else{
        header("Location: index.php?status=invalid");
        exit;
     }   
   
    }else{
     header("Location: index.php?status=error");
     exit;
    }
 }else{
   
     header("Location: index.php?status=info");
     exit;
 }



?>