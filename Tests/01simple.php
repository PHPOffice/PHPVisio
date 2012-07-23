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

	// Set properties
	echo date('H:i:s') . ' Set properties'.EOL;
	$oPHPVisio->getProperties()->setCreator('Progi1984');
	$oPHPVisio->getProperties()->setLastModifiedBy('Progi1984');
	$oPHPVisio->getProperties()->setTitle('Diagram Test Document');
	$oPHPVisio->getProperties()->setSubject('Diagram Document');
	$oPHPVisio->getProperties()->setDescription('Test diagram, generated using PHPVisio.');

	// Add some data
	echo date('H:i:s') . ' Add page'.EOL;
	$oPage1 =  $oPHPVisio->addPage();
	
	echo date('H:i:s') . ' Add rectangle shape'.EOL;
	$oShape1 = $oPage1->addShape();
	$oShape1->setText('Rectangle text');
	
	echo date('H:i:s') . ' Add star shape'.EOL;
	$oShape2 = $oPage1->addShape();
	$oShape2->setText('Star text');
	
	echo date('H:i:s') . ' Add hexagon page'.EOL;
	$oShape3 = $oPage1->addShape();
	$oShape3->setText('Hexagon text');
	
	echo date('H:i:s') . ' Add connector'.EOL;
	$oCnctor1 = $oPage1->addConnector();
	$oCnctor1->addLinkStart($oShape1, PHPVisio_Connectors::POINT_BOTTOM);
	$oCnctor1->addLinkEnd($oShape2, PHPVisio_Connectors::POINT_TOP);
	
	// Save Dia file
	echo date('H:i:s') . ' Write to Dia format'.EOL;
	$objWriter = new PHPProject_Writer_Dia($oPHPVisio);
	$objWriter->save(str_replace('.php', '.dia', __FILE__));
	
	// Save MSVisioXML file
	echo date('H:i:s') . ' Write to MSVisioXML format'.EOL;
	$objWriter = new PHPProject_Writer_MSVisioXML($oPHPVisio);
	$objWriter->save(str_replace('.php', '.vdx', __FILE__));

	// Echo done
	echo date('H:i:s') . ' Done writing file.'.EOL;

?>