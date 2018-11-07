<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["SAP Business One", 90, "#b87333"],
        ["SageERP", 40, "silver"],
        ["Order Mobile", 30, "gold"],
        ["Employee Self-Service", 40, "color: #e5e4e2"],
        ["BI", 22, "color: #F5F5F5"],
        ["CRM", 30, "color: #D2B48C"],
        ["HRM", 12, "color: #C0C0C0"]
      ]);
      var data2 = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["SAP Business One", 75, "#b87333"],
        ["SageERP", 35, "silver"],
        ["Order Mobile", 29, "gold"],
        ["Employee Self-Service", 30, "color: #e5e4e2"],
        ["BI", 20, "color: #F5F5F5"],
        ["CRM", 19, "color: #D2B48C"],
        ["HRM", 10, "color: #C0C0C0"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
      var view2 = new google.visualization.DataView(data2);
      view2.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Incidents By Day (Previous Month)",
        width: "auto",
        height: 400,
        bar: {groupWidth: "90%"},
        legend: { position: "none" },
        chartArea:{
          top: 35,
        },
        backgroundColor : 'transparent',
      };
      var options2 = {
        title: "Incidents By Day (Current Month)",
        width: "auto",
        height: 400,
        bar: {groupWidth: "90%"},
        legend: { position: "none" },
        chartArea:{
          top: 35,
        },backgroundColor : 'transparent',
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values2"));
      chart.draw(view2, options2);
  }
  </script>