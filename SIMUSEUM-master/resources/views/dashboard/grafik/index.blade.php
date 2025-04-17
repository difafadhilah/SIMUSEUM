<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }
</style>

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>


@php
    $dataForChart = [];
    usort($bukuTamuCounts, function ($a, $b) {
        return strcmp($a['created_date'], $b['created_date']);
    });
    
    foreach ($bukuTamuCounts as $count) {
        $dataForChart[] = [
            'country' => date('Y-m-d', strtotime($count['created_date'])),
            'value' => $count['count'],
        ];
    }
@endphp
<script>
    am5.ready(function() {
        var root = am5.Root.new("chartdiv");

        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: true,
            panY: true,
            wheelX: "panX",
            wheelY: "zoomX",
            pinchZoomX: true
        }));

        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);

        var xRenderer = am5xy.AxisRendererX.new(root, {
            minGridDistance: 30
        });
        xRenderer.labels.template.setAll({
            rotation: -45,
            centerY: am5.p50,
            centerX: am5.p100,
            paddingRight: 15
        });

        xRenderer.grid.template.setAll({
            location: 1
        });

        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            maxDeviation: 0.3,
            categoryField: "country",
            renderer: xRenderer,
            tooltip: am5.Tooltip.new(root, {})
        }));

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            maxDeviation: 0.3,
            renderer: am5xy.AxisRendererY.new(root, {
                strokeOpacity: 0.1
            })
        }));

        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: "Series 1",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value",
            sequencedInterpolation: true,
            categoryXField: "country",
            tooltip: am5.Tooltip.new(root, {
                labelText: "{valueY}"
            })
        }));

        series.columns.template.setAll({
            cornerRadiusTL: 5,
            cornerRadiusTR: 5,
            strokeOpacity: 0
        });
        series.columns.template.adapters.add("fill", function(fill, target) {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        series.columns.template.adapters.add("stroke", function(stroke, target) {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        var data = @json($dataForChart);

        // Function to filter data based on selected interval
        function filterData(interval) {
            var today = new Date();
            var maxDate = new Date(today);

            if (interval === "7days") {
                maxDate.setDate(maxDate.getDate() - 7);
            } else if (interval === "10days") {
                maxDate.setDate(maxDate.getDate() - 10);
            } else if (interval === "1month") {
                maxDate.setMonth(maxDate.getMonth() - 1);
            }

            var filteredData = data.filter(function(item) {
                var currentDate = new Date(item.country);
                return currentDate >= maxDate && currentDate <= today;
            });

            xAxis.data.setAll(filteredData);
            series.data.setAll(filteredData);

            series.appear(1000);
            chart.appear(1000, 100);
        }

        // Event listener for the filter buttons
        var filterButtons = document.querySelectorAll(".filter-button");
        filterButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var interval = button.getAttribute("data-interval");
                filterData(interval);
            });
        });

        // Initial filtering for the last 7 days
        filterData("7days");
    }); // end am5.ready()
</script>

<!-- Add the filter buttons -->
<button class="filter-button btn btn-primary" data-interval="7days">Last 7 Days</button>
<button class="filter-button btn btn-primary" data-interval="10days">Last 10 Days</button>
<button class="filter-button btn btn-primary" data-interval="1month">Last 1 Month</button>

<div id="chartdiv"></div>