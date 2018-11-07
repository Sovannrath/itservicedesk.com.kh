<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'All incidents'],
          ['IT Service Desk',     70],
          ['BI',      15],
          ['Employee Self-Service',  17],
          ['Order Mobile', 12],
          ['HRM',    17],
          ['CRM',    28],
          ['SageERP',    25],
          ['SAP Business One',    15]
        ]);
        var data2 = google.visualization.arrayToDataTable([
          ['Tickets', 'All Department'],
          ['Procument',     70],
          ['Executive',      15],
          ['Human Resource',  17],
          ['IT Network', 12],
          ['Production',    17],
          ['Warehouse',    28],
          ['Sale & Distribution',    25],
          ['Finance & Accounting',    15]
        ]);

        var options = {
          chartArea: {width: '100%', height: '100%', left:10, top:50, bottom:50,},
          tooltip:{
            text: 'both', 
            textStyle: {fontSize: 10},
            },
          pieHole: 0.5,
          legend: {
            position: 'left',
          },
          pieSliceTextStyle:{
            fontSize: 10,
          },
          backgroundColor: 'transparent',
        };
        var options2 = {
          chartArea: {width: '100%', height: '100%', left:10, top:50, bottom:50,},
          tooltip:{
            text: 'both', 
            textStyle: {fontSize: 10},
            },
          pieHole: 0.5,
          legend: {
            position: 'left',
          },
          pieSliceTextStyle:{
            fontSize: 10,
          },
          backgroundColor: 'transparent',
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart1'));
        chart.draw(data, options);
        var chart2 = new google.visualization.PieChart(document.getElementById('donutchart2'));
        chart2.draw(data2, options2);
      }
    </script>