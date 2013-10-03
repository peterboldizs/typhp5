<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TaskFacade
 *
 * @author peter
 */
class TaskFacade {

    function getTask($taskid) {
        $user = "phpuser";
        $pass = "phppwd1";
        $host = "localhost";
        $database = "cdcol";
        $con = mysql_connect($host, $user, $pass);
        mysql_select_db($database) or die("could not connect to db");
        $query = "select * from tasks where id=$taskid";
        $res = mysql_query($query);
        $tasks = array();
        while ($row = mysql_fetch_row($res)) {
            foreach ($row as $key => $value) {
                $row[$key] = stripcslashes($value);
            }
            $tasks[] = $row;
        }
        return $tasks;
    }

    function getTasks() {
        $user = "phpuser";
        $pass = "phppwd1";
        $host = "localhost";
        $database = "cdcol";
        $con = mysql_connect($host, $user, $pass);
        mysql_select_db($database) or die("could not connect to db");
        $query = "select * from tasks";
        $res = mysql_query($query);
        $tasks = array();
        while ($row = mysql_fetch_row($res)) {
            foreach ($row as $key => $value) {
                $row[$key] = stripcslashes($value);
            }
            $tasks[] = $row;
        }
        return $tasks;
    }

    function insertTask($sum, $desc, $pers) {
        $user = "phpuser";
        $pass = "phppwd1";
        $host = "localhost";
        $database = "cdcol";
        $con = mysql_connect($host, $user, $pass);
        mysql_select_db($database) or die("could not connect to db");
        $q = "insert into tasks (summary, description, person) values ($sum, $desc, $pers)";
        $res = mysql_query($q);
        return $res;
    }

}

?>
