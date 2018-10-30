$(function () {

    var lineData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [

            {
                label: "Active Current",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [28, 48, 40, 19, 86, 27, 90, 80, 45, 67, 45, 80., 67]
            },{
                label: "Reactive Current",
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                data: [65, 59, 80, 81, 56, 55, 40, 23, 56, 23, 56, 23, 90]
            }
        ]
    };

    var lineOptions = {
        responsive: true
    };


    var ctx = document.getElementById("income1").getContext("2d");
    new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

    var barData = {
        labels: [ "WEB", "MOBILE", "USSD", "POS",],
        datasets: [
            // {
            //     label: "PRE PAID",
            //     backgroundColor: 'rgba(220, 220, 220, 0.5)',
            //     pointBorderColor: "#fff",
            //     data: [65, 59, 80, 81, 56, 55, 40, 23, 56, 23, 56, 23, 90]
            // },
            {
                label: "",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(261,139,158,0.7)",
                pointBackgroundColor: "rgba(216,149,108,1)",
                pointBorderColor: "#fff",
                data: [28, 48, 40, 19,]
            }
            
            
            
        ]
    };

    var barOptions = {
        responsive: true
    };


    var ctx2 = document.getElementById("barChart").getContext("2d");
    new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});

    var polarData = {
        datasets: [{
            data: [
                300,140,200
            ],
            backgroundColor: [
                "#a3e1d4", "#dedede", "#b5b8cf"
            ],
            label: [
                "My Radar chart"
            ]
        }],
        labels: [
            "WEB","MOBILE","Laptop"
        ]
    };

    var polarOptions = {
        segmentStrokeWidth: 2,
        responsive: true

    };

    var ctx3 = document.getElementById("polarChart").getContext("2d");
    new Chart(ctx3, {type: 'polarArea', data: polarData, options:polarOptions});

    var doughnutData = {
        labels: ["WEB","MOBILE","USSD","POS" ],
        datasets: [{
            data: [300,50,100, 300],
            backgroundColor: ["#a3e1d4","#dedede","#b5b8cf", "#cc6600"]
        }]
    } ;


    var doughnutOptions = {
        responsive: true
    };


    var ctx4 = document.getElementById("doughnutChart").getContext("2d");
    new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});


    var radarData = {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [
            {
                label: "My First dataset",
                backgroundColor: "rgba(220,220,220,0.2)",
                borderColor: "rgba(220,220,220,1)",
                data: [65, 59, 90, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                backgroundColor: "rgba(26,179,148,0.2)",
                borderColor: "rgba(26,179,148,1)",
                data: [28, 48, 40, 19, 96, 27, 100]
            }
        ]
    };

    var radarOptions = {
        responsive: true
    };

    var ctx5 = document.getElementById("radarChart").getContext("2d");
    new Chart(ctx5, {type: 'radar', data: radarData, options:radarOptions});

});

function newFunction() {
    return "#b5b8cf";
}
