<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Updating entries in database</title>
    </head>
    <body>
        <?php
        $dom = $_REQUEST['dom'];
        $user = "phpuser";
        $pass = "phppwd";
        $dbName = "wishlist";
        $dbHost = "localhost";
        
        //get row to be updated
        print("connecting to database...");
        $con = mysql_connect($dbHost, $user, $pass) or die("could not connect to database: " . mysql_error());
        mysql_select_db($dbName) or die("could not select database $dbName" . mysql_error());
        $query = "select * from domains where domainname='$dom'";
        $res = mysql_query($query);
        
        //render update form
        print("<form action=\"{$_SERVER['PHP_SELF']}\" method=\"post\">");
        print("<table border=\"1\">\n");
        $row = mysql_fetch_object($res);
        print("<tr>\n");
        print("\t<td>Domain name</td><td><input type=\"text\" name=\"domainname\" value=\"" . $row->domainname . "\"/></td>\n");
        print("</tr>\n");
        print("<tr>\n");
        print("\t<td>Email</td><td><input type=\"text\" name=\"email\" value=\"" . $row->email . "\"/></td>\n");
        print("</tr>\n");
        print("<tr>\n");
        print("\t<td><input type=\"submit\" nsme=\"updaterow\" value=\"Update\"/></td><td></td>\n");
        print("</tr>\n");
        print("</table>\n");
        print("<input type=\"hidden\" name=\"domainid\" value=\"" . $row->domainid . "\"/>");
        print("</form>\n");
        
        //process update
        if (!empty($_REQUEST['domainid'])) {
            print("connecting to database...");
            $up = "update domains set email=\"" . $_REQUEST['email'] . "\", domainname=\"" . $_REQUEST['domainname'] . "\" where domainid=" . $_REQUEST['domainid'];
            $update = mysql_query($up, $con);
            print("Successfully updated " . mysql_affected_rows() . " rows.");
        }
        mysql_close();
        ?>
    </body>
</html>
