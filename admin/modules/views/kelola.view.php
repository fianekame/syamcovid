<h1 class="mt-4">Kelola Data Pasien</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Kelola</li>
</ol>

<!-- <?php

echo $age;
?> -->
<div class="card mb-4">
    <div class="card-header">
      <button data-toggle="modal" data-target="#formModal" class="btn btn-icon btn-info" type="button">
        <span class="btn-inner--text"><i class="fas fa-table mr-1"></i> Tambah Pasien Baru</span>
      </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                      <th>NRM</th>
                      <th>NAMA</th>
                      <th>MRS</th>
                      <th>KRS</th>
                      <th>STATUS AWAL</th>
                      <th>STATUS AKHIR</th>
                      <th>RUANG</th>
                      <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                      <th>NRM</th>
                      <th>NAMA</th>
                      <th>MRS</th>
                      <th>KRS</th>
                      <th>STATUS AWAL</th>
                      <th>STATUS AKHIR</th>
                      <th>RUANG </th>
                      <th></th>
                    </tr>
                </tfoot>
                <tbody>
                  <?php $i = 1; foreach ($data["datapasien"] as $pasien): ?>
                    <?php $datas = $pasien->idpasien."/".$pasien->nrm."/".$pasien->nama."/"
                    .$pasien->mrs."/".$pasien->krs."/".$pasien->statusawal."/".$pasien->statusakhir."/".$pasien->ruang
                    ."/".$pasien->fototherax."/".$pasien->ketgejala."/".$pasien->rapidtes."/".$pasien->hasilrapid
                    ."/".$pasien->swab."/".$pasien->serum."/".$pasien->sputum."/".$pasien->hasilswab."/".$pasien->kethasilswab; ?>
                    <tr>
                      <td>
                        <?php echo $pasien->nrm; ?>
                      </td>
                      <td>
                        <?php echo $pasien->nama; ?>
                      </td>
                      <td>
                        <?php echo tanggal_indo($pasien->mrs); ?>
                      </td>
                      <td>
                        <?php echo tanggal_indo($pasien->krs); ?>
                      </td>
                      <td>
                        <?php echo $pasien->statusawal; ?>
                      </td>
                      <td>
                        <?php echo $pasien->statusakhir; ?>
                      </td>
                      <td>
                        <?php echo $pasien->ruang; ?>
                      </td>
                      <td>
                        <div class="btn-group" role="group">
                          <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kelola Data
                          </button>
                          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a href="#" data-toggle="modal" class="dropdown-item" data-target="#formModal" data-id="<?php echo $datas; ?>">
                              <i class="fa fa-user" aria-hidden="true"></i> Edit Data
                            </a>
                            <a href="#" data-toggle="modal" class="dropdown-item" data-target="#formModal2" data-id="<?php echo $datas; ?>">
                              <i class="fa fa-medkit" aria-hidden="true"></i> Transfer Pasien
                            </a>
                            <a class="dropdown-item" href="<?php echo SITE_URL; ?>?page=main-kelola&&action=update&&id=<?php echo $pasien->idpasien; ?>">
                              <i class="fa fa-edit" aria-hidden="true"></i>  Kelola Data Detail
                            </a>
                            <a class="dropdown-item" href="<?php echo SITE_URL; ?>?page=main-kelola&&action=delete&&id=<?php echo $pasien->idpasien; ?>" onclick="return confirm('Data Akan Di Hapus ?');" >
                              <i class="fa fa-trash" aria-hidden="true"></i>  Hapus Data
                            </a>
                          </div>
                        </div>


                      </td>
                    </tr>
                  <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Insert -->
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button id="onlyadd" data-toggle="modal" data-target="#formModal1" class="btn btn-icon btn-sm btn-primary" type="button">
          <span class="btn-inner--text"><i class="fas fa-table mr-1"></i> Data SIM-RS</span>
        </button>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" id="myForm" action="<?php echo PATH; ?>?page=main-kelola&&action=addchange" method="post">
          <input type="hidden" name="id" id="id" class="form-control" placeholder="Id">
          <input type="hidden" name="nik" id="nik">
          <input type="hidden" name="ttl" id="ttl">
          <input type="hidden" name="jk" id="jk">
          <input type="hidden" name="bangsa" id="bangsa">
          <input type="hidden" name="kab" id="kab">
          <input type="hidden" name="kec" id="kec">
          <div class="form-row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="validationDefault01">NRM</label>
                <input type="text" name="nrm" id="nrm" class="form-control" placeholder="Nrm" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="validationDefault01">Nama Pasien</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
              </div>
            </div>
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
            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="validationDefault02">Foto Thorax</label>
                <select class="form-control" name="fototherax" id="fototherax">
                  <option value="0">TIDAK ADA</option>
                  <option value="1">ADA</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label" for="validationDefault02">Gejala Klinis Dan Penyakit Penyerta</label>
                <textarea class="form-control" name="ketgejala" id="ketgejala" rows="3"></textarea>
              </div>
            </div>
            <div class="col-md-3">
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
            <div class="col-md-3">
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
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="validationDefault02">Rapid Test?</label>
                <select class="form-control" onchange="getRapid(this)" name="rapid" id="rapid">
                  <option value="0">Tidak</option>
                  <option value="1">Ya</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
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

            <div class="col-md-2">
              <div class="form-group">
                <label class="form-control-label" for="validationDefault02">Swab</label>
                <select class="form-control" name="swab" id="swab">
                  <option value="0">Tidak</option>
                  <option value="1">Ya</option>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label class="form-control-label" for="validationDefault02">Serum</label>
                <select class="form-control" name="serum" id="serum">
                  <option value="0">Tidak</option>
                  <option value="1">Ya</option>
                </select>
              </div>
            </div>
            <div class="col-md-2">
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
                  <option value="Negatif">Negatif</option>
                  <option value="Positif">Positif</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="validationDefault02">Keterangan Lain</label>
                <input type="text" name="hasillain" id="hasillain" class="form-control" placeholder="" disabled>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Insert -->
<!-- Modal -->
<div class="modal fade" id="formModal1" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Dengan NRM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="col-md-8">
              <div class="form-group">
                <input type="text" name="nrm1" id="nrm1" class="form-control" placeholder="Nrm" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <button type="button" onclick="cekPasien(this);" class="btn btn-block btn-primary">Cari</button>
              </div>
            </div>
          </div>
        <div class="resultview">

        </div>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal2" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal modal modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pindahkan Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" id="myForm2" action="<?php echo PATH; ?>?page=main-kelola&&action=transfer" method="post">
        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="nrm2" id="nrm2" class="form-control" placeholder="" disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="nama2" id="nama2" class="form-control" placeholder="" disabled>
            </div>
          </div>
          <input type="hidden" name="id2" id="id2" class="form-control" placeholder="Id">
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-control-label" for="validationDefault02">Ruangan Yang Dituju</label>
              <select class="form-control" name="ruangan2" id="ruangan2">
                <option value="IGD">IGD</option>
                <option value="IRNA B BAWAH">IRNA B BAWAH</option>
                <option value="IRNA B1">IRNA B1</option>
                <option value="IRNA F">IRNA F</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <button type="submit" class="btn btn-block btn-primary">Transfer</button>
            </div>
          </div>
      </div>
    </form>

      </div>
      </form>
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
      }else{
        document.getElementById("hasillain").disabled = true;
      }
    }

    function cekPasien(theForm) {
      var nrm = document.getElementById('nrm1').value;
      $('.resultview').load("utils//GetPasien.php?nrm="+nrm);

      return false;
    }
    $(document).ready(function(){
        $('#formModal').on('show.bs.modal', function (e) {
            var rowdata = $(e.relatedTarget).data('id');
            if (typeof rowdata !== 'undefined') {

              var data = rowdata.split("/");
              document.getElementById('onlyadd').hidden = true;
              document.getElementById('id').value= data[0];
              document.getElementById('nrm').value=data[1];
              document.getElementById('nama').value= data[2];
              document.getElementById('mrs').value= data[3];
              document.getElementById('krs').value= data[4];
              document.getElementById('statusawal').value= data[5];
              document.getElementById('statusakhir').value= data[6];
              document.getElementById('ruangan').value= data[7];
              document.getElementById('fototherax').value= data[8];
              document.getElementById('ketgejala').value= data[9];
              document.getElementById('rapid').value= data[10];
              document.getElementById('hasilrapid').value= data[11];
              document.getElementById('swab').value= data[12];
              document.getElementById('serum').value= data[13];
              document.getElementById('sputum').value= data[14];
              document.getElementById('hasilswab').value= data[15];
              document.getElementById('hasillain').value= data[16];
            }else{
              document.getElementById("myForm").reset();
              document.getElementById('onlyadd').hidden = false;

            }
         });

         $('#formModal2').on('show.bs.modal', function (e) {
             var rowdata = $(e.relatedTarget).data('id');
             if (typeof rowdata !== 'undefined') {

               var data = rowdata.split("/");
               document.getElementById('id2').value= data[0];
               document.getElementById('nrm2').value=data[1];
               document.getElementById('nama2').value= data[2];
               document.getElementById('ruangan2').value= data[7];
             }else{
               document.getElementById("myForm2").reset();

             }
          });

        $('#formModal1').on('show.bs.modal', function () {
            $('#formModal').css('z-index', 1039);
        });

        $('#formModal1').on('hidden.bs.modal', function () {
            $('#formModal').css('z-index', 1041);
        });


    });
  </script>
