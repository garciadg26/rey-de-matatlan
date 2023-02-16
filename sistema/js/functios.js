	function borrado(delUrl) {
	  if (confirm("Estas seguro de Eliminar esta información?")) {
		document.location = delUrl;
	  }
	}
	function modificar(delUrl) {
	  if (confirm("Estas seguro de Eliminar esta información?")) {
		document.location = delUrl;
	  }
	}
	function confirmar(delUrl) {
	  if (confirm("Estas seguro de Confirmar esta cita?")) {
		document.location = delUrl;
	  }
	}
	function muestra() { 
		document.getElementById('subcat').style.display = "block"; 
	}
	
	function oculta(){	
		document.getElementById('subcat').style.display = "none"; 
	}
	
	function estatus(delUrl) {
	  if (confirm("Estas seguro de Cambiar el Estatus de esta COTIZACIÓN a PEDIDO?")) {
		document.location = delUrl;
	  }
	}
	
	
	
	function salir(delUrl) {
	  if (confirm("Estas seguro que deseas Abandonar la Sesion?")) {
		document.location = delUrl;
	  }
	}
	
	function valida_usuario(idp){	
		//document.getElementById('subcategorias').style.display = "block"; 
		if (idp != null) {
		$.ajax({
			type: 'POST',
			url: 'include/validar_usuario.php',
			data: 'id='+idp, 
			// Mostramos un mensaje con la respuesta de PHP
			success: function(data) {
			//$('#'+container).html(data);
			$('#user').css('display','block');
			$('#sub').html(data);
			$('#sub').focus();
			//$('#message').fadeOut('slow');
			}
		});
		} else  {
			alert('Por favor seleccione un ciudad');
			$('#subcategorias').focus();
		}
	}
	
	function validar_contrasena(){
		var p1 = document.getElementById("pwd").value;
		var p2 = document.getElementById("pwd2").value;
		
		if (p1 != p2) {
		  alert ("La contraseña no coincide");
		  pwd.focus();
		  return false;
		}
		if(p1.length<5){
			  alert ("La contraseña debe ser mayor de 5 caracteres.");
		 	 pwd.focus();
		  	return false;
		 }
	}
	
		
	function validar(){	
		var p1 = document.getElementById("contrasena").value;
		var p2 = document.getElementById("contrasena2").value;
		var p3 = document.getElementById("sucursal").value;
		
		var espacios = false;
		var cont = 0;
		 
		while (!espacios && (cont < p1.length)) {
		  if (p1.charAt(cont) == " ")
			espacios = true;
		  cont++;
		}
		
		if (p3 == "selecciona") {
		  alert ("Selecciona una sucursal");
		  sucursal.focus();
		  return false;
		}
		 
		if (espacios) {
		  alert ("La contraseña no puede contener espacios en blanco");
		  return false;
		}
		
		if (p1.length == 0 || p2.length == 0) {
			alert("Los campos de la contraseña no pueden quedar vacios");
			return false;
		}
		
		if (p1.length <= 5 || p2.length <= 5) {
			alert("La contraseña debe contener al menos 6 carácteres");
			return false;
		}
		
		if (p1 != p2) {
		  alert("Las contraseñas deben de coincidir");
		  return false;
		} 
		
	}
	
	function agregar_informacion(){
		$('#btn_agregar').css('display','none');
		$('#informacion').css('display','inline');
		$('#informacion').focus();
	}
	
	function validar_informacion(){	
		var p1 = document.getElementById("titulo").value;
		var p2 = document.getElementById("descripcion").value;
		
		if (p1 == null) {
			alert("Ingresa el título por favor");
			titulo.focus();
			return false;
		}
		
		if (p2.length == 0) {
			alert("Ingresa la información");
			descripcion.focus();
			return false;
		}
	}
	
	function validar_producto(){	
		var p1 = document.getElementById("categoria").value;
		var p2 = document.getElementById("nombre").value;
		
		if (p1 == 0) {
			alert("Selecciona una Categoría.");
			categoria.focus();
			return false;
		}
		
		if (p2.length == null || p2.length == 0) {
			alert("Ingresa un Nombre de producto.");
			nombre.focus();
			return false;
		}
	}
	
	function validar_foto(){	
		var p1 = document.getElementById("documento").value;
		
		if (p1.length == null || p1.length == 0) {
			alert("Selecciona una Imagen para subir.");
			documento.focus();
			return false;
		}
		
	}
	
	function validar_campo(){	
		var p1 = document.getElementById("nombre").value;
		var p2 = document.getElementById("precio").value;
		var p3 = document.getElementById("precio1").value;
		
		var espacios = false;
		var cont = 0;
		 
		while (!espacios && (cont < p1.length)) {
		  if (p1.charAt(cont) == " ")
			espacios = true;
		  cont++;
		}
		if (p1.length == 0) {
			alert("El campo no pueden quedar vacio");
			nombre.focus();
			return false;
		}
		if (p2.length == 0) {
			alert("El precio no pueden quedar vacio");
			precio.focus();
			return false;
		}
		if (p3.length == 0) {
			alert("El precio de descuento 1 no pueden quedar vacio");
			precio1.focus();
			return false;
		}
	}
	
function subcategorias(idp){
		$.ajax({
		type: 'POST',
		url: 'include/cargar_subcategorias.php',
		data: 'id='+idp, 
		// Mostramos un mensaje con la respuesta de PHP
		success: function(data) {
		//$('#'+container).html(data);
        $('#subcategorias_ocult').css('display','none');
		$('#mostrar_subcategorias').css('display','inline');
		$('#mostrar_subcategorias').html(data);
		$('#mostrar_subcategorias').focus();
		//$('#message').fadeOut('slow');
		}
	});	
}	
	
	function obtenersubcategoria2(idp) {
    if (idp > 0) {
	$.ajax({
		type: 'POST',
		url: 'include/buscar_sub.php',
		data: 'id='+idp, 
		// Mostramos un mensaje con la respuesta de PHP
		success: function(data) {
		//$('#'+container).html(data);
        $('#paso2').css('display','none');
        $('#paso3').css('display','inline');
		$('#sub2').html(data);
		$('#sub2').focus();
		//$('#message').fadeOut('slow');
		}
	});
    } else  {
        alert('Por favor selecciona una opcion');
        $('#modelo').focus();
    }
}

	function obtenertipo(idp) {
    if (idp == 0) {
		alert ("Por favor Selecciona el Tipo");
    }
}

function validar_tipo(){	
		var p1 = document.getElementById("tipo").value;
		if (p1 == 0) {
		alert ("Por favor Selecciona el Tipo");
		tipo.focus();
		return false;
    }
		
	}
	
	$(function() {
    	$( "#datepicker" ).datepicker(
			{dateFormat: 'yy-mm-dd'}
		);
  	});
	
	$(function() {
    	$( "#datepicker_2" ).datepicker(
			{dateFormat: 'yy-mm-dd'}
		);
  	});
	
	$(function() {
    	$( "#datepicker_3" ).datepicker(
			{dateFormat: 'yy-mm-dd'}
		);
  	});
  

	function info_usuario(idc){	
		if (idc != null) {
		$.ajax({
			type: 'POST',
			//url: 'include/listado_productos.php',
			url: 'include/informacion_usuarios.php',
			data: 'id='+idc, 
			success: function(data) {
			$('#informacion_usuario').css('display','block');
			$('#informacion_usuario').html(data);
			$('#informacion_usuario').focus();
			}
		});
		} 

	}
	
	function mostrar_listado(idc){	
		if (idc != null) {
		$.ajax({
			type: 'POST',
			//url: 'include/listado_productos.php',
			url: 'include/productos_consulta.php',
			data: 'id='+idc, 
			success: function(data) {
			$('#listado_productos').css('display','block');
			$('#listado_productos').html(data);
			$('#listado_productos').focus();
			}
		});
		} 

	}
	
	function mostrar_listado_giro(idc){	
		//if (idc != null) {
		$.ajax({
			type: 'POST',
			//url: 'include/listado_productos.php',
			url: 'include/productos_consulta_giro.php',
			data: 'id='+idc, 
			success: function(data) {
			$('#listado_productos').css('display','block');
			$('#listado_productos').html(data);
			$('#listado_productos').focus();
			}
		});
		//} 
	}
	
	function mostrar_listado_giro_modificar(idc,cot){	
		//if (idc != null) {
		$.ajax({
			type: 'POST',
			//url: 'include/listado_productos.php',
			url: 'include/productos_consulta_giro_modificar.php',
			//data: 'id='+idc,
			data: { id: idc , cotizacion: cot },
			success: function(data) {
			$('#listado_productos').css('display','block');
			$('#listado_productos').html(data);
			$('#listado_productos').focus();
			}
		});
		//} 
	}
	
	function mostrar_listado_marca(idc){	
		//if (idc != null) {
		$.ajax({
			type: 'POST',
			//url: 'include/listado_productos.php',
			url: 'include/productos_consulta_marca.php',
			data: 'id='+idc, 
			success: function(data) {
			$('#listado_productos').css('display','block');
			$('#listado_productos').html(data);
			$('#listado_productos').focus();
			}
		});
		//} 
	}
	
	function mostrar_listado_marca_modificar(idc,cot){	
		//if (idc != null) {
		$.ajax({
			type: 'POST',
			//url: 'include/listado_productos.php',
			url: 'include/productos_consulta_marca_modificar.php',
			data: { id: idc , cotizacion: cot },
			success: function(data) {
			$('#listado_productos').css('display','block');
			$('#listado_productos').html(data);
			$('#listado_productos').focus();
			}
		});
		//} 
	}
	
	function mostrar_listado_tipo(idp){	
		//document.getElementById('subcategorias').style.display = "block"; 
		if (idp > 0) {
		$.ajax({
			type: 'POST',
			url: 'include/mostrar_lineas.php',
			data: 'id='+idp, 
			// Mostramos un mensaje con la respuesta de PHP
			success: function(data) {
			//$('#'+container).html(data);
			$('#mostrar_linea').html(data);
			$('#mostrar_linea').css('display','block');
			$('#mostrar_linea').focus();
			//$('#message').fadeOut('slow');
			}
		});
		} else  {
			alert('Por favor seleccione una Categoria');
			$('#subcategorias').focus();
		}
	}
	
	function mostrar_listado_tipo_modificar(idp,cot){	
		//document.getElementById('subcategorias').style.display = "block"; 
		if (idp > 0) {
		$.ajax({
			type: 'POST',
			url: 'include/mostrar_lineas_modificar.php',
			data: { id: idp , cotizacion: cot },
			// Mostramos un mensaje con la respuesta de PHP
			success: function(data) {
			//$('#'+container).html(data);
			$('#mostrar_linea').html(data);
			$('#mostrar_linea').css('display','block');
			$('#mostrar_linea').focus();
			//$('#message').fadeOut('slow');
			}
		});
		} else  {
			alert('Por favor seleccione una Categoria');
			$('#subcategorias').focus();
		}
	}
	
	function mostrar_listado_linea(idc){	
		//if (idc != null) {
		$.ajax({
			type: 'POST',
			url: 'include/productos_consulta_tipo.php',
			data: 'id='+idc, 
			success: function(data) {
			$('#listado_productos').css('display','block');
			$('#listado_productos').html(data);
			$('#listado_productos').focus();
			}
		});
		//} 
	}
	
	function mostrar_listado_linea_modificar(idc,cot){	
		//if (idc != null) {
		$.ajax({
			type: 'POST',
			url: 'include/productos_consulta_tipo_modificar.php',
			data: { id: idc , cotizacion: cot },
			success: function(data) {
			$('#listado_productos').css('display','block');
			$('#listado_productos').html(data);
			$('#listado_productos').focus();
			}
		});
		//} 
	}
	
	function mostrar_listado_libre(palabra){
		var p1 = document.getElementById("palabra").value;
		if (p1.length == 0) {
			alert("Es necesario ingresar una busqueda valida");
			palabra.focus();
			return false;
		}
		$.ajax({
			type: 'POST',
			url: 'include/productos_consulta_libre.php',
			data: { busqueda: p1 },
			//data: 'id='+p1, 
			success: function(data) {
			$('#listado_productos').css('display','block');
			$('#listado_productos').html(data);
			$('#listado_productos').focus();
			}
		});
	}
	
	function mostrar_listado_libre_modificar(palabra,cot){
		var p1 = document.getElementById("palabra").value;
		var p2 = document.getElementById("cot").value;
		
		if (p1.length == 0) {
			alert("Es necesario ingresar una busqueda valida");
			palabra.focus();
			return false;
		}
		$.ajax({
			type: 'POST',
			url: 'include/productos_consulta_libre_modificar.php',
			//data: { busqueda: p1 },
			data: { busqueda: p1 , cotizacion: p2 },
			//data: 'id='+p1, 
			success: function(data) {
			$('#listado_productos').css('display','block');
			$('#listado_productos').html(data);
			$('#listado_productos').focus();
			}
		});
	}
	
	function informacion_producto(idp){	
		if (idp != null) {
		$.ajax({
			type: 'POST',
			url: 'include/informacion_producto.php', 
			data: 'id='+idp,
			success: function(data) {
			$('#informacion_producto').css('display','block');
			$('#informacion_producto').html(data);
			$('#informacion_producto').focus();
			document.location.href = "#informacion_producto";
			}
		});
		} 

	}
	
	function informacion_producto_modificar(idp,cot){	
		if (idp != null) {
		$.ajax({
			type: 'POST',
			url: 'include/informacion_producto_modificar.php',
			data: { id: idp , cotizacion: cot },
			//data: 'id='+idp,
			success: function(data) {
			$('#informacion_producto').css('display','block');
			$('#informacion_producto').html(data);
			$('#informacion_producto').focus();
			document.location.href = "#informacion_producto";
			}
		});
		} 

	}
	
	/*function agregar_producto(){	
		var p1 = document.getElementById("idproducto").value;
		var p2 = document.getElementById("color").value;
		var p3 = document.getElementById("color2").value;
		var p4 = document.getElementById("color3").value;
		if (p2 != "---") {
		$.ajax({
			type: 'POST',
			url: 'include/agregar.php', 
			data: { color: p2 , id: p1, color2:p3, color3:p4 },
			success: function(datos) {
			$('#agregados').css('display','block');
			$('#agregados').html(datos);
			$('#agregados').focus();
			//alert (datos);
			}
		});
		} else {
		
			alert("Elige un Color para agregar producto");
			info_producto.color.focus();
			return;
		} 

	}*/
	
	function agregar_comentarios(){	
		var p1 = document.getElementById("cotizacion").value;
		var p2 = document.getElementById("comentarios").value;
		if (p2 != "<p>---</p>") {
		$.ajax({
			type: 'POST',
			url: 'include/agregar_comentarios.php', 
			data: { comentarios: p2 , id: p1 },
			success: function(data) {
			$('#muestra_comentarios').css('display','block');
			$('#muestra_comentarios').html(datos);
			$('#muestra_comentarios').focus();
			//alert (data);
			}
		});
		} else {
			alert("Favor de agregar Comenatrios acerca de esta Cotizaci&oacute;n");
			forma_comentarios.comentarios.focus();
			return;
		} 

	}
	
	function agregar_producto_cotizacion(){	
		var p1 = document.getElementById("idproducto").value;
		var p2 = document.getElementById("color").value;
		var p3 = document.getElementById("cotizacion").value;
		var p4 = document.getElementById("color2").value;
		var p5 = document.getElementById("color3").value;
		if (p2 != "---") {
		$.ajax({
			type: 'POST',
			url: 'include/agregar_cotizacion.php', 
			data: { color: p2 , id: p1, cotizacion: p3, color2:p4, color3:p5 },
			success: function(datos) {
			$('#agregados').css('display','block');
			$('#agregados').html(datos);
			$('#agregados').focus();
			//alert (datos);
			}
		});
		} else {
			alert("Elige un Color para agregar producto");
			info_producto.color.focus();
			return;
		} 

	}
	
	function restar_producto(idp){	
		if (idp != null) {
		$.ajax({
			type: 'POST',
			url: 'include/restar.php', 
			data: 'id='+idp, 
			success: function(data) {
			$('#agregados').css('display','block');
			$('#agregados').html(data);
			$('#agregados').focus();
			}
		});
		} 
	}
	
	function restar_producto_modificar(idp,cot){	
		if (idp != null) {
		$.ajax({
			type: 'POST',
			url: 'include/restar_modificar.php', 
			data: { id: idp , cotizacion: cot },
			success: function(data) {
			$('#agregados').css('display','block');
			$('#agregados').html(data);
			$('#agregados').focus();
			}
		});
		} 
	}
	
	function aumentar_producto(idp){	
		if (idp != null) {
		$.ajax({
			type: 'POST',
			url: 'include/sumar.php', 
			data: 'id='+idp, 
			success: function(data) {
			$('#agregados').css('display','block');
			$('#agregados').html(data);
			$('#agregados').focus();
			}
		});
		} 
	}
	
	function aumentar_producto_modificar(idp,cot){	
		if (idp != null) {
		$.ajax({
			type: 'POST',
			url: 'include/sumar_modificar.php', 
			data: { id: idp , cotizacion: cot },
			success: function(data) {
			$('#agregados').css('display','block');
			$('#agregados').html(data);
			$('#agregados').focus();
			}
		});
		} 
	}
	
	function agregar_producto_borrar(idp){	
		if (idp != null) {
		var parametros = {
				"id" : idp
				//"accion" : borrar
			};
		$.ajax({
			type: 'POST',
			url: 'include/borrar.php', 
			//data: 'id='+idp &'accion=borrar',
			data: parametros,
			success: function(data) {
			$('#agregados').css('display','block');
			$('#agregados').html(data);
			$('#agregados').focus();
			}
		});
		} 

	}
	
	function agregar_producto_borrar_cotizacion(idp,cot){	
		if (idp != null) {
		/*var parametros = {
				"id" : idp,
				"cotizacion" : cotizacion
				//"accion" : borrar
			};*/
		$.ajax({
			type: 'POST',
			url: 'include/borrar_modificar.php',
			data: { id: idp , cotizacion: cot },
			success: function(data) {
			$('#agregados').css('display','block');
			$('#agregados').html(data);
			$('#agregados').focus();
			}
		});
		} 

	}
	
	function cerrar_informacion() {
		div = document.getElementById('informacion_producto');
		div.style.display='none';
	}
	
	
	
	
	
	
	function subcategoria(idp) {
		if(idp==1){
			$('#categoria_1').css('display','block');
			$('#categoria_2').css('display','none');
		}
		if(idp==2){
			$('#categoria_2').css('display','block');
			$('#categoria_1').css('display','none');
		}
	}
	
	function subcategoria2(idp) {
		if (idp != null) {
		$.ajax({
			type: 'POST',
			url: 'include/subcategoria2.php', 
			data: 'id='+idp, 
			success: function(data) {
			$('#bloque_subcategoria2').css('display','block');
			$('#bloque_subcategoria2').html(data);
			$('#bloque_subcategoria2').focus();
			}
		});
		}
	}
	
	function validar_categoria(){	
		var p1 = document.getElementById("es_subcategoria").value;
		
		if (p1 == 0) {
			alert("Selecciona una Opción");
			es_subcategoria.focus();
			return false;
		}
		
		if (p1 == 1) {
			var p2 = document.getElementById("titulo").value;
			
			if (p2.length == 0) {
				alert("El título no pueden quedar vacio");
				titulo.focus();
				return false;
			}
		}
		
		if (p1 == 2) {
			var p3 = document.getElementById("categoria").value;
			var p4 = document.getElementById("titulo2").value;
			
			if (p3 == 0) {
				alert("Selecciona una Categoría");
				categoria.focus();
				return false;
			}
			if (p4.length == 0) {
				alert("El título no pueden quedar vacio");
				titulo2.focus();
				return false;
			}
		}
		
		
	}
	
	function cargar_subcategoria(idp){	
		if (idp != null) {
		$.ajax({
			type: 'POST',
			url: 'include/subcategoria.php', 
			data: 'id='+idp, 
			success: function(data) {
			$('#mostrar_subcategoria').css('display','block');
			$('#mostrar_subcategoria').html(data);
			$('#mostrar_subcategoria').focus();
			}
		});
		} 
	}
	
	function cargar_subcategoria2(idp){	
		if (idp != null) {
		$.ajax({
			type: 'POST',
			url: 'include/subcategoria_2.php', 
			data: 'id='+idp, 
			success: function(data) {
			$('#mostrar_subcategoria_2').css('display','block');
			$('#mostrar_subcategoria_2').html(data);
			$('#mostrar_subcategoria_2').focus();
			}
		});
		} 
	}

	function agregar_usuario(){
		$('#iconos').css('display','none');
		$('#bloque_usuario').css('display','block');
	}
	function cerrar_agregar_usuario(){
		$('#iconos').css('display','block');
		$('#bloque_usuario').css('display','none');
		window.location.reload();
	}
	function agregar_venta(){
		$('#iconos').css('display','none');
		$('#bloque_venta').css('display','block');
	}
	function cerrar_agregar_venta(){
		$('#iconos').css('display','block');
		$('#bloque_venta').css('display','none');
		window.location.reload();
	}
	function cerrar_agregar_venta_2(){
		$('#iconos').css('display','block');
		$('#bloque_venta').css('display','none');
		$('#bloque_venta_producto').css('display','none');
		window.location.reload();
	}
	function cerrar_agregar_venta_3(){
		$('#iconos').css('display','block');
		$('#bloque_directo').css('display','none');
		window.location.reload();
	}
	
	function agregar_usuario_2(){
		var p1 = document.getElementById("nombre").value;
		var p2 = document.getElementById("telefono").value;
		var p3 = document.getElementById("correo").value;
		$.ajax({
			type: 'POST',
			url: 'include/agregar_usuario.php', 
			data: 'nombre2='+p1+'&telefono2='+p2+'&correo2='+p3, 
			success: function(data) {
			$('#resultado_agregar').css('display','block');
			$('#forma_agregar').css('display','none');
			$('#resultado_agregar').html(data);
			$('#resultado_agregar').focus();
			}
		});
	}
	
	function agregar_venta_2(){
		var p1 = document.getElementById("cliente").value;
		var p2 = document.getElementById("barbero").value;
		var p3 = document.getElementById("servicio").value;
		var p4 = document.getElementById("pago").value;
		var p5 = document.getElementById("descuento").value;
		$.ajax({
			type: 'POST',
			url: 'include/agregar_venta.php', 
			data: 'cliente2='+p1+'&barbero2='+p2+'&servicio2='+p3+'&pago2='+p4+'&descuento2='+p5,
			success: function(data) {
			$('#resultado_agregar_venta').css('display','block');
			$('#forma_venta').css('display','none');
			$('#resultado_agregar_venta').html(data);
			$('#resultado_agregar_venta').focus();
			}
		});
	}
	
	function compra_directa(id){
		$.ajax({
			type: 'POST',
			url: 'include/agregar_venta_directa.php', 
			data: 'cliente='+id,
			success: function(data) {
			//$('#forma_venta').css('display','none');
			$('#bloque_usuario').css('display','none');
			$('#bloque_directo').css('display','block');
			$('#bloque_directo').html(data);
			$('#bloque_directo').focus();
			}
		});
	}
	
	function compra_directa_2(id){
		$.ajax({
			type: 'POST',
			url: 'include/agregar_venta_directa_2.php', 
			data: 'cliente='+id,
			success: function(data) {
			//$('#forma_venta').css('display','none');
			$('#bloque_usuario').css('display','none');
			$('#bloque_directo').css('display','block');
			$('#bloque_directo').html(data);
			$('#bloque_directo').focus();
			}
		});
	}
	
	function agregar_venta_3(){
		var p1 = document.getElementById("cliente").value;
		var p2 = document.getElementById("barbero").value;
		var p3 = document.getElementById("servicio").value;
		var p4 = document.getElementById("pago").value;
		var p5 = document.getElementById("descuento").value;
		$.ajax({
			type: 'POST',
			url: 'include/agregar_venta.php', 
			data: 'cliente2='+p1+'&barbero2='+p2+'&servicio2='+p3+'&pago2='+p4+'&descuento2='+p5, 
			success: function(data) {
			$('#resultado_agregar_venta_2').css('display','block');
			$('#forma_venta_2').css('display','none');
			$('#resultado_agregar_venta_2').html(data);
			$('#resultado_agregar_venta_2').focus();
			}
		});
	}
	
	function finalizar_venta_1(venta){
		$.ajax({
			type: 'POST',
			url: 'include/finalizar_venta.php', 
			data: 'venta2='+venta, 
			success: function(data) {
			$('#botones_2').css('display','block');
			$('#botones_1').css('display','none');
			$('#botones_2').html(data);
			$('#botones_2').focus();
			}
		});
	}
	
	function finalizar_venta(venta){
		$.ajax({
			type: 'POST',
			url: 'include/finalizar_venta.php', 
			data: 'venta2='+venta, 
			success: function(data) {
			$('#botones_2_s').css('display','block');
			$('#botones_1_s').css('display','none');
			$('#botones_2_s').html(data);
			$('#botones_2_s').focus();
			}
		});
	}
	
	function finalizar_venta_producto(venta){
		$.ajax({
			type: 'POST',
			url: 'include/finalizar_venta_producto.php', 
			data: 'venta2='+venta, 
			success: function(data) {
			$('#botones_2').css('display','none');
			$('#resultado_agregar_venta').css('display','none');
			$('#botones_1').css('display','none');
			$('#botones_2').html(data);
			$('#botones_2').focus();
			window.location.reload();
			}
		});
		
	}
	
	function agregar_servicio(venta){
		$.ajax({
			type: 'POST',
			url: 'include/agregar_servicio.php', 
			data: 'venta2='+venta, 
			success: function(data) {
			$('#bloque_agregar_servicio').css('display','block');
			$('#resultado_agregar_venta').css('display','none');
			$('#resultado_agregar_venta_2').css('display','none');
			$('#bloque_agregar_servicio').html(data);
			$('#bloque_agregar_servicio').focus();
			}
		});
	}
	
	function agregar_servicio_directo(venta){
		$.ajax({
			type: 'POST',
			url: 'include/agregar_servicio.php', 
			data: 'venta2='+venta, 
			success: function(data) {
			$('#bloque_agregar_servicio_directo').css('display','block');
			$('#resultado_agregar_venta_2').css('display','none');
			$('#bloque_agregar_servicio_directo').html(data);
			$('#bloque_agregar_servicio_directo').focus();
			}
		});
	}
	
	function agregar_producto(venta){
		$.ajax({
			type: 'POST',
			url: 'include/agregar_producto.php', 
			data: 'venta2='+venta, 
			success: function(data) {
			$('#bloque_agregar_servicio').css('display','block');
			$('#resultado_agregar_venta').css('display','none');
			$('#resultado_agregar_venta_2').css('display','none');
			$('#bloque_agregar_servicio').html(data);
			$('#bloque_agregar_servicio').focus();
			}
		});
	}
	
	function agregar_servicio_a(){
		var p6 = document.getElementById("venta_s").value;
		var p7 = document.getElementById("barbero_s").value;
		var p8 = document.getElementById("servicio_s").value;
		var p9 = document.getElementById("pago_s").value;
		var p10 = document.getElementById("descuento_s").value;
		$.ajax({
			type: 'POST',
			url: 'include/agregar_servicio_2.php', 
			data: 'venta2='+p6+'&barbero2='+p7+'&servicio2='+p8+'&pago2='+p9+'&descuento2='+p10,
			success: function(data) {
			$('#resultado_agregar_servicio').css('display','block');
			$('#forma_venta_servicio').css('display','none');
			$('#resultado_agregar_servicio').html(data);
			$('#resultado_agregar_servicio').focus();
			}
		});
	}
	
	function agregar_producto_a(){
		var p6 = document.getElementById("venta_s").value;
		var p7 = document.getElementById("barbero_s").value;
		var p8 = document.getElementById("producto_s").value;
		var p9 = document.getElementById("pago_s").value;
		var p10 = document.getElementById("descuento_s").value;
		$.ajax({
			type: 'POST',
			url: 'include/agregar_producto_2.php', 
			data: 'venta2='+p6+'&barbero2='+p7+'&producto2='+p8+'&pago2='+p9+'&descuento2='+p10,
			success: function(data) {
			$('#resultado_agregar_servicio').css('display','block');
			$('#forma_venta_servicio').css('display','none');
			$('#resultado_agregar_servicio').html(data);
			$('#resultado_agregar_servicio').focus();
			}
		});
	}
	
	function ver_detalle_servicio(id){
		$.ajax({
			type: 'POST',
			url: 'include/listado.php', 
			data: 'venta2='+id,
			success: function(data) {
			$('#bloque_mas').css('display','block');
			$('#bloque_mas_2').css('display','block');
			$('#bloque_mas_2').html(data);
			$('#bloque_mas_2').focus();
			}
		});
	}
	
	function cerrar_listado(){
		$('#bloque_mas').css('display','none');
		window.location.reload();
	}
	
	function buscador(){
		var p1 = document.getElementById("palabra").value;
		$.ajax({
			type: 'POST',
			url: 'include/buscador.php', 
			data: 'palabra2='+p1,
			success: function(data) {
			$('#bloque_listado_buscar').css('display','block');
			$('#bloque_listado_buscar').html(data);
			$('#bloque_listado_buscar').focus();
			}
		});
	}
	
	function buscador_nuevo(){
		var p1 = document.getElementById("palabra").value;
		$.ajax({
			type: 'POST',
			url: 'include/buscador_nuevo.php', 
			data: 'palabra2='+p1,
			success: function(data) {
			$('#bloque_listado_buscar_nuevo').css('display','block');
			$('#bloque_listado_buscar_nuevo').html(data);
			$('#bloque_listado_buscar_nuevo').focus();
			}
		});
	}
	
	function filtrar_productos_p(marca){
		$.ajax({
			type: 'POST',
			url: 'include/cargar_productos.php', 
			data: 'marca2='+marca,
			success: function(data) {
			$('#combo_productos_p').css('display','block');
			$('#combo_productos_p').html(data);
			$('#combo_productos_p').focus();
			}
		});
	}
	
	function filtrar_productos_p_modificar(marca){
		$.ajax({
			type: 'POST',
			url: 'include/cargar_productos_p.php', 
			data: 'marca2='+marca,
			success: function(data) {
			$('#combo_producto_modificar').css('display','none');
			$('#combo_productos_p_modificar').css('display','block');
			$('#combo_productos_p_modificar').html(data);
			$('#combo_productos_p_modificar').focus();
			}
		});
	}
	
	function filtrar_productos(marca){
		$.ajax({
			type: 'POST',
			url: 'include/cargar_productos.php', 
			data: 'marca2='+marca,
			success: function(data) {
			$('#combo_productos').css('display','block');
			$('#combo_productos').html(data);
			$('#combo_productos').focus();
			}
		});
	}
	
	function agregar_venta_producto(){
		//$('#iconos').css('display','none');
		$('#bloque_venta_producto').css('display','block');
	}
	
	function cerrar_agregar_venta_producto(){
		//$('#iconos').css('display','block');
		$('#bloque_venta_producto').css('display','none');
		window.location.reload();
	}
	
	function agregar_venta_2_producto(){
		var p1 = document.getElementById("cliente_p").value;
		var p2 = document.getElementById("barbero_p").value;
		var p3 = document.getElementById("producto_s").value;
		var p4 = document.getElementById("pago_s").value;
		var p5 = document.getElementById("descuento_s").value;
		$.ajax({
			type: 'POST',
			url: 'include/agregar_venta_producto.php', 
			data: 'cliente2='+p1+'&barbero2='+p2+'&producto2='+p3+'&pago2='+p4+'&descuento2='+p5,
			success: function(data) {
			$('#resultado_agregar_venta_producto').css('display','block');
			$('#forma_venta_producto').css('display','none');
			$('#resultado_agregar_venta_producto').html(data);
			$('#resultado_agregar_venta_producto').focus();
			}
		});
	}
	
	function final_propina(){
		var p1 = document.getElementById("venta").value;
		var p2 = document.getElementById("propina").value;
		$.ajax({
			type: 'POST',
			url: 'include/finalizar_venta_propina.php', 
			data: 'venta2='+p1+'&propina2='+p2,
			success: function(data) {
			$('#bloque_forma_propina').css('display','none');
			$('#bloque_propina').css('display','block');
			$('#bloque_propina').html(data);
			$('#bloque_propina').focus();
			}
		});
	}
	
	function modificar_venta(venta){
		$.ajax({
			type: 'POST',
			url: 'include/modificar_venta.php', 
			data: 'venta2='+venta,
			success: function(data) {
			$('#bloque_modificar').css('display','block');
			$('#bloque_modificar_2').html(data);
			$('#bloque_modificar_2').focus();
			}
		});
	}
	function modificar_venta_listado(detalle){
		$.ajax({
			type: 'POST',
			url: 'include/modificar_venta_listado.php', 
			data: 'detalle2='+detalle,
			success: function(data) {
			$('#bloque_modificar').css('display','block');
			$('#bloque_mas').css('display','none');
			$('#bloque_mas_2').css('display','none');
			$('#bloque_modificar_2').html(data);
			$('#bloque_modificar_2').focus();
			}
		});
	}
	function modificar_venta_mas(venta){
		$.ajax({
			type: 'POST',
			url: 'include/modificar_venta_mas.php', 
			data: 'venta2='+venta,
			success: function(data) {
			$('#bloque_modificar').css('display','block');
			$('#bloque_modificar_2').html(data);
			$('#bloque_modificar_2').focus();
			}
		});
	}
	
	function modificar_venta_producto(venta){
		$.ajax({
			type: 'POST',
			url: 'include/modificar_venta_producto.php', 
			data: 'venta2='+venta,
			success: function(data) {
			$('#bloque_modificar').css('display','block');
			$('#bloque_modificar_2').html(data);
			$('#bloque_modificar_2').focus();
			}
		});
	}
	
	function modificar_producto_listado(detalle){
		$.ajax({
			type: 'POST',
			url: 'include/modificar_producto_listado.php', 
			data: 'detalle2='+detalle,
			success: function(data) {
			$('#bloque_modificar').css('display','block');
			$('#bloque_mas').css('display','none');
			$('#bloque_mas_2').css('display','none');
			$('#bloque_modificar_2').html(data);
			$('#bloque_modificar_2').focus();
			}
		});
	}
	
	function cerrar_modificar_venta(){
		$('#bloque_modificar').css('display','none');
		window.location.reload();
	}
	
	function modificar_servicio(){
		var p1 = document.getElementById("venta_m").value;
		var p2 = document.getElementById("cliente_m").value;
		var p3 = document.getElementById("barbero_m").value;
		var p4 = document.getElementById("servicio_m").value;
		var p5 = document.getElementById("pago_m").value;
		var p6 = document.getElementById("descuento_m").value;
		$.ajax({
			type: 'POST',
			url: 'include/modificar_venta_2.php', 
			data: 'venta2='+p1+'&cliente2='+p2+'&barbero2='+p3+'&servicio2='+p4+'&pago2='+p5+'&descuento2='+p6,
			success: function(data) {
			$('#resultado_agregar_servicio').css('display','block');
			$('#forma_modificar_servicio').css('display','none');
			$('#resultado_agregar_servicio').html(data);
			$('#resultado_agregar_servicio').focus();
			}
		});
	}
	
	function modificar_servicio_listado(){
		var p1 = document.getElementById("venta_m").value;
		var p2 = document.getElementById("cliente_m").value;
		var p3 = document.getElementById("barbero_m").value;
		var p4 = document.getElementById("servicio_m").value;
		var p5 = document.getElementById("pago_m").value;
		var p6 = document.getElementById("descuento_m").value;
		var p7 = document.getElementById("detalle_m").value;
		$.ajax({
			type: 'POST',
			url: 'include/modificar_venta_2_listado.php', 
			data: 'venta2='+p1+'&cliente2='+p2+'&barbero2='+p3+'&servicio2='+p4+'&pago2='+p5+'&descuento2='+p6+'&detalle2='+p7,
			success: function(data) {
			$('#resultado_agregar_servicio').css('display','block');
			$('#forma_modificar_servicio').css('display','none');
			$('#resultado_agregar_servicio').html(data);
			$('#resultado_agregar_servicio').focus();
			}
		});
	}
	
	function modificar_producto_listado_2(){
		var p1 = document.getElementById("venta_p").value;
		var p2 = document.getElementById("cliente_p").value;
		var p3 = document.getElementById("barbero_p").value;
		var p4 = document.getElementById("producto_sp").value;
		var p5 = document.getElementById("pago_p").value;
		var p6 = document.getElementById("descuento_p").value;
		var p7 = document.getElementById("detalle_p").value;
		$.ajax({
			type: 'POST',
			url: 'include/modificar_producto_2_listado.php', 
			data: 'venta2='+p1+'&cliente2='+p2+'&barbero2='+p3+'&producto2='+p4+'&pago2='+p5+'&descuento2='+p6+'&detalle2='+p7,
			success: function(data) {
			$('#resultado_agregar_servicio').css('display','block');
			$('#forma_modificar_servicio').css('display','none');
			$('#resultado_agregar_servicio').html(data);
			$('#resultado_agregar_servicio').focus();
			}
		});
	}
	
	function modificar_producto(){
		var p1 = document.getElementById("venta_p").value;
		var p2 = document.getElementById("cliente_p").value;
		var p3 = document.getElementById("barbero_p").value;
		var p4 = document.getElementById("producto_sp").value;
		var p5 = document.getElementById("pago_p").value;
		var p6 = document.getElementById("descuento_p").value;
		$.ajax({
			type: 'POST',
			url: 'include/modificar_venta_2_producto.php', 
			data: 'venta2='+p1+'&cliente2='+p2+'&barbero2='+p3+'&producto2='+p4+'&pago2='+p5+'&descuento2='+p6,
			success: function(data) {
			$('#resultado_agregar_producto').css('display','block');
			$('#forma_modificar_producto').css('display','none');
			$('#resultado_agregar_producto').html(data);
			$('#resultado_agregar_producto').focus();
			}
		});
	}
	
	function agregar_salida(){
		$('#bloque_salidas').css('display','block');
	}
	
	function cerrar_salida(){
		$('#bloque_salidas').css('display','none');
		 window.location.reload();
	}
	
	function agregar_salida_2(){
		var p1 = document.getElementById("barbero").value;
		var p2 = document.getElementById("tipo").value;
		var p3 = document.getElementById("datepicker").value;
		var p4 = document.getElementById("monto").value;
		var p5 = document.getElementById("concepto").value;
		$.ajax({
			type: 'POST',
			url: 'include/agregar_salida.php', 
			data: 'barbero2='+p1+'&tipo2='+p2+'&fecha2='+p3+'&monto2='+p4+'&concepto2='+p5,
			success: function(data) {
			$('#bloque_salidas_3').css('display','block');
			$('#bloque_salidas_2').css('display','none');
			$('#bloque_salidas_3').html(data);
			$('#bloque_salidas_3').focus();
			}
		});
	}
	
	function finalizar_salida(){
		$('#bloque_salidas').css('display','none');
		$('#bloque_salidas_3').css('display','none');
		 window.location.reload();
	}
	
	function agregar_entrada_salida(){
		$('#bloque_entradas_salidas').css('display','block');
	}
	function cerrar_entrada_salida(){
		$('#bloque_entradas_salidas').css('display','none');
		 window.location.reload();
	}
	function agregar_entrada_salida_2(){
		var p1 = document.getElementById("barbero").value;
		var p2 = document.getElementById("tipo").value;
		var p3 = document.getElementById("forma").value;
		var p4 = document.getElementById("datepicker").value;
		var p5 = document.getElementById("monto").value;
		var p6 = document.getElementById("concepto").value;
		$.ajax({
			type: 'POST',
			url: 'include/agregar_entrada_salida.php', 
			data: 'barbero2='+p1+'&tipo2='+p2+'&forma2='+p3+'&fecha2='+p4+'&monto2='+p5+'&concepto2='+p6,
			success: function(data) {
			$('#bloque_salidas_3').css('display','block');
			$('#bloque_salidas_2').css('display','none');
			$('#bloque_salidas_3').html(data);
			$('#bloque_salidas_3').focus();
			}
		});
	}
	function finalizar_entrada_salida(){
		$('#bloque_entradas_salidas').css('display','none');
		$('#bloque_salidas_3').css('display','none');
		 window.location.reload();
	}
	
	function borrado_servicio(id){
		$.ajax({
			type: 'POST',
			url: 'include/borrar_servicio.php', 
			data: 'id2='+id,
			success: function(data) {
			$('#bloque_mas_2').css('display','none');
			$('#bloque_mas_3').css('display','block');
			$('#bloque_mas_3').html(data);
			$('#bloque_mas_3').focus();
			}
		});
	}
	function borrado_producto(id){
		$.ajax({
			type: 'POST',
			url: 'include/borrar_producto.php', 
			data: 'id2='+id,
			success: function(data) {
			$('#bloque_mas_2').css('display','none');
			$('#bloque_mas_3').css('display','block');
			$('#bloque_mas_3').html(data);
			$('#bloque_mas_3').focus();
			}
		});
	}
	
	function mostrar_agregar_inventario(){
		$('#bloque_inventario').css('display','none');
		$('#agregar_inventario').css('display','block');
	}
	function cerrar_agregar_inventario(){
		$('#bloque_inventario').css('display','block');
		$('#agregar_inventario').css('display','none');
	}
	
	function buscar_letra(letra){
		$.ajax({
			type: 'POST',
			url: 'include/buscar_letra.php', 
			data: 'letra2='+letra,
			success: function(data) {
			$('#abecedario').css('display','none');
			$('#listado_clientes').css('display','none');
			$('#listado_clientes_2').css('display','block');
			$('#listado_clientes_2').html(data);
			$('#listado_clientes_2').focus();
			}
		});
	}
	
	function buscar_letra_oculta(letra){
		$.ajax({
			type: 'POST',
			url: 'include/buscar_letra_oculta.php', 
			data: 'letra2='+letra,
			success: function(data) {
			$('#abecedario2').css('display','none');
			$('#btn_abecedario').css('display','block');
		
			$('#abecedario').css('display','none');
			$('#listado_clientes').css('display','none');
			$('#listado_clientes_2').css('display','block');
			$('#listado_clientes_2').html(data);
			$('#listado_clientes_2').focus();
			}
		});
	}
	
	function ocultar_letras(){
		$('#abecedario').css('display','none');
		$('#abecedario2').css('display','none');
		$('#btn_abecedario').css('display','block');
		//window.location.reload();
	}
	
	function mostrar_letras(){
		$('#abecedario').css('display','block');
		$('#btn_abecedario').css('display','none');
	}
	
	function cambiar_fecha(id){
		$.ajax({
			type: 'POST',
			url: 'include/cambiar_fecha.php', 
			data: 'id2='+id,
			success: function(data) {
			$('#bloque_fecha').css('display','block');
			$('#bloque_fecha').html(data);
			$('#bloque_fecha').focus();
			}
		});
	}
	
	function cambiar_fecha_2(){
		var p1 = document.getElementById("folio").value;
		var p2 = document.getElementById("datepicker").value;
		$.ajax({
			type: 'POST',
			url: 'include/cambiar_fecha_2.php', 
			data: 'folio2='+p1+'&fecha='+p2,
			success: function(data) {
			$('#b_fecha_1').css('display','none');
			$('#b_fecha_2').css('display','block');
			$('#b_fecha_2').html(data);
			$('#b_fecha_2').focus();
			}
		});
	}
	
	function cerrar_modificar_fecha(){
		$('#bloque_fecha').css('display','none');
		window.location.reload();
	}
	
	
	
	