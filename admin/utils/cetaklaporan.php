<?php
  session_start();
  if (isset($_SESSION['toprint'])) {
    $data = $_SESSION['toprint'];
    include '../library/mylib.php';
  }else{
?>
  <meta http-equiv="refresh" content="1;url=../index.php">
<?php
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Report</title>
    <link rel="stylesheet" href="table.css">
    <style>
      body {
          background: #fff;
      }
      .content {
        height: 842px;
        width: 895px;
        margin: auto;
        background: white;
        padding: 10px;
      }
      hr.style15 {
        border-top: 6px double #8c8b8b;
      }
    </style>
    <style type="text/css">
    .tg  {border-collapse:collapse;border-color:#ccc;border-spacing:0;}
    .tg td{background-color:#fff;border-color:#ccc;border-style:solid;border-width:1px;color:#333;
      font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 6px;word-break:normal;}
    .tg th{background-color:#f0f0f0;border-color:#ccc;border-style:solid;border-width:1px;color:#333;
      font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 6px;word-break:normal;}
    .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
    .tg .tg-btxf{background-color:#f9f9f9;border-color:inherit;text-align:left;vertical-align:top}
    </style>

  </head>
  <body>
    <?php if (isset($_SESSION['toprint'])): ?>
      <div class="content">
        <table width="100%" border="0">
          <tr>
            <td valign="bottom" rowspan="4"><img src="../../images/logo_bkl.png" height="100" width="100" alt=""></td>
            <td valign="bottom" colspan="3" style="padding-left:10px;">
              <h3 style="margin:2px;text-align:center">
                <b><u>PEMERINTAH KABUPATEN BANGKALAN</u></b>
              </h3>
              <h2 style="margin:2px;text-align:center">
                <b><u>RSUD SYARIFAH AMBAMI RATO EBU</u></b>
              </h2>
            </td>
            <td valign="bottom" rowspan="4"><img src="../../images/syamrabu.png" height="100" width="100" alt=""></td>
          </tr>
          <tr valign="top" style="padding-left:15px;">
            <td colspan="3" style="font-size:13px;text-align:center">Jl. Pemuda Kaffa No. 9 Telp.(031) 3091111 Fax.(031) 3094108</td>
          </tr>
          <tr valign="top" style="padding-left:15px;">
            <td colspan="3" style="font-size:13px;text-align:center">Website: www.rsabangkalan.com E-mail: rsudsyamrabu@bangkalan.go.id</td>
          </tr>
          <tr valign="top" style="padding-left:15px;">
            <td colspan="3" style="font-size:13px;text-align:center">BANGKALAN 69112</td>
          </tr>

        </table>
        <hr class="style15">
        <?php
          $date = date('Y-m-d');
        ?>
        <center><u><h2>LAPORAN PASIEN COVID-19</h2></u></center>
        <p>
          <table>
            <thead>
              <tr>
                <td>PERIODE</td>
                <td>:</td>
                <td><b><?php echo $data["periode"]; ?></b></td>
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
          <br>
          <hr>
          <h4>Pasien Yang Pernah Dirawat Di RS :</h4>
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
          <br>
          <hr>
          <h4>Total Pasien Covid-19 : </h4>
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
        </p>
        <br><br>
        <p style="font-size:15px;">Diakses : <b><u><?php echo tanggal_indo($date, true)?></u></b></p>

      </div>
    <?php endif; ?>
    <?php
      unset($_SESSION['toprint']);
    ?>
    <script type="text/javascript">
      window.onload = function() { window.print(); }
    </script>
  </body>
</html>
