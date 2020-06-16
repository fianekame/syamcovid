<?php

use \modules\controllers\MainController;

class LaporanruangController extends MainController {

    public function index() {
      $this->model('pasien');
      $datax = array("odr"=>array(),"odp"=>array(),"pdp"=>array(),"otg"=>array(),"confirm"=>array());
      $datacount = array();
      $kriteria = array("IRNA F","IRNA B BAWAH","IRNA B1","IGD");
      foreach($kriteria as $value) {
        $sql = "SELECT COUNT( CASE WHEN statusakhir = 'ODR' THEN 1 END ) AS odr,
            COUNT( CASE WHEN statusakhir = 'ODP' THEN 1 END ) AS odp,
            COUNT( CASE WHEN statusakhir = 'PDP' THEN 1 END ) AS pdp,
            COUNT( CASE WHEN statusakhir = 'OTG' THEN 1 END ) AS otg,
            COUNT( CASE WHEN statusakhir = 'CONFIRM' THEN 1 END ) AS confirm FROM data_pasien where ruang = '". $value ."'";
            $datas = $this->pasien->customSql($sql);
            array_push($datax["odr"], array("y"=> (int)$datas[0]->odr, "label"=>$value));
            array_push($datax["odp"], array("y"=> (int)$datas[0]->odp, "label"=>$value));
            array_push($datax["pdp"], array("y"=> (int)$datas[0]->pdp, "label"=>$value));
            array_push($datax["otg"], array("y"=> (int)$datas[0]->otg, "label"=>$value));
            array_push($datax["confirm"], array("y"=> (int)$datas[0]->confirm, "label"=>$value));
      }

      $this->template('laporanruang', array('datax' => $datax));
    }
}
?>
