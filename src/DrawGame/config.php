<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 3/27/18
 * Time: 10:40 PM
 */


namespace DrawGame {

    define('DEFAULT_TIMEZONE', 'Asia/Shanghai');
    define('DB_DEFAULT_DATE_FORMAT', 'Y-m-d H:i:s');

    // user verify

    define('AUTH_MAX_LATENCY', 3000);

    //Database

    define('DB', array(
        'host' => 'drawgame_mysql_1',
        'user' => 'root',
        'password' => '.',
        'database' => 'db_drawgame',
        'port' => '3306'));


    // Account Management

    // sign up
    define('ACCOUNT_SIGN_UP_SUCCESS', 0);
    define('ACCOUNT_SIGN_UP_DUPLICATE_ACCOUNT', 1);

    // sign in
    define('ACCOUNT_SIGN_IN_SUCCESS', 0);
    define('ACCOUNT_SIGN_IN_ERR_ACCOUNT_NOT_EXIST', 100);
    define('ACCOUNT_SIGN_IN_ERR_ACCOUNT_PASSWORD_WRONG', 200);



    date_default_timezone_set(DEFAULT_TIMEZONE);


}