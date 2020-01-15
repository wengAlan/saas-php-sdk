
<?php

use Saas\Storage\SaasAppletsBaseManager;

require_once __DIR__ . '/../autoload.php';

$manger = new SaasAppletsBaseManager('Baidu');
$access_token = '45.7c661b2fc5071fd9581db671f812a4c9.3600.1579081980.HWL4D55sdHNzo1TI1JUL56y0_oxh-1QCjRz8qTxf6jSGs2W';
$version ='3.0.39';
list($ret, $error)  = $manger->set_support_version($access_token,$version);
var_dump($ret);
var_dump($error);die;