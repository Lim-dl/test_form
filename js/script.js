function toggleClassOfRequest() {
	let popup = document.querySelector('.popup');
	let body = document.querySelector('body');

	popup.classList.toggle("hide");
	body.classList.toggle("hide-overflow");
}


function updateTextInput1(val) {
	val = val > 15 ? 15 : val;
	val = val < 1 ? 1 : val;
	document.getElementById('month_range').value = val;
	document.getElementById('month_count').value = val;
}
function updateTextInput2(val) {
	val = val > 250000 ? 250000 : val;
	val = val < 10000 ? 10000 : val;
	document.getElementById('amount_range').value = val;
	document.getElementById('amount_service').value = val;
}

checkIndividual = document.getElementById('radio-1');
checkEntity = document.getElementById('radio-2');
formCheck = document.getElementById('formCheck');

function radioChecked(e) {
if (e.id == "radio-1"){
	document.querySelectorAll('.form-individual-clear').forEach(function(el) { el.setAttribute('required', '');	});
	document.querySelectorAll('.form-entity-clear').forEach(function(el) { el.removeAttribute('required', '');	});

	document.querySelectorAll('.form-individual').forEach(function(el) { el.style.display = '';	});
	document.querySelectorAll('.form-entity').forEach(function(el) { el.style.display = 'none';	});
} else {
	document.querySelectorAll('.form-individual-clear').forEach(function(el) { el.removeAttribute('required', '');	});
	document.querySelectorAll('.form-entity-clear').forEach(function(el) { el.setAttribute('required', '');	});

	document.querySelectorAll('.form-individual').forEach(function(el) { el.style.display = 'none';	});
	document.querySelectorAll('.form-entity').forEach(function(el) { el.style.display = '';	});
}
previousId = e.id;
}

function serviceChecked(e) {
if (e.value == "1"){
	document.querySelectorAll('.credit-form-clear').forEach(function(el) { el.setAttribute('required', '');	});
	document.querySelectorAll('.depozit-form-clear').forEach(function(el) { el.removeAttribute('required', '');	});

	document.querySelectorAll('.credit-form').forEach(function(el) { el.style.display = '';	});
	document.querySelectorAll('.depozit-form').forEach(function(el) { el.style.display = 'none';	});
} else if (e.value == "2"){
	document.querySelectorAll('.credit-form-clear').forEach(function(el) { el.removeAttribute('required', '');	});
	document.querySelectorAll('.depozit-form-clear').forEach(function(el) { el.setAttribute('required', '');	});

	document.querySelectorAll('.credit-form').forEach(function(el) { el.style.display = 'none';	});
	document.querySelectorAll('.depozit-form').forEach(function(el) { el.style.display = '';	});
} else {
	alert('Со стороны сервера произошла ошибка. Повторите запрос позже!');
}
previousId = e.id;
}

function closePopUp(){
    document.querySelector(".finish-request").style.display = "none";
}