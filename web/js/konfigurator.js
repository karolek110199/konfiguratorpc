
$(document).ready(function() {

    
    $('select').material_select();

    refreshMobos();
    checkDeleteButtons();
    recalculatePrice();
    refreshCases();
    refreshPowers();
    
    $('#s_graphic').next('.preview').attr('src', $('#s_graphic').children('option[value='+($('#s_graphic').val())+']').data('img'));
    
    $('#s_processor').on('change', function(){ refreshMobos(this); });
    $('#s_mobo').on('change', function() { 
        refreshRams(this);
        var selected = $('#s_mobo').val();
        $('#s_mobo').next('.preview').attr('src', '');
        $('#s_mobo').next('.preview').attr('src', $('#s_mobo').children('option[value='+selected+']').data('img'));
    });
    $('#s_graphic').on('change', function() { 
        var selected = $('#s_graphic').val();
        $('#s_graphic').next('.preview').attr('src', '');
        $('#s_graphic').next('.preview').attr('src', $('#s_graphic').children('option[value='+selected+']').data('img'));
    });
    
    $('#konfigurator #s_case').on('change', function() { refreshCases(); });
    $('#konfigurator #s_power').on('change', function() { refreshPowers(); });
    
    $('#konfigurator select').on('change', function() { recalculatePrice(); });
    
    $('#add_ram').on('click', function() {
        
        var selected = $('#s_mobo').val();
        var max = $('#s_mobo option[value='+selected+']').data('ram-slots');
        var nums = $('#s_ram select').length;
        if(nums >= max) {
            alert("Płyta posiada jedynie "+max+" sloty na kości RAM.");
            return;
        }
        
        var val = $('#s_ram select:last').val();
        $('#s_ram select:last').clone().insertAfter("#s_ram select:last").attr('name', 'ram-'+(nums+1));
        $('#s_ram select:last').val(val);
        checkDeleteButtons();
        recalculatePrice();
        
    });
    
    $('#delete_ram').on('click', function() {
        if($('#s_ram select').length > 1) {
            $('#s_ram select:last').remove();
            checkDeleteButtons();
            recalculatePrice();
        }
    });
    
    $('#add_drive').on('click', function() {
        
        var nums = $('#s_drive select').length;
        if(nums >= 4) {
            alert("Możesz dodać maksymalnie 4 dyski twarde.");
            return;
        }
        
        $('#s_drive select:last').clone().insertAfter("#s_drive select:last").attr('name', 'drive-'+(nums+1));
        checkDeleteButtons();
        recalculatePrice();
        
    });
    
    $('#delete_drive').on('click', function() {
        if($('#s_drive select').length > 1) {
            $('#s_drive select:last').remove();
            checkDeleteButtons();
            recalculatePrice();
        }
    });
    
    $('input[type="checkbox"]').on('click', function() { recalculatePrice(); });

    function refreshMobos(element) {
        var selected = $('#s_processor').val();
        var socket = $('#s_processor').children('option[value='+selected+']').data('socket');

        $('#s_mobo option').show();

        var flag = false;
        
        $('#s_mobo option').each(function() {
            if($(this).data('socket') != socket) {
                $(this).hide();
            } else if(flag == false) {
                $('#s_mobo').val($(this).attr('value'));
                flag = true;
                $('#s_mobo').next('.preview').attr('src', $(this).data('img'));
            }
        }); 
        refreshRams();
    }
    
    function refreshRams() {
        var selected = $('#s_mobo').val();
        var ram = $('#s_mobo option[value='+selected+']').data('ram');
        var max = $('#s_mobo option[value='+selected+']').data('ram-slots');
        
        while($('#s_ram select').length > max) {
            $('#s_ram select:last').remove();
        }
        
        $('#s_ram select option').show();
        
        var flag = false;
        
        $('#s_ram select option').each(function() {
            if($(this).data('type') != ram) {
                $(this).hide();
            } else if(flag == false) {
                $('#s_ram select').val($(this).attr('value'));
                flag = true;
            }
        });
    }
    
    function checkDeleteButtons() {
        if($('#s_ram select').length > 1) {
            $('#delete_ram').show();
        } else {
            $('#delete_ram').hide();
        }
        //dyski
        if($('#s_drive select').length > 1) {
            $('#delete_drive').show();
        } else {
            $('#delete_drive').hide();
        }
    }
    
    function refreshCases() {
        $('#s_case').next('.preview').attr('src', $('#s_case option[value='+($('#s_case').val())+']').data('img'));
    }
    
    function refreshPowers() {
        $('#s_power').next('.preview').attr('src', $('#s_power option[value='+($('#s_power').val())+']').data('img'));
    }
    
    function recalculatePrice() {
        
        var price = 0.00;
        price += $('#s_processor').children('option[value='+($('#s_processor').val())+']').data('price');
        price += $('#s_mobo').children('option[value='+($('#s_mobo').val())+']').data('price');
        $('#s_ram select').each(function() {
            price += $(this).children('option[value='+($(this).val())+']').data('price');
        });
        price += $('#s_graphic').children('option[value='+($('#s_graphic').val())+']').data('price');
        $('#s_drive select').each(function() {
            price += $(this).children('option[value='+($(this).val())+']').data('price');
        });
        price += $('#s_case').children('option[value='+($('#s_case').val())+']').data('price');
        price += $('#s_power').children('option[value='+($('#s_power').val())+']').data('price');

        price += $('#s_system').children('option[value='+($('#s_system').val())+']').data('price');

        if($('#napis:checked').length > 0) {
            price += 150;
        }
        
        $('#total_price').text((Math.round(price*100))/100);
    }
    
});