<?php
class Model{

    public $db;
    protected $tableName;

    public function __construct(){
        $this->db = new Database();
    }

    public function model($modelName){
        require_once ROOT . DS . 'modules' . DS . 'models' . DS . $modelName . 'Model.php';
        $className = ucfirst($modelName) . 'Model';
        $this->$modelName = new $className();
    }

    public function customSql($sql) {
        // echo $sql;
        $this->db->query($sql);
        return $this->db->execute()->toObject();
    }

    public function getCount($where = array(), $staticparam=""){
      $sql = "SELECT COUNT(*) as counts FROM " . $this->tableName;
      if(is_array($where)) {
          $sql .= " WHERE ";
          $i = 0;
          foreach($where as $key => $value) {
              $i++;
              $sql .= $key . "='" . $value . "' ";

              if($i < count($where)) $sql .= " AND ";
          }

      }
      $sql .= $staticparam;
      $this->db->query($sql);
      return $this->db->execute()->toObject();
    }

    public function getLastId() {
        $sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES
        WHERE TABLE_SCHEMA = 'poskelud' AND TABLE_NAME = '". $this->tableName."'";
        // echo $sql;
        $this->db->query($sql);
        return $this->db->execute()->toObject();
    }

    public function moveDetail($id) {
        $sql = "INSERT INTO transdetail(idtrans,idproduk,jmlbeli,kodekasir,harga,varian) SELECT idtrans,idproduk,jumlahbeli,kodekasir,harga,varianbeli FROM transtemp WHERE idtrans='".$id."'";
        $this->db->query($sql);
        $this->db->execute();
        $sql = "DELETE FROM transtemp WHERE idtrans= '".$id."'";
        $this->db->query($sql);
        $this->db->execute();
        // return $this->db->execute()->toObject();
    }

    public function get($params = "") {

        $sql = "SELECT*FROM " . $this->tableName;

        if(is_array($params)) {
            if(isset($params["limit"])) {

                $sql .= " LIMIT " . $params["limit"];
            }
        }

        $this->db->query($sql);
        // echo $sql;
        return $this->db->execute()->toObject();
    }


    public function rows() {
        return $this->db->getAll($this->tableName)->numRows();
    }

    public function getWhere($params, $staticparam="") {

        return $this->db->getWhere($this->tableName, $params, $staticparam)->toObject();
    }

    public function delete($where = array()) {

        return $this->db->delete($this->tableName, $where);
    }

    public function getJoin($tableJoin, $params, $join = "JOIN", $where = "", $order = "") {

        $sql = "SELECT*FROM " . $this->tableName;

        if(is_array($tableJoin)) {

            foreach($tableJoin as $table) {

                $sql .= " ". $join ." " . $table . " ";
            }

        }else {
            $sql .= " ". $join ." " . $tableJoin . " ";
        }
        $co = 0;
        foreach($params as $key => $value) {
          if ($co==0) {
            $sql .=" ON " . $key . " = " . $value . " ";
          }else{
            $sql .=" AND " . $key . " = " . $value . " ";
          }
          $co++;
        }

        if($where && is_array($where)) {
            $sql .= " WHERE ";
            $i = 0;
            foreach($where as $key => $value) {

                $sql .= " " . $key . "='" . $value . "' ";

                $i++;
                if($i < count($where)) {

                    $sql .=" AND ";
                }
            }

        }
        if ($order!="") {
          $sql .= $order;
        }
        // echo $sql;
        $this->db->query($sql);
        return $this->db->execute()->toObject();
    }

    public function insert($data = array(), $onupdate = False) {

        $insert = $this->db->insert($this->tableName, $data, $onupdate);

        if($insert) {
            return true;
        }

        return false;
    }

    public function update($data = array(), $where = array()) {

        $update = $this->db->update($this->tableName, $data, $where);

        if($update) {
            return true;
        }

        return false;
    }
}
?>
