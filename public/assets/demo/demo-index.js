jQuery(document).ready(function() {

// Chartist

    var options = {
        low: 0,
        high: 20,
        showArea: true,
        showPoint: false,
        fullWidth: true,
        axisY: {
            labelInterpolationFnc: function(value) {
                return '$'+value+'k';
            },
            scaleMinSpace: 20
        },
        series: {
            'series-2': {
                showArea: true,
                showPoint: false,
                fullWidth: true,
            },
            'series-1': {
                fullWidth: true,
            }
        }
    };

    var data = {
        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
        series: [{
            name: 'series-1',
            data: [5, 9, 7, 8, 5, 3, 5, 4, 5, 9, 7, 8]
        }, {
            name: 'series-2',
            data: [11,14,11,19,15,12,14,18,11,10,13,15]
        }]
    };

// Extrabar
    $("#layout-static .static-content-wrapper").append("<div class='extrabar-underlay'></div>");

// Calendar

    $('#calendar').datepicker({todayHighlight: true});

// Easypie chart
    

});