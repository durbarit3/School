// var data = {
//     labels: ["January", "February", "March", "April", "May", "June", "July"],
//     datasets: [
//         {
//             label: "My First dataset",
//             fillColor: "#cce6ff",
//             strokeColor: "rgba(220,220,220,0.8)",
//             highlightFill: "rgba(220,220,220,0.75)",
//             highlightStroke: "rgba(220,220,220,1)",
//             data: [65, 59, 80, 81, 56, 55, 40]
//         },
//         {
//             label: "My Second dataset",
//             fillColor: "#66b3ff",
//             strokeColor: "rgba(151,187,205,0.8)",
//             highlightFill: "rgba(151,187,205,0.75)",
//             highlightStroke: "rgba(151,187,205,1)",
//             data: [28, 48, 40, 19, 86, 27, 90]
//         }
//     ]
// };

// var options = {
//   scaleFontColor: "black"
// };

// var ctx = document.getElementById("bar-canvas").getContext("2d");
// var myBarChart = new Chart(ctx).Bar(data, options);
var monthLists = [
    'January', 'February', 'March', 'April','May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
];

var date = new Date();
var ctx = document.getElementById('bar-canvas').getContext('2d');
var config = {
    type: 'bar',
    data: {
        labels: ['Expanse', 'Income', 'Fees', 'Salary' ],
        datasets: [{
            label: 'Ration bar',
            data: [],
            backgroundColor: [
                'rgba(216, 27, 96, 0.6)',
                'rgba(3, 169, 244, 0.6)',
                'rgba(255, 152, 0, 0.6)',
                'rgba(29, 233, 182, 0.6)',
                'rgba(156, 39, 176, 0.6)',
                'rgba(84, 110, 122, 0.6)'
            ],
            borderColor: [
                'rgba(216, 27, 96, 1)',
                'rgba(3, 169, 244, 1)',
                'rgba(255, 152, 0, 1)',
                'rgba(29, 233, 182, 1)',
                'rgba(156, 39, 176, 1)',
                'rgba(84, 110, 122, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        legend: {
            display: true
        },
        title: {
            display: true,
            text: 'School Financial Ratio of '+ monthLists[date.getMonth()]+' '+date.getFullYear(),
            position: 'top',
            fontSize: 30,
            padding: 20
        },
        scales: {
            yAxes: [{
                ticks: {
                    min: 1000
                }
            }]
        }
    }
}

//console.log(config.data.datasets[0].data);
var array = $.ajax({
    url:window.location.href+'/'+'financial/report',
    async: false,
    dataType: 'json'
}).responseJSON;

array.forEach(function(arr){
    config.data.datasets[0].data.push(arr);
});

var myChart = new Chart(ctx, config);