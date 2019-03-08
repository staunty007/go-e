am4core.useTheme(am4themes_animated);

var chart = am4core.create("customer_barchart", am4charts.XYChart);


chart.data = [{
    "Month": "Jan",
    "energy": 3025
}, {
    "Month": "Feb",
    "energy": 1882
}, {
    "Month": "Mar",
    "energy": 1809
}, {
    "Month": "Apr",
    "energy": 1322
}, {
    "Month": "May",
    "energy": 1122
}, {
    "Month": "Jun",
    "energy": 1114
}, {
    "Month": "Jul",
    "energy": 984
}, {
    "Month": "Aug",
    "energy": 711
}, {
    "Month": "Sep",
    "energy": 665
}, {
    "Month": "Oct",
    "energy": 580
}, {
    "Month": "South Korea",
    "energy": Nov
}, {
    "Month": "Canada",
    "energy": Dec
}];

chart.padding(40, 40, 40, 40);

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "Month";
categoryAxis.renderer.minGridDistance = 60;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryX = "Month";
series.dataFields.valueY = "energy";
series.tooltipText = "{valueY.value}"
series.columns.template.strokeOpacity = 0;

chart.cursor = new am4charts.XYCursor();

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function(fill, target) {
    return chart.colors.getIndex(target.dataItem.index);
});