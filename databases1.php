<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Databases in PHP</title>
    </head>
    <body>
        <h2>Database example</h2>
        <?php
        //validate and insert data
        if (!empty($_REQUEST['domain']) && !empty($_REQUEST['gender']) && !empty($_REQUEST['email'])) {
            $dberr = "";
            $ret = insertData($_REQUEST['domain'], $_REQUEST['gender'], $_REQUEST['email'], $dberr);
            if (!$ret) {
                print("Error: $dberr");
            } else {
                print("<br>Thanks for registering!");
            }
        } else {
            createForm();
        }

        function createForm() {
            print <<< EOF
            <form action="{$_SERVER['PHP_SELF']}" method="post">
                <table>
                <tr>
                <td>Domain name</td><td><input type="text" name="domain"/></td>
                </tr>
                <tr>
                <td>Email</td><td><input type="text" name="email"/></td>
                </tr>
                <tr>
                <td>Gender</td>
                <td>         
                    <select name="gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </td>
                </tr>
                <tr>
                <td><input type="submit" value="Insert into DB"/></td><td></td>
                </tr>
                </table>
            </form>
EOF;
        }

        function insertData($dom, $gen, $ema, &$dberr) {
            $user = "phpuser";
            $pass = "phppwd";
            $dbName = "wishlist";
            $dbHost = "localhost";

            print("\nConnecting to database...");
            $con = mysql_connect($dbHost, $user, $pass);
            if (!$con) {
                $dberr = mysql_error();
                return false;
            }
            if (!mysql_select_db($dbName, $con)) {
                $dberr = mysql_error();
                return false;
            }

            $domain = mysql_real_escape_string($dom);
            $gender = mysql_real_escape_string($gen);
            $email = mysql_real_escape_string($ema);
            $dbQuery = "insert into domains(domainname, gender, email) values('$domain', '$gender', '$email')";
            if (!mysql_query($dbQuery, $con)) {
                $dberr = mysql_error();
                return false;
            }
            print("\ninserted entry with id ". mysql_insert_id());
            return true;
        }
        ?>
    </body>
</html>
