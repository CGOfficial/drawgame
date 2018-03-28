<?

namespace DrawGame;
error_reporting(E_ALL);
date_default_timezone_set('Asia/Shanghai');
require_once 'DrawGame/config.php';
require_once 'DrawGame/utils/user_verify.php';


//region date test
//$datetime = new \DateTime();
//$datetime->setTimezone(new \DateTimeZone('Asia/Shanghai'));
//echo $datetime->format('Y-m-d H:i:s')."\n";
//
//
//$date = date('Y-m-d H:i:s', time());
//echo $date;
//endregion


//region inject protection
//require_once './DrawGame/utils/Dbtool.php';
//
//use DrawGame\utils\Dbtool;
//
//$a = new Dbtool();
//$a->connect();
//$a->doWithInjectProtection(/** @lang SQL */
//    'SELECT * FROM tb_accounts WHERE uid=?', 's', ['1']);
//class A{
//    function hello($t, $s){
//        return 'hello'.$t.$s;
//    }
//}
//
//$stmt = new A();
//
//echo call_user_func_array([$stmt, 'hello'], [" world ", "!"]);
//endregion


//region reference
//class A{
//    private $a = 'hellod';
//    function &hello(){
//        return $this->a;
//    }
//}
//
//$a = new A();
//$aa = &$a->hello();
//$b = array($aa);
//var_dump($b);
//endregion


//region db test
//require_once './DrawGame/utils/Dbtool.php';
//use DrawGame\utils\Dbtool;
//$a = new Dbtool();
//$a->connect();
//
//$re = $a->doWithInjectProtection(/** @lang MySQL */
//    'SELECT * FROM tb_accounts');
//endregion


//region    verify
//$headers = apache_request_headers();
//user_verify($headers);
//endregion


//region json
//var_dump(json_decode(/** @lang JSON */
//    '{"a":"b", "b":[1,2,3,"4",{"a": 4}]}'));
//endregion



phpinfo();