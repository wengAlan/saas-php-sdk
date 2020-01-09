
<?php

use Saas\Storage\SaasTicektManager;

require_once __DIR__ . '/../autoload.php';

$manger = new SaasTicektManager('Baidu');
$key  = 'h0Xz5PRBJhrDbQcAbXRn38xEbeqRvt1Q8MHpjQMS7lf';
$code = 'TFJlWqPd+sFa1fgfawfnssw8+qv75Z9y7Mep\/0ejmat0fFWdp4eeVHvv51YKhFRi5RXrSbBIOdhBs+cHdOS7EsNDp6DsW34oEh7La+zYIHa2CyMvVdbktjv86Du6Ls9UC18Sjjw\/Tyv+jhf3DLz3n+ZOjTMf3\/CQADP7FNgExL+oe31sRCeS4SkZKdsm1BA4M5SaD\/wFM+fNp7OEYhw17g==';
$manger->decrypt($key,$code);
