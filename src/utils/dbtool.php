<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 3/25/18
 * Time: 1:03 PM
 */


namespace DrawGame;

const DB = array(
    'host' => 'drawgame_mysql_1',
    'user' => 'root',
    'password' => '.',
    'database' => 'db_drawgame',
    'port' => '3306');

function connect(){
    $conn = new \mysqli(DB['host'], DB['user'], DB['password']);

    #var_dump($conn);

    $ret = $conn->query(
        "SHOW DATABASES LIKE '{${DB['database']}}'");
    var_dump($ret);
}