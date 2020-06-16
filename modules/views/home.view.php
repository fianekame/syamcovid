<br>
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
          <div class="card-body">OTG <br> <h1><?php echo $data["datacount"]->confirm; ?></h1> </div>
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
      <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Perkembangan <?php echo $data["periode"]; ?></div>
      <div class="card-body">
        <div id="chartContainer4" style="height: 400px; width: 100%;"></div>
      </div>
    </div>
  </div>
</div>

<div class="row">

  <div class="col-lg-3">
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Jumlah Pasien Tiap Ruangan</div>
        <div class="card-body">
          <div id="chartContainerPasien" style="height: 300px; width: 100%;"></div>
        </div>
    </div>
  </div>

  <div class="col-lg-3">
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Status Pasien </div>
        <div class="card-body">
          <div id="chartContainer" style="height: 300px; width: 100%;"></div>
        </div>
    </div>
  </div>


  <div class="col-lg-3">
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Status Rawat</div>
        <div class="card-body">
          <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
        </div>
    </div>
  </div>

  <div class="col-lg-3">
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Status Rawat </div>
        <div class="card-body">
          <div id="chartContainer3" style="height: 300px; width: 100%;"></div>
        </div>
    </div>
  </div>
</div>

<script>
window.onload = function() {
var finaldata=<?php echo json_encode($data["finaldata"]); ?>;
var konf=<?php echo json_encode($data["konfirmasi"]); ?>;
var rawat=<?php echo json_encode($data["rawatcount"]); ?>;
var datanya=<?php echo json_encode($data["datacount"]); ?>;
var pasienruang=<?php echo json_encode($data["pasienruang"]); ?>;


var odrdata = finaldata.odr;
odrdata.forEach( obj => {
  obj.x = new Date(obj.x);
});

var odpdata = finaldata.odp;
odpdata.forEach( obj => {
  obj.x = new Date(obj.x);
});

var pdpdata = finaldata.pdp;
pdpdata.forEach( obj => {
  obj.x = new Date(obj.x);
});

var otgdata = finaldata.otg;
otgdata.forEach( obj => {
  obj.x = new Date(obj.x);
});

var confirmdata = finaldata.confirm;
confirmdata.forEach( obj => {
  obj.x = new Date(obj.x);
});

var totaldata = finaldata.total;
totaldata.forEach( obj => {
  obj.x = new Date(obj.x);
});



var chart = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	title: {
		text: "Status Pasien"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##\"(orang)\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: datanya.odr, label: "ODR"},
			{y: datanya.confirm, label: "CONFIRM"},
      {y: datanya.pdp, label: "PDP"},
			{y: datanya.otg, label: "OTG"},
      {y: datanya.odp, label: "ODP"}
		]
	}]
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	title: {
		text: "Status Rawat Pasien"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##\"(orang)\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: rawat.rj, label: "PULANG PAKSA"},
      {y: rawat.meninggal, label: "MENINGGAL"},
			{y: rawat.sembuh, label: "SEMBUH"},
      {y: rawat.md, label: "RAWAT INAP"}
		]
	}]
});
chart.render();
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Status Pasien Covid 19"
	},
	axisY: {
		title: "Jumlah Pasien(Orang)"
	},
	data: [{
		type: "column",
		dataPoints: [
			{ y: parseInt(konf.belum), label: "Belum Diketahui" },
			{ y: parseInt(konf.pos),  label: "Positif" },
      { y: parseInt(konf.neg),  label: "Negatif" }

		]
	}]
});
chart.render();

var chart = new CanvasJS.Chart("chartContainerPasien", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Pasien Pada Tiap Ruangan"
	},
	axisY: {
		title: "Jumlah Pasien(Orang)"
	},
	data: [{
		type: "column",
		dataPoints: [
			{ y: parseInt(pasienruang.igd), label: "IGD" },
      { y: parseInt(pasienruang.f),  label: "IRNA F" },
			{ y: parseInt(pasienruang.bbawah),  label: "IRNA B BAWAH" },
      { y: parseInt(pasienruang.b1),  label: "IRNA B 1" }

		]
	}]
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Grafik Perkembangan Kasus"
	},
	axisX:{
		valueFormatString: "DD MMM",
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	axisY: {
		title: "Number of Visits",
		crosshair: {
			enabled: true
		}
	},
	toolTip:{
		shared:true
	},
	legend:{
		cursor:"pointer",
		verticalAlign: "bottom",
		horizontalAlign: "left",
		dockInsidePlotArea: true,
		itemclick: toogleDataSeries
	},
	data: [{
		type: "line",
		showInLegend: true,
		name: "ODR",
    lineDashType: "dash",
		xValueFormatString: "DD MMM, YYYY",
		color: "#66bb6a",
		dataPoints: odrdata
	},
	{
		type: "line",
		showInLegend: true,
		name: "ODP",
		lineDashType: "dash",
    color: "#ffee58",
		dataPoints: odpdata
	},
  {
		type: "line",
		showInLegend: true,
		name: "PDP",
		lineDashType: "dash",
    color: "#ff8f00",
		dataPoints: pdpdata
	},
  {
		type: "line",
		showInLegend: true,
		name: "OTG",
		lineDashType: "dash",
    color: "#ff8f00",
		dataPoints: otgdata
	},
  {
    type: "line",
    showInLegend: true,
    name: "CONFIRM",
    lineDashType: "dash",
    color: "#bf360c",
    dataPoints: confirmdata
  },
  {
    type: "line",
    showInLegend: true,
    name: "TOTAL",
    lineDashType: "dash",
    color: "#212121",
    dataPoints: totaldata
  }]
});
chart.render();

function toogleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else{
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>
