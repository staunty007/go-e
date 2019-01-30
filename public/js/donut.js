am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv1", am4charts.PieChart);


chart.data = [{
    "income": "EKEDC",
    "value": 401
}, {
    "income": "IKEDC",
    "value": 300
}, {
    "income": "AEDC",
    "value": 200
}, {
    "income": "BEDC",
    "value": 165
}, {
    "income": "EEDC",
    "value": 139
}, {
    "income": "PHEDC",
    "value": 128
}];

chart.innerRadius = am4core.percent(50);

var series = chart.series.push(new am4charts.PieSeries());
series.dataFields.value = "value";
series.dataFields.category = "income";

series.slices.template.cornerRadius = 10;
series.slices.template.innerCornerRadius = 7;

// this creates initial animation
series.hiddenState.properties.opacity = 1;
series.hiddenState.properties.endAngle = -90;
series.hiddenState.properties.startAngle = -90;

//chart.legend = new am4charts.Legend();