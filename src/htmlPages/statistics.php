<div id="chartDiv1"></div>
<div id="chartDiv2"></div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
"use strict";
// Load the Visualization API and the piechart package.
google.load("visualization", "1.0", {"packages":["corechart"]});
// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
function drawChart()
{
    // Create the data table.
    var data = new google.visualization.DataTable();
    data.addColumn("string", "Name");
    data.addColumn("number", "Issues");
    data.addRows(
    [
        ["Closed", <?php echo $closedIssues; ?>],
        ["Open", <?php echo $openIssues ?>]
    ]);

    // Set chart options
    var options =
    {
        "title": <?php echo "\"Issues for month " . $thisMonth . "\","; ?>
        "width": 600,
        "height": 300
    };

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.BarChart(document.getElementById("chartDiv1"));
    chart.draw(data, options);

    // Second chart
    var data = new google.visualization.DataTable();
    data.addColumn("string", "Name");
    data.addColumn("number", "Issues");
    data.addRows(
    [
        ["Bug", <?php echo $totalBugs; ?>],
        ["Improvment", <?php echo $totalImprovments; ?>],
        ["Missing functionality", <?php echo $totalMissingFunctionalities; ?>]
    ]);

    var options =
    {
        "title": "Total of issues based on category, since the beginning of time",
        "width": 500,
        "height": 400
    };

    var chart = new google.visualization.PieChart(document.getElementById("chartDiv2"));
    chart.draw(data, options);
}
</script>
