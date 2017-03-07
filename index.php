<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Author" content="Suphakit Annoppornchai">
    <title>MSTM - Single Tool Monitoring</title>
    <script type="text/javascript" charset="utf-8" src="js/jquery-1.11.3.js"></script>
    <script type="text/javascript" charset="utf-8" src="Highcharts-4.1.5/js/highcharts.js"></script>
    <script type="text/javascript" charset="utf-8" src="Highcharts-4.1.5/js/modules/exporting.js"></script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'container',
                    type: 'line',
                    marginRight: 130,
                    marginBottom: 25
                },
                title: {
                    text: 'Revenue vs. Overhead',
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Amount'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y;
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -10,
                    y: 100,
                    borderWidth: 0
                },
                series: []
            }
            
            $.getJSON('querydata.php', function(data) {          
                $.each(data, function(key,value) {
                    var series = { data: []};
                    $.each(value, function(key,val) {
                        if (key == 'name') {
                            series.name = val;
                        }
                        else
                        {
                            $.each(val, function(key,val) {
                                series.data.push([val[0],val[1]]);
                            });
                        }
                    });
                    options.series.push(series);
                });
            });
        });
    </script>
    
    

  </head>
  <body>
  	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
  </body>
</html>