<?php

use \modules\controllers\MainController;

class KelolaController extends MainController {

    public function index() {
      $this->model('pasien');
      $slug = $_SESSION["slug"];
      $datapasien = $this->pasien->getWhere(array(
          'slug' => $slug
      ));

      $this->template('kelola', array('datapasien' => $datapasien));
    }

    public function delete() {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $this->model('pasien');
        $delete = $this->pasien->delete(array('idpasien' => $id));
        if($delete) {
            $this->back();
        }
    }

    public function transfer()
    {
        $this->model('pasien');
        $error      = array();
        $success    = null;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

          $id2     = isset($_POST["id2"])? $_POST["id2"]   : "";
          $nrm2   = isset($_POST["nrm2"])     ? $_POST["nrm2"]     : "";
          $nama2     = isset($_POST["nama2"])      ? $_POST["nama2"]    : "";
          $ruang2     = isset($_POST["ruangan2"])? $_POST["ruangan2"]   : "";

          $dataUpdate = array(
            'ruang' => $ruang2,
            'slug' => strtolower(str_replace(' ', '', $ruang2))
          );

          $update = $this->pasien->update($dataUpdate, array('idpasien' => $id2));
          if ($update) {
              $success = "Data User Berhasil Dirubah.";
              $this->back();
          }

        }
    }

    public function addchange() {
        $ids = $_SESSION['selectedstore'];
        echo $_SESSION["slug"];
        echo $_SESSION["ruang"];
        $this->model('pasien');
        $error      = array();
        $success    = null;
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = isset($_POST["id"]) ? $_POST["id"] : "";
            $nrm  = isset($_POST["nrm"]) ? $_POST["nrm"] : "";
            $mrs  = isset($_POST["mrs"]) ? $_POST["mrs"] : "";
            $krs  = isset($_POST["krs"]) ? $_POST["krs"] : "aaa";
            $nama  = isset($_POST["nama"]) ? $_POST["nama"] : "";
            $nik  = isset($_POST["nik"]) ? $_POST["nik"] : "";
            $ttl  = isset($_POST["ttl"]) ? $_POST["ttl"] : "";
            $age  = "";
            $jk  = isset($_POST["jk"]) ? $_POST["jk"] : "";
            $bangsa  = isset($_POST["bangsa"]) ? $_POST["bangsa"] : "";
            $kab  = isset($_POST["kab"]) ? $_POST["kab"] : "";
            $kec  = isset($_POST["kec"]) ? $_POST["kec"] : "";
            $ruangan  = $_SESSION["ruang"];
            $slug = strtolower(str_replace(' ', '', $ruangan));
            $fototherax  = isset($_POST["fototherax"]) ? $_POST["fototherax"] : "";
            $ketgejala  = isset($_POST["ketgejala"]) ? $_POST["ketgejala"] : "";
            $statusawal  = isset($_POST["statusawal"]) ? $_POST["statusawal"] : "";
            $statusakhir  = isset($_POST["statusakhir"]) ? $_POST["statusakhir"] : "";
            $rapid  = isset($_POST["rapid"]) ? $_POST["rapid"] : "";
            $hasilrapid  = isset($_POST["hasilrapid"]) ? $_POST["hasilrapid"] : "";
            $swab  = isset($_POST["swab"]) ? $_POST["swab"] : "";
            $serum  = isset($_POST["serum"]) ? $_POST["serum"] : "";
            $sputum  = isset($_POST["sputum"]) ? $_POST["sputum"] : "";
            $hasilswab  = isset($_POST["hasilswab"]) ? $_POST["hasilswab"] : "";
            $hasillain  = isset($_POST["hasillain"]) ? $_POST["hasillain"] : "";

            if ($ttl) {
              $lahir = new DateTime($ttl);
              $today = new DateTime();
              $umur  = $today->diff($lahir);
              $age = $umur->y." Thn";
              if ($umur->y == 0) {
                $age = $umur->m." Bln";
                if ($umur->m==0) {
                  $age = $umur->d." Hr";
                }
              }
            }

            if ($hasilswab == "Positif" || $hasilswab == "Negatif") {
              $hasillain = $hasilswab;
            }

            if ($rapid == "0") {
              $hasilrapid = "-";
            }


            if (empty($id)) {
              if(count($error) == 0) {
                  if ($krs) {
                    $insert = $this->pasien->insert(
                        array(
                          'nrm' => $nrm,
                          'nama' => $nama,
                          'mrs' => $mrs,
                          'krs' => $krs,
                          'nik' => $nik,
                          'ttl' => $ttl,
                          'umur' => $age,
                          'jk' => $jk,
                          'bangsa' => $bangsa,
                          'kab' => $kab,
                          'kec' => $kec,
                          'ruang' => $ruangan,
                          'slug' => $slug,
                          'fototherax' => $fototherax,
                          'ketgejala' => $ketgejala,
                          'statusawal' => $statusawal,
                          'statusakhir' => $statusakhir,
                          'rapidtes' => $rapid,
                          'hasilrapid' => $hasilrapid,
                          'swab' => $swab,
                          'serum' => $serum,
                          'sputum' => $sputum,
                          'hasilswab' => $hasilswab,
                          'kethasilswab' => $hasillain
                        )
                    );
                  }else {
                    $insert = $this->pasien->insert(
                        array(
                          'nrm' => $nrm,
                          'nama' => $nama,
                          'mrs' => $mrs,
                          'nik' => $nik,
                          'umur' => $age,
                          'ttl' => $ttl,
                          'jk' => $jk,
                          'bangsa' => $bangsa,
                          'kab' => $kab,
                          'kec' => $kec,
                          'ruang' => $ruangan,
                          'slug' => $slug,
                          'fototherax' => $fototherax,
                          'ketgejala' => $ketgejala,
                          'statusawal' => $statusawal,
                          'statusakhir' => $statusakhir,
                          'rapidtes' => $rapid,
                          'hasilrapid' => $hasilrapid,
                          'swab' => $swab,
                          'serum' => $serum,
                          'sputum' => $sputum,
                          'hasilswab' => $hasilswab,
                          'kethasilswab' => $hasillain
                        )
                    );
                  }
                  if($insert) {
                      $success = "Data Berhasil di ditambahkan.";
                  }
              }
            } else {

              $updateArrayData = array(
                'nrm' => $nrm,
                'nama' => $nama,
                'mrs' => $mrs,
                'umur' => $age,
                'ruang' => $ruangan,
                'slug' => $slug,
                'fototherax' => $fototherax,
                'ketgejala' => $ketgejala,
                'statusawal' => $statusawal,
                'statusakhir' => $statusakhir,
                'rapidtes' => $rapid,
                'hasilrapid' => $hasilrapid,
                'swab' => $swab,
                'serum' => $serum,
                'sputum' => $sputum,
                'hasilswab' => $hasilswab,
                'kethasilswab' => $hasillain
              );
              if ($krs) {
                $updateArrayData['krs'] = $krs;
              }
              if(count($error) == 0) {
                  $update = $this->pasien->update($updateArrayData, array('idpasien' => $id));
                  if($update) {
                      $success = "Data berhasil di rubah.";
                  }
              }
            }
        }
        $this->back();
    }

    public function update()
    {
        $this->model('pasien');
        $error      = array();
        $success    = null;
        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        $data = $this->pasien->getWhere(array(
          'idpasien' => $id
        ));
        if (count($data) == 0) {
            $this->redirect(PATH . '?page=main-kelola');
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

          $id1     = isset($_POST["id1"])? $_POST["id1"]   : "";
          $id2     = isset($_POST["id2"])? $_POST["id2"]   : "";
          $id3  = isset($_POST["id3"])    ? $_POST["id3"]  : "";
          $nrm   = isset($_POST["nrm"])     ? $_POST["nrm"]     : "";
          $nama     = isset($_POST["nama"])      ? $_POST["nama"]    : "";
          $nik     = isset($_POST["nik"])? $_POST["nik"]   : "";
          $ttl     = isset($_POST["ttl"])? $_POST["ttl"]   : "";
          $age  = "";
          $jk  = isset($_POST["jk"])    ? $_POST["jk"]  : "";
          $umur   = isset($_POST["umur"])     ? $_POST["umur"]     : "";
          $bangsa     = isset($_POST["bangsa"])      ? $_POST["bangsa"]    : "";
          $kab     = isset($_POST["kab"])? $_POST["kab"]   : "";
          $kec     = isset($_POST["kec"])? $_POST["kec"]   : "";
          $mrs  = isset($_POST["mrs"])    ? $_POST["mrs"]  : "";
          $krs   = isset($_POST["krs"])     ? $_POST["krs"]     : "";
          $statusawal     = isset($_POST["statusawal"])      ? $_POST["statusawal"]    : "";
          $statusakhir     = isset($_POST["statusakhir"])? $_POST["statusakhir"]   : "";
          $ruangan     = isset($_POST["ruangan"])? $_POST["ruangan"]   : "";
          $slug = strtolower(str_replace(' ', '', $ruangan));
          $fototherax  = isset($_POST["fototherax"])    ? $_POST["fototherax"]  : "";
          $ketgejala   = isset($_POST["ketgejala"])     ? $_POST["ketgejala"]     : "";
          $rapid     = isset($_POST["rapid"])      ? $_POST["rapid"]    : "";
          $hasilrapid     = isset($_POST["hasilrapid"])? $_POST["hasilrapid"]   : "";
          $swab     = isset($_POST["swab"])? $_POST["swab"]   : "";
          $serum  = isset($_POST["serum"])    ? $_POST["serum"]  : "";
          $sputum   = isset($_POST["sputum"])     ? $_POST["sputum"]     : "";
          $hasilswab     = isset($_POST["hasilswab"])      ? $_POST["hasilswab"]    : "";
          $hasillain     = isset($_POST["hasillain"])? $_POST["hasillain"]   : "";
          $statusrawat     = isset($_POST["statusrawat"])? $_POST["statusrawat"]   : "";
          $diagawal  = isset($_POST["diagawal"])    ? $_POST["diagawal"]  : "";
          $diagakhir   = isset($_POST["diagakhir"])     ? $_POST["diagakhir"]     : "";
          $pemakaman     = isset($_POST["pemakaman"])      ? $_POST["pemakaman"]    : "";


          if ($ttl) {
            $lahir = new DateTime($ttl);
            $today = new DateTime();
            $umur  = $today->diff($lahir);
            $age = $umur->y." Thn";
            if ($umur->y == 0) {
              $age = $umur->m." Bln";
              if ($umur->m==0) {
                $age = $umur->d." Hr";
              }
            }
          }

          if ($id1) {
            $dataUpdate = array(
              'nrm' => $nrm,
              'nama' => $nama,
              'nik' => $nik,
              'umur' => $age,
              'ttl' => $ttl,
              'jk' => $jk,
              'bangsa' => $bangsa,
              'kab' => $kab,
              'kec' => $kec
            );
          }
          if ($id2) {
            $dataUpdate = array(
              'mrs' => $mrs,
              'krs' => $krs,
              'ruang' => $ruangan,
              'slug' => $slug,
              'fototherax' => $fototherax,
              'ketgejala' => $ketgejala,
              'statusawal' => $statusawal,
              'statusakhir' => $statusakhir,
              'rapidtes' => $rapid,
              'hasilrapid' => $hasilrapid
            );
          }
          if ($id3) {
            $dataUpdate = array(
              'swab' => $swab,
              'serum' => $serum,
              'sputum' => $sputum,
              'hasilswab' => $hasilswab,
              'kethasilswab' => $hasillain,
              'statusrawat' => $statusrawat,
              'diagawal' => $diagawal,
              'diagakhir' => $diagakhir,
              'pemakaman' => $pemakaman
            );
          }
          $update = $this->pasien->update($dataUpdate, array('idpasien' => $id));
          if ($update) {
              $success = "Data User Berhasil Dirubah.";
              // $this->back();
          }

        }
        $this->template('formkelola', array('user' => $data[0],'error' => $error, 'success' => $success, 'title' => 'Update User'));
    }
}
?>
