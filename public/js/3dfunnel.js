var chart = AmCharts.makeChart("funnel", {
    "type": "funnel",
    "theme": "light",
    "dataProvider": [{
        "title": "Bank to Bank",
        "value": 200
    }, {
        "title": "Debit Card",
        "value": 123
    }, {
        "title": "POS",
        "value": 98
    }, {
        "title": "USSD",
        "value": 72

    }, {
        "title": "QR",
        "value": 26
    }],
    "balloon": {
        "fixedPosition": true
    },
    "valueField": "value",
    "titleField": "title",
    "marginRight": 240,
    "marginLeft": 50,
    "startX": -500,
    "depth3D": 100,
    "angle": 40,
    "outlineAlpha": 1,
    "outlineColor": "#FFFFFF",
    "outlineThickness": 2,
    "labelPosition": "right",
    "balloonText": "[[title]]: [[value]]n[[description]]",
    "export": {
        "enabled": true
    }
});
jQuery('.chart-input').off().on('input change', function() {
    var property = jQuery(this).data('property');
    var target = chart;
    var value = Number(this.value);
    chart.startDuration = 0;

    if (property == 'innerRadius') {
        value += "%";
    }

    target[property] = value;
    chart.validateNow();
});