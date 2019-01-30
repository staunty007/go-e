am4core.useTheme(am4themes_animated);

var chart = am4core.create("energy_consumption_by_meter", am4charts.PieChart3D);


chart.data = [{
    "Meter_type": "PostPaid",
    "customers": 321
}, {
    "Meter_type": "PrePaid",
    "customers": 805
}, {
    "Meter_type": "SMART",
    "customers": 253


}];

chart.innerRadius = am4core.percent(40);

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "customers";
series.dataFields.category = "Meter_type";