<script src="{{ asset('js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('js/plugin/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<script src="{{ asset('js/plugin/moment/moment.min.js') }}"></script>
<script src="{{ asset('js/plugin/chartjs/Chart.min.js') }}"></script>

<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
<script src="{{ asset('js/plugin/flot/jquery.flot.cust.min.js') }}"></script>
<script src="{{ asset('js/plugin/flot/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('js/plugin/flot/jquery.flot.fillbetween.min.js') }}"></script>
<script src="{{ asset('js/plugin/flot/jquery.flot.orderBar.min.js') }}"></script>
<script src="{{ asset('js/plugin/flot/jquery.flot.pie.min.js') }}"></script>
<script src="{{ asset('js/plugin/flot/jquery.flot.time.min.js') }}"></script>
<script src="{{ asset('js/plugin/flot/jquery.flot.tooltip.min.js') }}"></script>

<script>
	pageSetUp();
	var PieConfig;
	/* flot chart colors default */
	var $chrt_border_color = "#efefef";
	var $chrt_grid_color = "#DDD"
	var $chrt_main = "#E24913";			/* red       */
	var $chrt_second = "#6595b4";		/* blue      */
	var $chrt_third = "#FF9F01";		/* orange    */
	var $chrt_fourth = "#7e9d3a";		/* green     */
	var $chrt_fifth = "#BD362F";		/* dark red  */
	var $chrt_mono = "#000";

	var pagefunction = function() {
		// clears the variable if left blank
		/* sales chart */
		var randomScalingFactor = function() {
		            return Math.round(Math.random() * 100);
		            //return 0;
		        };
		        var randomColorFactor = function() {
		            return Math.round(Math.random() * 255);
		        };
		        var randomColor = function(opacity) {
		            return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
		        };
		var myRandomNumber = function () {
			return ( Math.floor((Math.random() * 80) + 400) )
		}

		// bar chart example
        var barChartData = {
            datasets: [
            {label:"SAP Business One", backgroundColor: "#808080", data:[90] },
            {label:"SageERP", backgroundColor: "#FFA07A", data:[40] },
            {label:"Order Mobile", backgroundColor: "#778899", data:[30] },
            {label:"Employee Self-Service", backgroundColor: "#708090", data:[40] }, 
            {label:"BI", backgroundColor: "#F5F5F5", data: [22] },
            {
            label:"CRM", backgroundColor: "#D2B48C", data: [30]
            },
            {
            label:"HRM", backgroundColor: "#C0C0C0", data: [12]
            }]
        };
        var barChartData2 = {
            datasets: [
            {label:"SAP Business One", backgroundColor: "#808080", data:[90] },
            {label:"SageERP", backgroundColor: "#FFA07A", data:[40] },
            {label:"Order Mobile", backgroundColor: "#778899", data:[30] },
            {label:"Employee Self-Service", backgroundColor: "#708090", data:[40] }, 
            {label:"BI", backgroundColor: "#F5F5F5", data: [22] },
            {
            label:"CRM", backgroundColor: "#D2B48C", data: [30]
            },
            {
            label:"HRM", backgroundColor: "#C0C0C0", data: [12]
            }]
        };
        var DoughtnutConfig2 = {
			        type: 'doughnut',
			        data: {
			            datasets: [{
			                data: [
			                    50,80,50,76,20,30,23,10
			                ],
			                backgroundColor: [
			                    "#F7464A",
			                    "#46BFBD",
			                    "#FDB45C",
			                    "#949FB1",
			                    "#4D5360",
			                    "#4D5390",
			                    "#4D5400",
			                    "#4D5590",
			                ],
			            }],
			            labels: [
			                "Procument",
			                "Executive",
			                "Human Resource",
			                "IT Network",
			                "Production",
			                "Warehouse",
			                "Sale & Distribution",
			                "Finance & Accounting",
			            ]
			        },
			        options: {
			            responsive: true,
			            title: {
			                    	display: true,
			                    	text: 'Incidents By Application',
			                    	position: 'bottom',
			                    	fontSize: 20,
			                    }, 
			            legend: {
			                position: 'left',
			                labels: {
			                boxWidth:20,
			            	}
			            }
			        }
			    };
			    var DoughtnutConfig = {
			        type: 'doughnut',
			        data: {
			            datasets: [{
			                data: [
			                    150,80,50,76,20,40,33,9,
			                ],
			                backgroundColor: [
			                    "#F7464A",
			                    "#46BFBD",
			                    "#FDB45C",
			                    "#949FB1",
			                    "#4D5360",
			                    "#5D5360",
			                    "#6D5360",
			                    "#7D5360",
			                ],
			            }],
			            labels: [
			                "IT Service Desk",
			                "BI",
			                "Employee Self-Service",
			                "Order Mobile",
			                "HRM",
			                "CRM",
			                "SageERP",
			                "SAP Business One"
			            ]
			        },
			        options: {
			            responsive: true,
			            title: {
			                    	display: true,
			                    	text: 'Incidents By Application',
			                    	position: 'bottom',
			                    	fontSize: 20,
			                    }, 
			            legend: {
			                position: 'left',
			                labels: {
			                boxWidth:20,
			            	}
			            }
			        }
			    };

		var randomScalingFactor = function() {
						return Math.round(Math.random() * 100);
						//return 0;
				};
		/*
		 * VECTOR MAP
		 */
		data_array = {
				"US": 4977,
				"AU": 4873,
				"IN": 3671,
				"BR": 2476,
				"TR": 1476,
				"CN": 146,
				"CA": 134,
				"BD": 100
		};

		function renderVectorMap() {
				$('#vector-map').vectorMap({
						map: 'world_mill_en',
						backgroundColor: '#fff',
						regionStyle: {
								initial: {
										fill: '#c4c4c4'
								},
								hover: {
										"fill-opacity": 1
								}
						},
						series: {
								regions: [{
										values: data_array,
										scale: ['#85a8b6', '#4d7686'],
										normalizeFunction: 'polynomial'
								}]
						},
						onRegionLabelShow: function (e, el, code) {
								if (typeof data_array[code] == 'undefined') {
										e.preventDefault();
								} else {
										var countrylbl = data_array[code];
										el.html(el.html() + ': ' + countrylbl + ' visits');
								}
						}
				});
		}

		function renderPie(){

				// pie chart example
				PieConfig = {
						type: 'pie',
						data: {
								datasets: [{
										data: [
												randomScalingFactor(),
												randomScalingFactor(),
												randomScalingFactor(),
												randomScalingFactor(),
												randomScalingFactor(),
										],
										backgroundColor: [
												"#E24913",
												"#FF9F01",
												"#FFD700",
												"#ccff33",
												"#33cc33",
										],
								}],
								labels: [
										"Open",
										"In Process",
										"Pending",
										"In Progress",
										"Closed"
								]
						},
						options: {
								responsive: true,
								title: {
			                    	display: true,
			                    	text: 'Incidents By Departments',
			                    },
		                    	legend: {
					                position: 'left',
					            }
						}
				};
			myPie = new Chart(document.getElementById("pieChart"), PieConfig);
		}
		// window.onload = function() {
  //           //window.myLine = new Chart(document.getElementById("lineChart"), LineConfig);
  //           window.myBar = new Chart(document.getElementById("barChart_previous"), {
  //               type: 'bar',
  //               data: barChartData,
  //               options: {
  //                   responsive: true,
	 //                    title: {
	 //                    	display: true,
	 //                    	text: 'Incidents By Day (Previous Month)',
	 //                    	position: 'top',
		// 	                fontSize: 20,
	 //                    },
		// 	            legend: {
		// 	            	position: 'bottom',
		// 	            	labels: {
		// 	                boxWidth:20,
		// 	            }
  //               	}
  //           	}
  //           });
  //           window.myBar = new Chart(document.getElementById("barChart_current"), {
  //               type: 'bar',
  //               data: barChartData2,
  //               options: {
  //                   responsive: true,
  //                   title: {
	 //                    	display: true,
	 //                    	text: 'Incidents By Day (Current Month)',
	 //                    	position: 'top',
		// 	                fontSize: 20,
	 //                    },
  //                   legend: {
		// 	                position: 'bottom',
		// 	                labels: {
		// 	                boxWidth:20,
		// 	            }
		// 	        }
  //               }
  //           });
  //           //window.myRadar = new Chart(document.getElementById("radarChart"), RadarConfig);
		// 	//window.myDoughnut = new Chart(document.getElementById("doughnutChart"), DoughtnutConfig);
		 	window.myDoughnut = new Chart(document.getElementById("doughnutChart2"), DoughtnutConfig2);
		// 	//window.myPolarArea = Chart.PolarArea(document.getElementById("polarChart"), PolarConfig);
		// 	//window.myPie = new Chart(document.getElementById("pieChart"), PieConfig);
  //       };
		// renderVectorMap();
		//renderPie();
		// saleschart();
		// linechart();
	};
	pagefunction();
</script>
