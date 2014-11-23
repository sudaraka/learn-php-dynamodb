<?php

require_once('vendor/autoload.php');

use Aws\Common\Aws;

define('TABLE_NAME', 'ddb_test_table');

$aws = Aws::factory('ddb.config.json');

$client = $aws->get('DynamoDb');
