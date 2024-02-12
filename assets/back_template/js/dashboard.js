// Bar Chart
am4core.ready(function() {

  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end
  
  var chart = am4core.create("chart1", am4charts.XYChart);
  chart.padding(40, 40, 40, 40);
  
  var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
  categoryAxis.renderer.grid.template.location = 0;
  categoryAxis.dataFields.category = "network";
  categoryAxis.renderer.minGridDistance = 1;
  categoryAxis.renderer.inversed = true;
  categoryAxis.renderer.grid.template.disabled = true;
  
  var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
  valueAxis.min = 0;
  
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.dataFields.categoryY = "network";
  series.dataFields.valueX = "MAU";
  series.tooltipText = "{valueX.value}"
  series.columns.template.strokeOpacity = 0;
  series.columns.template.column.cornerRadiusBottomRight = 5;
  series.columns.template.column.cornerRadiusTopRight = 5;
  
  var labelBullet = series.bullets.push(new am4charts.LabelBullet())
  labelBullet.label.horizontalCenter = "left";
  labelBullet.label.dx = 10;
  labelBullet.label.text = "{values.valueX.workingValue.formatNumber('#.0as')}";
  labelBullet.locationX = 1;
  
  // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
  series.columns.template.adapter.add("fill", function(fill, target){
    return chart.colors.getIndex(target.dataItem.index);
  });
  
  categoryAxis.sortBySeries = series;
  chart.data = [
      {
        "network": "Hardware",
        "MAU": 30
      },
      {
        "network": "Software",
        "MAU": 40
      },
      {
        "network": "Network",
        "MAU": 20
      },
    ]
  
  }); // end am4core.ready()

am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end
    
    var chart = am4core.create("chart2", am4charts.XYChart);
    chart.padding(40, 40, 40, 40);
    
    var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.dataFields.category = "network";
    categoryAxis.renderer.minGridDistance = 1;
    categoryAxis.renderer.inversed = true;
    categoryAxis.renderer.grid.template.disabled = true;
    
    var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
    valueAxis.min = 0;
    
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.categoryY = "network";
    series.dataFields.valueX = "MAU";
    series.tooltipText = "{valueX.value}"
    series.columns.template.strokeOpacity = 0;
    series.columns.template.column.cornerRadiusBottomRight = 5;
    series.columns.template.column.cornerRadiusTopRight = 5;
    
    var labelBullet = series.bullets.push(new am4charts.LabelBullet())
    labelBullet.label.horizontalCenter = "left";
    labelBullet.label.dx = 10;
    labelBullet.label.text = "{values.valueX.workingValue.formatNumber('#.0as')}";
    labelBullet.locationX = 1;
    
    // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
    series.columns.template.adapter.add("fill", function(fill, target){
      return chart.colors.getIndex(target.dataItem.index);
    });
    
    categoryAxis.sortBySeries = series;
    chart.data = [
        {
          "network": "Request Vicon",
          "MAU": 30
        },
        {
          "network": "Request Data",
          "MAU": 40
        },
      ]
    
    }); // end am4core.ready()

// Pie Chart
am4core.ready(function() {
  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end
  
  // Create chart instance
  var chart = am4core.create("piechart1", am4charts.PieChart);
  
  // Add data
  chart.data = [ {
    "ticket": "Ticket Solved",
    "total": 200
  }, {
    "ticket": "Ticket Unsolved",
    "total": 150
  },
  ];
  
  // Add and configure Series
  var pieSeries = chart.series.push(new am4charts.PieSeries());
  pieSeries.dataFields.value = "total";
  pieSeries.dataFields.category = "ticket";
  pieSeries.slices.template.stroke = am4core.color("#fff");
  pieSeries.slices.template.strokeOpacity = 1;
  
  // This creates initial animation
  pieSeries.hiddenState.properties.opacity = 1;
  pieSeries.hiddenState.properties.endAngle = -90;
  pieSeries.hiddenState.properties.startAngle = -90;
  
  chart.hiddenState.properties.radius = am4core.percent(0);
  
  
  }); // end am4core.ready()

am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("piechart2", am4charts.PieChart);

// Add data
chart.data = [ {
"ticket": "Ticket Solved By It",
"total": 100
}, {
"ticket": "Self Solved",
"total": 25
},
];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "total";
pieSeries.dataFields.category = "ticket";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

chart.hiddenState.properties.radius = am4core.percent(0);


}); // end am4core.ready()

// Line Chart
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("linechart", am4charts.XYChart);
chart.paddingRight = 20;

// Add data
chart.data = [{
"Day": "Sun",
"value": 0
}, {
"Day": "Mon",
"value": 2
}, {
"Day": "Tue",
"value": 5
}, {
"Day": "Wed",
"value": 20
}, {
"Day": "Thr",
"value": 30
}, {
"Day": "Fri",
"value": -20
}, {
"Day": "Sat",
"value": -5
}];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "Day";
categoryAxis.renderer.minGridDistance = 50;
categoryAxis.renderer.grid.template.location = 0.5;
categoryAxis.startLocation = 0.5;
categoryAxis.endLocation = 0.5;

// Create value axis
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.baseValue = 0;

// Create series
var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.valueY = "value";
series.dataFields.categoryX = "Day";
series.strokeWidth = 2;
series.tensionX = 0.77;

// bullet is added because we add tooltip to a bullet for it to change color
var bullet = series.bullets.push(new am4charts.Bullet());
bullet.tooltipText = "{valueY}";

bullet.adapter.add("fill", function(fill, target){
  if(target.dataItem.valueY < 0){
      return am4core.color("#FF0000");
  }
  return fill;
})
var range = valueAxis.createSeriesRange(series);
range.value = 0;
range.endValue = -1000;
range.contents.stroke = am4core.color("#FF0000");
range.contents.fill = range.contents.stroke;

// Add scrollbar
var scrollbarX = new am4charts.XYChartScrollbar();
scrollbarX.series.push(series);
chart.scrollbarX = scrollbarX;

chart.cursor = new am4charts.XYCursor();

}); // end am4core.ready()