<?php

use \modules\controllers\MainController;

class LaporanController extends MainController {

    public function index() {
      $this->model('pasien');
      $datapasien = $this->pasien->get();
      $datacount = array();
      $rawatcount = array();
      $konfirmasi = array();
      $bigdata = array();
      $periode = "";


      $hasilrapid = array();
      $hasilswab = array();
      $pasienruang = array();




      if($_SERVER["REQUEST_METHOD"] == "POST") {
          $dari = isset($_POST["dari"]) ? $_POST["dari"] : "";
          $sampai  = isset($_POST["sampai"]) ? $_POST["sampai"] : "";
          $periode = tanggal_indo($dari)." Sampai ". tanggal_indo($sampai);
          $begin = new DateTime($dari);
          $end   = new DateTime($sampai);
          for($i = $begin; $i <= $end; $i->modify('+1 day')){
              $sql = "SELECT COUNT( CASE WHEN statusakhir = 'ODR' THEN 1 END ) AS odr,
              COUNT( CASE WHEN statusakhir = 'ODP' THEN 1 END ) AS odp,
              COUNT( CASE WHEN statusakhir = 'PDP' THEN 1 END ) AS pdp,
              COUNT( CASE WHEN statusakhir = 'OTG' THEN 1 END ) AS otg,
              COUNT( CASE WHEN statusakhir = 'CONFIRM' THEN 1 END ) AS confirm FROM data_pasien where mrs <= '". $i->format("Y-m-d")."'";
              $datas = $this->pasien->customSql($sql);
              array_push($bigdata, array("tgl" => $i->format("Y-m-d"), "data" => $datas[0]));
          }

          $odr = array();
          $odp = array();
          $otg = array();
          $pdp = array();
          $confirm = array();
          $total = array();
          foreach ($bigdata as $pasien) {
            $totalx = $pasien["data"]->odr + $pasien["data"]->odp + $pasien["data"]->pdp + $pasien["data"]->confirm;
            array_push($odr, array("x" => date('Y-m-d',strtotime($pasien["tgl"])), "y" => (int)$pasien["data"]->odr));
            array_push($odp, array("x" => date('Y-m-d',strtotime($pasien["tgl"])), "y" => (int)$pasien["data"]->odp));
            array_push($pdp, array("x" => date('Y-m-d',strtotime($pasien["tgl"])), "y" => (int)$pasien["data"]->pdp));
            array_push($otg, array("x" => date('Y-m-d',strtotime($pasien["tgl"])), "y" => (int)$pasien["data"]->otg));
            array_push($confirm, array("x" => date('Y-m-d',strtotime($pasien["tgl"])), "y" => (int)$pasien["data"]->confirm));
            array_push($total, array("x" => date('Y-m-d',strtotime($pasien["tgl"])), "y" => (int)$totalx));
          }
          $finaldata = array("odr" => $odr, "otg" => $otg, "odp" => $odp, "pdp" => $pdp, "confirm" => $confirm, "total" => $total);

          $coutnya = "SELECT COUNT( CASE WHEN statusakhir = 'ODR' THEN 1 END ) AS odr,
          COUNT( CASE WHEN statusakhir = 'ODP' THEN 1 END ) AS odp,
          COUNT( CASE WHEN statusakhir = 'PDP' THEN 1 END ) AS pdp,
          COUNT( CASE WHEN statusakhir = 'OTG' THEN 1 END ) AS otg,
          COUNT( CASE WHEN statusakhir = 'CONFIRM' THEN 1 END ) AS confirm FROM data_pasien WHERE mrs BETWEEN '".$dari."' and '".$sampai."' ";
          $datacount = $this->pasien->customSql($coutnya);

          $rawat = "SELECT COUNT( CASE WHEN statusrawat = 'PULANG PAKSA' THEN 1 END ) AS rj,
          COUNT( CASE WHEN statusrawat = 'RAWAT' THEN 1 END ) AS md,
          COUNT( CASE WHEN statusrawat = 'SEMBUH' THEN 1 END ) AS sembuh,
          COUNT( CASE WHEN statusrawat = 'MENINGGAL' THEN 1 END ) AS meninggal FROM data_pasien WHERE mrs BETWEEN '".$dari."' and '".$sampai."'";
          $rawatcount = $this->pasien->customSql($rawat);

          $kon = "SELECT COUNT( CASE WHEN hasilswab = '-' THEN 1 END ) AS belum,
          COUNT( CASE WHEN hasilswab = 'Negatif' THEN 1 END ) AS neg,
          COUNT( CASE WHEN hasilswab = 'Positif' THEN 1 END ) AS pos FROM data_pasien WHERE mrs BETWEEN '".$dari."' and '".$sampai."'";
          $konfirmasi = $this->pasien->customSql($kon);

          $hrapid = "SELECT COUNT( CASE WHEN hasilrapid = 'Non-Reaktif' THEN 1 END ) AS nonreak,
          COUNT( CASE WHEN hasilrapid = 'Reaktif' THEN 1 END ) AS reak,
          COUNT( CASE WHEN hasilrapid = 'Menunggu' THEN 1 END ) AS tunggu,
          COUNT( CASE WHEN rapidtes = '0' THEN 1 END ) AS tidakrapid,
          COUNT( CASE WHEN rapidtes = '1' THEN 1 END ) AS rapid FROM data_pasien WHERE mrs BETWEEN '".$dari."' and '".$sampai."'";
          $hasilrapid = $this->pasien->customSql($hrapid);

          $hswab = "SELECT COUNT( CASE WHEN hasilswab = 'Negatif' THEN 1 END ) AS neg,
          COUNT( CASE WHEN hasilswab = 'Positif' THEN 1 END ) AS pos,
          COUNT( CASE WHEN hasilswab = 'Lainnya' THEN 1 END ) AS lain FROM data_pasien WHERE mrs BETWEEN '".$dari."' and '".$sampai."'";
          $hasilswab = $this->pasien->customSql($hswab);

          $pruang = "SELECT COUNT( CASE WHEN slug = 'igd' THEN 1 END ) AS igd,
          COUNT( CASE WHEN slug = 'irnaf' THEN 1 END ) AS f,
          COUNT( CASE WHEN slug = 'irnabbawah' THEN 1 END ) AS bbawah,
          COUNT( CASE WHEN slug = 'irnab1' THEN 1 END ) AS b1 FROM data_pasien WHERE mrs BETWEEN '".$dari."' and '".$sampai."'";
          $pasienruang = $this->pasien->customSql($pruang);

      }
      $this->template('laporan', array('pasienruang' => $pasienruang[0], 'hasilrapid' => $hasilrapid[0], 'hasilswab' => $hasilswab[0], 'finaldata' => $finaldata, 'periode' => $periode, 'bigdata' => $bigdata, 'datapasien' => $datapasien, 'konfirmasi' => $konfirmasi[0], 'datacount' => $datacount[0], 'rawatcount' => $rawatcount[0]));
    }
}
?>
