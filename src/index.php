<?

namespace DrawGame;
error_reporting(E_ALL);
date_default_timezone_set('Asia/Shanghai');


//$datetime = new \DateTime();
//$datetime->setTimezone(new \DateTimeZone('Asia/Shanghai'));
//echo $datetime->format('Y-m-d H:i:s')."\n";
//
//
//$date = date('Y-m-d H:i:s', time());
//echo $date;

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

require_once './DrawGame/utils/Dbtool.php';
use DrawGame\utils\Dbtool;
$a = new Dbtool();
$a->connect();

$re = $a->doWithInjectProtection(/** @lang MySQL */
    'SELECT * FROM tb_accounts');

var_dump($re);