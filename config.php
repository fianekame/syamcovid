<?php
$page = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] : '';
define('PATH', 'http://192.168.1.2/covid');
define('SITE_URL', PATH . 'index.php');
define('POSITION_URL', PATH . '?page=' . $page);
define('DB_HOST', '192.168.1.3');
define('DB_USERNAME', 'syamrabu');
define('DB_PASSWORD', 'syamrabu');
define('DB_NAME', 'syam_covid');
define('DB_NAME_2', 'syamrabu');

?>
