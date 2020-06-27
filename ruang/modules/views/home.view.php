<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
    <?php $total =  $data["datacount"]->odr+$data["datacount"]->odp+$data["datacount"]->pdp+$data["datacount"]->otg+$data["datacount"]->confirm; ?>
    <div class="col-xl-2 col-md-6">
        <div class="card bg-success text-white mb-4">
          <div class="card-body">ODR <br> <h1><?php echo $data["datacount"]->odr; ?></h1> </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?php echo PATH; ?>?page=main-kelola">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">ODP <br> <h1><?php echo $data["datacount"]->odp; ?></h1> </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?php echo PATH; ?>?page=main-kelola">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <div class="card bg-warning text-white mb-4">
          <div class="card-body">PDP <br> <h1><?php echo $data["datacount"]->pdp; ?></h1> </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?php echo PATH; ?>?page=main-kelola">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <div class="card bg-warning2 text-white mb-4">
          <div class="card-body">OTG <br> <h1><?php echo $data["datacount"]->otg; ?></h1> </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?php echo PATH; ?>?page=main-kelola">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <div class="card bg-danger text-white mb-4">
          <div class="card-body">CONFIRM <br> <h1><?php echo $data["datacount"]->confirm; ?></h1> </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?php echo PATH; ?>?page=main-kelola">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <div class="card bg-secondary text-white mb-4">
          <div class="card-body">Total Pasien <br> <h1><?php echo $total; ?></h1> </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?php echo PATH; ?>?page=main-kelola">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Data Pasien Covid 19</div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" cellspacing="0">
                  <thead>
                      <tr>
                        <th>NRM</th>
                        <th>NAMA</th>
                        <th>MRS</th>
                        <th>STATUS</th>
                        <th>RUANG</th>
                        <th>RAWAT</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>NRM</th>
                        <th>NAMA</th>
                        <th>MRS</th>
                        <th>STATUS</th>
                        <th>RUANG</th>
                        <th>RAWAT</th>
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
                          <?php echo $pasien->statusakhir; ?>
                        </td>
                        <td>
                          <?php echo $pasien->ruang; ?>
                        </td>
                        <td>
                          <?php echo $pasien->statusrawat; ?>
                        </td>
                      </tr>
                    <?php $i++; endforeach; ?>
                  </tbody>
              </table>
            </div>
        </div>
    </div>
  </div>
</div>
