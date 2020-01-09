
<?php

use Saas\Storage\SaasAuthorizationManager;

require_once __DIR__ . '/../autoload.php';

$manger = new SaasAuthorizationManager('Baidu');
$token = 'rKoKCZPbmPazRkzjOrvgBSDIm7MYtG1G';
$authorization_code = '';
$app_to_tp_authorization_code = 'app_to_tp_authorization_code';
list($ret, $error)  = $manger->applets_access_token($token,$authorization_code,$app_to_tp_authorization_code);
var_dump($ret);
var_dump($error);die;