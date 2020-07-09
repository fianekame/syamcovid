<!-- <pre><?php print_r($data); ?></pre> -->
<?php
    $name = $data["user"];
    echo '<script>';
    echo 'var datanya = ' . json_encode($name) . ';';
    echo '</script>';
?>
<h1 class="mt-4">Kelola Data Pasien</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Kelola Pasien</li>
</ol>
<div class="row">
  <div class="col-lg-12">
    <?php if (isset($data["error"]) && count($data["error"]) > 0) {?>
      <div class="alert alert-solid alert-danger" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php
          foreach ($data["error"] as $error) {
              ?>
              <?php echo "| ".$error; ?>
          <?php
        } ?>
      </div>
    <?php } elseif (isset($data["success"])) {?>
      <div class="alert alert-solid alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php echo $data["success"]; ?>
      </div>
      <meta http-equiv="refresh" content="1;url=<?php echo PATH; ?>?page=main-kelola&&action=update&&id=<?php echo $_GET["id"]; ?>">
    <?php } ?>
  </div>
  <div class="col-lg-4">
    <div class="card mb-4">
        <div class="card-header">
          Data Personal
        </div>
        <div class="card-body">
          <form role="form" id="myForm" method="post">
            <input type="hidden" name="id1" id="id1">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault01">NRM</label>
                  <input type="text" name="nrm" id="nrm" class="form-control" placeholder="Nrm" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault01">Nama Pasien</label>
                  <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault01">NIK</label>
                  <input type="text" name="nik" id="nik" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault01">Tanggal Lahir</label>
                  <input type="date" name="ttl" id="ttl" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Jenis Kelamin</label>
                  <select class="form-control" name="jk" id="jk">
                    <option value="0">LAKI-LAKI</option>
                    <option value="1">WANITA</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault01">Umur</label>
                  <input type="text" name="umur" id="umur" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault01">Bangsa</label>
                  <input type="text" name="bangsa" id="bangsa" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault01">Kabupaten</label>
                  <input type="text" name="kab" id="kab" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault01">Kecamatan</label>
                  <input type="text" name="kec" id="kec" class="form-control">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-icon btn-sm btn-primary btn-block" name="button"> Simpan </button>
          </form>
        </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="card mb-4">
        <div class="card-header">
          Data Informasi Medis
        </div>
        <div class="card-body">
          <form role="form" id="myForm" method="post">
            <input type="hidden" name="id2" id="id2">
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Tanggal Masuk</label>
                  <input type="date" name="mrs" id="mrs" class="form-control" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Tanggal Keluar</label>
                  <input type="date" name="krs" id="krs" class="form-control" value="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Ruangan</label>
                  <select class="form-control" name="ruangan" id="ruangan">
                    <option value="IGD">IGD</option>
                    <option value="IRNA B BAWAH">IRNA B BAWAH</option>
                    <option value="IRNA B1">IRNA B1</option>
                    <option value="IRNA F">IRNA F</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Gejala Klinis Dan Penyakit Penyerta</label>
                  <textarea class="form-control" name="ketgejala" id="ketgejala" rows="5"></textarea>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Status Awal</label>
                  <select class="form-control" name="statusawal" id="statusawal">
                    <option value="ODR">ODR</option>
                    <option value="ODP">ODP</option>
                    <option value="OTG">OTG</option>
                    <option value="PDP">PDP</option>
                    <option value="CONFIRM">CONFIRM</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Status Akhir</label>
                  <select class="form-control" name="statusakhir" id="statusakhir">
                    <option value="ODR">ODR</option>
                    <option value="ODP">ODP</option>
                    <option value="OTG">OTG</option>
                    <option value="PDP">PDP</option>
                    <option value="CONFIRM">CONFIRM</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Foto Thorax</label>
                  <select class="form-control" name="fototherax" id="fototherax">
                    <option value="0">TIDAK ADA</option>
                    <option value="1">ADA</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Rapid Test?</label>
                  <select class="form-control" onchange="getRapid(this)" name="rapid" id="rapid">
                    <option value="0">Tidak</option>
                    <option value="1">Ya</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Hasil Rapid</label>
                  <select class="form-control" name="hasilrapid" id="hasilrapid" disabled>
                    <option value="-">Tidak Ada Hasil</option>
                    <option value="Menunggu">Menunggu</option>
                    <option value="Reaktif">Reaktif</option>
                    <option value="Non-Reaktif">Non-Reaktif</option>
                  </select>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-icon btn-sm btn-primary btn-block" name="button"> Simpan </button>
          </form>
        </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="card mb-4">
        <div class="card-header">
          Data Detail Covid
        </div>
        <div class="card-body">
          <form role="form" id="myForm" method="post">
            <input type="hidden" name="id3" id="id3">
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Swab</label>
                  <select class="form-control" name="swab" id="swab">
                    <option value="0">Tidak</option>
                    <option value="1">Ya</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Serum</label>
                  <select class="form-control" name="serum" id="serum">
                    <option value="0">Tidak</option>
                    <option value="1">Ya</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Sputum</label>
                  <select class="form-control" name="sputum" id="sputum">
                    <option value="0">Tidak</option>
                    <option value="1">Ya</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Hasil Swab</label>
                  <select class="form-control" onchange="getSwab(this)" name="hasilswab" id="hasilswab">
                    <option value="-">Tidak Ada Hasil</option>
                    <option value="Menunggu">Menunggu</option>
                    <option value="Negatif">Negatif</option>
                    <option value="Positif">Positif</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Keterangan Lain</label>
                  <input type="text" name="hasillain" id="hasillain" class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Keterangan Rawat</label>
                  <select class="form-control" name="statusrawat" id="statusrawat">
                    <option value="-">Non Keterangan</option>
                    <option value="RAWAT">RAWAT</option>
                    <option value="PULANG PAKSA">PULANG PAKSA</option>
                    <option value="ALIH RAWAT">ALIH RAWAT</option>
                    <option value="DIRUJUK">DIRUJUK</option>
                    <option value="SEMBUH">SEMBUH</option>
                    <option value="MENINGGAL">MENINGGAL</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Diagnosa Awal</label>
                  <textarea class="form-control" name="diagawal" id="diagawal" rows="3"></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Diagnosa Akhir</label>
                  <textarea class="form-control" name="diagakhir" id="diagakhir" rows="3"></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="validationDefault02">Pemakaman</label>
                  <select class="form-control" name="pemakaman" id="pemakaman">
                    <option value="-">Belum Diketahui</option>
                    <option value="0">Protokoler</option>
                    <option value="1">Non Protokoler</option>
                  </select>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-icon btn-sm btn-primary btn-block" name="button"> Simpan </button>
          </form>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">

    function getRapid(selectObject) {
      var value = selectObject.value;
      if (value=="0") {
        document.getElementById('hasilrapid').value= "-";
        document.getElementById("hasilrapid").disabled = true;
      }
      if (value=="1") {
        document.getElementById('hasilrapid').value= "Menunggu";
        document.getElementById("hasilrapid").disabled = false;
      }
    }

    function getSwab(selectObject) {
      var value = selectObject.value;
      if (value=="Lainnya") {
        document.getElementById("hasillain").disabled = false;
        document.getElementById("hasillain").value = "";

      }else{
        document.getElementById("hasillain").disabled = true;
        document.getElementById("hasillain").value = value;
      }
    }

    console.log(datanya);
    document.getElementById('id1').value= datanya.id;
    document.getElementById('id2').value= datanya.id;
    document.getElementById('id3').value= datanya.id;

    document.getElementById('nrm').value= datanya.nrm;
    document.getElementById('nama').value= datanya.nama;
    document.getElementById('nik').value= datanya.nik;
    document.getElementById('ttl').value= datanya.ttl;
    document.getElementById('jk').value= datanya.jk;
    document.getElementById('umur').value= datanya.umur;
    document.getElementById('bangsa').value= datanya.bangsa;
    document.getElementById('kab').value= datanya.kab;
    document.getElementById('kec').value= datanya.kec;


    document.getElementById('mrs').value= datanya.mrs;
    document.getElementById('krs').value= datanya.krs;
    document.getElementById('statusawal').value= datanya.statusawal;
    document.getElementById('statusakhir').value= datanya.statusakhir;
    document.getElementById('ruangan').value= datanya.ruang;
    document.getElementById('fototherax').value= datanya.fototherax;
    document.getElementById('ketgejala').value= datanya.ketgejala;
    document.getElementById('rapid').value= datanya.rapidtes;
    document.getElementById('hasilrapid').value= datanya.hasilrapid;
    document.getElementById('swab').value= datanya.swab;
    document.getElementById('serum').value= datanya.serum;
    document.getElementById('sputum').value= datanya.sputum;
    document.getElementById('hasilswab').value= datanya.hasilswab;
    document.getElementById('hasillain').value= datanya.kethasilswab;

    document.getElementById('statusrawat').value= datanya.statusrawat;
    document.getElementById('diagawal').value= datanya.diagawal;
    document.getElementById('diagakhir').value= datanya.diagakhir;
    document.getElementById('pemakaman').value= datanya.pemakaman;

    document.getElementById("hasillain").disabled = true;



    if (datanya.rapidtes == "1") {
      document.getElementById("hasilrapid").disabled = false;
    }


</script>
