<h3>Movies</h3>
<p>XML Filmdatenbank</p>

<?php

// XML-Quellen laden
$xml = new DOMDocument();
$xml->load('xml/movies.xml');

$xsl = new DOMDocument();
$xsl->load('xml/movies.xsl');

// Prozessor instanziieren und konfigurieren
$proc = new XSLTProcessor();
$proc->importStyleSheet($xsl); // XSL Document importieren

echo $proc->transformToXML($xml);

?>
