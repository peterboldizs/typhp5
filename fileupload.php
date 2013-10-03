<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>File upload</title>
    </head>
    <body>
        <div>
            <h2>File uploader</h2>
            <form enctype="multipart/form-data" action="<?php $PHP_SELF; ?>" method="post">
                <input type="hidden" name="MAX_FILE_SIZE" value="10240000"/>
                <input type="file" name="uploader"/><br/>
                <input type="submit" value="Upload"/>
            </form>
            <pre>
                <?php
                //print uploaded file properties
                if (isset($_FILES['uploader'])) {
                    print("\nName: " . $_FILES['uploader']['name']);
                    print("\nSize: " . $_FILES['uploader']['size']);
                    print("\nTemp name: " . $_FILES['uploader']['tmp_name']);
                    print("\nType: " . $_FILES['uploader']['type']);
                    print("\nError: " . $_FILES['uploader']['error']);
                    print ("</pre>");
                    print("\nUploaded file:");
                    //move file and display it if picture
                    if ($_FILES['uploader']['type'] == "image/jpeg") {
                        $src = $_FILES['uploader']['tmp_name'];
                        $dest = $_FILES['uploader']['name'];
                        move_uploaded_file($src, $dest);
                        $siz = getimagesize($dest);
                        $pic = "<p><img width=\"$siz[0]\" height=\"$siz[1]\" src=\"$dest\" alt=\"Uploaded file\"/></p>";
                        print $pic;
                    }
                }
                ?>
        </div>
        

    </body>
</html>
