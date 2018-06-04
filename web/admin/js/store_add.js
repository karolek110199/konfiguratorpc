 jQuery(document).ready(function($) {

    $('#add_field').on('click', function() {
        var num = $('.fields .field').length + 1;
        $('.fields').append('<div class="field row"><div class="col-xs-3"><input type="text" name="afield-'+num+'" id="fafield-'+num+'" class="form-control input-sm" placeholder="Nazwa pola #'+num+'" /></div><div class="col-xs-8"><input type="text" name="afieldw-'+num+'" id="fafieldw-'+num+'" class="form-control input-sm" placeholder="Wartość #'+num+'" /></div><div class="col-xs-2"></div></div>');
        
    });

    $('#delete_field').on('click', function() {
        $('.fields .field:last').remove();
    });

});