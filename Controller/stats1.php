
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

// Load the Visualization API and the corechart package.
google.charts.load('current', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table,
// instantiates the chart, passes in the data and
// draws it.
function drawChart() {

  // Create the data table.
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Jour');
  data.addColumn('number', 'Kwh');
  data.addRows([
    ['Lundi ', 3],
    ['Mardi', 1],
    ['Mercredi', 2],
    ['Jeudi', 1],
    ['Vendredi', 2],
    ['Samedi', 4],
    ['Dimanche', 4]
  ]);

  // Set chart options
  var options = {'title':'Consomation Electricité',
  'width':600,
  'height':300};

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}
</script>
