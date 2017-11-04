$.fn.editable.defaults.mode = 'inline';
$.fn.editable.defaults.ajaxOptions = {type: 'PUT'};

$(document).ready(function(){
	check();
	check2();
	$(".textarea").summernote();
	$(".set-guide-number").editable();
	$(".select-status").editable({
		source: [
			{value: "creado", text: "Creado"},
			{value: "enviado", text: "Enviado"},
			{value: "recibido", text: "Recibido"}
		]
	});

	$(".add-to-cart").on("submit", function(ev){
		ev.preventDefault();

		var $form = $(this);
		
		var $button =  $form.find("[type = 'submit']");

		//peticion AJAX
		
		$.ajax({
			url: $form.attr("action"),
			method: $form.attr("method"),
			data: $form.serialize(),
			dataType: "JSON",
			beforeSend: function(){
				$button.val("Cargando...");
			},
			success: function(data){
				$button.css("background-color","#00c853").val("Agregado");
				document.getElementById("cant").value = 1;
				$(".circle-shopping-cart").html(data.products_count).addClass("highlight");
				setTimeout(function(){
					restartButton($button);
				},2000);
			},
			error: function(err){
				console.log(err);
				$button.css("background-color","#d50000").val("Hubo un error.");
				setTimeout(function(){
					restartButton($button);
				},2000);
			}

			});

		return false;
	});

	function restartButton($button){
		$button.val("Agregar").attr("style","");
		$(".circle-shopping-cart").removeClass("highlight");

	}

});

function check(){
	if($("#check").attr("checked") == "checked"){
		var $div = $("#button");
		var _label = $('<label class="control-label col-md-4">Agregar Medida</label>');
		var _button = $('<div class="col-md-2"><button type="button" class="btn btn-primary" onclick="return addMedida(this);">Agregar </button></div>');
		$div.append(_label);
		$div.append(_button);

		$div.show();

	}
}
function check2(){
	if($("#check_color").attr("checked") == "checked"){
		var $div = $("#button2");
		var _label = $('<label class="control-label col-md-4">Agregar Color</label>');
		var _button = $('<div class="col-md-2"><button type="button" class="btn btn-primary" onclick="return addColor(this);">Agregar </button></div>');
		$div.append(_label);
		$div.append(_button);

		$div.show();

	}
}

