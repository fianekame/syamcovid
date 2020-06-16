<?php
/**
 * @Author  : David Naista<davidnaista83@gmail.com>
 * @Date    : 12/29/15 - 1:08 AM
 */

namespace modules\controllers;

use \Controller;

class MainController extends Controller
{
    protected $login;
    public function __construct()
    {
        // $this->login = isset($_SESSION["login"]) ? $_SESSION["login"] : '';
        // $this->type = isset($_SESSION["type"]) ? $_SESSION["type"] : '';
        // if ($this->type!="0") {
        //     $this->redirect(SITE_URL . "?page=main-login");
        // }
        // if (!$this->login && $this->type!="0") {
        //     $this->redirect(SITE_URL . "?page=main-login");
        // }
    }

    protected function template($viewName, $data = array())
    {
        $view = $this->view('template');
        $view->bind('viewName', $viewName);
        $view->bind('data', array_merge($data, array('login' => $this->login)));
    }
}
