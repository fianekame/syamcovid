<?php
/**
 * @Author  : David Naista<davidnaista83@gmail.com>
 * @Date    : 12/29/15 - 7:12 PM
 */

class LoginController extends Controller
{
    public function index()
    {
        $login = isset($_SESSION["login"]) ? $_SESSION["login"] : "";
        $type = isset($_SESSION["type"]) ? $_SESSION["type"] : "";
        if ($login && $type==0) {
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
            $this->model('user');
            $user = $this->user->getWhere(array(
                'email' => $username,
                'password' => md5($password),
                'statususer' => 0
            ));
            if (count($user) > 0) {
                $message    = array(
                    'success'   => true,
                    'message'   => 'Selamat anda berhasil login.'
                );
                $_SESSION["login"] = $user[0];
                $_SESSION["type"] = $user[0]->statususer;
                $_SESSION["miminid"] = $user[0]->iduser;
                echo '<meta http-equiv="refresh" content="1;url=index.php">';
            }
        }
        $view = $this->view('login')->bind('message', $message);
    }

    public function logout()
    {
        unset($_SESSION["type"]);
        unset($_SESSION["login"]);
        unset($_SESSION["kodekasir"]);
        unset($_SESSION['selectedstore']);
        unset($_SESSION['storename']);
        $this->redirect('index.php');
    }
}
