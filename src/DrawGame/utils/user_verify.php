<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 3/28/18
 * Time: 5:01 PM
 */


/**
 * @param $headers :Http request header
 */
function user_verify($headers)
{
    if(isset($headers['CGKey'])){
        if($headers['CGKey'] / 1000 - time() < AUTH_MAX_LATENCY){
            header('CGSays: Good boy!');
            header("CGServerTime: ".date('Y-m-d H:i:s', time()));
        }
    }
    else{
        header('CGSays: who are you?');
        header("CGServerTime: ".date('Y-m-d H:i:s', time()));
        die();
    }
}

function check_in($user_input, $real_pwd){
    return $user_input === $real_pwd;
}