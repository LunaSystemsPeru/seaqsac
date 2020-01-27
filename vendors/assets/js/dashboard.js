(function ($) {
    'use strict';
    $(function () {
        if ($('#dashboard-area-chart').length) {
            $.getJSON("../../data/dashboard/ver_movimientos_mensuales.php?tipo_reporte=1", function (result) {
                var label = Array();
                var data_ingresos = Array();
                var data_egresos = Array();
                $.each(result, function (key, val) {
                    label[key] = val.nombre;
                    data_ingresos[key] = val.ingresa;
                    data_egresos[key] = val.egresa;
                });


                var lineChartCanvas = $("#dashboard-area-chart").get(0).getContext("2d");
                var data = {
                    labels: label,
                    datasets: [
                        {
                            label: 'Egresos',
                            data: data_egresos,
                            backgroundColor: '#19d895',
                            borderColor: '#15b67d',
                            borderWidth: 1,
                            fill: false
                        },
                        {
                            label: 'Ingresos',
                            data: data_ingresos,
                            backgroundColor: '#2196f3',
                            borderColor: '#0c83e2',
                            borderWidth: 1,
                            fill: false
                        }
                    ]
                };
                var options = {
                    responsive: true,
                    maintainAspectRatio: true,
                    scales: {
                        yAxes: [{
                            gridLines: {
                                color: "#F2F6F9"
                            },
                            ticks: {
                                beginAtZero: true,
                                min: 0,
                                //max: 20,
                                //stepSize: 5,
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                color: "#F2F6F9"
                            },
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                    elements: {
                        point: {
                            radius: 2
                        }
                    },
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 0,
                            bottom: 0
                        }
                    },
                    stepsize: 1
                };
                var lineChart = new Chart(lineChartCanvas, {
                    type: 'line',
                    data: data,
                    options: options
                });
            });
        }
        ;

        if ($("#market-overview-chart").length) {
            $.getJSON("../../data/dashboard/ver_cotizaciones_mensuales.php?tipo_reporte=1", function (result) {
                var label = Array();
                var data_aprobados = Array();
                var data_emitidos = Array();
                $.each(result, function (key, val) {
                    label[key] = val.nombre;
                    data_emitidos[key] = val.contar_emitidas;
                    data_aprobados[key] = val.contar_aprobadas;
                });

                console.log(data_emitidos);
                var MarketingChartCanvas = $("#market-overview-chart").get(0).getContext("2d");

                var MarketingChart = new Chart(MarketingChartCanvas, {
                    type: 'bar',
                    data: {
                        labels: label,
                        datasets: [
                            {
                                label: 'APROBADOS',
                                data: data_aprobados,
                                backgroundColor: '#826af9',
                                borderColor: '#826af9',
                                borderWidth: 0
                            },
                            {
                                label: 'EMITIDOS',
                                data: data_emitidos,
                                backgroundColor: '#bef1ff',
                                borderColor: '#bef1ff',
                                borderWidth: 0
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        layout: {
                            padding: {
                                left: 0,
                                right: 0,
                                top: 20,
                                bottom: 0
                            }
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    display: true,
                                    beginAtZero: true,
                                },
                                gridLines: {
                                    display: false,
                               //     color: chartGridLineColor,
                                //    zeroLineColor: chartGridLineColor
                                }
                            }],
                            xAxes: [{
                                stacked: true,
                                ticks: {
                                    beginAtZero: true,
                                  //  color: chartGridLineColor,
                                   // zeroLineColor: chartGridLineColor
                                },
                                gridLines: {
                                    display: true,
                                //    color: chartGridLineColor,
                                 //   zeroLineColor: chartGridLineColor
                                },
                                barPercentage: 0.2
                            }]
                        },
                        legend: {
                            display: false
                        },
                        elements: {
                            point: {
                                radius: 0
                            }
                        }
                    }
                });

            })
        };
        if ($("#chart_cotizaciones_montos").length) {
            $.getJSON("../../data/dashboard/ver_cotizaciones_mensuales.php?tipo_reporte=2", function (result) {
                var label = Array();
                var data_aprobados = Array();
                var data_emitidos = Array();
                $.each(result, function (key, val) {
                    label[key] = val.nombre;
                    data_emitidos[key] = formatNumber(val.contar_emitidas);
                    data_aprobados[key] = formatNumber(val.contar_aprobadas);
                });

                var MarketingChartCanvas = $("#chart_cotizaciones_montos").get(0).getContext("2d");

                var MarketingChart = new Chart(MarketingChartCanvas, {
                    type: 'bar',
                    data: {
                        labels: label,
                        datasets: [
                            {
                                label: 'APROBADOS',
                                data: data_aprobados,
                                backgroundColor: '#f91c47',
                                borderColor: '#f91c47',
                                borderWidth: 0
                            },
                            {
                                label: 'EMITIDOS',
                                data: data_emitidos,
                                backgroundColor: '#425dff',
                                borderColor: '#425dff',
                                borderWidth: 0
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        layout: {
                            padding: {
                                left: 0,
                                right: 0,
                                top: 20,
                                bottom: 0
                            }
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    display: true,
                                    beginAtZero: true,
                                },
                                gridLines: {
                                    display: false,
                                    //     color: chartGridLineColor,
                                    //    zeroLineColor: chartGridLineColor
                                }
                            }],
                            xAxes: [{
                                stacked: true,
                                ticks: {
                                    beginAtZero: true,
                                    //  color: chartGridLineColor,
                                    // zeroLineColor: chartGridLineColor
                                },
                                gridLines: {
                                    display: true,
                                    //    color: chartGridLineColor,
                                    //   zeroLineColor: chartGridLineColor
                                },
                                barPercentage: 0.2
                            }]
                        },
                        legend: {
                            display: false
                        },
                        elements: {
                            point: {
                                radius: 0
                            }
                        }
                    }
                });

            })
        }
    });
})(jQuery);


function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
}

function zeroFill(number, width) {
    width -= number.toString().length;
    if (width > 0) {
        return new Array(width + (/\./.test(number) ? 2 : 1)).join('0') + number;
    }
    return number + ""; // siempre devuelve tipo cadena
}