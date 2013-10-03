<?php
$docu = new DOMDocument("1.0");
$docu->loadXML(file_get_contents("itnews.xml"));
$root = $docu->firstChild;
traverse($root);

print("<br>Now with SimpleXML...<br>");
$smp_xml = simplexml_load_file("itnews.xml");
foreach ($smp_xml->newsitem as $value) {
    print("<u>{$value->title}</u>\n");
    print("<i>{$value->author}</i>\n");
    print("<h4>{$value->article}</h4>\n");
}

function traverse(DOMNode $node, $level=0) {
    handleNode($node, $level);
    if($node->hasChildNodes()) {
        $chlidren = $node->childNodes;
        foreach ($chlidren as $child) {
            if($child->nodeType == XML_ELEMENT_NODE) {
                traverse($child, $level+1);
            } else if($child->nodeType == XML_TEXT_NODE) {
                print $child->nodeValue;
            }
        }
    }
}

function handleNode(DOMNode $node, $level) {
    for($x = 0; $x < $level; $x++) {
        print("&nbsp;&nbsp");
    }
    if($node->nodeType == XML_ELEMENT_NODE) {
        print($node->tagName."<br>\n");
    }
}
?>
