<br>

<style type="text/css">
.tg  {border-collapse:collapse;border-color:#ccc;border-spacing:0;}
.tg td{background-color:#fff;border-color:#ccc;border-style:solid;border-width:1px;color:#333;
  font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 6px;word-break:normal;}
.tg th{background-color:#f0f0f0;border-color:#ccc;border-style:solid;border-width:1px;color:#333;
  font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 6px;word-break:normal;}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-btxf{background-color:#f9f9f9;border-color:inherit;text-align:left;vertical-align:top}
</style>

<div class="row">
  <div class="col-lg-4">
    <div class="card mb-4">
      <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Cetak Laporan</div>
      <div class="card-body">
        <form role="form" id="myForm" method="post">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="validationDefault02">Tanggal Awal</label>
                <input type="date" name="dari" id="dari" class="form-control" value="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="validationDefault02">Tanggal Akhir</label>
                <input type="date" name="sampai" id="sampai" class="form-control" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-block btn-primary">Proses</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php if (!empty($data["data2"])): ?>
    <?php $_SESSION["toprint"] = $data; ?>
    <div class="col-lg-8">
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-chart-area mr-1"></i>Periode : <?php echo $data["periode"]; ?>
          <a target="_blank" href="<?php SITE_URL; ?>utils/cetaklaporan.php" class="float-right btn btn-success">Cetak PDF</a>
        </div>
        <div class="card-body">
          <table>
            <thead>
              <tr>
                <th>PERIODE</th>
                <th>:</th>
                <th><?php echo $data["periode"]; ?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>JUMLAH PASIEN DIRAWAT</td>
                <td>:</td>
                <td><?php echo $data["dirawat"]->odp+$data["dirawat"]->pdp+$data["dirawat"]->confirm; ?> Orang</td>
              </tr>
              <tr>
                <td>ODP</td>
                <td>:</td>
                <td><?php echo $data["dirawat"]->odp; ?> Orang</td>
              </tr>
              <tr>
                <td>PDP</td>
                <td>:</td>
                <td><?php echo $data["dirawat"]->pdp; ?> Orang</td>
              </tr>
              <tr>
                <td>CONFIRM</td>
                <td>:</td>
                <td><?php echo $data["dirawat"]->confirm; ?> Orang</td>
              </tr>
            </tbody>
          </table>
          <hr>
          <h5>Pasien Yang Pernah Dirawat Di RS :</h5>
          <table class="tg" width="100%">
            <thead>
              <tr>
                <th class="tg-0pky">JENIS PASIEN</th>
                <th class="tg-0pky">SEMBUH</th>
                <th class="tg-0pky">DIRUJUK</th>
                <th class="tg-0pky">APS</th>
                <th class="tg-0pky">ALIH RAWAT</th>
                <th class="tg-0pky">MENINGGAL</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="tg-0pky">ODP</td>
                <td class="tg-0pky"><?php echo $data["data2"]["odp"]->sembuh; ?></td>
                <td class="tg-0pky"><?php echo $data["data2"]["odp"]->dirujuk; ?></td>
                <td class="tg-0pky"><?php echo $data["data2"]["odp"]->aps; ?></td>
                <td class="tg-0pky"><?php echo $data["data2"]["odp"]->alihrawat; ?></td>
                <td class="tg-0pky"><?php echo $data["data2"]["odp"]->meninggal; ?></td>
              </tr>
              <tr>
                <td class="tg-0pky">PDP</td>
                <td class="tg-0pky"><?php echo $data["data2"]["pdp"]->sembuh; ?></td>
                <td class="tg-0pky"><?php echo $data["data2"]["pdp"]->dirujuk; ?></td>
                <td class="tg-0pky"><?php echo $data["data2"]["pdp"]->aps; ?></td>
                <td class="tg-0pky"><?php echo $data["data2"]["pdp"]->alihrawat; ?></td>
                <td class="tg-0pky"><?php echo $data["data2"]["pdp"]->meninggal; ?></td>
              </tr>
              <tr>
                <td class="tg-0pky">CONFIRM</td>
                <td class="tg-0pky"><?php echo $data["data2"]["confirm"]->sembuh; ?></td>
                <td class="tg-0pky"><?php echo $data["data2"]["confirm"]->dirujuk; ?></td>
                <td class="tg-0pky"><?php echo $data["data2"]["confirm"]->aps; ?></td>
                <td class="tg-0pky"><?php echo $data["data2"]["confirm"]->alihrawat; ?></td>
                <td class="tg-0pky"><?php echo $data["data2"]["confirm"]->meninggal; ?></td>
              </tr>
            </tbody>
          </table>
          <hr>
          <h5>Total Pasien Covid-19 : </h5>
          <table class="tg" width="100%"  >
            <thead>
              <tr>
                <th class="tg-0pky">JENIS PASIEN</th>
                <th class="tg-0pky">MASIH DIRAWAT<br></th>
                <th class="tg-0pky">PERNAH DIRAWAT</th>
                <th class="tg-0pky">TOTAL</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="tg-btxf">ODP</td>
                <td class="tg-btxf"><?php echo $data["dirawat"]->odp; ?></td>
                <td class="tg-btxf"><?php echo $data["pernahdirawat"]->odp; ?></td>
                <td class="tg-btxf"><?php echo $data["dirawat"]->odp+$data["pernahdirawat"]->odp; ?></td>
              </tr>
              <tr>
                <td class="tg-0pky">PDP</td>
                <td class="tg-btxf"><?php echo $data["dirawat"]->pdp; ?></td>
                <td class="tg-btxf"><?php echo $data["pernahdirawat"]->pdp; ?></td>
                <td class="tg-btxf"><?php echo $data["dirawat"]->pdp+$data["pernahdirawat"]->pdp; ?></td>
              </tr>
              <tr>
                <td class="tg-btxf">CONFIRM</td>
                <td class="tg-btxf"><?php echo $data["dirawat"]->confirm; ?></td>
                <td class="tg-btxf"><?php echo $data["pernahdirawat"]->confirm; ?></td>
                <td class="tg-btxf"><?php echo $data["dirawat"]->confirm+$data["pernahdirawat"]->confirm; ?></td>
              </tr>
            </tbody>
          </table>
      </div>
      </div>
    </div>
  <?php endif; ?>
</div>
