jQuery(document).ready(function($) { 
		
    $('#itimefrom,#itimeto').timepicker({
	timeFormat: 'HH:mm',
	interval: 30,
	minTime: '00:00',
	maxTime: '23:59',
	startTime: 'now',
	dynamic: true,
	dropdown: false,
	scrollbar: false
    });

});