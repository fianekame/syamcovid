<?php
session_start();
include("../config.php");
include("../library/mylib.php");
$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME_2) or die("connection failed".mysqli_errno());
$nrm = $_GET['nrm'];

$sql ="SELECT * FROM `smis_rg_patient` WHERE id =".$nrm;
// echo $sql;
$result=mysqli_query($con,$sql);
?>
<hr>
<?php if (mysqli_num_rows($result) > 0): ?>
  <h6>Hasil Pencarian Pasien Dengan NRM : <?php echo $nrm ?> </h6>
  <table class="table table-bordered" id="dataTable1" width=100%>
    <thead>
      <tr style="border-bottom: 1px solid grey">
        <th>NRM</th>
        <th>NAMA</th>
        <th>AKSI</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row = mysqli_fetch_assoc($result)) {
      ?>
      <?php $datas = $row["id"]."|".$row["nama"]."|".$row["ktp"]."|".$row["tgl_lahir"]."|".$row["kelamin"]."|".$row["nama_kabupaten"]."|".$row["nama_kecamatan"]; ?>
      <tr>
        <td><?php echo $row["id"];?></td>
        <td><?php echo $row["nama"];?></td>
        <td>
          <button name="<?php echo $datas; ?>" onclick="addFrom(this)"  class="btn btn-icon btn-block btn-sm btn-success" href="#" type="button">
            Pilih
          </button>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
<?php else: ?>
  <?php echo "Pasien Tidak Ditemukan"; ?>
<?php endif; ?>

<script type="text/javascript">
$(document).ready(function() {
  $('#dataTable1').DataTable();
});

function addFrom(elem){
  var data = $(elem).attr("name").split("|");
  // console.log(data);
  document.getElementById('nrm').value= data[0];
  document.getElementById('nama').value= data[1];
  document.getElementById('nik').value= data[2];
  document.getElementById('ttl').value=data[3];
  document.getElementById('jk').value= data[4];
  document.getElementById('bangsa').value= "Indonesia";
  document.getElementById('kab').value= data[5];
  document.getElementById('kec').value= data[6];
  $('#formModal1').modal('hide');
}

</script>
