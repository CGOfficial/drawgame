<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 3/25/18
 * Time: 12:05 PM
 */
namespace DrawGame;
require_once 'DrawGame/AccountManager.php';
require_once 'DrawGame/beans/Account.php';

require_once './DrawGame/config.php';




const REQ_TYPE = array(
    'login' => 'login',
    'signup' => 'signup',
);

$accounts_online = array();   //在线玩家列表
$accoutManager = new AccountManager();



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "hello word";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["type"] == REQ_TYPE['login']) {
        echo "login";
    } elseif ($_POST["type"] == REQ_TYPE['signup']) {
        echo "signup";
        $account = new Account($_POST['uaccount'], $_POST['upwd'], $_POST['uname'], $_POST['ugender'], date(DB_DEFAULT_DATE_FORMAT, time()), $_POST['uquiz'], $_POST['uanswer'], null, 'offline');
        $retcode = $accoutManager->sign_up($account);
        if($retcode === ACCOUNT_SIGN_UP_DUPLICATE_ACCOUNT){
            echo '账号已存在， 请更换';
        }
    }
}


