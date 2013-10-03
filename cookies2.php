<?php
$GLOBALS['visit_length'] = 30;
$GLOBALS['db_id'] = connect("visitordata/visdb");
$GLOBALS['guest_id'] = $_COOKIE['guest_id'];
$GLOBALS['guest_state'];

if (empty($guest_id)) {
    $guest_state = new_guest();
    print("welcome, new guest");
} else {
    print("welcome back");
    $guest_state = old_guest($guest_id);
}

function new_guest() {
    $guest_data = array(
        'first_visit' => time(),
        'last_visit' => time(),
        'num_visit' => 1,
        'sum_time' => 0,
        'sum_pageload' => 1
    );
    insert_guest($guest_data);
    setcookie("guest_id", $guest_data['guest_id'], time() + 36000, "/");
    return $guest_data;
}

function old_guest($guest_id) {
    $now = time();
    $guest_data = get_guest($guest_id);
    if (!$guest_data) {
        return new_guest();
    }
    $guest_data['sum_pageload']++;
    if ($guest_data['last_visit'] + $GLOBALS['visit_length'] > $now) {
        $guest_data['sum_time'] += ( $now - $guest_data['last_visit']);
    } else {
        $guest_data['num_visit']++;
    }
    $guest_data['last_visit'] = $now;
    update_guest($guest_data);
    return $guest_data;
}

function connect($db) {
    $db_id = sqlite_open($db, 0, $error_message);
    if (!is_resource($db_id)) {
        die("sqlite error: $error_message");
    }
    $create_vis = "create table visitor_log (
        guest_id integer primary key,
        first_visit integer,
        last_visit integer,
        num_visit integer,
        sum_time integer,
        sum_pageload integer)";
    @sqlite_query($db_id, $create_vis);
    return $db_id;
}

function get_guest($guest_id) {
    $query = "select * from visitor_log where guest_id = $guest_id";
    $result = sqlite_query($GLOBALS['db_id'], $query);
    if (!sqlite_num_rows($result)) {
        return false;
    }
    return sqlite_fetch_array($result, SQLITE3_ASSOC);
}

function update_guest($guest_data) {
    $upd_arr = array();
    foreach ($guest_data as $key => $value) {
        if (!is_int($key)) {
            array_push($upd_arr, "$key=$value");
        }
    }
    $uq = "update visitor_log set ";
    $uq .= implode(", ", $upd_arr);
    $uq .= " where guest_id = " . $guest_data['guest_id'];
    sqlite_query($GLOBALS['db_id'], $uq);
}

function insert_guest(&$guest_data) {
    $iq = "insert into visitor_log ( ";
    $iq .= implode(", ", array_keys($guest_data));
    $iq .= " ) values ( ";
    $iq .= implode(", ", array_values($guest_data));
    $iq .= " )";
    sqlite_query($GLOBALS['db_id'], $iq);
    $guest_data['guest_id'] = sqlite_last_insert_rowid($GLOBALS['db_id']);
}

?>
