(function($) {

    'use strict';

    $(document).ready(function() {

        $('.js-datepicker').datepicker({
            format: 'yyyy-mm-dd',
            // setDate: new Date(),
            autoclose: true,
        });

        $('.input-group.date').datepicker({
            autoclose: true,
            todayHighlight: true
        });

        $('.input-daterange').datepicker({
            autoclose: true
        });

    });

})(window.jQuery);