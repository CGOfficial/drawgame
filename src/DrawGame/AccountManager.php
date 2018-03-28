<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 3/27/18
 * Time: 1:35 AM
 */

namespace DrawGame;
require_once realpath(__DIR__ . "/utils/Dbtool.php");
require_once realpath(__DIR__.'/config.php');
use DrawGame\utils\Dbtool;



class AccountManager
{
    private $dbtool;


    public function __construct()
    {
        $this->dbtool = new Dbtool();
        $this->dbtool->connect();
    }
    public function __destruct()
    {
        if ($this->dbtool !== null) {
            $this->dbtool = null;
        }
    }

    /**
     * @param string
     * @param string
     * @return int define in config.php
     */
    function login($account, $pwd)
    {
        if (isset($account) and $account !== null) {

            $dbtool = $this->dbtool;

            $result = $dbtool->doWithInjectProtection(/** @lang MySQL */
                "SELECT * FROM tb_accounts where uaccount=?", 's', [&$account]);

            return $result;
        }

    }


    /**
     * @param $account Account
     * @return int define in config.php
     */
    function sign_up($account)
    {
        if (isset($account) and $account !== null){
            $params = [$account->getAccount(), $account->getPassword(), $account->getName(), $account->getGender(), $account->getQuiz(), $account->getAnswer(), $account->getSignupDate(), $account->getState()];
            $dbtool = $this->dbtool;
            $result = $dbtool->doWithInjectProtection(/** @lang SQL */
                "INSERT INTO tb_accounts (uaccount, upwd, uname, ugender, uquiz, uanswer, signupdate, state)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)", 'ssssssss', $params);

            if($result === 1062){
                return ACCOUNT_SIGN_UP_DUPLICATE_ACCOUNT;
            } else {
                return ACCOUNT_SIGN_UP_SUCCESS;
            }
        }
    }
}