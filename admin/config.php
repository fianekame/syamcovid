<?php
$page = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] : '';
define('PATH', 'http://localhost:8888/covid/admin/');
define('SITE_URL', PATH . 'index.php');
define('POSITION_URL', PATH . '?page=' . $page);
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'fianroot');
define('DB_PASSWORD', '');
define('DB_NAME', 'syam_covid');
define('DB_NAME_2', 'syamrabu');

// $page = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] : '';
// define('PATH', 'http://www.myollan.com/adminapp/');
// define('SITE_URL', PATH . 'index.php');
// define('POSITION_URL', PATH . '?page=' . $page);
// define('DB_HOST', 'localhost');
// define('DB_USERNAME', 'myolncom');
// define('DB_PASSWORD', 'myo30625');
// define('DB_NAME', 'myolncom_sekolah');
?>
