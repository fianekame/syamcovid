<?php
session_start();
include("../config.php");
$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("connection failed".mysqli_errno());
// $con=mysqli_connect('localhost','root','','employee')
//     or die("connection failed".mysqli_errno());

$request=$_REQUEST;
$ids = $_POST['idsekolah'];
$col =array(
    0   =>  'nama_siswa',
    1   =>  'nama_siswa',
    2   =>  'nama_user',
		3   =>  'nis',
		4   =>  'nisn',
    5   =>  'email',
    6   =>  'statussiswa'
);  //create column like table in database

$sql ="SELECT * FROM sekolah_siswa where id_sekolah=".$ids;
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT * FROM sekolah_siswa WHERE 1=1 and id_sekolah=".$ids;
if(!empty($request['search']['value'])){
    $sql.=" AND (nama_siswa Like '%".$request['search']['value']."%' ";
		$sql.=" OR nama_user Like '%".$request['search']['value']."%' ";
		$sql.=" OR nis Like '%".$request['search']['value']."%' ";
    $sql.=" OR nisn Like '%".$request['search']['value']."%' ";
    $sql.=" OR email Like '%".$request['search']['value']."%' ";
    $sql.=" OR statussiswa Like '%".$request['search']['value']."%' )";
}
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);

$data=array();
$no = 1;
while($row=mysqli_fetch_array($query)){
    $subdata=array();
		$ids = $_POST['idsekolah'];
		$ko = "'";
    $subdata[]='<td><input type="checkbox" class="sub_chk" data-id="'.$row[0].'"></td>';
		// $subdata[]=$no;
    $subdata[]=$row[2];
    $subdata[]=$row[3];
		$subdata[]=$row[4];
    $subdata[]=$row[9];
    $subdata[]=
		'<a href="?page=sekolahmurid&&action=update&&id='.$row[0].'&&ids='.$ids.'" class="btn btn-primary btn-icon rounded-circle"><div><i class="fa fa-pencil"></i></div></a>
		 <a href="?page=sekolahmurid&&action=delete&&id='.$row[0].'&&img='.$row[8].'" onclick="return confirm('.$ko.'Data Akan Di Hapus ?'.$ko.');" class="btn btn-danger btn-icon rounded-circle"><div><i class="fa fa-trash"></i></div></a>
		';
    if ($row[9]==="aktif") {
      $subdata[]=
  		'<a href="?page=sekolahmurid&&action=setNonActive&&id='.$row[0].'&&ids='.$ids.'" class="btn btn-oblong btn-outline-warning">Non-Aktifkan</a>
  		 <a href="?page=sekolahmurid&&action=resetPassword&&id='.$row[0].'&&nis='.$row[4].'" onclick="return confirm('.$ko.'Password Akan Direset ?'.$ko.');" class="btn btn-oblong btn-outline-danger">Reset Password</a>
  		';
    }else{
      $subdata[]=
  		'<a href="?page=sekolahmurid&&action=setActive&&id='.$row[0].'&&ids='.$ids.'" class="btn btn-oblong btn-outline-success">Aktifkan</a>
  		 <a href="?page=sekolahmurid&&action=resetPassword&&id='.$row[0].'&&nis='.$row[4].'" onclick="return confirm('.$ko.'Password Akan Direset ?'.$ko.');" class="btn btn-oblong btn-outline-danger">Reset Password</a>
  		';
    }

    $data[]=$subdata;
		$no++;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);
?>
