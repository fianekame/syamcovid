<?php
/**
 * @Author  : Sofian Eka Sandra<fianeka.me@gmail.com>
 * @Date    : 12/05/17 - 3:32 AM
 */

class PasienModel extends Model{

    protected $tableName = "data_pasien";
    public function get($params = "") {
        $data = array();
        $divisi = $this->db->getAll($this->tableName)->toObject();
        foreach($divisi as $val) {
            $total = $this->db->getWhere('data_pasien', array('idpasien' => $val->uniqid))->numRows();
            $val->total = $total;
            array_push($data, $val);
        }
        return $data;
    }
}
?>
