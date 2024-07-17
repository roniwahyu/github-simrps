/**
 * return a form data as javascript object
 */
 function getFormData(form){
    var out = {};
    var s_data = $(form).serializeArray();
    //transform into simple key-value object
    for(var i = 0; i<s_data.length; i++){
        var record = s_data[i];
        out[record.name] = record.value;
    }
    return out;
}

/**
 * Refresh captcha image
*/
$(document).on('click', '[data-captcha]', function(e){
	var img = $(this).find("img");
	var url = new Url($(this).data("captcha"));
	url.query.cache = new Date().getTime(); //force reload of image
	img.attr("src", url);
});

/**
 * trigger the add new row button to create the first row
 */
$(document).ready(function() {
	$('.btn-add-table-row').click();
});

/**
 * add new table row in a multi-table form
 */
 $(document).on('click', '.btn-add-table-row', function(e){
	var tableBody = $(this).closest('table').find("tbody");
	var rowCount = tableBody.find('tr.input-row:last').index() + 1
	var maxRow = $(this).closest('table').data("maxrow");
	var dataRow = tableBody.find('tr.input-row:last').data('row');
	if(!dataRow){
		dataRow = rowCount;
	}
	if(rowCount < maxRow){
		var templateId = $(this).data("template");
		var trTemplate = $(templateId).html();
		var nextRow = parseInt(dataRow) + 1;
		trTemplate = trTemplate.replace(/CURRENTROW/ig,  nextRow);
		var trNew = $(trTemplate);
		tableBody.append(trNew);
	}
	initPlugins(); //rebind form plugin to the new controls
});

/**
 * remove table row in a multi-table form
 */
$(document).on('click', '.btn-remove-table-row', function(e){
	var tableBody = $(this).closest('table').find("tbody");
	var rowCount = tableBody.find('tr.input-row:last').index() + 1
	var minRow = $(this).closest('table').data("minrow");
	if(rowCount > minRow){
		$(this).closest("tr.input-row").remove();
	}
});


/**
 * check if a form is valid and set set form controls validity status 
 */
$(document).on('submit', 'form.needs-validation, form.multi-form', function(event){
	if(!validateForm($(this))){
		event.preventDefault();
		event.stopPropagation();
	}
});


/**
 * validate password confirmation
 * On password field change
 */
$(document).on('input', '.password-confirm', function(event){
	var inputElem =  $(this)
	var value = inputElem.val();
	var match = $(inputElem.data("match")).val();
	if(value !== match){
		inputElem.removeClass('is-valid').addClass('is-invalid');
		inputElem[0].setCustomValidity("Password do not match");
	}
	else{
		inputElem.removeClass('is-invalid').addClass('is-valid');
		inputElem[0].setCustomValidity("");
	}
});

/**
 * validate password confirmation
 * on confirm password field on change
 */
$(document).on('input', 'input.password', function(event){
	var inputElem =  $(this)
	var value = inputElem.val();
	var confirmPassword = inputElem.closest("form").find(".password-confirm");
	if(confirmPassword.length){
		var match = confirmPassword.val();
		if(value !== match){
			confirmPassword.removeClass('is-valid').addClass('is-invalid');
			confirmPassword[0].setCustomValidity("Password do not match");
		}
		else{
			confirmPassword.removeClass('is-invalid').addClass('is-valid');
			confirmPassword[0].setCustomValidity("");
		}
	}
});

/**
 * validate form fields and display validation feedback 
 */
function validateForm(formElem){
	formElem.addClass('was-validated');
	formElem.find("input:required:invalid").parents('.dropzone').css("borderColor", "red");
	formElem.find("input:required:invalid").parents('.custom-file').find('.custom-file-label').css("borderColor", "red");
	formElem.find("textarea:required:invalid").parents('.form-group,.input-row').find('.note-editor').css("borderColor", "red");
	var confirmPasswordElem = formElem.find("input.password-confirm");
	if(confirmPasswordElem.length){
		var value = confirmPasswordElem.val();
		var match = $(confirmPasswordElem.data("match")).val();
		if(value !== match){
			confirmPasswordElem.removeClass('is-valid').addClass('is-invalid');
			confirmPasswordElem[0].setCustomValidity("Password do not match");
		}
		else{
			confirmPasswordElem.removeClass('is-invalid').addClass('is-valid');
			confirmPasswordElem[0].setCustomValidity("");
		}
	}
	
	var checboxes = $(formElem).find('.checkbox-group-required input');
	var fields = checboxes.serializeArray();
    if (fields.length === 0) {
		checboxes.prop("required", true);
    } 
    else {
		checboxes.prop("required", false);
	}
	
	var form = formElem[0];
	if(!form.checkValidity()){
		return false
	}
	return true;
}

$(document).on('change', '.custom-file-input', function(){
	var fileName = $(this).val().split('\\').pop();
	$(this).siblings('.custom-file-label').addClass('selected').html(fileName);
});

/**
 * submit a form using ajax
 * handle form submit in ajax page
 */
 $(document).on('submit', '.ajax-page form.page-form', function(e){
	var formElem = $(this);
	
	if(validateForm(formElem)){
		var loader  = formElem.find('.form-ajax-status');
		loader.html(savingIndicator);
		loader.show();
		$.ajax({
			url: formElem.attr('action'),
			type: formElem.attr('method'),
			data: formElem.serialize(),
			success: function(msg) {
				loader.hide();
				showToastSuccess(msg);
				var ajaxPage = formElem.closest('.ajax-page');
				if(ajaxPage){
					var pageType = ajaxPage.data('page-type');
					if(pageType == 'list'){
						var pageUrl = ajaxPage.data("page-url");
						loadPageData(ajaxPage, pageUrl);
					}
				}
				formElem.closest('.modal').modal('toggle'); //close the modal
				formElem[0].reset();
				formElem.removeClass('was-validated');
			},
			error: function( xhr, err ) {
				loader.hide();
				showToastDanger( xhr.statusText );
			}
		});
	}
	e.preventDefault();
	e.stopPropagation();
});


/**
 * submit a form using ajax and refresh the ajax-page
 * handle form submit in modal or drawer
 */
 $(document).on('submit', '#main-page-modal form.page-form', function(e){
	var formElem = $(this);
	if(validateForm(formElem)){
		var loader  = formElem.find('.form-ajax-status');
		loader.html(savingIndicator);
		loader.show();
		$.ajax({
			url: formElem.attr('action'),
			type: formElem.attr('method'),
			data: formElem.serialize(),
			success: function(msg) {
				loader.hide();
				var ajaxPage = formElem.closest('.modal').data('ajax-page');
				if(ajaxPage){
					var pageType = ajaxPage.data('page-type');
					if(pageType == 'list'){
						var pageUrl = ajaxPage.data("page-url");
						loadPageData(ajaxPage, pageUrl);
					}
				}
				$('#main-page-modal').modal('hide');
				showToastSuccess(msg);
			},
			error: function( xhr, err ) {
				loader.hide();
				showToastDanger(xhr.statusText);
			}
		}); 
	}
	e.preventDefault();
	e.stopPropagation();
});



/**
 * check if value already exit in a database table for validation
 */
 $(document).on('blur', '.ctrl-check-duplicate', function(){
	var inputElem = $(this)
	var val = inputElem.val();
	var apiUrl = inputElem.data("url");
	var elemCheckStatus = inputElem.closest('.form-group').find('.check-status');
	
	var loadingMsg = inputElem.data('loading-msg');
	var availableMsg = inputElem.data('available-msg');
	var notAvailableMsg = inputElem.data('unavailable-msg');
	
	elemCheckStatus.html('<small class="text-muted">' + loadingMsg + '</small>');
	if(val){
		$.ajax({
			url : setPathLink(apiUrl, {value:val}),
			success : function(result) {
				if(result == true) {
					inputElem.addClass('is-invalid');
					inputElem[0].setCustomValidity(notAvailableMsg);
					elemCheckStatus.html('<small class="text-danger">' + notAvailableMsg + '</small>');
				}
				else{ 
					inputElem.removeClass('is-invalid').addClass('is-valid');
					inputElem[0].setCustomValidity('');
					elemCheckStatus.html('<small class="text-success">' + availableMsg + '</small>');
				}
			},
			error : function(err) {
				elemCheckStatus.html('');
			}
		});
	}
	else{
		elemCheckStatus.html('');
		inputElem.removeClass('is-valid').removeClass('is-valid');
	}
});

/**
 * populate another select control when an input value changes
 */
$(document).on('change', '[data-load-select-options]', function(e){
	var elem = $(this);
	var elementType =  elem.prop('tagName').toLowerCase();
	var selectedVal = "";
	if(elementType == 'input'){
		var arrSelectedVals = [];
		elem.closest('.form-group, .input-row').find("input:checked").each(function(){
			arrSelectedVals.push(elem.val());
		});
		selectedVal = arrSelectedVals.toString();
	}
	else{
		selectedVal = elem.val().toString();
	}
	var targetFields =  elem.data('load-select-options');
	var arrFields = targetFields.split(",");
	
	arrFields.forEach(function(field){
		//if placed in a multiple table row, populate only the field in the same row
		var targetElem;
		
		var tableRow = elem.closest(".input-row");
		if(tableRow.length){
			targetElem = tableRow.find("select[id*=ctrl-" + field + "], input[id*=ctrl-" + field + "]");
		}
		else{
			targetElem = $("#ctrl-" + field);
		}
		
		var path = targetElem.data('load-path') + '?lookup=' + encodeURIComponent(selectedVal);
		targetElem.html('<option value="">Loading...</option>');
		var placeholder = targetElem.attr('placeholder') || 'Select a value...';
		$.ajax({
			type: 'GET',
			url: path,
			dataType: 'json',
			success: function(data){
				if(targetElem.hasClass('selectize')){
					targetElem.each(function() {
						if (this.selectize) {
							this.selectize.clear();
							this.selectize.clearOptions();
							for (var i = 0; i < data.length; i++) {
								this.selectize.addOption({value:data[i].value, text: data[i].label });
							}
						}
					}); 
				}
				else{
					var options = '<option value="">' + placeholder +  '</option>';
					for (var i = 0; i < data.length; i++) {
						options += '<option value="' + data[i].value + '">' + data[i].label + '</option>';
					}
					targetElem.html(options);
				}
			},
			error: function(data) {
				var options = '<option value="">' + placeholder +  '</option>';
				targetElem.html(options);
			},
		});
	})
});

/**
 * populate another input check/radio control when a control value changes
 */
$(document).on('change', '[data-load-check-options]', function(e){
	var elem = $(this);
	var elementType = elem.prop('tagName').toLowerCase();
	var selectedVal = "";
	if(elementType == 'input'){
		var arrSelectedVals = [];
		elem.closest('.form-group').find("input:checked").each(function(){
			arrSelectedVals.push(elem.val());
		});
		selectedVal = arrSelectedVals.toString();
	}
	else{
		selectedVal = elem.val().toString();
	}
	var targetFields =  elem.data('load-check-options');
	var arrFields = targetFields.split(",");
	arrFields.forEach(function(field){
		var targetOptionsHolder;
		var templateHtml = $("#" + field + "-option-template").html();
		//if placed in a multiple table row, populate only the field in the same row
		var tableRow = elem.closest(".input-row");
		if(tableRow.length){
			targetOptionsHolder = tableRow.find("#" + field + "-options-holder");
			var rowIndex = tableRow.index() + 1;
			//update input name to the current table row
			templateHtml = templateHtml.replace(/row1/ig, "row" + rowIndex);
		}
		else{
			targetOptionsHolder = $("#" + field + "-options-holder");
		}
		var path = targetOptionsHolder.data('load-path') + '/' + encodeURIComponent(selectedVal);
		targetOptionsHolder.html(loadingIndicator);
		$.ajax({
			type: 'GET',
			url: path,
			dataType: 'json',
			success: function (data){
				targetOptionsHolder.html("");
				for (var i = 0; i < data.length; i++) {
					var option = $(templateHtml);
					option.find('input').val(data[i].value);
					option.find('.input-label-text').html(data[i].label);
					targetOptionsHolder.append(option);
				}
			},
			error: function (data) {
				targetOptionsHolder.html('...');
			},
		});
	})
});

/**
 * for multi checkbox, validate if a value is checked
 */
 $('.form-group').on("click",'input:checkbox',function(){          
	var name = $(this).attr('name');
	var checkElem = $('input[name="'+name+'"]:checked');
    var min = 1 //minumum number of boxes to be checked for this form-group
    if(checkElem.length < min){
        $('input[name="'+name+'"]').prop('required',true);
    }
    else{
        $('input[name="'+name+'"]').prop('required',false);
    }
});

/**
 * set custom value for checkfor when checked state changed
 */
$(document).on('change', 'input.single-switch', function(){
	var checkbox = $(this);
	if(this.checked){
		checkbox.siblings('[type="hidden"]').val(checkbox.data("on"));
	}
	else{
		checkbox.siblings('[type="hidden"]').val(checkbox.data("off"));
	}
});

/**
 * toggle password visibility
 */
 $(document).on('click', '.btn-toggle-password', function(){
	var input = $(this).closest(".form-group").find("input");
	var inputType = input.attr("type");
	if(inputType == "password"){
		input.attr("type", "text");
	}
	else{
		input.attr("type", "password");
	}
});