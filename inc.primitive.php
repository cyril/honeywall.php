<?php

// ### Begin Configuration ###

define('EMAIL', 'contact@domain.com');
define('SQL_user', 'user');
define('SQL_pass', 'pass');
define('SQL_address', 'address');
define('SQL_database', 'database');

define('MODE', 'Prod');// 'Dev' or 'Prod'

// ### End Configuration ###

session_start();

$print_this = array();

if (MODE == 'Prod') error_reporting(0);

if (isset($_GET['system_logout'])) require_once 'inc.primitive.system_logout.php';
if (isset($_GET['system_unselect'])) require_once 'inc.primitive.system_unselect.php';
if (isset($_GET['root_logout'])) require_once 'inc.primitive.root_logout.php';
if (isset($_GET['main_list'])) unset( $_SESSION['system_id'], $_SESSION['system_connect'] );

ini_set('error_reporting', E_ALL);
ini_set("arg_separator.output", '&amp;');

// ### Begin SQL ###

define('SQL', 'MySQL');

if (MODE == 'Dev') {
	$mysql_connect_error_msg  = '<h1>Error</h1>'."\n";
	$mysql_connect_error_msg .= '<p class="error">'."\n";
	$mysql_connect_error_msg .= 'Impossible de se connecter au serveur My<abbr title="Structured Query Language" lang="en">SQL</abbr>.'."\n";
	$mysql_connect_error_msg .= '</p>'."\n";
	$mysql_select_db_error_msg  = '<h1>Error</h1>'."\n";
	$mysql_select_db_error_msg .= '<p class="error">'."\n";
	$mysql_select_db_error_msg .= 'Error lors de la s&eacute;lection de la base de donn&eacute;e <q><code>'.SQL_database.'</code></q> du serveur My<abbr title="Structured Query Language" lang="en">SQL</abbr>.'."\n";
	$mysql_select_db_error_msg .= '</p>'."\n";
} else if (MODE == 'Prod') {
	$mysql_connect_error_msg = '<h1>SQL connection error</h1>'."\n";
	$mysql_select_db_error_msg = '<h1>SQL selection error</h1>'."\n";
}

function error_message($query)
{
	echo'<dl class="error">'."\n".
	'<dt>My<abbr title="Structured Query Language" lang="en">SQL</abbr> error</dt>'."\n".
	'<dd>'."\n".
	'<dl>'."\n".
	'<dt>Message</dt><dd><q>'.htmlentities(mysql_error(), ENT_QUOTES).'</q></dd>'."\n".
	'<dt>Query<dt><dd><pre>'.htmlentities($query, ENT_QUOTES).'</pre></dd>'."\n".
	'</dl>'."\n".
	'</dd>'."\n".
	'</dl>'."\n";
}

@mysql_connect(SQL_address, SQL_user, SQL_pass) or die($mysql_connect_error_msg);
@mysql_select_db(SQL_database) or die($mysql_select_db_error_msg);

// ### End SQL ###







//when the user submit the form of: root.login.form.html
if ( isset($_POST['login'], $_POST['password']) ) require_once('inc.primitive.root.login.php');

if ( isset($_SESSION['root'], $_GET['root_login']) )  unset($_GET['root_login']);
if ( !isset($_SESSION['root']) && isset($_GET['root_logout']) ) unset($_GET['root_logout']);




if (isset($_POST['system_id'])) $_SESSION['system_id'] = $_POST['system_id'];
if (isset($_GET['system_id'])) $_SESSION['system_id'] = $_GET['system_id'];
if (!isset($_SESSION['system_id'])) $_SESSION['system_id'] = 0;
if (!is_numeric($_SESSION['system_id'])) $_SESSION['system_id'] = 0;

if (isset($_GET['display'])) $_SESSION['display'] = $_GET['display'];
if (!isset($_SESSION['display'])) $_SESSION['display'] = '';

?>