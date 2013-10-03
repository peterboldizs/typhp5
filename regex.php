<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Regular expressions</title>
    </head>
    <body>
        <h2>Regular expressions in PHP</h2>
        <pre>
            <?php
            preg_match("/rr/", "ábécésorrend", $arr);
            print_r($arr);
            
            preg_match("/s./", "ábécésorrend", $arr2);
            print_r($arr2);
            
            preg_match("/ph./", "alphabet", $arr3, PREG_OFFSET_CAPTURE);
            print_r($arr3);
            
            if(preg_match("/a+/", "aaaa", $matches)){
                print_r($matches);
            }
            
            $text = " ház húz hülyéz hazardíroz ";
            if(preg_match("/h.*z/", $text, $matches)){
                print_r($matches);
            }
            if(preg_match("/h.*?z/", $text, $matches)){
                print_r($matches);
            }
            if(preg_match("/[a-z347]+/", "AB dkfd773sxFF", $matches)){
                print_r($matches);
            }
            if(preg_match("/[^a-z347]+/", "AB dkfd773sxFF", $matches)){
                print_r($matches);
            }
            if(preg_match("/h[a-zA-Z0-9_]+z/", $text, $matches)){
                print_r($matches);
            }
            if(preg_match("/h\w+z/", $text, $matches)){
                print_r($matches);
            }
            if(preg_match("/\bh\w+z\b/", $text, $matches)){
                print_r($matches);
            }
            
            $text2 = "A lényeg, hogy ne essünk pánikba!";
            if(preg_match("/(ne)\s+(essünk)/", $text2, $matches)) {
                print_r($matches);
            }
            
            $ipadd = "172.21.100.168";
            if(preg_match("/(\d+)\.(\d+)\.(\d+)\.(\d+)/", $ipadd, $matches)) {
                print_r($matches);
            }
            
            $domain = "www.example.hu";
            if(preg_match("/www\.example(\.com|\.hu)/", $domain, $matches)) {
                print_r($matches);
            }
            
            $text3 = "barackot, bort, búzát, banant és bekakat árulok";
            if(preg_match("/\bb\w+t\b/", $text3, $matches)) {
                print_r($matches);
            }
            if(preg_match_all("/\bb\w+t\b/", $text3, $matches)) {
                print_r($matches);
            }
            
            $text4 = "01-05-99, 01-10-99, 01-03-00";
            if(preg_match_all("/(\d+)-(\d+)-(\d+)-(\d+)/", $text4, $matches2, PREG_SET_ORDER)) {
                print_r($matches2);
                foreach ($matches2 as $value) {
                    print($value);
                }
            }
            
            $text5 = "my associate, Sarah Williams is greeting you";
            print preg_replace("/Sarah Williams/", "John Smith", $text5);
            
            $today = "08/07/2011";
            print preg_replace("|(\d+)/(\d+)/(\d+)|", "\n$3.$1.$2.", $today);
            
            $person = "name: peter\nprofession: programmer\neyes: blue";
            if(preg_match_all("/^\w+:\s+(.*)$/m", $person, $matchesarray)) {
                print_r($matchesarray);
            }
            
            $text6 = "kezdetkent indítsunk ezzel a sorral\nés így egy következtetéshez
                \n érkezhetünk el vegül\n";
            preg_match("/^(\w+).*?(\w+)$/s", $text6, $matches);
            print_r($matches);
            
            function dateConverter($match) {
                $year = ($year < 70 ? $match[3]+2000:$match[3]);
                $time = (mktime(0,0,0,$match[1],$match[2],$match[3]));
                return date("Y. m . j.", $time);
            }
            $dates = "3/18/03 \n7/44/04";
            $dates = preg_replace_callback("/([0-9]+)\/([0-9]+)\/([0-9]+)/", "dateConverter", $dates);
            print $dates;
            
            $text7 = "apples, oranges, pears and peaches";
            $fruits = preg_split("/, | and /", $text7);
            print_r($fruits);
            ?>
        </pre>
    </body>
</html>
