

/**
 * c3 data
 */
c3.generate({
    bindto: '#lineChart',
    data:{
        columns: [
            ['data1', 30, 200, 100, 400, 150, 250],
            ['data2', 50, 20, 10, 40, 15, 25]
        ],
        colors:{
            data1: '#1ab394',
            data2: '#BABABA'
        }
    }
});

c3.generate({
    bindto: '#slineChart',
    data:{
        columns: [
            ['Web', 30, 200, 100, 400, 150, 250],
            ['Mcash', 39, 120, 120, 300, 250, 150],
            ['POS', 130, 100, 140, 200, 150, 50]
        ],
        colors:{
            data1: '#1ab394',
            data2: '#BABABA'
        },
        type: 'spline'
    }
});

c3.generate({
    bindto: '#scatter',
    data:{
        xs:{
            data1: 'data1_x',
            data2: 'data2_x'
        },
        columns: [
            ["data1_x", 3.2, 3.2, 3.1, 2.3, 2.8, 2.8, 3.3, 2.4, 2.9, 2.7, 2.0, 3.0, 2.2, 2.9, 2.9, 3.1, 3.0, 2.7, 2.2, 2.5, 3.2, 2.8, 2.5, 2.8, 2.9, 3.0, 2.8, 3.0, 2.9, 2.6, 2.4, 2.4, 2.7, 2.7, 3.0, 3.4, 3.1, 2.3, 3.0, 2.5, 2.6, 3.0, 2.6, 2.3, 2.7, 3.0, 2.9, 2.9, 2.5, 2.8],
            ["data2_x", 3.3, 2.7, 3.0, 2.9, 3.0, 3.0, 2.5, 2.9, 2.5, 3.6, 3.2, 2.7, 3.0, 2.5, 2.8, 3.2, 3.0, 3.8, 2.6, 2.2, 3.2, 2.8, 2.8, 2.7, 3.3, 3.2, 2.8, 3.0, 2.8, 3.0, 2.8, 3.8, 2.8, 2.8, 2.6, 3.0, 3.4, 3.1, 3.0, 3.1, 3.1, 3.1, 2.7, 3.2, 3.3, 3.0, 2.5, 3.0, 3.4, 3.0],
            ["data1", 1.4, 1.5, 1.5, 1.3, 1.5, 1.3, 1.6, 1.0, 1.3, 1.4, 1.0, 1.5, 1.0, 1.4, 1.3, 1.4, 1.5, 1.0, 1.5, 1.1, 1.8, 1.3, 1.5, 1.2, 1.3, 1.4, 1.4, 1.7, 1.5, 1.0, 1.1, 1.0, 1.2, 1.6, 1.5, 1.6, 1.5, 1.3, 1.3, 1.3, 1.2, 1.4, 1.2, 1.0, 1.3, 1.2, 1.3, 1.3, 1.1, 1.3],
            ["data2", 2.5, 1.9, 2.1, 1.8, 2.2, 2.1, 1.7, 1.8, 1.8, 2.5, 2.0, 1.9, 2.1, 2.0, 2.4, 2.3, 1.8, 2.2, 2.3, 1.5, 2.3, 2.0, 2.0, 1.8, 2.1, 1.8, 1.8, 1.8, 2.1, 1.6, 1.9, 2.0, 2.2, 1.5, 1.4, 2.3, 2.4, 1.8, 1.8, 2.1, 2.4, 2.3, 1.9, 2.3, 2.5, 2.3, 1.9, 2.0, 2.3, 1.8]
        ],
        colors:{
            data1: '#1ab394',
            data2: '#BABABA'
        },
        type: 'scatter'
    }
});

c3.generate({
    bindto: '#stocked',
    data:{
        columns: [
            ['data1', 30,200,100,400,150,250],
            ['data2', 50,20,10,40,15,25]
        ],
        colors:{
            data1: '#1ab394',
            data2: '#BABABA'
        },
        type: 'bar',
        groups: [
            ['data1', 'data2']
        ]
    }
});

c3.generate({
    bindto: '#gauge',
    data:{
        columns: [
            ['data', 91.4]
        ],

        type: 'gauge'
    },
    color:{
        pattern: ['#1ab394', '#BABABA']

    }
});

c3.generate({
    bindto: '#pie',
    data:{
        columns: [
            ['data1', 30],
            ['data2', 120]
        ],
        colors:{
            data1: '#1ab394',
            data2: '#BABABA'
        },
        type : 'pie'
    }
});

/**
 * footable
 */
$('.footable').footable();

$('#date_added').datepicker({
    todayBtn: "linked",
    keyboardNavigation: false,
    forceParse: false,
    calendarWeeks: true,
    autoclose: true
});

$('#date_modified').datepicker({
    todayBtn: "linked",
    keyboardNavigation: false,
    forceParse: false,
    calendarWeeks: true,
    autoclose: true
});

/**
 * Sparkline
 */
var sparklineCharts = function(){
    $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 52], {
        type: 'line',
        width: '100%',
        height: '50',
        lineColor: '#1ab394',
        fillColor: "transparent"
    });

    $("#sparkline2").sparkline([32, 11, 25, 37, 41, 32, 34, 42], {
        type: 'line',
        width: '100%',
        height: '50',
        lineColor: '#1ab394',
        fillColor: "transparent"
    });

    $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16,8], {
        type: 'line',
        width: '100%',
        height: '50',
        lineColor: '#1C84C6',
        fillColor: "transparent"
    });
};

var sparkResize;

$(window).resize(function(e) {
    clearTimeout(sparkResize);
    sparkResize = setTimeout(sparklineCharts, 500);
});

sparklineCharts();




var data1 = [
    [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,20],[11,10],[12,13],[13,4],[14,7],[15,8],[16,12]
];
var data2 = [
    [0,0],[1,2],[2,7],[3,4],[4,11],[5,4],[6,2],[7,5],[8,11],[9,5],[10,4],[11,1],[12,5],[13,2],[14,5],[15,2],[16,0]
];
$("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
            data1,  data2
        ],
        {
            series: {
                lines: {
                    show: false,
                    fill: true
                },
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 1,
                    fill: 0.4
                },
                points: {
                    radius: 0,
                    show: true
                },
                shadowSize: 2
            },
            grid: {
                hoverable: true,
                clickable: true,
                borderWidth: 2,
                color: 'transparent'
            },
            colors: ["#1ab394", "#1C84C6"],
            xaxis:{
            },
            yaxis: {
            },
            tooltip: false
        }
);
/**
 * Set Header for Payment Integration
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
/**
 * Payment Integration
 * Diamond Bank
 */
function topupWallet() {
    // let topupBtn = document.querySelector('#topUpBtn');
    let topupAmount = document.querySelector('#topup-amount').value;
    let agentDetails = JSON.parse(localStorage.getItem('ga_d'));
    

    fetch(`/diamond/debit/agent/${agentDetails.account_number}/${topupAmount}`)
    .then(res => res.json())
    .then(result => {
        let data = JSON.parse(result);
        if(data.successful == true) {
            Snackbar.show({
                text: 'Completing Transaction... Please Wait!',
                pos: 'top-right'
            }); 
            // Complete Agent Topup
            fetch(`complete/agent-topup/${topupAmount}`)
            .then(res => res.json())
            .then(callback => {
                if(callback.success !== '') {
                    Snackbar.show({
                        text: 'Transaction Completed..',
                        pos: 'top-right'
                    });
                    setTimeout(() => {
                        window.location.href="/home";
                    },2000);
                }else {
                    Snackbar.show({
                        text: callback,
                        pos: 'top-right'
                    });
                }
            })
            .catch(err => {
                Snackbar.show({
                    text: 'Something Went Wrong, Please Contact the Admin to complete your transaction',
                    pos: 'top-center'
                });
            })
        }else {
            alert(result);
        }
    })
    .catch(err => {
        console.log(err)
    })
    
}