<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Managing files in PHP</title>
    </head>
    <h2>Files in PHP</h2>
    <body>
        <pre>
            <?php
            $incres = include("incfile.php");
            print("\nFrom embedded page: " . $incres);
            if (file_exists("test.txt")) {
                print("\nThe test file exists, ");
            }
            if (!is_dir("test.txt")) {
                print("and not a directory, ");
            }
            if (is_readable("test.txt")) {
                print("readable, ");
            }
            if (is_writable("test.txt")) {
                print("writable, ");
            }
            if (is_executable("test.txt")) {
                print("executable");
            }
            //creating and deleting files:
            touch("test1.txt");
            touch("test2.txt");
            if (file_exists("test1.txt")) {
                print("\nthe test1 file exists");
            }
            if (file_exists("test2.txt")) {
                print("\nthe test2 file exists");
            }
            unlink("test2.txt");
            if (!file_exists("test2.txt")) {
                print("\nthe test2 file has been deleted");
            }
            //invoke the utility function
            fileProps("PIC00001.jpg");

            //fileProps("test.txt");
            //function to print file properties
            function fileProps($filename) {
                if (is_file($filename)) {
                    $siz = filesize($filename);
                    print("\n$filename is a file. Size: " . $siz . " bytes");
                    print("\nAccessed: " . date("Y.m.d. H:i", fileatime($filename)));
                    print("\nModified: " . date("Y.m.d. H:i", filemtime($filename)));
                    print("\nCreated: " . date("Y.m.d. H:i", filectime($filename)));
                }
            }

            //read the file
            $fp = fopen("test.txt", "r") or die("file could not be opened");
            print("\n1. Reading file line by line:\n");
            while (!feof($fp)) {
                $line1 = fgets($fp, 1024);
                print($line1);
            }
            print("\n=>End");
            fclose($fp);
            $fp = fopen("test.txt", "r") or die("file could not be opened");
            print("\n2. Reading file at once:\n");
            while (!feof($fp)) {
                $content = fread($fp, 1024);
                print($content);
            }
            print("\n=>End");
            fclose($fp);
            $fp = fopen("test.txt", "r") or die("file could not be opened");
            print("\n3. Reading file by chars:\n");
            while (!feof($fp)) {
                $chars = fgetc($fp);
                print($chars);
            }
            print("\n=>End");
            fclose($fp);
            print("\n4. Get the contents at once:\n");
            print(file_get_contents("test.txt"));

            //write into the file
            $fp = fopen("test1.txt", "w");
            fwrite($fp, "This must go into the file\n");
            fclose($fp);
            $fp = fopen("test1.txt", "a");
            fwrite($fp, "And this must be appended to it");
            fclose($fp);
            print("\n5. Check:\n");
            print(file_get_contents("test1.txt"));
            file_put_contents("test1.txt", "\nthis is inserted using file_put_contents", FILE_APPEND);
            print("\n6. Check:\n");
            print(file_get_contents("test1.txt"));

            //directories
            $dirname = "test_dir11";
            if (!file_exists($dirname)) {
                print("\nCreating directory and files:");
                mkdir($dirname, 0755);
                for ($i = 0; $i < 10; $i++) {
                    $filetocreate = $dirname . "/testfile" . $i . ".txt";
                    touch($filetocreate);
                    file_put_contents($filetocreate, "I am $filetocreate");
                }
            }
            print("\nListing directory: ");
            $dir = opendir($dirname);
            while (!is_bool($fil = readdir($dir))) {
                print("\n$fil");
//                if (!is_readable($fil)) {
//                    chmod($fil, "0755");
//                }
//                $fp = fopen($fil, "r") or die("file could not be opened");
//                print(file_get_contents($fp));
            }
            closedir($dir);
            ?>
        </pre>
    </body>
</html>
