<?php
if(!$_POST){
$id=$_GET['id'];
if(isset($_SESSION['mail'])){
list($user,$other)=explode("@",$_SESSION['mail']);
$json=file_get_contents("./data/$user/$id.json");
}
if(!$json){
$json=file_get_contents("./problem_sets/problem_1.json");
}
print($json);
}
else{
print_r($_POST);
}
