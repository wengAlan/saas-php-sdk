
<?php

use Saas\Storage\SaasAppletsBaseManager;

require_once __DIR__ . '/../autoload.php';

$manger = new SaasAppletsBaseManager('Baidu');
$access_token = '45.99aac607fcb207d929f5fd771ba2bb3b.3600.1578552881.Chyo3T-PMzvenxZOPP7pEQB0ph87-1QCjRz8qTxf6jSGs2W';
$domina_list = array(
    'request_domain' => ['https://saas-mp.myzaker.com','https://eaas-mp.myzaker.com']
);
list($ret, $error)  = $manger->modify_services_domain($access_token,'get',$domina_list);
var_dump($ret);
var_dump($error);die;