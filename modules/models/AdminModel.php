<?php
/**
 * @Author  : Sofian Eka Sandra<fianeka.me@gmail.com>
 * @Date    : 12/05/17 - 3:32 AM
 */

class AdminModel extends Model{
    protected $tableName = "admin";
    public function get($params = "") {
        $data = array();
        $divisi = $this->db->getAll($this->tableName)->toObject();
        foreach($divisi as $val) {
            $total = $this->db->getWhere('admin', array('uniqid' => $val->uniqid))->numRows();
            $val->total = $total;
            array_push($data, $val);
        }
        return $data;
    }
}
?>
