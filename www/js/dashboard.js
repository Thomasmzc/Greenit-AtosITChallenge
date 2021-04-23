/* Dashboard.js */

$(document).ready(function(){
/* Get first line datas */ 
	$.ajax({
	    url: "includes/traitement_GET_orgaAndEventView.php",
	    data: {
	    },
	    dataType: "json",
	    method: "post",
	    success: function(json) {
	      $.each(json, function(index, value){
	      	if(index == "200"){
	      		$('.insview-page').append(value[0]);
	      		$('.insview-event').append(value[1]);
	      	}
	      });
	    }
	 });
});


/* Chart.js */

// Age
var ctx = document.getElementById("myChart").getContext("2d");
ctx.height = 1000;
// draw empty chart
var myChart = new Chart(ctx, {
	type: 'horizontalBar',
	data: {
		labels: [],
		datasets: [{
			backgroundColor: 'rgba(230, 230, 230, 1)',
			data: [],
		}]
	},
	options: {
		responsive: true,
		maintainAspectRatio: false,
		legend: {
            display: false
        },
        scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
	}
});

ajax_chart(myChart);

function ajax_chart(chart, data) {
	var data = data || {};
	
	$.ajax({
	    url: "includes/traitement_GET_ageviewer.php",
	    data: {
	    },
	    dataType: "json",
	    method: "post",
	    success: function(json) {
	      	chart.data.labels = json[0];
			chart.data.datasets[0].data = json[1]; // or you can iterate for multiple datasets
			chart.update(); // finally update our chart
	    }
	  });
}

// engagements

var ctx2 = document.getElementById("myChart2").getContext("2d");
ctx2.height = 1000;
// draw empty chart
var myChart2 = new Chart(ctx2, {
	type: 'pie',
	data: {
		labels: [],
		datasets: [{
			data: [],
			backgroundColor: [
				"rgb(200,200,200)",
				"rgb(215,215,215)",
				"rgb(230,230,230)",
			]
		}]
	},
	options: {
		responsive: true,
		maintainAspectRatio: false,
		legend: {
            display: false
        }
	}
});

ajax_chart2(myChart2);

function ajax_chart2(chart, data) {
	var data = data || {};
	
	$.ajax({
	    url: "includes/traitement_GET_engagementviewer.php",
	    data: {
	    },
	    dataType: "json",
	    method: "post",
	    success: function(json) {
	      	chart.data.labels = json[0];
			chart.data.datasets[0].data = json[1]; // or you can iterate for multiple datasets
			chart.update(); // finally update our chart
	    }
	  });
}


// Interests 
// Age
var ctx = document.getElementById("myChart3").getContext("2d");
ctx.height = 1000;
// draw empty chart
var myChart = new Chart(ctx, {
	type: 'bar',
	data: {
		labels: [],
		datasets: [{
			backgroundColor: 'rgba(230, 230, 230, 1)',
			data: [],
		}]
	},
	options: {
		responsive: true,
		maintainAspectRatio: false,
		legend: {
            display: false
        },
        scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
	}
});

ajax_chart3(myChart);

function ajax_chart3(chart, data) {
	var data = data || {};
	
	$.ajax({
	    url: "includes/traitement_GET_interestviewer.php",
	    data: {
	    },
	    dataType: "json",
	    method: "post",
	    success: function(json) {
	      	chart.data.labels = json[0];
			chart.data.datasets[0].data = json[1]; // or you can iterate for multiple datasets
			chart.update(); // finally update our chart
	    }
	  });
}

$(document).ready(function(){
	/* Get third line datas */ 
	$e = 0;
	$.ajax({
	    url: "includes/traitement_GET_viewAndclickByEvent.php",
	    data: {
	    },
	    dataType: "json",
	    method: "post",
	    success: function(json) {
	    	$('.flexer-events').prepend("<div class='line-event headerlineevent'><div class='titleevent'><p>Event</p></div><div class='nbview'><p>Views</p></div><div class='nbclick'><p>Conversion</p></div></div>");
	      $.each(json, function(index, value){
	      	$('.flexer-events').append("<div class='line-event'><div class='titleevent'><p>"+value[0]+"</p></div><div class='nbview'><p>"+value[1]+"</p></div><div class='nbclick'><p>"+value[2]+"</p></div></div>");
	      	$e ++;
	      });
	    }
	});
	setTimeout(function(){
	if($e == 0){
		 $('.flexer-events').append("<div class='line-event'><p class='msgempty'>No view on any event, create your event !</p></div>"); 
	}
	}, 1000);
	
});
