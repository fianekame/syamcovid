<?php

use \modules\controllers\MainController;

class CetaklaporanController extends MainController {

    public function index() {
      $this->model('pasien');

      if($_SERVER["REQUEST_METHOD"] == "POST") {

          $dari = isset($_POST["dari"]) ? $_POST["dari"] : "";
          $sampai  = isset($_POST["sampai"]) ? $_POST["sampai"] : "";
          $periode = tanggal_indo($dari)." Sampai ". tanggal_indo($sampai);
          $begin = new DateTime($dari);
          $end   = new DateTime($sampai);

          // $finaldata = array("odr" => $odr, "otg" => $otg, "odp" => $odp, "pdp" => $pdp, "confirm" => $confirm, "total" => $total);

          $coutnya = "SELECT COUNT( CASE WHEN statusrawat = 'PULANG PAKSA' THEN 1 END ) AS aps,
          COUNT( CASE WHEN statusrawat = 'ALIH RAWAT' THEN 1 END ) AS alihrawat,
          COUNT( CASE WHEN statusrawat = 'DIRUJUK' THEN 1 END ) AS dirujuk,
          COUNT( CASE WHEN statusrawat = 'SEMBUH' THEN 1 END ) AS sembuh,
          COUNT( CASE WHEN statusrawat = 'MENINGGAL' THEN 1 END ) AS meninggal FROM data_pasien where statusakhir = 'odp' and mrs BETWEEN '".$dari."' and '".$sampai."' ";
          $odp = $this->pasien->customSql($coutnya);
          //
          $coutnya = "SELECT COUNT( CASE WHEN statusrawat = 'PULANG PAKSA' THEN 1 END ) AS aps,
          COUNT( CASE WHEN statusrawat = 'ALIH RAWAT' THEN 1 END ) AS alihrawat,
          COUNT( CASE WHEN statusrawat = 'DIRUJUK' THEN 1 END ) AS dirujuk,
          COUNT( CASE WHEN statusrawat = 'SEMBUH' THEN 1 END ) AS sembuh,
          COUNT( CASE WHEN statusrawat = 'MENINGGAL' THEN 1 END ) AS meninggal FROM data_pasien where statusakhir = 'pdp' and mrs BETWEEN '".$dari."' and '".$sampai."' ";
          $pdp = $this->pasien->customSql($coutnya);
          //
          $coutnya = "SELECT COUNT( CASE WHEN statusrawat = 'PULANG PAKSA' THEN 1 END ) AS aps,
          COUNT( CASE WHEN statusrawat = 'ALIH RAWAT' THEN 1 END ) AS alihrawat,
          COUNT( CASE WHEN statusrawat = 'DIRUJUK' THEN 1 END ) AS dirujuk,
          COUNT( CASE WHEN statusrawat = 'SEMBUH' THEN 1 END ) AS sembuh,
          COUNT( CASE WHEN statusrawat = 'MENINGGAL' THEN 1 END ) AS meninggal FROM data_pasien where statusakhir = 'confirm' and mrs BETWEEN '".$dari."' and '".$sampai."' ";
          $confirm = $this->pasien->customSql($coutnya);
          //
          $finaldata = array("odp" => $odp[0], "pdp" => $pdp[0], "confirm" => $confirm[0]);

          $coutnya = "SELECT COUNT( CASE WHEN statusakhir = 'ODR' THEN 1 END ) AS odr,
          COUNT( CASE WHEN statusakhir = 'ODP' THEN 1 END ) AS odp,
          COUNT( CASE WHEN statusakhir = 'PDP' THEN 1 END ) AS pdp,
          COUNT( CASE WHEN statusakhir = 'OTG' THEN 1 END ) AS otg,
          COUNT( CASE WHEN statusakhir = 'CONFIRM' THEN 1 END ) AS confirm FROM data_pasien where statusrawat = 'RAWAT'";
          $dataakhir = $this->pasien->customSql($coutnya);


          $coutnya = "SELECT COUNT( CASE WHEN statusakhir = 'ODR' THEN 1 END ) AS odr,
          COUNT( CASE WHEN statusakhir = 'ODP' THEN 1 END ) AS odp,
          COUNT( CASE WHEN statusakhir = 'PDP' THEN 1 END ) AS pdp,
          COUNT( CASE WHEN statusakhir = 'OTG' THEN 1 END ) AS otg,
          COUNT( CASE WHEN statusakhir = 'CONFIRM' THEN 1 END ) AS confirm FROM data_pasien where statusrawat != 'RAWAT'";
          $pernahdirawat = $this->pasien->customSql($coutnya);
      }

      $this->template('cetaklaporan', array("periode"=>$periode, "data2" => $finaldata, "dirawat" => $dataakhir[0], "pernahdirawat" => $pernahdirawat[0]));
    }
}
?>
