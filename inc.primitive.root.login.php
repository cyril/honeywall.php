<?php

if (!isset($_SESSION['root'])) {
	
	if (isset($_POST['login'], $_POST['password'])) {
		
		define('ROOT_user', 'root'  );
		define('ROOT_pass', '4f784ca303774b8bb8bc352a04892eb8');
		
		if ( (ROOT_user == $_POST['login']) && 
		     (ROOT_pass == md5($_POST['password'])) ) {
			
			$_SESSION['root'] = '';
			
      $print_this[] = '<p><span class="done">Connection done.</span></p>';
			
			//in the even in a system is selected, but not connected, we connect root on it automaticly
      if ($_SESSION['system_id'] != 0 && !isset($_SESSION['system_connect'])) $_SESSION['system_connect'] = '';
			
		} else {
			$_GET['root_login'] = '';
			$print_this[] = '<p><span class="error">Invalid password.</span></p>';
		}
		
	}

}

?>