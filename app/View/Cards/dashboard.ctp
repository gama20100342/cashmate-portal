<?php ?>

<!--section class="content-header">
	<ol class="breadcrumb" >
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Dashboard</a></li>
	</ol>
</section><br/><br/-->

<div class="cards index col-md-12 p-t-20">

<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-green">
		<div class="inner">
			<h3>150</h3>
			
			<div>Total Active Cards</div>
			<div class="fs-8">As of June 19, 2018</div>
			
			
		</div>
		<div class="icon">
			<i class="fa fa-credit-card"></i>
		</div>
		<a href="#" class="small-box-footer">
			More info <i class="fa fa-arrow-circle-right"></i>
		</a>
	</div>
</div>

<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-green">
		<div class="inner">
			<h3>100</h3>
			<div>Total Active Accounts</div>
			<div class="fs-8">As of June 19, 2018</div>
		</div>
		<div class="icon">
			<i class="fa fa-credit-card"></i>
		</div>
		<a href="#" class="small-box-footer">
			More info <i class="fa fa-arrow-circle-right"></i>
		</a>
	</div>
</div>


<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-blue">
		<div class="inner">
			<h3>150,000.00</h3>
			<div>Total Purchase ( via Cash Card )</div>
			<div class="fs-8">As of June 19, 2018</div>
		</div>
		<div class="icon">
			<i class="fa fa-money"></i>
		</div>
		<a href="#" class="small-box-footer">
			More info <i class="fa fa-arrow-circle-right"></i>
		</a>
	</div>
</div>

<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-blue">
		<div class="inner">
			<h3>182,000.00</h3>
			<div>Total Cashout ( via Cash Card )</div>
			<div class="fs-8">As of June 19, 2018</div>
		</div>
		<div class="icon">
			<i class="fa fa-money"></i>
		</div>
		<a href="#" class="small-box-footer">
			More info <i class="fa fa-arrow-circle-right"></i>
		</a>
	</div>
</div>


<div class="clear"></div>
<div class="col-md-12 m-t-30 nopadding">
	<div class="col-md-6 nopadding-left">
		<div id="chartContainer"></div>
	</div>
	<div class="col-md-6 nopadding-right">
		<div id="chartContainer_"></div>
	</div>
	<div class="clear"></div>

</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
<div style="height: 430px;"></div>

<?php

	echo $this->Js->Buffer('
		window.onload = function () {
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			theme: "light2", // "light1", "light2", "dark1", "dark2"
			title:{
				text: "Card Registration & Activation"
			},
			axisY: {
				title: "2017"
			},
			data: [{        
				type: "column",  
				showInLegend: false, 
				legendMarkerColor: "grey",
				legendText: "MMbbl = one million barrels",
				dataPoints: [      
					{ y: 300878, label: "Jan" },
					{ y: 266455,  label: "Feb" },
					{ y: 169709,  label: "Mar" },
					{ y: 158400,  label: "Apr" },
					{ y: 142503,  label: "May" },
					{ y: 101500, label: "Jun" },
					{ y: 97800,  label: "Jul" },
					{ y: 80000,  label: "Aug" },
					{ y: 80000,  label: "Sep" },
					{ y: 80000,  label: "Oct" },
					{ y: 80000,  label: "Nov" },
					{ y: 80000,  label: "Dec" }
				]
			}]
		});
		chart.render();

	
		
		var chart = new CanvasJS.Chart("chartContainer_", {
			animationEnabled: true,
			theme: "light2", // "light1", "light2", "dark1", "dark2"
			title:{
				text: "Purchases for the Past Months"
			},
			axisY: {
				title: "2017"
			},
			data: [{        
				type: "line",       
				dataPoints: [
					{ y: 450 },
					{ y: 414},
					{ y: 520, indexLabel: "highest",markerColor: "red", markerType: "triangle" },
					{ y: 460 },
					{ y: 450 },
					{ y: 500 },
					{ y: 480 },
					{ y: 480 },
					{ y: 410 , indexLabel: "lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
					{ y: 500 },
					{ y: 480 },
					{ y: 510 }
				]
			}]
		});
		chart.render();

		}
		
	');
?>