<?php

class LoginController extends Controller
{
    public function index()
    {
        $login = isset($_SESSION["login"]) ? $_SESSION["login"] : "";
        if ($login) {
            $this->redirect("index.php");
        }
        $message = array();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $message = array(
                'success'   => false,
                'message'   => 'Maaf Username/Password Salah.'
            );
            $username = isset($_POST["username"]) ? $_POST["username"] : "";
            $password = isset($_POST["password"]) ? $_POST["password"] : "";
            if ($username=="admin" && $password="admin") {
                $message    = array(
                    'success'   => true,
                    'message'   => 'Selamat anda berhasil login.'
                );
                $_SESSION["login"] = "admin";
                $_SESSION["tipe"] = "0";
                echo '<meta http-equiv="refresh" content="1;url=index.php">';
            }
        }
        $view = $this->view('login')->bind('message', $message);
    }

    public function logout()
    {
      unset($_SESSION["tipe"]);
        unset($_SESSION["login"]);
        $this->redirect('index.php');
    }
}
