// Documento JavaScript
// Esta función cargará las paginas
function llamarasincrono (url, id_contenedor,j)
{
	var pagina_requerida = false;
//---------------------------------------------------------------------------------------
	if (window.XMLHttpRequest)
	{
		// Si es Mozilla, Safari etc
		pagina_requerida = new XMLHttpRequest ();
	}
	else if (window.ActiveXObject)
	{
		// pero si es IE
		try
		{
			pagina_requerida = new ActiveXObject ("Msxml2.XMLHTTP");
		}
		catch (e)
		{
			// en caso que sea una versión antigua
			try
			{
				pagina_requerida = new ActiveXObject ("Microsoft.XMLHTTP");
			}
			catch (e)
			{
			}
		}
	}
	else
		return false;
		pagina_requerida.onreadystatechange = function ()
		{
			// función de respuesta
			cargarpagina (pagina_requerida, id_contenedor);
		}
		pagina_requerida.open ('GET', url, true);
		// asignamos los métodos open y send
		pagina_requerida.send (null);
}
// todo es correcto y ha llegado el momento de poner la información requerida
// en su sitio en la pagina xhtml
function cargarpagina (pagina_requerida, id_contenedor)
{
	if (pagina_requerida.readyState == 4 && (pagina_requerida.status == 200 || window.location.href.indexOf ("http") == - 1))
	document.getElementById (id_contenedor).innerHTML = pagina_requerida.responseText;
}
//-----------FUNCION PARA MOSTRAR LAS TABLAS INVISIBLES----------------------------------
function mostrar(nombre)
{
	obj = document.getElementById(nombre);
	obj.style.display='';
}
//--------METODO PARA QUITAR LAS DIV-----------------------------------------------------
function quitardivs(nombrediv)
{
    if(document.getElementById(nombrediv))
    {
    	obj=document.getElementById(nombrediv);
    	obj.innerHTML="";
    	obj.style.display="none";
    }
	//alert(obj)
	//var padre=obj.parentNode;
	//padre.removeChild(obj);
}
//--------METODO PARA QUITAR LAS DIV-----------------------------------------------------
function limpiardiv(nombrediv)
{
    if(document.getElementById(nombrediv))
    {
    	obj=document.getElementById(nombrediv);
    	obj.innerHTML="";
    }
	//alert(obj)
	//var padre=obj.parentNode;
	//padre.removeChild(obj);
}
//------------FUNCION PARA CREAR UN NUEVO AJAX-------------------------------------------
var contdiv=0;
function nuevoajax(url,divPadre,parametros)
{
	contdiv++;
    url=url+"?j="+contdiv+parametros;
	// Div donde se agregara la nueva linea
	var content = document.getElementById(divPadre);
	content.style.display="";
	// Se crea un nuevo "DIV" que se agregara a content
	var divIdName = 'DivHija' + contdiv;
	var newDiv = document.createElement('div');
	//Ponemos atributos a la div
	newDiv.setAttribute('id', divIdName);
	content.appendChild(newDiv);
	llamarasincrono(url,divIdName,parametros);
}
//----------FUNCION PARA OCULTAR OBJETOS-------------------------------------------------
function ocultar(Nombre)
{
	obj=document.getElementById(Nombre);
	obj.style.display="none";
}