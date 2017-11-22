/**
 * Created by mosaddek on 1/14/17.
 */
// basic line

$(function () {

    if($("#basic-line").length) {
        function visitorData(months, arrRevenue, newCom) {
            Highcharts.chart('basic-line', {
                title: {
                    text: 'Monthly Financials '+(new Date().getFullYear()),
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                    categories: months
                },
                yAxis: {
                    title: {
                        text: 'Amount'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: ''
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name: 'Revenue',
                    data: arrRevenue
                }, {
                    name: 'Profits',
                    data: newCom
                }]
            });
        }

        // financials data
        $.ajax({
            url: BaseUrl+'/index.php?r=rep/financials-data',
            type: 'GET',
            async: true,
            dataType: "json",
            success: function (data) {
                var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];                
                var arrRevenue = [];
                var arrCommissions = [];
                for(var key in months) {
                    var k = 0;
                    for(var com in data.revenue) {
                        if(months[key] == data.revenue[com].Month) {
                            arrRevenue[key] = parseFloat(data.revenue[com].revenue);
                            k = 1;
                        }else{
                            if(!k) arrRevenue[key] = 0;
                        }
                    } 
                    var j = 0;
                    for(var com in data.commissions) {
                        if(months[key] == data.commissions[com].Month) {
                            arrCommissions[key] = parseFloat(data.commissions[com].commission);
                            j = 1;
                        }else{
                            if(!j) arrCommissions[key] = 0;
                        }
                    }                
                }
                var newCom = [];
                for (var i = 0; i < arrRevenue.length; i++) {
                    newCom[i] = arrRevenue[i] - arrCommissions[i];
                } 
                visitorData(months, arrRevenue, newCom);
            }
        });
    }

});

// // area inverted

// $(function () {
//     Highcharts.chart('area-inverted', {
//         chart: {
//             type: 'area',
//             inverted: true
//         },
//         title: {
//             text: 'Average fruit consumption during one week'
//         },
//         subtitle: {
//             style: {
//                 position: 'absolute',
//                 right: '0px',
//                 bottom: '10px'
//             }
//         },
//         legend: {
//             layout: 'vertical',
//             align: 'right',
//             verticalAlign: 'top',
//             x: -150,
//             y: 100,
//             floating: true,
//             borderWidth: 1,
//             backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
//         },
//         xAxis: {
//             categories: [
//                 'Monday',
//                 'Tuesday',
//                 'Wednesday',
//                 'Thursday',
//                 'Friday',
//                 'Saturday',
//                 'Sunday'
//             ]
//         },
//         yAxis: {
//             title: {
//                 text: 'Number of units'
//             },
//             labels: {
//                 formatter: function () {
//                     return this.value;
//                 }
//             },
//             min: 0
//         },
//         plotOptions: {
//             area: {
//                 fillOpacity: 0.5
//             }
//         },
//         series: [{
//             name: 'John',
//             data: [3, 4, 3, 5, 4, 10, 12]
//         }, {
//             name: 'Jane',
//             data: [1, 3, 4, 3, 3, 5, 4]
//         }]
//     });
// });

// // bubble chart

// $(function () {
//     Highcharts.chart('bubble-chart', {

//         chart: {
//             type: 'bubble',
//             plotBorderWidth: 1,
//             zoomType: 'xy'
//         },

//         legend: {
//             enabled: false
//         },

//         title: {
//             text: 'Sugar and fat intake per country'
//         },

//         subtitle: {
//             text: 'Source: <a href="http://www.euromonitor.com/">Euromonitor</a> and <a href="https://data.oecd.org/">OECD</a>'
//         },

//         xAxis: {
//             gridLineWidth: 1,
//             title: {
//                 text: 'Daily fat intake'
//             },
//             labels: {
//                 format: '{value} gr'
//             },
//             plotLines: [{
//                 color: 'black',
//                 dashStyle: 'dot',
//                 width: 2,
//                 value: 65,
//                 label: {
//                     rotation: 0,
//                     y: 15,
//                     style: {
//                         fontStyle: 'italic'
//                     },
//                     text: 'Safe fat intake 65g/day'
//                 },
//                 zIndex: 3
//             }]
//         },

//         yAxis: {
//             startOnTick: false,
//             endOnTick: false,
//             title: {
//                 text: 'Daily sugar intake'
//             },
//             labels: {
//                 format: '{value} gr'
//             },
//             maxPadding: 0.2,
//             plotLines: [{
//                 color: 'black',
//                 dashStyle: 'dot',
//                 width: 2,
//                 value: 50,
//                 label: {
//                     align: 'right',
//                     style: {
//                         fontStyle: 'italic'
//                     },
//                     text: 'Safe sugar intake 50g/day',
//                     x: -10
//                 },
//                 zIndex: 3
//             }]
//         },

//         tooltip: {
//             useHTML: true,
//             headerFormat: '<table>',
//             pointFormat: '<tr><th colspan="2"><h3>{point.country}</h3></th></tr>' +
//             '<tr><th>Fat intake:</th><td>{point.x}g</td></tr>' +
//             '<tr><th>Sugar intake:</th><td>{point.y}g</td></tr>' +
//             '<tr><th>Obesity (adults):</th><td>{point.z}%</td></tr>',
//             footerFormat: '</table>',
//             followPointer: true
//         },

//         plotOptions: {
//             series: {
//                 dataLabels: {
//                     enabled: true,
//                     format: '{point.name}'
//                 }
//             }
//         },

//         series: [{
//             data: [
//                 { x: 95, y: 95, z: 13.8, name: 'BE', country: 'Belgium' },
//                 { x: 86.5, y: 102.9, z: 14.7, name: 'DE', country: 'Germany' },
//                 { x: 80.8, y: 91.5, z: 15.8, name: 'FI', country: 'Finland' },
//                 { x: 80.4, y: 102.5, z: 12, name: 'NL', country: 'Netherlands' },
//                 { x: 80.3, y: 86.1, z: 11.8, name: 'SE', country: 'Sweden' },
//                 { x: 78.4, y: 70.1, z: 16.6, name: 'ES', country: 'Spain' },
//                 { x: 74.2, y: 68.5, z: 14.5, name: 'FR', country: 'France' },
//                 { x: 73.5, y: 83.1, z: 10, name: 'NO', country: 'Norway' },
//                 { x: 71, y: 93.2, z: 24.7, name: 'UK', country: 'United Kingdom' },
//                 { x: 69.2, y: 57.6, z: 10.4, name: 'IT', country: 'Italy' },
//                 { x: 68.6, y: 20, z: 16, name: 'RU', country: 'Russia' },
//                 { x: 65.5, y: 126.4, z: 35.3, name: 'US', country: 'United States' },
//                 { x: 65.4, y: 50.8, z: 28.5, name: 'HU', country: 'Hungary' },
//                 { x: 63.4, y: 51.8, z: 15.4, name: 'PT', country: 'Portugal' },
//                 { x: 64, y: 82.9, z: 31.3, name: 'NZ', country: 'New Zealand' }
//             ]
//         }]

//     });
// });

// //polar chart

// $(function () {

//     Highcharts.chart('polar-chart', {

//         chart: {
//             polar: true
//         },

//         title: {
//             text: 'Highcharts Polar Chart'
//         },

//         pane: {
//             startAngle: 0,
//             endAngle: 360
//         },

//         xAxis: {
//             tickInterval: 45,
//             min: 0,
//             max: 360,
//             labels: {
//                 formatter: function () {
//                     return this.value + '°';
//                 }
//             }
//         },

//         yAxis: {
//             min: 0
//         },

//         plotOptions: {
//             series: {
//                 pointStart: 0,
//                 pointInterval: 45
//             },
//             column: {
//                 pointPadding: 0,
//                 groupPadding: 0
//             }
//         },

//         series: [{
//             type: 'column',
//             name: 'Column',
//             data: [8, 7, 6, 5, 4, 3, 2, 1],
//             pointPlacement: 'between'
//         }, {
//             type: 'line',
//             name: 'Line',
//             data: [1, 2, 3, 4, 5, 6, 7, 8]
//         }, {
//             type: 'area',
//             name: 'Area',
//             data: [1, 8, 2, 7, 3, 6, 4, 5]
//         }]
//     });
// });


// // box plot

// $(function () {
//     Highcharts.chart('box-plot', {

//         chart: {
//             type: 'boxplot'
//         },

//         title: {
//             text: 'Highcharts Box Plot Example'
//         },

//         legend: {
//             enabled: false
//         },

//         xAxis: {
//             categories: ['1', '2', '3', '4', '5'],
//             title: {
//                 text: 'Experiment No.'
//             }
//         },

//         yAxis: {
//             title: {
//                 text: 'Observations'
//             },
//             plotLines: [{
//                 value: 932,
//                 color: 'red',
//                 width: 1,
//                 label: {
//                     text: 'Theoretical mean: 932',
//                     align: 'center',
//                     style: {
//                         color: 'gray'
//                     }
//                 }
//             }]
//         },

//         series: [{
//             name: 'Observations',
//             data: [
//                 [760, 801, 848, 895, 965],
//                 [733, 853, 939, 980, 1080],
//                 [714, 762, 817, 870, 918],
//                 [724, 802, 806, 871, 950],
//                 [834, 836, 864, 882, 910]
//             ],
//             tooltip: {
//                 headerFormat: '<em>Experiment No {point.key}</em><br/>'
//             }
//         }, {
//             name: 'Outlier',
//             color: Highcharts.getOptions().colors[0],
//             type: 'scatter',
//             data: [ // x, y positions where 0 is the first category
//                 [0, 644],
//                 [4, 718],
//                 [4, 951],
//                 [4, 969]
//             ],
//             marker: {
//                 fillColor: 'white',
//                 lineWidth: 1,
//                 lineColor: Highcharts.getOptions().colors[0]
//             },
//             tooltip: {
//                 pointFormat: 'Observation: {point.y}'
//             }
//         }]

//     });
// });

