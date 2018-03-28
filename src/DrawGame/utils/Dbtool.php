<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 3/25/18
 * Time: 1:03 PM
 */


namespace DrawGame\utils;

require_once realpath(__DIR__ . "/../config.php");


class Dbtool
{

    /**
     * @var \mysqli
     */
    private $mysql = null;


    public function connect(): bool
    {
        $this->mysql = new \mysqli(DB['host'], DB['user'], DB['password']);

        $result = $this->mysql->query(/** @lang SQL */
            "SHOW DATABASES LIKE '" . DB['database'] . "'");

        if ($result->num_rows > 0) {
//        echo 'database does exist';
            $this->mysql->select_db(DB['database']);
        } else {
//        echo 'database doesn\'t exist';
            $result = $this->mysql->query(/** @lang SQL */
                "CREATE DATABASE " . DB['database']);
            if (!$result) throw new \Exception('创建数据库失败！');
            return false;
        }


        $this->init();
        return true;
    }

    public function doWithInjectProtection($sql, $temp=null, $params=null)
    {
        $mysql = $this->mysql;
        $result = array();

        if($stmt = $mysql->prepare($sql)){
//          $stmt->bind_param($temp, $params);   not gonna work
//          $tpara = $params;
//          array_unshift($tpara, $temp);
//          call_user_func_array([$stmt, 'bind_param'], $tpara);
            if($temp!==null and $params !== null){
                $stmt->bind_param($temp, ...$params);   //array spread mark ...
            }

            $stmt->execute();
            $meta = $stmt->result_metadata();
            if(!$meta){
                return $stmt->errno;
            }

            while (($field = $meta->fetch_field()) !== false) {
                $resultTemp[] = &$row[$field->name];
            }

            $stmt->bind_result(...$resultTemp);

            while ($stmt->fetch()){
                array_push($result, $row);
            }

            $stmt->close();
            return $result;
        }
        return false;
    }

//    public function query($sql)
//    {
//        $mysql = $this->mysql;
//        $st = $mysql->prepare($sql);
//        $st->execute();
//        $meta = $st->result_metadata();
//        while (($field = $meta->fetch_field()) !== false) {
//            $params[] = &$row[$field->name];
//        }
//        $st->bind_result(...$params);
//
//
//        $result = $st->get_result();
//        var_dump($result);
//    }

    /**
     * 初始化所有表
     */
    private function init()
    {
        $mysql = $this->mysql;

        $mysql->real_query(/** @lang SQL */
            "
            CREATE TABLE IF NOT EXISTS tb_accounts (
              uid BIGINT AUTO_INCREMENT PRIMARY KEY ,
              uaccount VARCHAR(30) unique,
              upwd VARCHAR(64),
              uname VARCHAR(128),
              ugender VARCHAR(8),
              uquiz VARCHAR(128),
              uanswer VARCHAR(128),
              signupdate DATETIME,
              state VARCHAR(16),
              lastseen DATETIME
            ) ");


    }


    public function __destruct()
    {
        if ($this->mysql !== null)
            $this->mysql->close();
    }

}