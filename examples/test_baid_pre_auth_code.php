
<?php

use Saas\Storage\SaasAuthorizationManager;

require_once __DIR__ . '/../autoload.php';

$manger = new SaasAuthorizationManager('Baidu');
$client_id = 'rKoKCZPbmPazRkzjOrvgBSDIm7MYtG1G';
$access_token = '42.344dbc648cb0603fb754de4480501ab9.2592000.1580480638.J00jP5pjVlWpRFf6cew3-1QCjRz8qTxf6jSGs2W';
list($ret, $error)  = $manger->pre_auth_code($access_token,$client_id);
var_dump($ret);
var_dump($error);die;