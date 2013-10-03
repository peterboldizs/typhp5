<?php

$news = array(
    array(
        "title" => "hardware",
        "author" => "Steve Jobs",
        "article" => "the latest hardware news from Apple",
        "type" => "europe"
    ),
    array(
        "title" => "software",
        "author" => "Larry Ellison",
        "article" => "the latest sotfware news from Oracle",
        "type" => "europe"
    ),
    array(
        "title" => "os",
        "author" => "Bill Gates",
        "article" => "the latest os news from Microsoft",
        "type" => "europe"
    )
);

$doc = new DOMDocument();
$root = $doc->appendChild($doc->createElement("itnews"));
//print $doc->saveXML();
foreach ($news as $newsitem) {
    $entry = $root->appendChild($doc->createElement("newsitem"));
    $entry->setAttribute("type", $newsitem['type']);
    foreach (array("title", "author", "article") as $tagname) {
        $elem = $doc->createElement($tagname);
        $entry->appendChild($elem);
        $text = $doc->createTextNode($newsitem[$tagname]);
        $elem->appendChild($text);
    }
}

print $doc->saveXML();
?>
