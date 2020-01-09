
<?php

use Saas\Storage\SaasAuthorizationManager;

require_once __DIR__ . '/../autoload.php';

$manger = new SaasAuthorizationManager('Baidu');
$client_id = 'rKoKCZPbmPazRkzjOrvgBSDIm7MYtG1G';
$ticket = 'af1e5afed6dabeadeb6eb6788599ef0b';
list($ret, $error)  = $manger->token($ticket,$client_id);
