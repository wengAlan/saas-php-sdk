
<?php

use Saas\Storage\SaasAppletsBaseManager;

require_once __DIR__ . '/../autoload.php';

$manger = new SaasAppletsBaseManager('Baidu');
$access_token = '42.a6d8d4ec73eaf36499a704ea179847c8.2592000.1581042948.LX1jqTqCqYdHjcoB0SCo-1QCjRz8qTxf6jSGs2W';

list($ret, $error)  = $manger->modify_platform_webview_domain($access_token,'get');
var_dump($ret);
var_dump($error);die;