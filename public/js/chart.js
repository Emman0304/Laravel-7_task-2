google.charts.load('current', {'packages':['corechart']});

google.charts.setOnLoadCallback(drawPieChart);
google.charts.setOnLoadCallback(drawLineChart);

function drawPieChart()
{
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
    title : 'Percentage of Male and Female Students'
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
    chart.draw(data, options);
}

function drawLineChart() {
    var data = google.visualization.arrayToDataTable(application);
    var options = {
    title: 'Daily Student Application',
    hAxis: {title: 'Date'},
    vAxis: {title: 'No# of Students Application'},
    curveType: 'function',
    legend: 'none'
    };
    var chart = new google.visualization.LineChart(document.getElementById('linechart'));
    chart.draw(data, options);
}