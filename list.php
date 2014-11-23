#!/usr/bin/env php
<?php

require_once('client.php');

$result = $client->listTables();

if(0 < sizeof($result['TableNames'])) {
    echo 'Available Tables.' . PHP_EOL;
    echo '=================' . PHP_EOL . PHP_EOL;

    foreach($result['TableNames'] as $idx => $table_name) {
        echo ($idx + 1) . '. ' . $table_name . PHP_EOL;
    }

    echo PHP_EOL;
}
