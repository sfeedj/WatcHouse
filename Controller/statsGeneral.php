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
  data.addColumn('string', 'Pièce');
  data.addColumn('number', 'Kwh');
  data.addRows([
    ['Cuisine ', 3],
    ['Salon', 1],
    ['Chambre 1', 2],
    ['Chambre 2', 1],
    ['Garage', 4]
  ]);

  // Set chart options
  var options = {'title':'Consomation Electricité : Juin 2018',
  'width':470,
  'height':200};

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.visualization.BarChart(document.getElementById('chart_div_general'));
  chart.draw(data, options);
}
</script>
