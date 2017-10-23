//************************** globales *********************
var gobIDElim,gobIDEdit;
var passHabilita=0;
//**************************************************
//*************************Iniciales
/*$('#contenidoCrud').mouseenter(function(){
    document.getElementById('formUser').reset();
});
*/
//***********************************
//************************** tabla ***********************


$('#tablaPro').DataTable( {

    info:     false,



    language: {

        search: "Buscar",
        sLengthMenu:" _MENU_ ",

        paginate:{

            previous: "Anterior",
            next: "Siguiente",

        },

    },
    /*
			   "scrollY":        "375px",
        "scrollCollapse": true,
        "paging":         true
         */
} );


//$('select').material_select();

//*********************************************************

//*************** modal ***********************************






function abrirProvNuevo(){

    $('#btnActualizar').hide();
    $('#btnInsertar').show();
    $('#modal1P').openModal();
	cierre();
}

function seleccionar(id)
{


	buscarNIT(id);
	 
	$('#modal4').closeModal();
	cierre();
}
$('.modaleliminarP').click(function(){

    event.preventDefault();

    gobIDElim = event.target.dataset.elim;

    $('#modal3P').openModal();

});







$(".dropdown-button").dropdown();

//*********************************************************




//comprobaciones
function distribuidores(prov)
{


		$('#modal4P').openModal();
		llamarDistribuidor();


}
function llamarDistribuidor()
{

	$.ajax
        ({
            type:"POST",
            url:"Distribuidores.php",
            success: function(resp)
            {
				$('#distribuidorContenedor').html(resp);
            }
        });
}


//**********************



function ingresarProveedorP(){

    // alert('hola');

    $('#precargar').show();

    var  nombre, direccion, telefono, nit, cuenta,  trasDato;

        nombre = $('#nombreP').val();
		direccion = $('#direccionP').val();
		telefono = $('#telefonoP').val();
		nit = $('#nitP').val();
		cuenta = $('#cuentaDepP').val();
		codigo = $('#codigoP').val();
		
		if(codigo=="")
		{
			trasDato = 1;
		}
		else
		{
        	trasDato = 3;
		}



        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/proveedorControlador.php",
            data:' nombre=' +  nombre + '&direccion=' + direccion + '&nit=' + nit + '&telefono=' + telefono + '&cuenta=' + cuenta + '&codigo=' + codigo + '&trasDato=' + trasDato,
            success: function(resp)
            {

                
                {
					  cierre();
					  if(typeof llamarProveedor === 'function') 
					  {
							//Es seguro ejecutar la función
							llamarProveedor();
						}
						else
						{
							location.reload();
						}
					
                }


            }
        });



}



function editarProv(id,url)
{

    $('#modal3P').openModal();
    $('#btnInsertarP33').attr('href',url)
    $('#imagenver1 > source').attr('src',url);
    document.getElementById('imagenver1').load();
	trasDato = 2;
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/proveedorControlador.php",
            data:' id=' +  id + '&trasDato=' + trasDato,
            success: function(resp)
            {
				$('#mensajeP2').html(resp);
            }     
        });
	
}


function subirImagenes(archivo,tipoAR,id,idusua){
	//document.getElementById('barra_de_progreso').hidden = false;
	var archivos=archivo.files;
	var i=0;
	var size=archivos[i].size;
	var type=archivos[i].type;
	var name=$('#nombreP').val();
    var usua=idusua;
   // alert(archivo);
    	if(size<(100*(1024*1024))){
        if(type=="video/mp4" || type=="video/avi" || type=="video/mov" || type=="video/flv" || type=="video/mkv" || type=="video/wmv"){    
            //document.getElementById(id+'Puesta').src = path;
			$("#"+id).upload('../core/controlador/clientesControlador.php',
    			{
					cliente: $('#cuiP').val(),
    				firma: name,
                    id: id,
                    tipo: tipoAR,
                    idUsua: usua,
                    trasDato: 4
				},
				function(respuesta) 
				{
					//Subida finalizada.
					$('#mensajeP2').html(respuesta);
				}, 
				function(progreso, valor) 
				{
                    
					//$("#barra_de_progreso").val(valor);
				}
			);
        }else{
            $('#mensajeP2').html('El formato de video no es valido');
            
        }
		}else{
        	$('#mensajeP2').html('El video es demaciado Grande, no puede exceder los 100 MB.');
            
		}
}

function previsualizarImagenes(archivo,tipoAR,id){
	//document.getElementById('barra_de_progreso').hidden = false;
	var archivos=archivo.files;
	var i=0;
	var size=archivos[i].size;
	var type=archivos[i].type;
	var name=$('#nombreP').val();
    var target=archivo.value;
    if(size<(100*(1024*1024))){
        if(type=="video/mp4" || type=="video/avi" || type=="video/mov" || type=="video/flv" || type=="video/mkv" || type=="video/wmv"){    
            if (archivo.files && archivo.files[0]) {
            var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#'+id+'Puesta > source').attr('src',e.target.result);
                        document.getElementById(id+'Puesta').load();
                    }
                    reader.readAsDataURL(archivos[i]);
            }
        }else{
            $('#mensajeP2').html('El formato de video no es valido');
            location.href="#mensajeP2";
           
        }
    }else{
        $('#mensajeP2').html('El video es demaciado Grande, no puede exceder los 100 MB.');
        location.href="#mensajeP2";
    }
}

$('#modalProveedor').click(function(){
	$('#modal4').closeModal();
	//alert('sdjhfkjshfjk');
});


$('#btnInsertarP').click(function(){

	
	$('#modalP').closeModal();
cierre();

});
