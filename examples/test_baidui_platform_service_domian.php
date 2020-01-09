
<?php

use Saas\Storage\SaasAppletsBaseManager;

require_once __DIR__ . '/../autoload.php';

$manger = new SaasAppletsBaseManager('Baidu');
$access_token = '42.3c4cd56b1e9cec5c92ef9d0f3ec9c359.2592000.1581055811.3VH6jSOc-4sB7QP27wy--0qQzshSrQnejfyejc3';

list($ret, $error)  = $manger->modify_platform_services_domain($access_token,'get');
var_dump($ret);
var_dump($error);die;