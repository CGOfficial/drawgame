<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 3/25/18
 * Time: 12:20 PM
 */

namespace DrawGame;


class Account
{
    private $account;   //账号
    private $name;
    private $password;   //密码
    private $gender;    //性别
    private $signup_date;   //注册日期
    private $quiz;          //密保问题
    private $answer;        //密保答案
    private $state;

    /**
     * Account constructor.
     * @param $account
     * @param $name
     * @param $password
     * @param $gender
     * @param $signup_date
     * @param $quiz
     * @param $answer
     * @param $lastSeen
     * @param $state
     */
    public function __construct($account, $name, $password, $gender, $signup_date, $quiz, $answer, $lastSeen, $state)
    {
        $this->account = $account;
        $this->name = $name;
        $this->password = $password;
        $this->gender = $gender;
        $this->signup_date = $signup_date;
        $this->quiz = $quiz;
        $this->answer = $answer;
        $this->lastSeen = $lastSeen;
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param mixed $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getSignupDate()
    {
        return $this->signup_date;
    }

    /**
     * @param mixed $signup_date
     */
    public function setSignupDate($signup_date)
    {
        $this->signup_date = $signup_date;
    }

    /**
     * @return mixed
     */
    public function getQuiz()
    {
        return $this->quiz;
    }

    /**
     * @param mixed $quiz
     */
    public function setQuiz($quiz)
    {
        $this->quiz = $quiz;
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param mixed $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    /**
     * @return mixed
     */
    public function getLastSeen()
    {
        return $this->lastSeen;
    }

    /**
     * @param mixed $lastSeen
     */
    public function setLastSeen($lastSeen)
    {
        $this->lastSeen = $lastSeen;
    }

}


