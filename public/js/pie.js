am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv", am4charts.PieChart);


chart.data = [{
    "Eko_Disco": "Agbara",
    "District": 501.9
}, {
    "Eko_Disco": "Apapa",
    "District": 301.9
}, {
    "Eko_Disco": "Festac",
    "District": 201.1
}, {
    "Eko_Disco": "Ibeju",
    "District": 165.8
}, {
    "Eko_Disco": "Ijora",
    "District": 139.9
}, {
    "Eko_Disco": "Island",
    "District": 128.3
}, {
    "Eko_Disco": "lekki",
    "District": 99
}, {
    "Eko_Disco": "Mushin",
    "District": 60
}, {
    "Eko_Disco": "Ojo",
    "District": 50
}, {
    "Eko_Disco": "Orile",
    "District": 50
}];

var series = chart.series.push(new am4charts.PieSeries());
series.dataFields.value = "District";
series.dataFields.category = "Eko_Disco";

// this creates initial animation
series.hiddenState.properties.opacity = 1;
series.hiddenState.properties.endAngle = -90;
series.hiddenState.properties.startAngle = -90;

// chart.legend = new am4charts.Legend();