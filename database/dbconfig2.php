<?php
	try {
		// localhost
		$pdoConnect = new PDO("mysql:host=localhost;dbname=dhvsu_hgdg", "root", "");

		// Live
		// $pdoConnect = new PDO("mysql:host=localhost;dbname=u867039073_hgdg", "u867039073_hgdg", "Andreishania12");
		$pdoConnect->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

	}
	catch (PDOException $exc){
		echo $exc -> getMessage();
	}
    catch (PDOException $exc){
        echo $exc -> getMessage();
    exit();
    }
?>