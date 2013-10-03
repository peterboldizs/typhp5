<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Strings</title>
    </head>
    <body>
        <div>
            <pre>

                <?php
                $who = 'Kilroy';
                $where = 'here';
                $n = 12;
                echo "$who was $where {$n}th time<br>";
                $bar = 'this is not printed';
                $foo = '$bar';
                $foo2 = $bar;
                print("single-quoted: $foo<br>");
                print("normal: $foo2\n");
                print("normal: $foo2\n");
                printf(<<< Template
%s is %d years old.
Template
                        , "Fred", 35);
                printf("\nthe hex value of %d is %x", 214, 214);
                printf("\nthe octal value of %d is %o\n", 214, 214);
                printf('%.2f', 24.3456);
                print ("\n");
                printf('bond, james bond %03d.', 7);
                $a = array('name' => 'Fred', 'age' => '35', 'wife' => 'Wilma');
                print ("\n");
//print_r($a);
//var_dump($a);
                $mystr = "  Hello, world  ";
                $str_t = trim($mystr);
                $str_l = ltrim($mystr);
                $str_r = rtrim($mystr);
                print("\ntrimming:\n");
                print("'$str_t'");
                print("'$str_l'");
                print("'$str_r'");
                print str_replace("Hello", "Goodbye", $mystr);
                printf("\nLength is: %d", strlen($mystr));
                if(strstr($mystr, "lo")) {
                    print("\nthis is a good string\n");
                }
                /* for ($index = 0; $index < strlen($mystr); $index++) {
                  printf("character %d is %s\n", $index, $mystr{$index});
                  }
                  print "trim\n";
                  for ($index = 0; $index < strlen($str_t); $index++) {
                  printf("character %d is %s\n", $index, $str_t{$index});
                  }
                  print "left trim\n";
                  for ($index = 0; $index < strlen($str_l); $index++) {
                  printf("character %d is %s\n", $index, $str_l{$index});
                  }
                  print "right trim\n";
                  for ($index = 0; $index < strlen($str_r); $index++) {
                  printf("character %d is %s\n", $index, $str_r{$index});
                  } */

                print(strtolower($mystr));
                print(strtoupper($mystr));
                print(ucfirst($mystr));
                print(ucwords($mystr));

                $htmltable = get_html_translation_table();
                print("\nHTML table:\n");
                print_r($htmltable);
                $htmltable2 = get_html_translation_table(HTML_ENTITIES);
//print_r($htmltable2);
                $htmltable3 = get_html_translation_table(HTML_SPECIALCHARS);
//print_r($htmltable3);
                print "url encoding\n";
                print(rawurlencode($mystr));
                $mystr2 = "It's Harrs's hat";
                echo addslashes($mystr2);
                $o1 = 3;
                $o2 = "3";
                if ($o1 == $o2) {
                    echo "\n$o1 == $o2";
                }
                if ($o1 === $o2) {
                    echo "\n$o1 === $o2";
                } else {
                    echo "\n$o1 === $o2 is not true";
                }

                echo strcmp($mystr, $mystr2);
                echo strcmp($mystr, strtolower($mystr));
                $known = "Fred";
                $query = "Phred";
                if (soundex($known) == soundex($query)) {
                    echo "\nsoundex: $known sounds like $query";
                } else {
                    echo "\nsoundex: $known does not sound like $query";
                }
                if (metaphone($known) == metaphone($query)) {
                    echo "\nmetaphone: $known sounds like $query";
                } else {
                    echo "\nmetaphone: $known does not sound like $query";
                }
                $similar = levenshtein("cat", "cot");
                echo "\nsimilarity: $similar\n";
                $input = "Fred,Flintstone,25,Wilma";
                $fields = explode(',', $input);
                print("\nExploded:\n");
                print_r($fields);
                $string_again = join(',', $fields);
                echo $string_again;
                echo "\nTokenizing:\n";
                $token = strtok($input, ',');
                while ($token !== false) {
                    echo "$token\n";
                    $token = strtok(',');
                }
                $url = "http://pboldizs:s3cret@pluto.com/myapp?first=Peter&second=Boldizs";
                print("\nparsing URL: $url\n");
                
                $urlbits = parse_url($url);
                print_r($urlbits);
                //print("\nmoney format");
                //print money_format("%#10n", 218245); does not work on windows
                ?>
            </pre>
        </div>
    </body>
</html>