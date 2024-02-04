(function($) {
    /* "use strict" */


 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
	//let draw = Chart.controllers.line.__super__.draw; //draw shadow
	
	var widgetChart1 = function(){
		if(jQuery('#widgetChart1').length > 0 ){
			const chart_widget_1 = document.getElementById("widgetChart1").getContext('2d');
			new Chart(chart_widget_1, {
				type: "line",
				data: {
					labels: ["January", "February", "March", "April", "May"],

					datasets: [{
						label: "Sales Stats",
						backgroundColor: ['rgba(19, 180, 151, 0.1)'],
						borderColor: '#13B497',
						pointBackgroundColor: '#13B497',
						pointBorderColor: '#13B497',
						borderWidth:4,
						borderRadius:10,
						pointHoverBackgroundColor: '#13B497',
						pointHoverBorderColor: '#13B497',
						tension:0.5,
						data: [0, 4, 2, 5, 6],
						fill:true,
					}]
				},
				options: {
					plugins:{
						legend: false,
					},
					title: {
						display: !1
					},
					tooltips: {
						intersect: !1,
						mode: "nearest",
						xPadding: 10,
						yPadding: 10,
						caretPadding: 10
					},
					
					legend: {
						display: !1
					},
					responsive: !0,
					maintainAspectRatio: !1,
					hover: {
						mode: "index"
					},
					scales: {
						x: {
							display: !1,
							grid: !1,
							scaleLabel: {
								display: !0,
								labelString: "Month"
							}
						},
						y: {
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Value"
							},
							ticks: {
								beginAtZero: !0
							}
						}
					},
					elements: {
						
						point: {
							radius: 0,
							borderWidth: 0
						}
					},
					layout: {
						padding: {
							left: 0,
							right: 0,
							top: 5,
							bottom: 0
						}
					}
				}
			});

		}
	}
	var widgetChart4 = function(){
		if(jQuery('#widgetChart4').length > 0 ){
			const chart_widget_1 = document.getElementById("widgetChart4").getContext('2d');
			new Chart(chart_widget_1, {
				type: "line",
				data: {
					labels: ["January", "February", "March", "April", "May"],

					datasets: [{
						label: "Sales Stats",
						backgroundColor: ['rgba(19, 180, 151, 0)'],
						borderColor: '#13B497',
						pointBackgroundColor: '#13B497',
						pointBorderColor: '#13B497',
						borderWidth:2,
						borderRadius:10,
						pointHoverBackgroundColor: '#13B497',
						pointHoverBorderColor: '#13B497',
						
						data: [0, 4, 2, 5, 6]
					}]
				},
				options: {
					title: {
						display: !1
					},
					tooltips: {
						intersect: !1,
						mode: "nearest",
						xPadding: 10,
						yPadding: 10,
						caretPadding: 10
					},
					
					legend: {
						display: !1
					},
					responsive: !0,
					maintainAspectRatio: !1,
					hover: {
						mode: "index"
					},
					scales: {
						x: {
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Month"
							}
						},
						y: {
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Value"
							},
							ticks: {
								beginAtZero: !0
							}
						}
					},
					elements: {
						line: {
							tension: .15,
						},
						point: {
							radius: 0,
							borderWidth: 0
						}
					},
					layout: {
						padding: {
							left: 0,
							right: 0,
							top: 5,
							bottom: 0
						}
					}
				}
			});

		}
	}
	var chartBar = function(){
		if(jQuery('#widgetChart2').length > 0 ){
	
			const widgetChart2 = document.getElementById("widgetChart2").getContext('2d');
			//generate gradient
			

			// widgetChart1.attr('height', '100');

			new Chart(widgetChart2, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec","Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
					datasets: [
						{
							label: "My First dataset",
							data: [15, 40, 55, 40, 25, 35, 40, 50, 85, 95, 54, 35,15, 40, 55, 40, 25, 35, 40, 50],
							borderColor: '#13B497',
							borderWidth: "0",
							backgroundColor: ['#13B497','#036C59','#13B497','#036C59','#13B497','#036C59','#13B497','#036C59','#13B497','#036C59','#13B497','#036C59','#13B497','#036C59','#13B497','#036C59','#13B497','#036C59','#13B497','#036C59',], 
							hoverBackgroundColor: '#13B497'
						}
					]
				},
				options: {
					plugins:{
						legend: false,
					},
					responsive: true, 
					maintainAspectRatio: false,  
					scales: {
						y: {
							display: false, 
							ticks: {
								beginAtZero: true, 
								display: false, 
								max: 100, 
								min: 0, 
								stepSize: 10
							}, 
							grid: {
								display: false, 
								drawBorder: false
							}
						},
						x: {
							display: false, 
							barPercentage: 0.4, 
							grid: {
								display: false, 
								drawBorder: false
							}, 
							ticks: {
								display: false
							}
						}
					}
				}
			});

		}
		
		
	}
	 var doughnutChart = function(){
		if(jQuery('#doughnut_chart').length > 0 ){
			
			function doughnutGridColor(){
				if ($('body').attr('data-theme-version') == 'dark') {
					//for dark
					return "#2f363e";
				}else{
					//for light
					return "#ffffff";
				}
			}
			//doughut chart
			const doughnut_chart = document.getElementById("doughnut_chart").getContext('2d');
			// doughnut_chart.height = 100;
			new Chart(doughnut_chart, {
				type: 'doughnut',
				data: {
					weight: 5,	
					defaultFontFamily: 'Poppins',
					datasets: [{
						data: [35, 25, 25,15],
						borderWidth: 5, 
						borderColor: doughnutGridColor(),
					
						backgroundColor: [
							"rgba(175, 54, 54, 1)",
							"rgba(60, 101, 245, 1)",
							"rgba(27, 211, 68, 1)",
							"rgba(255, 247, 66, 1)"
						],
						hoverBackgroundColor: [
							"rgba(175, 54, 54, 0.5)",
							"rgba(60, 101, 245, 0.5)",
							"rgba(27, 211, 68, 0.5)",
							"rgba(255, 247, 66, 0.5)"
						]

					}],
					// labels: [
					//     "green",
					//     "green",
					//     "green",
					//     "green"
					// ]
				},
				options: {
					weight: 1,	
					cutoutPercentage: 60,
					responsive: true,
					maintainAspectRatio: false
					
				}
			});
		}
	}
	
	var activity = function(){
		
		var optionsArea = {
          series: [{
            name: "Persent",
            data: [60, 70, 80, 50, 60, 90],
			
          },
		  {
            name: "Visitors",
            data: [40, 50, 40, 60, 90, 90],
			
          }
        ],
          chart: {
          height: 400,
          type: 'area',
		  group: 'social',
		 
		  toolbar: {
            show: false
          },
          zoom: {
            enabled: false
          },
        },
        dataLabels: {
          enabled: false,
		  
        },
        stroke: {
          width: [3, 3, 3],
		  colors:['var(--secondary)','var(--primary)'],
			curve: 'smooth',
        },
        legend: {
			show:false,
          tooltipHoverFormatter: function(val, opts) {
            return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
          },
		  markers: {
			fillColors:['var(--secondary)','var(--primary)'],
			width: 0,
			height: 0,
			strokeWidth: 0,
			radius: 16
		  }
        },
        markers: {
          size: [2,2],
		  strokeWidth: [4,4],
		  strokeColors: ['var(--secondary)','var(--primary)'],
		  border:2,
		  radius: 1,
		  colors:['#fff','#fff','#fff'],
          hover: {
            size: 6,
          }
        },
        xaxis: {
          categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
		  labels: {
		   style: {
			  colors: '#3E4954',
			  fontSize: '14px',
			   fontFamily: 'Poppins',
			  fontWeight: 100,
			  
			},
		  },
		  axisBorder:{
			  show: false,
		  }
        },
		yaxis: {
			labels: {
				minWidth: 20,
				offsetX:-16,
				style: {
				  colors: '#3E4954',
				  fontSize: '14px',
				  fontFamily: 'Poppins',
				  fontWeight: 100,
				  
				},
			},
		},
		fill: {
			colors:['#fff','#fff'],
			type:'gradient',
			opacity: 1,
			gradient: {
				shade:'light',
				shadeIntensity: 1,
				colorStops: [ 
				  [
					{
					  offset: 0,
					  color: '#fff',
					  opacity: 0
					},
					{
					  offset: 0.6,
					  color: 'var(--primary)',
					  opacity: 0
					},
					{
					  offset: 100,
					  color: 'var(--primary)',
					  opacity: 0
					}
				  ],
				  [
					{
					  offset: 0,
					  color: 'var(--primary)',
					  opacity: .4
					},
					{
					  offset: 50,
					  color: 'var(--primary)',
					  opacity: 0.25
					},
					{
					  offset: 100,
					  color: 'var(--primary)',
					  opacity: 0
					}
				  ]
				]

		  },
		},
		colors:['#1EA7C5','#FF9432'],
        grid: {
          borderColor: 'rgba(221, 221, 221,0.1)',
		  xaxis: {
            lines: {
              show: true
            }
          },
		  yaxis: {
            lines: {
              show: true
            }
          },
        },
		
		 responsive: [{
			breakpoint: 1602,
			options: {
				markers: {
					 size: [6,6,4],
					 hover: {
						size: 7,
					  }
				},chart: {
				height: 230,
				},	
			},
			
		 }]


        };
		if(jQuery("#activity").length > 0){

			var dzchart = new ApexCharts(document.querySelector("#activity"), optionsArea);
			dzchart.render();
            
            jQuery('#dzNewSeries').on('change',function(){
                jQuery(this).toggleClass('disabled');
                dzchart.toggleSeries('Persent');
            });
            
            jQuery('#dzOldSeries').on('change',function(){
                jQuery(this).toggleClass('disabled');
                dzchart.toggleSeries('Visitors');
            });
            
		}
      
	}
	var lineChart = function(){
		var optionsTimeline = {
			chart: {
				type: "bar",
				height: 350,
				stacked: true,
				toolbar: {
					show: false
				},
				sparkline: {
					//enabled: true
				},
				offsetX: 0,
			},
			series: [
				 {
					name: "New Clients",
					data: [180, 150, 200, 100, 80, 70, 40]
				}
			],
			
			plotOptions: {
				bar: {
					columnWidth: "25%",
					endingShape: "rounded",
					startingShape: "rounded",
					
					colors: {
						backgroundBarColors: ['#f0f5f2', '#f0f5f2', '#f0f5f2', '#f0f5f2','#f0f5f2','#f0f5f2','#f0f5f2','#f0f5f2'],
						backgroundBarOpacity: 1,
						backgroundBarRadius: 5,
					},

				},
				distributed: true
			},
			colors:['#13B497'],
			grid: {
				borderColor:'#f0f5f2'
			},
			legend: {
				show: false
			},
			fill: {
			  opacity: 1
			},
			dataLabels: {
				enabled: false,
				colors: ['#000'],
				dropShadow: {
				  enabled: true,
				  top: 1,
				  left: 1,
				  blur: 1,
				  opacity: 1
			  }
			},
			xaxis: {
			 categories: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
			  labels: {
			   style: {
				  colors: '#3e4954',
				  fontSize: '13px',
				  fontFamily: 'poppins',
				  fontWeight: 100,
				  cssClass: 'apexcharts-xaxis-label',
				},
			  },
			  crosshairs: {
				show: false,
			  },
			  axisBorder: {
				  show: false,
				},
			},
			
			y: {
				show: false
			},
			
			tooltip: {
				x: {
					show: true
				}
			}
		};
		var chartTimelineRender =  new ApexCharts(document.querySelector("#lineChart"), optionsTimeline);
		 chartTimelineRender.render();	
	}
	
	var lineChart4 = function(){
		//dual line chart
		if(jQuery('#lineChart_4').length > 0 ){
			const lineChart_4 = document.getElementById("lineChart_4").getContext('2d');
			//generate gradient
			const lineChart_4gradientStroke1 = lineChart_4.createLinearGradient(500, 0, 100, 0);
			lineChart_4gradientStroke1.addColorStop(0, "rgba(19, 180, 151, 1)");
			lineChart_4gradientStroke1.addColorStop(1, "rgba(19, 180, 151, 1)");

			const lineChart_4gradientStroke2 = lineChart_4.createLinearGradient(500, 0, 100, 0);
			lineChart_4gradientStroke2.addColorStop(0, "rgba(217, 183, 95, 1)");
			lineChart_4gradientStroke2.addColorStop(1, "rgba(217, 183, 95, 1)");

			// Chart.controllers.line = Chart.controllers.line.extend({
			// 	draw: function () {
			// 		draw.apply(this, arguments);
			// 		let nk = this.chart.chart.ctx;
			// 		let _stroke = nk.stroke;
			// 		nk.stroke = function () {
			// 			nk.save();
			// 			nk.shadowColor = 'rgba(19, 180, 151, .8)';
			// 			nk.shadowBlur = 10;
			// 			nk.shadowOffsetX = 0;
			// 			nk.shadowOffsetY = 0;
			// 			_stroke.apply(this, arguments)
			// 			nk.restore();
			// 		}
			// 	}
			// });
				
			lineChart_4.height = 100;

			new Chart(lineChart_4, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [0, 20, 60, 62, 50, 45, 65],
							borderColor: 'rgba(19, 180, 151, 1)',
							borderWidth: "2",
							backgroundColor: 'transparent', 
							pointBackgroundColor: 'rgba(54, 201, 95, 0.5)',
							tension:0.5,
						}, {
							label: "My First dataset",
							data: [30, 20, 20, 20, 35, 65, 45],
							borderColor: lineChart_4gradientStroke2,
							borderWidth: "2",
							backgroundColor: 'transparent', 
							pointBackgroundColor: 'rgba(254, 176, 25, 1)',
							tension:0.5,
						}
					]
				},
				options: {
					plugins: {
						legend:false,
					},
					title: {
						display: !1
					},
					tooltips: {
						intersect: !1,
						mode: "nearest",
						xPadding: 10,
						yPadding: 10,
						caretPadding: 10
					},
					
					legend: {
						display: !1
					},
					responsive: !0,
					maintainAspectRatio: !1,
					hover: {
						mode: "index"
					},
					scales: {
						x: {
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Month"
							}
						},
						y: {
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Value"
							},
							ticks: {
								beginAtZero: !0
							}
						}
					},
					elements: {
						point: {
							radius: 0,
							borderWidth: 0
						}
					},
					layout: {
						padding: {
							left: 0,
							right: 0,
							top: 5,
							bottom: 0
						}
					}
				}
			});
		}
	}
	/* Function ============ */
		return {
			init:function(){
				
			},
			
			
			load:function(){
				widgetChart1();
				widgetChart4();
				chartBar();
				doughnutChart();
				activity();
				lineChart();
				lineChart4();
				
			},
			
			resize:function(){
			}
		}
	
	}();

	jQuery(document).ready(function(){
	});
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 1000); 
		
	});

	jQuery(window).on('resize',function(){
		
		
	});     

})(jQuery);