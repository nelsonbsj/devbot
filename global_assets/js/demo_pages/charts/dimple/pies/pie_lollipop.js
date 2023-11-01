/* ------------------------------------------------------------------------------
 *
 *  # Dimple.js - lollipops
 *
 *  Demo of lollipop chart. Data stored in .tsv file format
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var DimplePieLollipop = function() {


    //
    // Setup module components
    //

    // Chart
    var _pieLollipop = function() {
        if (typeof dimple == 'undefined') {
            console.warn('Warning - dimple.min.js is not loaded.');
            return;
        }

        // Main variables
        var element = document.getElementById('dimple-pie-lollipop');


        // Initialize chart only if element exsists in the DOM
        if(element) {

            // Construct chart
            var svg = dimple.newSvg(element, "100%", 500);


            // Chart setup
            // ------------------------------

            d3.tsv("../../global_assets/demo_data/dimple/demo_data.tsv", function (data) {

                // Filter data
                data = dimple.filterData(data, "Date", [
                    "01/07/2011", "01/08/2011", "01/09/2011",
                    "01/10/2011", "01/11/2011", "01/12/2011"
                ]);


                // Create chart
                // ------------------------------

                // Define chart
                var myChart = new dimple.chart(svg, data);

                // Set bounds
                myChart.setBounds(0, 0, "100%", "100%");

                // Set margins
                myChart.setMargins(55, 25, 10, 30);


                // Add axes
                // ------------------------------

                // Horizontal
                var x = myChart.addCategoryAxis("x", "Month");
                    x.addOrderRule("Date");

                // Vertical
                var y = myChart.addMeasureAxis("y", "Unit Sales");

                // Other axes
                myChart.addMeasureAxis("p", "Unit Sales");


                // Construct layout
                // ------------------------------

                // Add pie
                var pies = myChart.addSeries("Channel", dimple.plot.pie);

                // Radius
                pies.radius = 30;


                // Add legend
                // ------------------------------

                var myLegend = myChart.addLegend(0, 5, "100%", 0, "right");


                // Add styles
                // ------------------------------

                // Font size
                x.fontSize = "12";
                y.fontSize = "12";

                // Font family
                x.fontFamily = "Roboto";
                y.fontFamily = "Roboto";

                // Legend font style
                myLegend.fontSize = "12";
                myLegend.fontFamily = "Roboto";


                //
                // Draw chart
                //

                // Draw
                myChart.draw();

                // Remove axis titles
                x.titleShape.remove();


                // Resize chart
                // ------------------------------

                // Add a method to draw the chart on resize of the window
                $(window).on('resize', resize);
                $('.sidebar-control').on('click', resize);

                // Resize function
                function resize() {

                    // Redraw chart
                    myChart.draw(0, true);

                    // Remove axis titles
                    x.titleShape.remove();
                }
            });
        }
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _pieLollipop();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    DimplePieLollipop.init();
});
