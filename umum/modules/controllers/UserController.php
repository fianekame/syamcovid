<?php
use \modules\controllers\MainController;

class UserController extends MainController {

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

    public function resetPassword() {
        $password = isset($_GET["email"]) ? $_GET["email"] : 0;
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $this->model('user');
        $update = $this->user->update(array('password' => md5($password)), array('iduser' => $id));
        if($update) {
          $this->back();
        }
    }
    public function delete()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $this->model('user');
        $delete = $this->user->delete(array('iduser' => $id));
        unlink('../assets/avatar/' . $_GET["img"]);
        if ($delete) {
            $this->back();
        }
    }

    public function update()
    {
        $this->model('user');
        $error      = array();
        $success    = null;
        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        $data = $this->user->getWhere(array(
          'iduser' => $id
      ));
        if (count($data) == 0) {
            $this->redirect(PATH . '?page=store');
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $nadep     = isset($_POST["nadep"])? $_POST["nadep"]   : "";
          $nabel     = isset($_POST["nabel"])? $_POST["nabel"]   : "";
          $telpon  = isset($_POST["telpon"])    ? $_POST["telpon"]  : "";
          $jabatan   = isset($_POST["jabatan"])     ? $_POST["jabatan"]     : "";
          $foto     = isset($_FILES["foto"])      ? $_FILES["foto"]    : "";
          if (empty($nadep) || $nadep == "") {
              array_push($error, "Nama Depan harus di isi.");
          }
          if (empty($nabel) || $nabel == "") {
              array_push($error, "Nama Belakang harus di isi.");
          }
          if (empty($telpon) || $telpon == "") {
              array_push($error, "Telpon harus diisi.");
          }
          if (empty($jabatan) || $jabatan == "") {
              array_push($error, "Jabatan harus di pilih.");
          }
          if(!empty($foto["name"]) && $foto["type"] != 'image/jpg'  && $foto["type"] != 'image/bmp' && $foto["type"] != 'image/jpeg' && $foto["type"] != 'image/png') {
              array_push($error, "Gambar hanya boleh .JPG/.PNG");
          }
            if (count($error) == 0) {
            $imageName = $foto["name"];
            $dataUpdate = array(
              'idstore'        => $_SESSION['selectedstore'],
              'nadep '        => $nadep,
              'nabel'       => $nabel,
              'phone'       => $telpon,
              'jabatan'       => $jabatan,
              'email'      => strtolower($nadep)."@kopikelud.com",
              'password'      => md5(strtolower($nadep)."@kopikelud.com")
            );
                if ($foto["name"]) {
                    $imageName = date("h_i_s_Y_m_d_") . str_replace(" ", "_", $nadep) . '.jpg';
                    unlink('../assets/avatar/' . $data[0]->foto);
                    move_uploaded_file($foto["tmp_name"], '../assets/avatar/' . $imageName);
                    $dataUpdate = array(
                      'idstore'        => $_SESSION['selectedstore'],
                      'nadep '        => $nadep,
                      'nabel'       => $nabel,
                      'phone'       => $telpon,
                      'jabatan'       => $jabatan,
                      'email'      => strtolower($nadep)."@kopikelud.com",
                      'password'      => md5(strtolower($nadep)."@kopikelud.com"),
                      'foto' => $imageName
                );
                }
                $update = $this->user->update($dataUpdate, array('iduser' => $id));
                if ($update) {
                    $success = "Data User Berhasil Dirubah.";
                }
            }
        }
        $this->template('frmadduser', array('user' => $data[0],'error' => $error, 'success' => $success, 'title' => 'Update User'));
    }

    public function insert()
    {
        $this->model('user');
        $error      = array();
        $success    = null;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nadep     = isset($_POST["nadep"])? $_POST["nadep"]   : "";
            $nabel     = isset($_POST["nabel"])? $_POST["nabel"]   : "";
            $telpon  = isset($_POST["telpon"])    ? $_POST["telpon"]  : "";
            $jabatan   = isset($_POST["jabatan"])     ? $_POST["jabatan"]     : "";
            $foto     = isset($_FILES["foto"])      ? $_FILES["foto"]    : "";
            if (empty($nadep) || $nadep == "") {
                array_push($error, "Nama Depan harus di isi.");
            }
            if (empty($nabel) || $nabel == "") {
                array_push($error, "Nama Belakang harus di isi.");
            }
            if (empty($telpon) || $telpon == "") {
                array_push($error, "Telpon harus diisi.");
            }
            if (empty($jabatan) || $jabatan == "") {
                array_push($error, "Jabatan harus di pilih.");
            }
            if (!empty($foto["name"]) && $foto["type"] != 'image/jpg'  && $foto["type"] != 'image/bmp' && $foto["type"] != 'image/jpeg' && $foto["type"] != 'image/png') {
                array_push($error, "Gambar hanya boleh .JPG/.PNG");
            }
            if (count($error) == 0) {
                $imageName = $foto["name"];
                if ($foto["name"]) {
                    $imageName = date("h_i_s_Y_m_d_") . str_replace(" ", "_", $nadep) . '.jpg';
                    move_uploaded_file($foto["tmp_name"], '../assets/avatar/' . $imageName);
                }
                $insert = $this->user->insert(
                  array(
                      'idstore'        => $_SESSION['selectedstore'],
                      'nadep '        => $nadep,
                      'nabel'       => $nabel,
                      'phone'       => $telpon,
                      'jabatan'       => $jabatan,
                      'email'      => strtolower($nadep)."@kopikelud.com",
                      'password'      => md5(strtolower($nadep)."@kopikelud.com"),
                      'foto' => $imageName
                  )
              );
                if ($insert) {
                    $success = "User Berhasil di tambahkan.";
                } else {
                    array_push($error, "Gagal Menyimpan Ke Database. Nis Mungkin Sudah Terdaftar");
                }
            }
        }
        $this->template('frmadduser', array('error' => $error, 'success' => $success, 'title' => 'New User'));
    }


    public function change() {
        $this->model('user');
        $error      = array();
        $success    = null;
        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        $todo = isset($_GET["todo"]) ? $_GET["todo"] : "";
        $data = $this->user->getWhere(array(
            'iduser' => $id
        ));
        if(count($data) == 0) $this->redirect(PATH . '?page=store');
        if ($todo==0) {
          $updateArrayData = array(
              'aktif' => '0'
          );
        }else{
          $updateArrayData = array(
              'aktif' => '1'
          );
        }
        if(count($error) == 0) {
            $update = $this->user->update($updateArrayData, array('iduser' => $id));
            if($update) {
              if ($todo==0) {
                $success = "User Telah Di-Nonaktifkan";
              }else{
                $success = "User Telah Di-Aktifkan";
              }
            }
        }
        $this->back();
        // $this->template('user', array('user' => $alldata,'success' => $success));
    }
}
?>
