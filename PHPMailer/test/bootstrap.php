<<<<<<< HEAD
<?php
require_once 'vendor/autoload.php';
spl_autoload_register(function ($class) {
    require_once strtr($class, '\\_', '//').'.php';
});
=======
<?php
require_once 'vendor/autoload.php';
spl_autoload_register(function ($class) {
    require_once strtr($class, '\\_', '//').'.php';
});
>>>>>>> df1a49aed8713a35489283919813bf63cdebe931
