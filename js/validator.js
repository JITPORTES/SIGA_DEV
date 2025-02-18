// Title: Tigra Form Validator
// URL: http://www.softcomplex.com/products/tigra_form_validator/
// Version: 1.2
// Date: 07/11/2005 (mm/dd/yyyy)
// Note: Permission given to use this script in ANY kind of applications if
//    header lines are left unchanged.

// regular expressions or function to validate the format
var re_dt = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/,
re_tm = /^(\d{1,2})\:(\d{1,2})\:(\d{1,2})$/,
re_tm_corto	= /^(\d{1,2})\:(\d{1,2})$/,
re_min_seg	= /^(\d{1,2})\:(\d{1,2})$/,
a_formats	= {
	'alpha'   : /^[a-zA-Z\.\-]*$/,
	'alphanum': /^\w+$/,
	'unsigned': /^\d+$/,
	'integer' : /^[\+\-]?\d*$/,
	'real'    : /^[\+\-]?\d*\.?\d*$/,
	'email'   : /^[\w-\.]+\@[\w\.-]+\.[a-z]{2,4}$/,
	'phone'   : /^[\d\.\s\-\(\)]+$/,
	'date'    : function (s_date) {
		// check format
		if (!re_dt.test(s_date))
			return false;
		// check allowed ranges	
		if (RegExp.$1 > 31 || RegExp.$2 > 12)
			return false;
		// check number of day in month
		var dt_test = new Date(RegExp.$3, Number(RegExp.$2-1), RegExp.$1);
		if (dt_test.getMonth() != Number(RegExp.$2-1))
			return false;
		return true;
	},
	'time'    : function validate_time(s_time) {
		// check format
		if (!re_tm.test(s_time))
			return false;
		// check allowed ranges	
		if (RegExp.$1 > 23 || RegExp.$2 > 59 || RegExp.$3 > 59)
			return false;
		return true;
	},
	'timeCorto'  : function validate_time_Corto(s_time) {
		// check format
		if (!re_tm_corto.test(s_time))
			return false;
		// check allowed ranges	
		if (RegExp.$1 > 23 || RegExp.$2 > 59)
			return false;
		return true;
	},
	'timeAcumulado'  : function validate_time_Corto(s_time) {
		// check format
		if (!re_tm_corto.test(s_time))
			return false;
		// check allowed ranges	
		if (RegExp.$2 > 59)
			return false;
		return true;
	},
	'minutosSegundos' : function validate_minuto_segundo(s_time) {
		// check format
		if (!re_min_seg.test(s_time))
			return false;
		// check allowed ranges	
		if (RegExp.$2 > 59)
			return false;
		return true;
	},
	'emails': function (listaCorreos) {
		var listaSplit = listaCorreos.split(";");
		var listaValida = true;
		var formatoCorreo = /^[\w-\.]+\@[\w\.-]+\.[a-z]{2,4}$/;
		for (var elementoActual = 0; elementoActual < listaSplit.length; elementoActual++) {
				if (formatoCorreo.test($.trim(listaSplit[elementoActual]))) {
					listaValida = true;
				}
				else {
					listaValida = false;
					break;
				}
		}
		return listaValida;
	}
},
a_messages = [
	'No form name passed to validator construction routine',
	'No array of "%form%" form fields passed to validator construction routine',
	'El formulario "%form%" no puede ser encontrado en la página actual',
	'Incomplete "%n%" form field descriptor entry. "l" attribute is missing',
	'No se puede encontrar el campo "%n%" en la forma "%form%"',
	'No se puede encontrar la etiqueta (id="%t%")',
	'No se puede verificar el campo. El campo "%m%" no se encuentra en la forma',
	'"%l%" es un campo requerido',
	'El campo "%l%" debe ser de %mn% caracteres o más',
	'El campo "%l%" no debe exceder %mx% caracteres',
	'"%v%" no es valido para "%l%"',
	'"%l%" debe ser igual a "%ml%"'
]

// validator counstruction routine
function validator(s_form, a_fields, o_cfg) {
	this.f_error = validator_error;
	this.f_alert = o_cfg && o_cfg.alert
		? function(s_msg) { mostrarAlertInfo(s_msg); return false; }
		: function() { return false };
		
	// check required parameters
	if (!s_form)	
		return this.f_alert(this.f_error(0));
	this.s_form = s_form;
	
	if (!a_fields || typeof(a_fields) != 'object')
		return this.f_alert(this.f_error(1));
	this.a_fields = a_fields;

	this.a_2disable = o_cfg && o_cfg['to_disable'] && typeof(o_cfg['to_disable']) == 'object'
		? o_cfg['to_disable']
		: [];
		
	this.exec = validator_exec;
}

// validator execution method
function validator_exec() {
	var o_form = document.forms[this.s_form];
	if (!o_form)	
		return this.f_alert(this.f_error(2));
		
	b_dom = document.body && document.body.innerHTML;
	
	// check integrity of the form fields description structure
	for (var n_key in this.a_fields) {
		// check input description entry
		this.a_fields[n_key]['n'] = n_key;
		if (!this.a_fields[n_key]['l'])
			return this.f_alert(this.f_error(3, this.a_fields[n_key]));
		o_input = o_form.elements[n_key];
		if (!o_input)
			return this.f_alert(this.f_error(4, this.a_fields[n_key]));
		this.a_fields[n_key].o_input = o_input;
	}

	// reset labels highlight
	if (b_dom)
		for (var n_key in this.a_fields) 
			if (this.a_fields[n_key]['t']) {
				var s_labeltag = this.a_fields[n_key]['t'], e_labeltag = get_element(s_labeltag);
				if (!e_labeltag)
					return this.f_alert(this.f_error(5, this.a_fields[n_key]));
				this.a_fields[n_key].o_tag = e_labeltag;
				
				// normal state parameters assigned here
				e_labeltag.className = 'tfvNormal';
			}

	// collect values depending on the type of the input
	for (var n_key in this.a_fields) {
		var s_value = '';
		o_input = this.a_fields[n_key].o_input;
		if (o_input.type == 'checkbox') // checkbox
			s_value = o_input.checked ? o_input.value : '';
		else if (o_input.value) // text, password, hidden
			s_value = o_input.value;
		else if (o_input.options) // select
			s_value = o_input.selectedIndex > -1
				? o_input.options[o_input.selectedIndex].value
				: null;
		else if (o_input.length > 0) // radiobuton
			for (var n_index = 0; n_index < o_input.length; n_index++)
				if (o_input[n_index].checked) {
					s_value = o_input[n_index].value;
					break;
				}
		this.a_fields[n_key]['v'] = s_value.replace(/(^\s+)|(\s+$)/g, '');
	}
	
	// check for errors
	var n_errors_count = 0,
		n_another, o_format_check;
	for (var n_key in this.a_fields) {
		o_format_check = this.a_fields[n_key]['f'] && a_formats[this.a_fields[n_key]['f']]
			? a_formats[this.a_fields[n_key]['f']]
			: null;

		// reset previous error if any
		this.a_fields[n_key].n_error = null;

		// check reqired fields
		if (this.a_fields[n_key]['r'] && !this.a_fields[n_key]['v']) {
			this.a_fields[n_key].n_error = 1;
			n_errors_count++;
		}
		// check length
		else if (this.a_fields[n_key]['mn'] && this.a_fields[n_key]['v'] != '' && String(this.a_fields[n_key]['v']).length < this.a_fields[n_key]['mn']) {
			this.a_fields[n_key].n_error = 2;
			n_errors_count++;
		}
		else if (this.a_fields[n_key]['mx'] && String(this.a_fields[n_key]['v']).length > this.a_fields[n_key]['mx']) {
			this.a_fields[n_key].n_error = 3;
			n_errors_count++;
		}
		// check format
		else if (this.a_fields[n_key]['v'] && this.a_fields[n_key]['f'] && (
			(typeof(o_format_check) == 'function'
			&& !o_format_check(this.a_fields[n_key]['v']))
			|| (typeof(o_format_check) != 'function'
			&& !o_format_check.test(this.a_fields[n_key]['v'])))
			) {
			this.a_fields[n_key].n_error = 4;
			n_errors_count++;
		}
		// check match	
		else if (this.a_fields[n_key]['m']) {
			for (var n_key2 in this.a_fields)
				if (n_key2 == this.a_fields[n_key]['m']) {
					n_another = n_key2;
					break;
				}
			if (n_another == null)
				return this.f_alert(this.f_error(6, this.a_fields[n_key]));
			if (this.a_fields[n_another]['v'] != this.a_fields[n_key]['v']) {
				this.a_fields[n_key]['ml'] = this.a_fields[n_another]['l'];
				this.a_fields[n_key].n_error = 5;
				n_errors_count++;
			}
		}
		
	}

	// collect error messages and highlight captions for errorneous fields
	var s_alert_message = '',
		e_first_error;

	if (n_errors_count) {
		for (var n_key in this.a_fields) {
			var n_error_type = this.a_fields[n_key].n_error,
				s_message = '';
				
			if (n_error_type)
				s_message = this.f_error(n_error_type + 6, this.a_fields[n_key]);

			if (s_message) {
				if (!e_first_error)
					e_first_error = o_form.elements[n_key];
				s_alert_message += s_message + "\n";
				// highlighted state parameters assigned here
				if (b_dom && this.a_fields[n_key].o_tag)
					this.a_fields[n_key].o_tag.className = 'tfvHighlight';
			}
		}

	// Envía el mensaje de alerta
	mostrarAlertInfo("<p class='text-justify'><b>Ha ocurrido un error con el envío del formulario. Revise las siguientes observaciones:</b></p>" + s_alert_message);
		// set focus to first errorneous field
		if (e_first_error.focus && e_first_error.type != 'hidden'  && !e_first_error.disabled)
			eval("e_first_error.focus()");
		// cancel form submission if errors detected
		return false;
	}
	
	for (n_key in this.a_2disable)
		if (o_form.elements[this.a_2disable[n_key]])
			o_form.elements[this.a_2disable[n_key]].disabled = true;

	return true;
}

function validator_error(n_index) {
	var s_ = a_messages[n_index], n_i = 1, s_key;
	for (; n_i < arguments.length; n_i ++)
		for (s_key in arguments[n_i])
			s_ = s_.replace('%' + s_key + '%', arguments[n_i][s_key]);
	s_ = s_.replace('%form%', this.s_form) + "<br />";
	return s_
}

function get_element (s_id) {
	return (document.all ? document.all[s_id] : (document.getElementById ? document.getElementById(s_id) : null));
}
