<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Networking in PHP</title>
    </head>
    <body>
        <div>
            <?php
            
            /*
            print("1. using fsockopen to connect to remote host:\n");
            $host = "www.vim.org";
            $fp2 = fsockopen($host, 80, $errno, $errstr, 30);
            if(!$fp2) {
                die("connection to $host could not be established");
            }
            $page = "/index.html";
            $req = "GET $page HTTP/1.1\r\n";
            $req .= "Host: $host\r\n";
            $req .= "Referer: http://index.hu\r\n";
            $reg .= "User-Agent: PHP testclient\r\n\r\n";
            //$page = array();
            fputs($fp2, $req);
            while(!feof($fp2)) {
                print fgets($fp2, 1024);
            }
            fclose($fp2);
            //somehow it does not work
            */
            print("<br>2. using fopen to connect to remote host:\n");
            $webpage = "http://www.ubuntu.com/";
            $fp = fopen($webpage, "r") or die("$webpage cannot be opened");
            //print gethostbyaddr($_SERVER['REMOTE_HOST']);
            while (!feof($fp)) {
                print fgets($fp, 1024);
            }
            fclose($fp);
            print("<br>this is the end of content");
            print("<br>3. using stream context: ");
            $url = "http://www.php.net/index.php";
            $options = array(
                "http" => array(
                    "user-agent" => "PHP-test-script",
                    "header" => "referer: http://www.kiskapu.hu\r\n"
                )
            );
            $env = stream_context_create($options);
            $fp3 = fopen($url, 'r', 0, $env) or die("page cannot be opened");
            while(!feof($fp3)) {
                print fgets($fp3, 1024);
            }
            fclose($fp3);
            ?>
        </div>
    </body>
</html>
