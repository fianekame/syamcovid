<?php
$page = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] : '';
define('PATH', 'http://localhost:8888/covid/');
define('SITE_URL', PATH . 'index.php');
define('POSITION_URL', PATH . '?page=' . $page);
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'fianroot');
define('DB_PASSWORD', '');
define('DB_NAME', 'syam_covid');

?>
