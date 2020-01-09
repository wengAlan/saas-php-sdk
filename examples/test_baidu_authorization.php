
<?php

use Saas\Storage\SaasAuthorizationManager;

require_once __DIR__ . '/../autoload.php';

$manger = new SaasAuthorizationManager('Baidu');
$client_id = 'rKoKCZPbmPazRkzjOrvgBSDIm7MYtG1G';
$pre_auth_code = 'c210YXBwLTEyMzk2MDA4NjMwNmVjMTg4NzZhYjUyMDk2MmNmYTJjMjQyY2E3ZjY5ZQ==';
$redirect_uri  = '';
list($ret, $error)  = $manger->authorization($client_id,$pre_auth_code,$redirect_uri);
var_dump($ret);
var_dump($error);die;