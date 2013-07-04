<?
require('connection.php');

//Registration
if(isset($_GET['registration'])){

	$newUser = array("name" => ''.$_POST['name'], "mail" => ''.$_POST['email'], "token" => ''.$_POST['password']);  
	$response = post_request('https://giv-car.uni-muenster.de/stable/rest/users', $newUser, false);


	if($response["status"] == 201){
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['password'] = $_POST['password'];
		echo $response['status'];
	}else{
		echo $response['status'];
	}

}

else if(isset($_GET['logout'])){
	if (isset($_SESSION)) session_destroy();
	header('Location: ../../index.php?lo=done');
}


else if(isset($_GET['delete'])){
	if(isset($_POST['delete'])){
		if($_POST['delete']){
			$response = delete_request('https://giv-car.uni-muenster.de/stable/rest/users/'.$_SESSION['name']);
			if($response['status'] == 204){
				echo 'status:ok';
				session_destroy();
			}
			else{
				echo $response['status'];
			}
		}
	}
}

else if(isset($_GET['test'])){
	echo login("jakob2", "jakob2", true);
}

function is_logged_in(){
	if(isset($_SESSION['name']) && isset($_SESSION['password'])) return true;
	else return false;
}



function login($name, $password, $permanent){
	
	$_SESSION['name'] = $name;
	$_SESSION['password'] = $password;

	error_log($_SESSION['name'].' '.$_SESSION['password']);

	$response = get_request('https://giv-car.uni-muenster.de/stable/rest/users/'.$name, true);
	if($response["status"] == 200){
		$response = json_decode($response["response"],true);
		$_SESSION['mail'] = $response['mail'];
	
		if ($permanent == true){
			//ToDo: generate a place and remember me cookie
		}
		
		return true;
	}else{
		if (isset($_SESSION)) session_destroy();
		
		return false;
	}
}





//language
if(isSet($_GET['lang']))
{
$lang = $_GET['lang'];

// register the session and set the cookie
$_SESSION['lang'] = $lang;

setcookie('lang', $lang, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['lang']))
{
$lang = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
$lang = $_COOKIE['lang'];
}
else
{
$lang = 'en';
}



include('lang_'.$lang.'.php');


?>
