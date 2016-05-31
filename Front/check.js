/*
 * It checks if the fields of creator and updater of user are correct.
 *
 * @return {Boolean} 
 */

function user(){
	$flag = true;

	var dni = document.getElementById('dni');
	var pass = document.getElementById('pass');
	var name = document.getElementById('name');
	var surname = document.getElementById('surname');
	var mail = document.getElementById('mail');
	var prephone = document.getElementById('prephone');

	if(dni.value == ''){
		dni.style.borderColor = '#a94442';
		dni.style.borderWidth = '2px';

		document.getElementById('alertDni').className = 'show';
		document.getElementById('alertDni').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorDni').innerHTML = 'Rellene el campo dni.';		

		$flag = false;
	}else if(dni.value.length > 15){
		dni.style.borderColor = '#a94442';
		dni.style.borderWidth = '2px';

		document.getElementById('alertDni').className = 'show';
		document.getElementById('alertDni').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorDni').innerHTML = 'El campo dni no puede contener más de 15 caracteres.';	

		$flag = false;
	}else{
		dni.style.borderColor = '#ccc';
		dni.style.borderWidth = '1px';

		document.getElementById('alertDni').className = 'hide';
	}
	
	if(pass.value == ''){
		pass.style.borderColor = '#a94442';
		pass.style.borderWidth = '2px';

		document.getElementById('alertPass').className = 'show';
		document.getElementById('alertPass').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorPass').innerHTML = 'Rellene el campo contraseña.';	

		$flag = false;
	}else if(dni.value.length > 20){
		pass.style.borderColor = '#ccc';
		pass.style.borderWidth = '1px';

		document.getElementById('alertPass').className = 'show';
		document.getElementById('alertPass').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorPass').innerHTML = 'El campo contraseña no puede contener más de 20 caracteres.';	

		$flag = false;
	}else{
		pass.style.borderColor = '#ccc';
		pass.style.borderWidth = '1px';

		document.getElementById('alertPass').className = 'hide';
	}

	if(name.value == ''){
		name.style.borderColor = '#a94442';
		name.style.borderWidth = '2px';

		document.getElementById('alertName').className = 'show';
		document.getElementById('alertName').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorName').innerHTML = 'Rellene el campo contraseña.';

		$flag = false;
	}else if(name.value.length > 20){
		name.style.borderColor = '#a94442';
		name.style.borderWidth = '2px';

		document.getElementById('alertName').className = 'show';
		document.getElementById('alertName').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorName').innerHTML = 'El campo contraseña no puede contener más de 20 caracteres.';

		$flag = false;
	}else{
		name.style.borderColor = '#ccc';
		name.style.borderWidth = '1px';

		document.getElementById('alertName').className = 'hide';
	}

	if(surname.value == ''){
		surname.style.borderColor = '#a94442';
		surname.style.borderWidth = '2px';

		document.getElementById('alertSurname').className = 'show';
		document.getElementById('alertSurname').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorSurname').innerHTML = 'Rellene el campo apellidos.';

		$flag = false;
	}else if(surname.value.length > 20){
		surname.style.borderColor = '#a94442';
		surname.style.borderWidth = '2px';

		document.getElementById('alertSurname').className = 'show';
		document.getElementById('alertSurname').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorSurname').innerHTML = 'El campo apellidos no puede contener más de 20 caracteres.';

		$flag = false;		
	}else{
		surname.style.borderColor = '#ccc';
		surname.style.borderWidth = '1px';

		document.getElementById('alertSurname').className = 'hide';
	}

	if(mail.value == '' && prephone.value == ''){
		mail.style.borderColor = '#a94442';
		mail.style.borderWidth = '2px';
		prephone.style.borderColor = '#a94442';
		prephone.style.borderWidth = '2px';

		document.getElementById('alertContact').className = 'show';
		document.getElementById('alertContact').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorContact').innerHTML = 'Rellene al menos un dato de contacto.';
	
		$flag = false;
	}else{
		document.getElementById('alertContact').className = 'hide';

		if(mail.value != '' && prephone.value == ''){
			if(mail.value.length > 50){
				mail.style.borderColor = '#a94442';
				mail.style.borderWidth = '2px';

				document.getElementById('alertMail').className = 'show';
				document.getElementById('alertMail').style.margin = '0px 0px 10px 0px';
				document.getElementById('errorMail').innerHTML = 'El campo correo no puede contener más de 50 caracteres.';

				$flag = false;
			}else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/).test(mail.value)){
				console.log('Correo erróneo');
				mail.style.borderColor = '#a94442';
				mail.style.borderWidth = '2px';

				document.getElementById('alertMail').className = 'show';
				document.getElementById('alertMail').style.margin = '0px 0px 10px 0px';
				document.getElementById('errorMail').innerHTML = 'El campo correo tiene un formato incorrecto.';

				$flag = false;
			}else{
				console.log('Correo correcto');
				mail.style.borderColor = '#ccc';
				mail.style.borderWidth = '1px';

				document.getElementById('alertMail').className = 'hide';
			}
		}else if(mail.value == '' && prephone.value != ''){
			if(!(/^\+[0-9]{1,4}\.[0-9]+$/.test(prephone.value))){
				prephone.style.borderColor = '#a94442';
				prephone.style.borderWidth = '2px';

				document.getElementById('alertPrephone').className = 'show';
				document.getElementById('alertPrephone').style.margin = '0px 0px 10px 0px';
				document.getElementById('errorPrephone').innerHTML = 'El campo teléfono tiene un formato incorrecto.';

				$flag = false;
			}else{
				prephone.style.borderColor = '#ccc';
				prephone.style.borderWidth = '1px';

				document.getElementById('alertPrephone').className = 'hide';
			}
		}else{
			if(mail.value.length > 50){
				mail.style.borderColor = '#a94442';
				mail.style.borderWidth = '2px';

				document.getElementById('alertMail').className = 'show';
				document.getElementById('alertMail').style.margin = '0px 0px 10px 0px';
				document.getElementById('errorMail').innerHTML = 'El campo correo no puede contener más de 50 caracteres.';

				$flag = false;
			}else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/)){
				mail.style.borderColor = '#a94442';
				mail.style.borderWidth = '2px';

				document.getElementById('alertMail').className = 'show';
				document.getElementById('alertMail').style.margin = '0px 0px 10px 0px';
				document.getElementById('errorMail').innerHTML = 'El campo correo tiene un formato incorrecto.';

				$flag = false;
			}else{
				mail.style.borderColor = '#ccc';
				mail.style.borderWidth = '1px';

				document.getElementById('alertMail').className = 'hide';
			}

			if(!(/^\+[0-9]{1,4}\.[0-9]+$/.test(prephone.value))){
				mail.style.borderColor = '#a94442';
				mail.style.borderWidth = '2px';

				document.getElementById('alertPrephone').className = 'show';
				document.getElementById('alertPrephone').style.margin = '0px 0px 10px 0px';
				document.getElementById('errorPrephone').innerHTML = 'El campo teléfono tiene un formato incorrecto.';

				$flag = false;
			}else{
				prephone.style.borderColor = '#ccc';
				prephone.style.borderWidth = '1px';

				document.getElementById('alertPrephone').className = 'hide';
			}
		}
	}

	return $flag;
}

/*
 * It checks if the fields of creator and updater of line are correct.
 *
 * @return {Boolean} 
 */
function line(){
	$flag = true;

	var name = document.getElementById('name');
	var description = document.getElementById('description');

	if(name.value == ''){
		name.style.borderColor = '#a94442';
		name.style.borderWidth = '2px';

		document.getElementById('alertName').className = 'show';
		document.getElementById('alertName').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorName').innerHTML = 'Rellene el campo nombre.';

		$flag = false;
	}else if(name.value.length > 25){
		name.style.borderColor = '#a94442';
		name.style.borderWidth = '2px';

		document.getElementById('alertName').className = 'show';
		document.getElementById('alertName').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorName').innerHTML = 'El campo nombre no puede contener más de 25 caracteres.';

		$flag = false;
	}else{
		name.style.borderColor = '#ccc';
		name.style.borderWidth = '1px';

		document.getElementById('alertName').className = 'hide';
	}

	if(description.value == ''){
		description.style.borderColor = '#a94442';
		description.style.borderWidth = '2px';

		document.getElementById('alertDescription').className = 'show';
		document.getElementById('alertDescription').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorDescription').innerHTML = 'Rellene el campo descripción.';

		$flag = false;
	}else if(description.value.length > 350){
		description.style.borderColor = '#a94442';
		description.style.borderWidth = '2px';

		document.getElementById('alertDescription').className = 'show';
		document.getElementById('alertDescription').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorDescription').innerHTML = 'El campo descripción no puede contener más de 350 caracteres.';

		$flag = false;
	}else{
		description.style.borderColor = '#ccc';
		description.style.borderWidth = '1px';

		document.getElementById('alertDescription').className = 'hide';
	}

	return $flag;
}

function device(){
	$flag = false;

	var serialNumber = document.getElementById('serialNumber');
	var name = document.getElementById('name');
	var cost = document.getElementById('cost');
	var description = document.getElementById('description');

	if(serialNumber.value == ''){
		serialNumber.style.borderColor = '#a94442';
		serialNumber.style.borderWidth = '2px';

		document.getElementById('alertSerialNumber').className = 'show';
		document.getElementById('alertSerialNumber').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorSerialNumber').innerHTML = 'Rellene el campo número de serie.';

		$flag = false;
	}else if(serialNumber.value.length > 50){
		serialNumber.style.borderColor = '#a94442';
		serialNumber.style.borderWidth = '2px';

		document.getElementById('alertSerialNumber').className = 'show';
		document.getElementById('alertSerialNumber').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorSerialNumber').innerHTML = 'El campo número de serie no puede contener más de 50 caracteres.';

		$flag = false;
	}else{
		serialNumber.style.borderColor = '#ccc';
		serialNumber.style.borderWidth = '1px';

		document.getElementById('alertSerialNumber').className = 'hide';
	}

	if(name.value == ''){
		name.style.borderColor = '#a94442';
		name.style.borderWidth = '2px';

		document.getElementById('alertName').className = 'show';
		document.getElementById('alertName').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorName').innerHTML = 'Rellene el campo nombre.';

		$flag = false;
	}else if(name.value.length > 25){
		name.style.borderColor = '#a94442';
		name.style.borderWidth = '2px';

		document.getElementById('alertName').className = 'show';
		document.getElementById('alertName').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorName').innerHTML = 'El campo nombre no puede contener más de 25 caracteres.';

		$flag = false;
	}else{
		name.style.borderColor = '#ccc';
		name.style.borderWidth = '1px';

		document.getElementById('alertName').className = 'hide';
	}

	if(cost.value == ''){
		cost.style.borderColor = '#a94442';
		cost.style.borderWidth = '2px';

		document.getElementById('alertCost').className = 'show';
		document.getElementById('alertCost').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorCost').innerHTML = 'Rellene el campo coste.';

		$flag = false;
	}else if(!(/^([0-9]){1,7}(\.([0-9]){2})?$/).test(cost.value)){
		cost.style.borderColor = '#a94442';
		cost.style.borderWidth = '2px';

		document.getElementById('alertCost').className = 'show';
		document.getElementById('alertCost').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorCost').innerHTML = 'El campo coste no tiene el formato correcto.';

		$flag = false;
	}else{
		cost.style.borderColor = '#ccc';
		cost.style.borderWidth = '1px';

		document.getElementById('alertCost').className = 'hide';
	}

	if(description.value == ''){
		description.style.borderColor = '#a94442';
		description.style.borderWidth = '2px';

		document.getElementById('alertDescription').className = 'show';
		document.getElementById('alertDescription').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorDescription').innerHTML = 'Rellene el campo descripción.';

		$flag = false;
	}else if(description.value.length > 350){
		description.style.borderColor = '#a94442';
		description.style.borderWidth = '2px';

		document.getElementById('alertDescription').className = 'show';
		document.getElementById('alertDescription').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorDescription').innerHTML = 'El campo descripción no puede contener más de 350 caracteres.';

		$flag = false;
	}else{
		description.style.borderColor = '#ccc';
		description.style.borderWidth = '1px';

		document.getElementById('alertDescription').className = 'hide';
	}

	return $flag;
}

function issue(){
	$flag = true;

	var title = document.getElementById('title');
	var description = document.getElementById('description');

	if(title.value == ''){
		title.style.borderColor = '#a94442';
		title.style.borderWidth = '2px';

		document.getElementById('alertTitle').className = 'show';
		document.getElementById('alertTitle').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorTitle').innerHTML = 'Rellene el campo título.';

		$flag = false;
	}else if(title.value.length > 35){
		title.style.borderColor = '#a94442';
		title.style.borderWidth = '2px';

		document.getElementById('alertTitle').className = 'show';
		document.getElementById('alertTitle').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorTitle').innerHTML = 'El campo título no puede contener más de 35 caracteres.';

		$flag = false;
	}else{
		title.style.borderColor = '#ccc';
		title.style.borderWidth = '1px';

		document.getElementById('alertTitle').className = 'hide';
	}
	
	if(!(/(\r\n|\n|\r)/).test(description)){
		description.style.borderColor = '#a94442';
		description.style.borderWidth = '2px';

		document.getElementById('alertDescription').className = 'show';
		document.getElementById('alertDescription').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorDescription').innerHTML = 'Rellene el campo descripción.';

		$flag = false;
	}else if(description.value.length > 350){
		description.style.borderColor = '#a94442';
		description.style.borderWidth = '2px';

		document.getElementById('alertDescription').className = 'show';
		document.getElementById('alertDescription').style.margin = '0px 0px 10px 0px';
		document.getElementById('errorDescription').innerHTML = 'El campo descripción no puede contener más de 350 caracteres.';

		$flag = false;
	}else{
		description.style.borderColor = '#ccc';
		description.style.borderWidth = '1px';

		document.getElementById('alertDescription').className = 'hide';
	}

	return $flag;
}