<script>
    /* ------------------------------------------------------------------------------
 *
 *  # Echarts - Basic line example
 *
 *  Demo JS code for basic line chart [dark theme]
 *
 * ---------------------------------------------------------------------------- */


    // Setup module
    // ------------------------------

    var EchartsLinesBasicDark = function() {


        //
        // Setup module components
        //

        // Basic line chart
        var _linesBasicDarkExample = function() {
            if (typeof echarts == 'undefined') {
                console.warn('Warning - echarts.min.js is not loaded.');
                return;
            }

            // Define element
            var line_basic_element = document.getElementById('line_basic');


            //
            // Charts configuration
            //

            if (line_basic_element) {

                // Initialize chart
                var line_basic = echarts.init(line_basic_element);


                //
                // Chart config
                //

                // Options
                line_basic.setOption({

                    // Define colors
                    color: [ '#AED581','#E57373','#ffa600'],

                    // Global text styles
                    textStyle: {
                        fontFamily: 'Cairo, Arial, Verdana, sans-serif',
                        fontSize: 13
                    },

                    // Chart animation duration
                    animationDuration: 750,

                    // Setup grid
                    grid: {
                        left: 0,
                        right: 40,
                        top: 35,
                        bottom: 0,
                        containLabel: true
                    },

                    // Add legend
                    legend: {
                        data: ['الجدد','المحظورين','المحذوفين'],
                        itemHeight: 8,
                        itemGap: 20,
                        textStyle: {
                            color: '#fff'
                        }
                    },

                    // Add tooltip
                    tooltip: {
                        trigger: 'axis',
                        backgroundColor: 'rgba(255,255,255,0.9)',
                        padding: [10, 15],
                        textStyle: {
                            color: '#222',
                            fontSize: 13,
                            fontFamily: 'Cairo, sans-serif'
                        }
                    },

                    // Horizontal axis
                    xAxis: [{
                        type: 'category',
                        boundaryGap: true,
                        data: ['اليوم','أمس','منذ 3 أيام','منذ 4 أيام','منذ 5 أيام','منذ 6 أيام','منذ 7 أيام'],
                        axisLabel: {
                            color: '#fff'
                        },
                        axisLine: {
                            lineStyle: {
                                color: 'rgba(255,255,255,0.25)'
                            }
                        },
                        splitLine: {
                            lineStyle: {
                                color: 'rgba(255,255,255,0.1)'
                            }
                        }
                    }],

                    // Vertical axis
                    yAxis: [{
                        type: 'value',
                        axisLabel: {
                            formatter: '{value}',
                            color: '#fff'
                        },
                        axisLine: {
                            lineStyle: {
                                color: 'rgba(255,255,255,0.25)'
                            }
                        },
                        splitLine: {
                            lineStyle: {
                                color: 'rgba(255,255,255,0.1)'
                            }
                        },
                        splitArea: {
                            show: true,
                            areaStyle: {
                                color: ['rgba(255,255,255,0.01)', 'rgba(0,0,0,0.01)']
                            }
                        }
                    }],

                    // Axis pointer
                    axisPointer: [{
                        lineStyle: {
                            color: 'rgba(255,255,255,0.25)'
                        }
                    }],

                    // Add series
                    series: [
                        {
                            name: 'الجدد',
                            type: 'line',
                            data: [ {{$Charts_today_users}},{{$Charts_yesterday_users}},
                                {{$Charts_users_3_days_ago}},{{$Charts_users_4_days_ago}},{{$Charts_users_5_days_ago}},
                                {{$Charts_users_6_days_ago}},{{$Charts_users_7_days_ago}}],
                            smooth: false,
                            symbol: 'circle',
                            symbolSize: 7,
                            markLine: {
                                data: [{
                                    type: 'average',
                                    name: 'Average'
                                }]
                            },
                            itemStyle: {
                                normal: {
                                    borderWidth: 2
                                }
                            }
                        },

                        {
                            name: 'المحظورين',
                            type: 'line',
                            data: [{{$Charts_today_users_block}},{{$Charts_yesterday_users_block}},{{$Charts_users_block_3_days_ago}},
                                {{$Charts_users_block_4_days_ago}},{{$Charts_users_block_5_days_ago}},{{$Charts_users_block_6_days_ago}},{{$Charts_users_block_7_days_ago}}],
                            smooth: true,
                            symbol: 'circle',
                            symbolSize: 7,
                            markLine: {
                                data: [{
                                    type: 'average',
                                    name: 'Average'
                                }]
                            },
                            itemStyle: {
                                normal: {
                                    borderWidth: 2
                                }
                            }
                        },

                        {
                            name: 'المحذوفين',
                            type: 'line',
                            data: [ {{$Charts_today_users_trashed}},{{$Charts_yesterday_users_trashed}},{{$Charts_users_trashed_3_days_ago}},
                                {{$Charts_users_trashed_4_days_ago}},{{$Charts_users_trashed_5_days_ago}},
                                {{$Charts_users_trashed_6_days_ago}},{{$Charts_users_trashed_7_days_ago}}
                            ],
                            smooth: false,
                            symbol: 'circle',
                            symbolSize: 7,
                            markLine: {
                                data: [{
                                    type: 'average',
                                    name: 'Average'
                                }]
                            },
                            itemStyle: {
                                normal: {
                                    borderWidth: 2
                                }
                            }
                        },

                    ]
                });
            }


            //
            // Resize charts
            //

            // Resize function
            var triggerChartResize = function() {
                line_basic_element && line_basic.resize();
            };

            // On sidebar width change
            var sidebarToggle = document.querySelector('.sidebar-control');
            sidebarToggle && sidebarToggle.addEventListener('click', triggerChartResize);

            // On window resize
            var resizeCharts;
            window.addEventListener('resize', function() {
                clearTimeout(resizeCharts);
                resizeCharts = setTimeout(function () {
                    triggerChartResize();
                }, 200);
            });
        };


        //
        // Return objects assigned to module
        //

        return {
            init: function() {
                _linesBasicDarkExample();
            }
        }
    }();


    // Initialize module
    // ------------------------------

    document.addEventListener('DOMContentLoaded', function() {
        EchartsLinesBasicDark.init();
    });

</script>
