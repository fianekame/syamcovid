<?php

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
              'username' => $username,
              'password' => md5($password)
          ));
          if (count($user) > 0) {
              $message    = array(
                  'success'   => true,
                  'message'   => 'Selamat anda berhasil login.'
              );
              $_SESSION["login"] = $user[0];
              $_SESSION["tipe"] = "1";
              $_SESSION["slug"] = $user[0]->slug;
              $_SESSION["ruang"] = $user[0]->ruangan;
              echo '<meta http-equiv="refresh" content="1;url=index.php">';
          }
      }
      $view = $this->view('login')->bind('message', $message);
  }

  public function logout()
  {
      unset($_SESSION["login"]);
      unset($_SESSION["slug"]);
      unset($_SESSION["ruang"]);
      unset($_SESSION["tipe"]);
      $this->redirect('index.php');
  }
}
