<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Get data</title>
    </head>
    <body>
        <pre>
        <h2>Retrieve data from db</h2>
            <?php
            $user = "phpuser";
            $pass = "phppwd";
            $dbName = "wishlist";
            $dbHost = "localhost";

            print("connecting to database...");
            $con = mysql_connect($dbHost, $user, $pass) or die("could not connect to database: " . mysql_error());
            mysql_select_db($dbName) or die("could not select database $dbName" . mysql_error());
            //get data
            $query = "select * from domains";
            $res = mysql_query($query);
            $numrows = mysql_num_rows($res);
            print("\nthere are $numrows entries in the database");
            print("\nmysql_fetch_row\n");
            print("<table border=\"1\">\n");
            while ($row = mysql_fetch_row($res)) {
                print("<tr>\n");
                foreach ($row as $field) {
                    print("\t<td>" . stripcslashes($field) . "</td>\n");
                }
                print("</tr>\n");
            }
            print("</table>\n");
            //set data
            print("Choose a domain to change by clicking on the link: ");
            $res = mysql_query($query);
            print("<table border=\"1\">\n");
            while ($row = mysql_fetch_object($res)) {
                $url = "databases3.php?dom=".stripcslashes($row->domainname)."\"";
                print("<tr>\n");
                print("\t<td>" . stripcslashes($row->domainid) . "</td>\n");
                print("\t<td>" . stripcslashes($row->email) . "</td>\n");
                print("\t<td><a href=\"$url>".stripcslashes($row->domainname)."</a></td>\n");
                print("\t<td>" . stripcslashes($row->gender) . "</td>\n");
                print("</tr>\n");
            }
            print("</table>\n");

            mysql_close($con);
            ?>
        </pre>
    </body>
</html>
