<?php

$open_stack = array();
$parser = xml_parser_create();
xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
xml_set_element_handler($parser, "start_handler", "end_handler");
xml_set_character_data_handler($parser, "char_handler");
$xml_content = file_get_contents("tomcat.xml");
xml_parse($parser, $xml_content) or die(formal_error($parser));

function start_handler($parser, $element_name, $attr) {
    global $open_stack;
    $open_stack[] = array($element_name, "");
}

function char_handler($parser, $text) {
    global $open_stack;
    $curr_index = count($open_stack)-1;
    $open_stack[$curr_index][1] = $open_stack[$curr_index][1].$text;
}

function end_handler($parser, $element_name) {
    global $open_stack;
    $elem = array_pop($open_stack);
    if($element_name == "role") {
        print("<p><b>$elem[1]</b></p>");
    }
    if($element_name == "other") {
        print("<p><i>$elem[1]</i></p>");
    }
}

function formal_error($parser) {
    $code = xml_get_error_code($parser);
    $errstr = xml_error_string($code);
    $errline = xml_get_current_line_number($parser);
    return "XML error ($code): $errstr in line $errline";
}

?>
