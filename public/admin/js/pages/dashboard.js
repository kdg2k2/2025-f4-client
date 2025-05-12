var colors = ['#1E90FF', '#FF6347', '#28A745']

const createChart = (el, color) => {
    var options = {
        series: [{name: "", data: [50, 85, 60, 100, 70, 45, 90, 75]}],
        chart: {height: 45, type: "area", sparkline: {enabled: !0}, animations: {enabled: !1}},
        colors: [getComputedStyle(document.documentElement).getPropertyValue(color).trim()],
        fill: {type: "gradient", gradient: {shadeIntensity: 1, opacityFrom: .5, opacityTo: .1, stops: [0, 90, 100]}},
        tooltip: {enabled: !1},
        dataLabels: {enabled: !1},
        grid: {show: !1},
        xaxis: {labels: {show: !1}, axisBorder: {show: !1}, axisTicks: {show: !1}},
        yaxis: {show: !1},
        stroke: {curve: "smooth", width: 1}
    }
    var chart = new ApexCharts(document.querySelector(el), options);
    chart.render();
}

const createChartLine = (arr_new, arr_studentNews, arr_trainningNews, arr_year) => {
    var options = {
        series: [
            {
                name: "Tin tức sự kiện",
                data: arr_new.split(',').map(Number)
            },
            {
                name: "Tin tức sinh viên",
                data: arr_studentNews.split(',').map(Number)
            },
            {
                name: "Tin tức đào tạo",
                data: arr_trainningNews.split(',').map(Number)
            }
        ],
        chart: {
            height: 300,
            type: "line",
            zoom: {enabled: false},
            toolbar: {show: false}
        },
        stroke: {
            width: [4, 4, 4],
            curve: "smooth",
            dashArray: [0, 8, 4]
        },
        dataLabels: {enabled: false},
        markers: {size: 5},
        colors: colors,
        legend: {position: "top"},
        xaxis: {
            categories: arr_year.split(',').map(Number)
        },
        tooltip: {
            shared: true,
            intersect: false
        }
    };

    var chart = new ApexCharts(document.querySelector("#revenue-chart"), options);
    chart.render();
}

const createChartStatistics = (arr_curr, arr_scientific, arr_library, arr_year) => {
    var options = {
        series: [
            {
                name: "Giáo trình, bài giảng",
                data: arr_curr.split(',').map(Number)
            },
            {
                name: "Ấn phẩm khoa học",
                data: arr_scientific.split(',').map(Number)
            },
            {
                name: "Thư viện ảnh",
                data: arr_library.split(',').map(Number)
            }
        ],
        chart: {
            type: 'bar',
            height: 300,
            zoom: {enabled: false},
            toolbar: {show: false}
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '50%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        colors: colors,
        xaxis: {
            categories: arr_year.split(',').map(Number),
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val;
                }
            }
        },
        legend: {
            position: 'top'
        }
    };

    var chart = new ApexCharts(document.querySelector("#statistics-chart"), options);
    chart.render();
}
