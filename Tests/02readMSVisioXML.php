<?php

	// http://www.aspose.com/docs/display/diagramnet/Working+with+Diagrams
	// http://www.aspose.com/docs/display/diagramnet/Add+and+connect+shapes
	
	/** Error reporting */
	error_reporting(E_ALL);

	/** Include path **/
	ini_set('include_path', ini_get('include_path').';../Classes/');

	/** PHPVisio */
	include 'PHPVisio.php';
	
	if(php_sapi_name() == 'cli' && empty($_SERVER['REMOTE_ADDR'])) {
		define('EOL',PHP_EOL);
	}
	else {
		define('EOL', '<br />');
	}
	
	// Create new PHPVisio object
	echo date('H:i:s') . ' Create new PHPVisio object'.EOL;
	$oPHPVisio = new PHPVisio();
	$oPHPVisio->load('02sample.vsd');

	// Set properties
	echo date('H:i:s') . ' Set properties'.EOL;
	echo 'Creator > '.$oPHPVisio->getProperties()->getCreator().EOL;
	echo 'LastModifiedBy > '.$oPHPVisio->getProperties()->getLastModifiedBy().EOL;
	echo 'Title > '.$oPHPVisio->getProperties()->getTitle().EOL;
	echo 'Subject > '.$oPHPVisio->getProperties()->getSubject().EOL;
	echo 'Description > '.$oPHPVisio->getProperties()->getDescription().EOL;
	echo EOL;
	
	// ForEach Page
	echo 'Pages >'.EOL;
	$oPages = $oPHPVisio->getPages();
	foreach ($oPages as $oPage){
		echo '>> Name : '.$oPage->getTitle().EOL;
		echo '>> ID : '.$oPage->getID().EOL;
		
		echo 'Connectors >'.EOL;
		$oConnectors = $oPage->getConnectors();
		foreach ($oConnectors as $oConnector){
			echo '>>>> From : '.$oConnector->getShapeStart().EOL;
			echo '>>>> To : '.$oConnector->getShapeEnd().EOL;
		
			echo EOL;
		}
		
		echo 'Shapes >'.EOL;
		$oShapes = $oPage->getShapes();
		foreach ($oShapes as $oShape){
			echo '>>>> ID : '.$oShape->getID().EOL;
			echo '>>>> Name : '.$oShape->getName().EOL;
			echo '>>>> Master : '.$oShape->getMaster()->getTitle().EOL;
		
			echo EOL;
		}
		echo EOL;
	}
	
	// ForEach Master
	echo 'Masters >'.EOL;
	$oMasters = $oPHPVisio->getMasters();
	foreach ($oMasters as $oMaster){
		echo '>> Name : '.$oMaster->getTitle().EOL;
		echo '>> ID : '.$oMaster->getID().EOL;
	
		echo EOL;
	}
	
	// ForEach Font
	echo 'Fonts >'.EOL;
	$oFonts = $oPHPVisio->getFonts();
	foreach ($oFonts as $oFont){
		echo '>> Name : '.$oFont->getName().EOL;
	
		echo EOL;
	}
	
	// Echo done
	echo date('H:i:s') . ' Done writing file.'.EOL;

?>