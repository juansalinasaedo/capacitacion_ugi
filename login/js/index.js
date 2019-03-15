
window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
							//Ocultar('contenido');/* "contenido_a_mostrar" es el nombre de la etiqueta DIV que deseamos mostrar */
							window.document.ingreso.login.focus();
							}



function Validar(form)
{
	if(ingreso.user.value=="")
	{
		alert("Debe ingresar el Usuario para Continuar");
		ingreso.user.focus();
		return false;
	}
	if(ingreso.passw.value=="")
	{
		alert("Debe ingresar su Password para Continuar");
		ingreso.passw.focus();
		return false;
	}
	
	//Crear objeto de AJAX
	ajax=crearAjax();
  
	//Enviar información por el metodo 	GET
   ajax.open("GET", "login/php/login_fiscalia.php?user="+ingreso.user.value+"&passw="+ingreso.passw.value,true);
   
	ajax.onreadystatechange=function()
	{
		
		if (ajax.readyState==4)
		{
			respuesta= ajax.responseText;
			if(respuesta!="")
			{
				//alert(respuesta);
				swal({   title: "Error!",   text: respuesta ,   imageUrl: "images/logo.jpg" });
					
			}
			else
			{
				
				
				window.location.href = "bienvenido.php";	
			}
		}
	}
	ajax.send(null);
	
	
	return false;
}

function Pre_validar(form)
{
	if(Validar(form))
	{
		form.submit();
	}
}