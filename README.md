
## 安装

### 第一种方法
* 直接下载安装，SDK 没有依赖其他第三方库，然后直接引用autoload.php文件。

```
    require_once __DIR__ . '/../autoload.php';
    use Saas\Storage\SaasAuthorizationManager;
    $manger = new SaasAuthorizationManager('Baidu');
    $client_id = '';
    $access_token = '';
    list($ret, $error)  = $manger->pre_auth_code($access_token,$client_id);
    var_dump($ret);
    var_dump($error);die;

```

### 第二种方法
* 直接下载安装，SDK 没有依赖其他第三方库，但需要参照 composer的autoloader，增加一个自己的autoloader程序。

```
    use Saas\Storage\SaasAuthorizationManager;
    $manger = new SaasAuthorizationManager('Baidu');
    $client_id = '';
    $access_token = '';
    list($ret, $error)  = $manger->pre_auth_code($access_token,$client_id);
    var_dump($ret);
    var_dump($error);die;

```

## 运行环境

| Saas SDK版本 | PHP 版本 |
|:--------------------:|:---------------------------:|
|          1.x         |  cURL extension,   5.3 - 5.6,7.0 |


## 使用方法

详情见[Wiki文档](https://github.com/wengAlan/saas-php-sdk/wiki)
## 代码许可
The MIT License (MIT).详情见 [License文件](https://github.com/wengAlan/saas-php-sdk/blob/master/LICENSE).

