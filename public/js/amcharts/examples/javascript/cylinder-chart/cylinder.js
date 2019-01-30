am4core.useTheme(am4themes_animated);

var chart = am4core.create("income_bar", am4charts.XYChart3D);


chart.data = [{
    "Month": "Jan",
    "income": 3025
}, {
    "Month": "Feb",
    "income": 1882
}, {
    "Month": "Mar",
    "income": 1809
}, {
    "Month": "April",
    "income": 1322
}, {
    "Month": "May",
    "income": 1122
}, {
    "Month": "June",
    "income": 1114
}, {
    "Month": "July",
    "income": 984
}, {
    "Month": "August",
    "income": 711
}, {
    "Month": "September",
    "income": 665
}, {
    "Month": "October",
    "income": 580
}, {
    "Month": "November",
    "income": 443
}, {
    "Month": "December",
    "income": 441
}];

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "Month";
categoryAxis.renderer.minGridDistance = 60;
categoryAxis.renderer.grid.template.disabled = true;
categoryAxis.renderer.baseGrid.disabled = true;
categoryAxis.renderer.labels.template.dy = 20;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.grid.template.disabled = true;
valueAxis.renderer.baseGrid.disabled = true;
valueAxis.renderer.labels.template.disabled = true;
valueAxis.renderer.minWidth = 0;

var series = chart.series.push(new am4charts.ConeSeries());
series.dataFields.categoryX = "Month";
series.dataFields.valueY = "income";
series.columns.template.tooltipText = "{valueY.value}";
series.columns.template.tooltipY = 0;
series.columns.template.strokeOpacity = 1;

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function(fill, target) {
    return chart.colors.getIndex(target.dataItem.index);
});

series.columns.template.adapter.add("stroke", function(stroke, target) {
    return chart.colors.getIndex(target.dataItem.index);
});