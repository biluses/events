<?php

	$DB_HOST = 'localhost';
	$DB_USER = 'root';
	$DB_PASS = 'root';
	$DB_NAME = 'testdb';

	/*$DB_HOST = 'db415688671.db.1and1.com';
	$DB_USER = 'dbo415688671';
	$DB_PASS = 'Yohagopasta13';
	$DB_NAME = 'db415688671';*/
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	
