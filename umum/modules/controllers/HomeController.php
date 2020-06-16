<?php

use \modules\controllers\MainController;

class HomeController extends MainController {

  public function index() {
    $this->model('pasien');
    $datapasien = $this->pasien->get();
    $coutnya = "SELECT COUNT( CASE WHEN statusakhir = 'ODR' THEN 1 END ) AS odr,
    COUNT( CASE WHEN statusakhir = 'ODP' THEN 1 END ) AS odp,
    COUNT( CASE WHEN statusakhir = 'PDP' THEN 1 END ) AS pdp,
    COUNT( CASE WHEN statusakhir = 'OTG' THEN 1 END ) AS otg,
    COUNT( CASE WHEN statusakhir = 'CONFIRM' THEN 1 END ) AS confirm FROM data_pasien";
    $datacount = $this->pasien->customSql($coutnya);

    $rawatcount = array();
    $konfirmasi = array();
    $pasienruang = array();

    $bigdata = array();
    $minmax = $this->pasien->customSql("SELECT  MIN(mrs) as awal, max(mrs) as akhir FROM data_pasien");
    $periode = tanggal_indo($minmax[0]->awal)." Sampai ". tanggal_indo($minmax[0]->akhir);
    $begin = new DateTime($minmax[0]->awal);
    $end   = new DateTime($minmax[0]->akhir);
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

    $rawat = "SELECT COUNT( CASE WHEN statusrawat = 'PULANG PAKSA' THEN 1 END ) AS rj,
    COUNT( CASE WHEN statusrawat = 'RAWAT' THEN 1 END ) AS md,
    COUNT( CASE WHEN statusrawat = 'SEMBUH' THEN 1 END ) AS sembuh,
    COUNT( CASE WHEN statusrawat = 'MENINGGAL' THEN 1 END ) AS meninggal FROM data_pasien";
    $rawatcount = $this->pasien->customSql($rawat);

    $kon = "SELECT COUNT( CASE WHEN hasilswab = '-' THEN 1 END ) AS belum,
    COUNT( CASE WHEN hasilswab = 'Negatif' THEN 1 END ) AS neg,
    COUNT( CASE WHEN hasilswab = 'Positif' THEN 1 END ) AS pos FROM data_pasien";
    $konfirmasi = $this->pasien->customSql($kon);

    $pruang = "SELECT COUNT( CASE WHEN slug = 'igd' THEN 1 END ) AS igd,
    COUNT( CASE WHEN slug = 'irnaf' THEN 1 END ) AS f,
    COUNT( CASE WHEN slug = 'irnabbawah' THEN 1 END ) AS bbawah,
    COUNT( CASE WHEN slug = 'irnab1' THEN 1 END ) AS b1 FROM data_pasien";
    $pasienruang = $this->pasien->customSql($pruang);

    $this->template('home', array('pasienruang' => $pasienruang[0],'konfirmasi' => $konfirmasi[0], 'rawatcount' => $rawatcount[0], 'periode' => $periode, 'finaldata' => $finaldata, 'datapasien' => $datapasien, 'datacount' => $datacount[0]));
  }
}
?>
