/**
 * Script run inside a Customizer control sidebar
 *
 * Enable / disable the control title by toggeling its .disabled-control-title style class on or off.
 */
(function($) {
    wp.customize.bind('ready', function() {
        rangeSlider();
    });

    var rangeSlider = function() {
        var slider = $('.range-slider'),
            range = $('.range-slider__range'),
            value = $('.range-slider__value');

        slider.each(function() {

            value.each(function() {
                var value = $(this).prev().attr('value');
                $(this).html(value);
            });

            range.on('input', function() {
                $(this).next(value).html(this.value);
				// $(this).html(this.value);
            });
        });
    };

})(jQuery);
