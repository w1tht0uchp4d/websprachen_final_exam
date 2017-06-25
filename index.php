<?php 
/*
  *
Websprachen Pruefung
31.5.2017 / ITM16

Hinweis: Konstante hier definieren!
*/
session_start();
//Konstante zum Verhindern des Direktaufrufs von Seiten
define("STUDENTNAME", "true");

// MVC Design Pattern inkludieren
include_once("include/model.php");
include_once("include/view.php");
include_once("include/controller.php");

// The one who controls them all!
$controller = new Controller();
// Der Controller übernimmt die Steuerung und zeigt etwas an ...
$controller->display();

?>
