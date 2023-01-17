console.log(studentstats)

var colors = {
    primary: "#6571ff",
    secondary: "#7987a1",
    success: "#05a34a",
    info: "#66d1d1",
    warning: "#fbbc06",
    danger: "#ff3366",
    light: "#e9ecef",
    dark: "#060c17",
    muted: "#7987a1",
    gridBorder: "rgba(77, 138, 240, .15)",
    bodyColor: "#000",
    cardBg: "#fff"
}


// Orders Chart
if ($('#etudiantFiliereChart').length) {
    var efoption = {
        chart: {
            type: "bar",
            height: 80,
            sparkline: {
                enabled: !0
            }
        },
        plotOptions: {
            bar: {
                borderRadius: 2,
                columnWidth: "60%"
            }
        },
        colors: [colors.primary],
        series: [{
            name: '',
            data: studentstats.data
        }],
        xaxis: {
            type: 'string',
            categories: studentstats.labels
        },
    };
    new ApexCharts(document.querySelector("#etudiantFiliereChart"), efoption).render();
}
// Orders Chart - END
