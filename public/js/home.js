function plus(operator, obj){

	if(operator == "-"){
		if(obj.nextElementSibling.firstElementChild.value > 1)
			obj.nextElementSibling.firstElementChild.value -= 1;
	}else{
		obj.previousElementSibling.firstElementChild.value = parseInt(obj.previousElementSibling.firstElementChild.value) + 1;
		
	}
}
function check2(obj){
	if(obj.checked == true){
		var $div = $("#button");
		var _label = $('<label class="control-label col-md-4">Agregar Medida</label>');
		var _button = $('<div class="col-md-2"><button type="button" class="btn btn-primary" onclick="return addMedida(this);">Agregar </button></div>');
		$div.append(_label);
		$div.append(_button);

		$div.show();

	}else{
		if(confirm('¿comfirma quitar las medidas?')){
			var button = document.getElementById("button");
			var div = document.getElementById("div");
			while(button.firstChild){
				button.removeChild(button.firstChild);
			}
			while(div.firstChild){
				div.removeChild(div.firstChild);
			}
	    }
	}
}
function check3(obj){
	if(obj.checked == true){
		var $div = $("#button2");
		var _label = $('<label class="control-label col-md-4">Agregar Color</label>');
		var _button = $('<div class="col-md-2"><button type="button" class="btn btn-primary" onclick="return addColor(this);">Agregar </button></div>');
		$div.append(_label);
		$div.append(_button);

		$div.show();

	}else{
		if(confirm('¿comfirma quitar los colores?')){
			var button = document.getElementById("button2");
			var div = document.getElementById("div1");
			while(button.firstChild){
				button.removeChild(button.firstChild);
			}
			while(div.firstChild){
				div.removeChild(div.firstChild);
			}
	    }
	}
}

function addColor(obj){
	var $div = $("#div1");
	//var _hidden = $('')
	var _label = $('<label class="control-label col-md-3">Nuevo Color</label>');
	var _button = $('<div class="col-md-7"><input type="text" class="form-control" name="colors[]"></div>');
	$div.append(_label);
	$div.append(_button);
}

function addMedida(obj){
	var $div = $("#div");
	//var _hidden = $('')
	var _label = $('<label class="control-label col-md-3">Nueva medida</label>');
	var _button = $('<div class="col-md-3"><input type="text" class="form-control" name="medidas[]"></div>');
	var _precios = $('<label class="col-md-1 control-label">Precio</label><div class="col-md-3"><input type="number" name="precios[]" class="form-control" value=""></div>')
	$div.append(_label);
	$div.append(_button);
	$div.append(_precios);
}

function sendPrice(obj){
	var precio = obj.val().split("//");
	var $h4 = $("#precio");
	if(precio[1] > 0)
		$h4.text(precio[1]);
	else
		$h4.text($("#realPrecio").val());
}