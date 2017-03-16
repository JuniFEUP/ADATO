<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 16/03/2017
 * Time: 21:39
 */

$db = null;
$sqliteDebug = false;
try {
	// connect to your database
	$db = new SQLite3('../adatoDB.db');
	$db->busyTimeout(5000);
}
catch (Exception $exception) {
	// sqlite3 throws an exception when it is unable to connect
	echo '<p>There was an error connecting to the database!</p>';
	if ($sqliteDebug) {
		echo $exception->getMessage();
	}
}