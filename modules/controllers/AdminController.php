<?php
use \modules\controllers\MainController;

class AdminController extends MainController {

    public function index() {
        $this->model('user');
        $data = $this->user->get();
        $this->template('user', array('user' => $data));
    }

    public function setting(){
      $this->model('user');
      $error      = array();
      $success    = null;
      $id =  $_SESSION["login"]->uniqid;
      $data = $this->user->getWhere(array(
          'uniqid' => $id
      ));
      if(count($data) == 0) $this->redirect(PATH);
      if($_SERVER["REQUEST_METHOD"] == "POST"){
          $psd       = isset($_POST["psdlama"])  ? $_POST["psdlama"] : "";
          $psdbaru1  = isset($_POST["psdbaru1"]) ? $_POST["psdbaru1"] : "";
          $psdbaru2  = isset($_POST["psdbaru2"]) ? $_POST["psdbaru2"] : "";
          if(empty($psd) || $psd == "") {
              array_push($error, "Password Lama wajib di isi.");
          }
          if(empty($psdbaru1) || $psdbaru1 == "") {
              array_push($error, "Password Baru wajib di isi.");
          }
          if(empty($psdbaru2) || $psdbaru2 == "") {
              array_push($error, "Pasword Baru Ulang wajib di isi.");
          }
          if (md5($psd) != $data[0]->password) {
            array_push($error, "Pasword lama tidak sesuai dengan sebelumnya");
          }else{
            if($psdbaru1 != $psdbaru2) {
                array_push($error, "Pasword Baru Tidak Cocok.");
            }
          }
          $updateArrayData = array(
              'password' => md5($psdbaru1)
          );

          if(count($error) == 0) {
              $update = $this->user->update($updateArrayData, array('uniqid' => $id));
              if($update) {
                  $success = "Password berhasil di rubah.";
              }
          }
      }
      $this->template('frmsetting', array('user' => $data[0],'error' => $error, 'success' => $success, 'title' => 'Kelola Password'));
    }

    public function change() {
        $this->model('user');
        $alldata = $this->user->get();
        $error      = array();
        $success    = null;
        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        $todo = isset($_GET["todo"]) ? $_GET["todo"] : "";
        $data = $this->user->getWhere(array(
            'username' => $id
        ));
        if(count($data) == 0) $this->redirect(PATH . '?page=user');
        if ($todo==0) {
          $updateArrayData = array(
              'status' => 'Non-Aktif'
          );
        }else{
          $updateArrayData = array(
              'status' => 'Aktif'
          );
        }
        if(count($error) == 0) {
            $update = $this->user->update($updateArrayData, array('username' => $id));
            if($update) {
              if ($todo==0) {
                $success = "User Telah Di-Nonaktifkan";
              }else{
                $success = "User Telah Di-Aktifkan";
              }
            }
        }
        $this->template('user', array('user' => $alldata,'success' => $success));
    }
}
?>
