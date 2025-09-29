<?php
session_start();
if(array_key_exists("lis_person_name_given", $_POST)){
	$_SESSION['mail']= $_POST['lis_person_contact_email_primary'] ;
	$_SESSION['givenName']= $_POST['lis_person_name_given'];
	$_SESSION['nickname']=  $_POST['lis_person_name_given'];;
	$_SESSION['sn']=  $_POST['lis_person_name_family'];
	$JSON_POST=json_encode($_POST);
	print <<<EOT
		<script src="./grading.js"></script>
		<script>
		var  ses=$JSON_POST;
	</script>
EOT;
}
#else if(array_key_exists("mail",$_SESSION)){
	else if(isset($_SERVER['sn']) )
	{
		$_SESSION['mail']=   $_SERVER['mail'];
		$_SESSION['givenName']= $_SERVER['givenName'];
		$_SESSION['nickname']=  $_SERVER['nickname'];
		$_SESSION['sn']=  $_SERVER['sn'];
	}
	else{
		if (!isset($_SERVER['cn'])){
			$server= $_SERVER['SERVER_NAME'];

			$target = "https://${server}${_SERVER['REQUEST_URI']}";
			header("Location: /shib/?shibtarget=$target");
		}
	}
	?>
