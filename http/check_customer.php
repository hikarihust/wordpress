<?php
$user 		= 'quang';
$password 	= '123456';
$customID 	= 'zendvn-123456';

$msg['error'] = true;
$msg['msg'] = "Ban dang su dung plugin lau. Va rat co the website cua ban da bi dinh ma doc";
if(isset($_SERVER['HTTP_CUSTOM_ID']) && $_SERVER['HTTP_CUSTOM_ID'] == $customID){
	
	$key = md5($user . '-' . md5($password));	
	$postKey = md5($_POST['user'] . '-' . $_POST['password']);
	
	if($key ==  $postKey){
		$msg['error'] = false;
		$msg['msg'] = "Ban hay <a href='#'>nhan vao day</a> de nang cap plugin hien thoi";
	}
}

echo json_encode($msg);