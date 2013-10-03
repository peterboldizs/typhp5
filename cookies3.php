<?php

include 'cookies2.php';
show_status();

function show_status() {
    global $guest_state;
    /*
     *     'first_visit' => time(),
      'last_visit' => time(),
      'num_visit' => 1,
      'sum_time' => 0,
      'sum_pageload' => 1
     */
    $num_visit = sprintf("%.2f", ($guest_state[sum_pageload] / $guest_state[num_visit]));
    $sum_time = sprintf("%.2f", ($guest_state[sum_time] / $guest_state[num_visit]));
    print("<br>Welcome! Your guest id: $guest_state[guest_id]");
    print("<br>You visited this page $guest_state[num_visit] times");
    print("<br>Average time: $sum_time");
}
?>

