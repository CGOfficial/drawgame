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

require_once 'DrawGame/config.php';
require_once 'DrawGame/utils/user_verify.php';




const REQ_TYPE = array(
    'login' => 'login',
    'signup' => 'signup',
);

$accounts_online = array();   //在线玩家列表
$accoutManager = new AccountManager();


$headers = apache_request_headers();
user_verify($headers);


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "hello word";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["type"] == REQ_TYPE['login']) {
        echo "login";
        $result = $accoutManager->login($_POST['uaccount'], $_POST['upwd']);
        if (count($result) === 0){
            echo json_encode(['err'=>ACCOUNT_SIGN_IN_ERR_ACCOUNT_NOT_EXIST, 'errmsg' => 'account doesn\'t exist!', 'data' => []]);
        }
        else {
            $result = $result[0];
            if(check_in($_POST['upwd'], $result['upwd'])){
                echo json_encode(['err'=>ACCOUNT_SIGN_IN_SUCCESS, 'data'=>$result]);
            }
            else{
                echo json_encode(['err'=>ACCOUNT_SIGN_IN_ERR_ACCOUNT_PASSWORD_WRONG, 'errmsg' => 'wrong password!', 'data' => []]);
            }
        }
    } elseif ($_POST["type"] == REQ_TYPE['signup']) {
        echo "signup";
        $account = new Account($_POST['uaccount'], $_POST['uname'], $_POST['upwd'], $_POST['ugender'], date(DB_DEFAULT_DATE_FORMAT, time()), $_POST['uquiz'], $_POST['uanswer'], null, 'offline');
        $retcode = $accoutManager->sign_up($account);
        if($retcode === ACCOUNT_SIGN_UP_DUPLICATE_ACCOUNT){
            echo '账号已存在， 请更换';
        } elseif ($retcode === ACCOUNT_SIGN_UP_SUCCESS) {
            echo '账号创建成功！';
        }
    }
}


