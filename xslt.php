<?php
$xslt = new XSLTProcessor();
$xml_doc = new DOMDocument();
$xml_doc->loadXML(file_get_contents("itnews.xml"));

$xsl_doc = new DOMDocument();
$xsl_doc->loadXML(file_get_contents("itnews.xsl"));
$xslt->importStylesheet($xsl_doc);
print $xslt->transformToXml($xml_doc);
?>
