am4core.useTheme(am4themes_animated);

var chart = am4core.create("income_bar", am4charts.XYChart);


chart.colors.saturation = 0.4;

chart.data = [{
    "Channels": "Web",
    "income": 3025
}, {
    "Channels": "Mobile",
    "income": 1882
}, {
    "Channels": "USSD",
    "income": 1809
}, {
    "Channels": "POS",
    "income": 1322
}, {
    "Channels": "mVisa",
    "income": 1122

}];


var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "Channels";
categoryAxis.renderer.minGridDistance = 20;

var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.maxLabelPosition = 0.98;

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryY = "Channels";
series.dataFields.valueX = "income";
series.tooltipText = "{valueX.value}";
series.sequencedInterpolation = true;
series.defaultState.transitionDuration = 1000;
series.sequencedInterpolationDelay = 100;
series.columns.template.strokeOpacity = 0;

chart.cursor = new am4charts.XYCursor();
chart.cursor.behavior = "zoomY";


// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function(fill, target) {
    return chart.colors.getIndex(target.dataItem.index);
});