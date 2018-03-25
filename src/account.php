<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 3/25/18
 * Time: 12:05 PM
 */

namespace DrawGame{

    $accounts_online = array();   //在线玩家列表


    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        echo "hello word";
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["method"] == "login"){
            echo "login";
        }
        elseif ($_POST["method"] == "signup"){
            echo "signup";
        }
    }
}

