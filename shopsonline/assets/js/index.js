function Params(name, value, type) {
	this.name = name;
	this.value = value;
	this.type = type;
}

$(document).ready(function($) {
	$('.carousel').carousel();

	$('#request').bind('change, paste, keyup', function() {
		$('.ccount').text(500 - $(this).val().length);
	});

	var pdfDisable = false;

	$(document).on('click', '#pdf-modal-trigger', function(e) {
		e.preventDefault();

		if(pdfDisable)
		{
			return;
		}

		pdfDisable = true;

		var self = $(this);

		var title = self.text();

		var label = self.html();

		self.html('<span class="fa fa-spinner fa-spin"></span> Retrieving');

		$('#pdf-modal .modal-title').text(title);
		
		$('#pdf-modal .modal-body').html('<iframe src="' + $(this).attr('href') + '" width="100%" height="100%"></iframe>');

		setTimeout(function() {
			$('#pdf-modal').modal('show');
			pdfDisable = false;
			self.html(label);
		}, 1500);
	});
});

$(document).on('change', '#nutritech-calendar', function() {
	var date = $(this).val();
	var date_from = date.split(',')[0];
	var date_to = date.split(',')[1];

	console.log(date_from + ' ' + date_to);

	$('.report-field#date_to').val(date_to);
	$('.report-field#date_from').val(date_from);
});

function getMainParams()
{
	var promise = $.Deferred();

	var params = new Array();

	var c = 1;

	if($('#report-form').find('.report-field').length == 0)
	{
		promise.resolve(params);
	}
	else
	{
		$('#report-form').find('.report-field').each(function() {
			name = $(this).attr('id');
			value = $(this).val().split(' ')[0];
			type = $(this).attr('class').split(' ')[2];

			params.push(new Params(name, value, type));

			c++;

			if(c > $('#report-form').find('.report-field').length) {
				promise.resolve(params);
			}
		});
	}
	return promise;
}

$(document).on('click', '#retrieve-report', function(e) {
	e.preventDefault();
	var title = $('.income-label').text();
	var promise = getMainParams();
	var datawindow = $(this).closest('#report-form').find('[name=datawindow]').val();
	var file_name = $(this).closest('#report-form').find('[name=filename]').val();

	$('#retrieve-report').html('<span class="fa fa-spinner fa-spin"></span> Retrieving');

	$.when(promise).done(function(_params) {
		$.ajax({
			url: '/nutritech/reports/generate',
			type: 'POST',
			data: {name : datawindow, params : JSON.stringify(_params), filename : file_name},
			dataType: 'json',
			success: function(result) {
				//var table = $.parseHTML(result)[4];
				// GET WIDTH OF REPORT
				//var width = parseInt(table.width) + 40;
				//var height = parseInt(table) + 40;

				//$('#report-modal .modal-dialog').css('width', width);				

				//$('#report-result').html(result);
				console.log(result);
				$('#report-result').html('<iframe src="' + result.src + '" width="100%" height="100%"></iframe>');

				setTimeout(function() {
					$('#report-modal .modal-title').text(title);
					$('#report-modal').modal('show');
				}, 1500);
			},
			error: function (jqXHR, status, error) {
				$('.report-message').html('<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> ' + error + '</div>');
				console.log(error);
			},
			complete: function() {
				$('#retrieve-report').html('<span class="fa fa-check"></span> Retrieve');
			}
		});
	});
});

var disabled = false;

$(document).on('click', '.instant-report', function(e) {
	e.preventDefault();
	var title = $(this).text();
	if(disabled)
	{
		return;
	}
	var self = $(this);
	var label = self.html();

	self.html('<span class="fa fa-spinner fa-spin"></span> Retrieving');

	disabled = true;
	
	var p = [self, self.find('.report-field').length];
	
	var promise = getParams(p);
	var file_name = self.closest('.hidden-report').find('input[name=filename]').val();
	var datawindow = self.closest('.hidden-report').find('input[name=datawindow]').val();

	//$('#retrieve-report').html('<span class="fa fa-spinner fa-spin"></span> Retrieving');
	$.when(promise).done(function(_params) {
		console.log(_params);
		$.ajax({
			url: '/nutritech/reports/generate',
			type: 'POST',
			data: {name : datawindow, params : JSON.stringify(_params), filename : file_name},
			dataType: 'json',
			success: function(result) {
				// GET WIDTH OF REPORT
				//var width = parseInt(table.width) + 40;
				//var height = parseInt(table) + 40;

				//$('#report-modal .modal-dialog').css('width', width);

				$('#report-result').html('<iframe src="' + result.src + '" width="100%" height="100%"></iframe>');

				setTimeout(function() {
					$('#report-modal .modal-title').text(title);
					$('#report-modal').modal('show');
				}, 1500);
			},
			error: function (jqXHR, status, error) {
				$('.report-message').html('<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> ' + error + '</div>');
				console.log(error);
			},
			complete: function() {
				$('#retrieve-report').html('<span class="fa fa-check"></span> Retrieve');
				disabled = false;
				self.html(label);
			}
		});
	});
});

$(document).on('click', '.ytd-report', function(e) {
	e.preventDefault();
	var title = $(this).text();
	if(disabled)
	{
		return;
	}

	disabled = true;


	var datawindow = $(this).attr('data-report');
	var level = $(this).attr('id');
	var file_name = $(this).attr('data-name');

	var self = $(this);

	var label = self.text();

	$(this).html('<span class="fa fa-spinner fa-spin"></span> Retrieving Report. Please Wait.');

	$.ajax({
		url: '/nutritech/reports/generate',
		type: 'POST',
		data: {name : datawindow, params : JSON.stringify([new Params('Level ID', level, 1)]), filename : file_name },
		dataType: 'JSON',
		success: function(result) {
			$('#report-result').html('<iframe src="' + result.src + '" width="100%" height="100%"></iframe>');

			setTimeout(function() {
				$('#report-modal .modal-title').text(title);
				$('#report-modal').modal('show');
			}, 1500);
		},
		error: function (jqXHR, status, error) {
			$('.report-message').html('<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> ' + error + '</div>');
			console.log(error);
		},
		complete: function() {
			self.text(label);
			disabled = false;
		}
	});
});

$(document).on('click', '.ytd-ram', function(e) {
	e.preventDefault();
	var title = $(this).text();

	if(disabled)
	{
		return;
	}

	disabled = true;

	var self = $(this);

	var datawindow = self.attr('data-report');
	var file_name = self.attr('data-name');

	var from = new Params('Date From', self.attr('data-from'), 2);
	var to = new Params('Date From', self.attr('data-to'), 2);

	var team = new Params('Team', self.attr('data-team'), 1);

	// SHIT ZU
	team = new Params('Team', 0, 1);
	// SHIT ZU

	var label = self.text();

	$(this).html('<span class="fa fa-spinner fa-spin"></span> Retrieving Report. Please Wait.');

	$.ajax({
		url: '/nutritech/reports/generate',
		type: 'POST',
		data: {name : datawindow, params : JSON.stringify([from, to, team]), filename : file_name },
		dataType: 'JSON',
		success: function(result) {
			$('#report-result').html('<iframe src="' + result.src + '" width="100%" height="100%"></iframe>');

			setTimeout(function() {
				$('#report-modal .modal-title').text(title);
				$('#report-modal').modal('show');
			}, 1500);
		},
		error: function (jqXHR, status, error) {
			$('.report-message').html('<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> ' + error + '</div>');
			console.log(error);
		},
		complete: function() {
			self.text(label);
			disabled = false;
		}
	});
});



$(document).on('click', '.ytd-personal', function(e) {
	e.preventDefault();
	var title = $(this).text();

	if(disabled)
	{
		return;
	}

	disabled = true;

	var self = $(this);

	var datawindow = self.attr('data-report');
	var file_name = self.attr('data-name');

	var from = new Params('Date From', self.attr('data-from'), 2);
	var to = new Params('Date From', self.attr('data-to'), 2);

	var team = new Params('Team', self.attr('data-team'), 1);
	
	// SHIT ZU
	team = new Params('Team', 0, 1);
	// SHIT ZU

	var label = self.text();

	$(this).html('<span class="fa fa-spinner fa-spin"></span> Retrieving Report. Please Wait.');

	$.ajax({
		url: '/nutritech/reports/generate',
		type: 'POST',
		data: {name : datawindow, params : JSON.stringify([from, to, team]), filename : file_name },
		dataType: 'JSON',
		success: function(result) {
			$('#report-result').html('<iframe src="' + result.src + '" width="100%" height="100%"></iframe>');

			setTimeout(function() {
				$('#report-modal .modal-title').text(title);
				$('#report-modal').modal('show');
			}, 1500);
		},
		error: function (jqXHR, status, error) {
			$('.report-message').html('<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> ' + error + '</div>');
			console.log(error);
		},
		complete: function() {
			self.text(label);
			disabled = false;
		}
	});
});

function getParams(hidden) {
	var promise = $.Deferred();

	var params = new Array();

	var c = 1;

	if(hidden)
	{
		if(hidden[0].closest('.hidden-report').find('.report-field').length == 0)
		{
			promise.resolve(params);
		}
		else
		{
			hidden[0].closest('.hidden-report').find('.report-field').each(function() {
				name = $(this).attr('id');
				value = $(this).val().split(' ')[0];
				type = $(this).attr('class').split(' ')[1];

				params.push(new Params(name, value, type));

				c++;

				if(c > hidden[1]) {
					promise.resolve(params);
				}
			});		
		}
	}
	else
	{
		if($('.report-field').length == 0)
		{
			promise.resolve(params);
		}
		else
		{
			$('.report-field').each(function() {
				name = $(this).attr('id');
				value = $(this).val().split(' ')[0];
				type = $(this).attr('class').split(' ')[2];

				params.push(new Params(name, value, type));

				c++;

				if(c > $('.report-field').length) {
					promise.resolve(params);
				}
			});		
		}
	}
	

	return promise;
}