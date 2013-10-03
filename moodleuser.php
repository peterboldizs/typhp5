<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $connection = mysql_connect("localhost", "moodle", "moodle");
        $db = "moodle";
        mysql_select_db($db, $connection) or die("could not open $db");
        $sql = "select firstname, lastname, email from mdl_user";
        $result = mysql_query($sql, $connection) or die("could not execute $sql");
        $num_result = mysql_num_rows($result);
        ?>
        <table align="center" border="1">
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
            </tr>

            <?php
            for ($index = 0; $index < $num_result; $index++) {
                $row = mysql_fetch_array($result);
                print( "<tr>");
                    print( "<td>");
                    print( $row['firstname']);
                    print( "</td>");
                    print( "<td>");
                    print( $row['lastname']);
                    print( "</td>");
                    print( "<td>");
                    print( $row['email']);
                    print( "</td>");
                print( "</tr>");
            }
            ?>
        </table>
    </body>
</html>
