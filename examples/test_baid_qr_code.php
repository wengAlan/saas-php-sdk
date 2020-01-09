
<?php

use Saas\Storage\SaasAppletsBaseManager;

require_once __DIR__ . '/../autoload.php';

$manger = new SaasAppletsBaseManager('Baidu');
$access_token = "45.ed1d79800b2c57d85f1ac8f057203cec.3600.1578382277.BgQCtHqnRCYFjb2Psp8Mw9SLq9xK-1QCjRz8qTxf6jSGs2W";
// $access_token = "4SLq9xK-1QCjRz8qTxf6jSGs2W";
$page_pk = 545752;
$tets = $manger->get_applet_qrcode($access_token,$page_pk);
var_dump($tets );die;
var_dump($manger);die;
