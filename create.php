#!/usr/bin/env php
<?php

require_once('client.php');

$table_info = null;
try {
    $table_info = $client->describeTable(array(
        'TableName' => TABLE_NAME,
    ));

    echo 'Table "' . TABLE_NAME . '" already exists.' . PHP_EOL;
    exit(1);
}
catch(Exception $e) {
}

$client->createTable(array(
    'TableName' => TABLE_NAME,
    'AttributeDefinitions' => array(
        array(
            'AttributeName' => 'id',
            'AttributeType' => 'N',
        ),
    ),
    'KeySchema' => array(
        array(
            'AttributeName' => 'id',
            'KeyType' => 'HASH',
        ),
    ),
    'ProvisionedThroughput' => array(
        'ReadCapacityUnits' => 1,
        'WriteCapacityUnits' => 1,
    ),
));

echo 'Creating table "' . TABLE_NAME . '"... ';

$client->waitUntilTableExists(array(
    'TableName' => TABLE_NAME,
));

echo 'Done!' . PHP_EOL;
