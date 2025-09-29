<?php
session_start();
#include("auth.php");
$user="dummyUser";
$id=$_GET['id'];
$file="./problem_sets/problem_$id.json";
$mode= $_GET['mode'] ?? "Guest";
// $file=file_get_contents($fileName);
// $fileJSON=json_decode($file);

if(isset($_SESSION['mail'])){
    list($user,$other)=explode("@",$_SESSION['mail']);
    $idFile=  "../data/$user/$id.json";   
}

  
if(isset($_POST["json"]) && isset($_SESSION['mail']) ){

    if ($mode=="admin") {
 
     file_put_contents($file,$_POST["json"]);
    } else {
      file_put_contents($idFile,$_POST["json"]);
    }
    if(!file_exists($idFile)){
        mkdir(dirname($idFile), 0755, true);
        }

   print($_POST["json"]);
}
else{
  
  if(file_exists($idFile) && $mode!="admin"){
    $file=$idFile;
  }

    $json=file_get_contents($file);
    
    print($json);

}
