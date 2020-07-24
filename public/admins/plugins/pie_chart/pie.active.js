
$(document).ready(function(){

	// Load google charts
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	// Draw the chart and set the chart values
	function drawChart() {
	
		var expanseArray = [];
		var array = $.ajax({
			url:window.location.href+'/'+'expanse/chart',
			async: false,
			dataType: 'json'
		}).responseJSON;

		$.each(array, function(key,arr){
			expanseArray.push(arr);
		})
		
	  	var data = google.visualization.arrayToDataTable(expanseArray);
	  	// Optional; add a title and set the width and height of the chart
	  	var options = {'title':'Expanses', 'width':600, 'height':300};
	  	// Display the chart inside the <div> element with id="piechart"
	  	var expanseChart = new google.visualization.PieChart(document.getElementById('expanse_chart'));
		  expanseChart.draw(data, options);
		  
		var incomeArray = [];
		var array = $.ajax({
			url:window.location.href+'/'+'incomes/chart',
			async: false,
			dataType: 'json'
		}).responseJSON;

		$.each(array, function(key,arr){
			incomeArray.push(arr);
		})
		
	  	var data = google.visualization.arrayToDataTable(incomeArray);
	  	// Optional; add a title and set the width and height of the chart
	  	var options = {'title':'Incomes', 'width':600, 'height':300};
	  	// Display the chart inside the <div> element with id="piechart"
	  	var incomeChart = new google.visualization.PieChart(document.getElementById('income_chart'));
	  	incomeChart.draw(data, options);
	}
});





