<br>
<pre>
</pre>
<div class="row">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Status Rawat <?php echo $data["periode"]; ?></div>
      <div class="card-body">
        <div id="chartContainer" style="height: 700px; width: 100%;"></div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
window.onload = function () {
var datax=<?php echo json_encode($data["datax"]); ?>;
console.log(datax);
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Jumlah Pasien Berdasarkan Jenis Pasien Pada Setiap Ruangan"
	},
	axisY: {
		title: "Jumlah(Orang)"
	},
	legend: {
		cursor:"pointer",
		itemclick : toggleDataSeries
	},
	toolTip: {
		shared: true,
		content: toolTipFormatter
	},
	data: [{
		type: "bar",
		showInLegend: true,
		name: "ODR",
		color: "#28a745",
		dataPoints: datax.odr
	},
	{
		type: "bar",
		showInLegend: true,
		name: "ODP",
		color: "#007bff",
		dataPoints: datax.odp
	},
	{
		type: "bar",
		showInLegend: true,
		name: "PDP",
		color: "#ffc107",
		dataPoints: datax.pdp
	},
  {
		type: "bar",
		showInLegend: true,
		name: "OTG",
		color: "#ff7f50",
		dataPoints: datax.otg
	},
  {
		type: "bar",
		showInLegend: true,
		name: "CONFIRM",
		color: "#dc3545",
		dataPoints: datax.confirm
	},
]
});
chart.render();

function toolTipFormatter(e) {
	var str = "";
	var total = 0 ;
	var str3;
	var str2 ;
	for (var i = 0; i < e.entries.length; i++){
		var str1 = "<span style= \"color:"+e.entries[i].dataSeries.color + "\">" + e.entries[i].dataSeries.name + "</span>: <strong>"+  e.entries[i].dataPoint.y + "</strong> <br/>" ;
		total = e.entries[i].dataPoint.y + total;
		str = str.concat(str1);
	}
	str2 = "<strong>" + e.entries[0].dataPoint.label + "</strong> <br/>";
	str3 = "<span style = \"color:Tomato\">Total: </span><strong>" + total + "</strong><br/>";
	return (str2.concat(str)).concat(str3);
}

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>
