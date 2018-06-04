jQuery(document).ready(function($) {

    let rate = $('#inputrate').val();

    $('.star').css('opacity', 0.5).each(function() {

        if($(this).data('id') < rate) {
            $(this).css('opacity', 1);
        }

    });

    $('.star').on('mouseenter', function() {

        let number = $(this).data('id');

        $('.star').css('opacity', 0.5).each(function() {

            if($(this).data('id') <= number) {
                $(this).css('opacity', 1);
            }

        });

    });

    $('#rate').on('mouseleave', function() {
        $('.star').css('opacity', 0.5).each(function() {

            if($(this).data('id') < rate) {
                $(this).css('opacity', 1);
            }

        });
    });

    $('.star').on('click', function() {
       
        let number = $(this).data('id');
        $('#inputrate').val(number+1);
        rate = number+1;

    });

});