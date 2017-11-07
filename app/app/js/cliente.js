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

$(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Desea eliminar la foto \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('Foto eliminada');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
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
	 cierre();
	$('#modal4').closeModal();
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



function ingresarClienteP(){

    // alert('hola');  

  

    var  nombre, direccion, telefono, nit, apellido,  trasDato;
	
        nombre = $('#nombreP').val();
		codigo = $('#codigoP').val();
		apellido = $('#apellidoP').val();
		direccion = $('#direccionP').val();
		telefono = $('#telefonoP').val();
		nit = $('#nitP').val();
		
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
            url:"../core/controlador/clientesControlador.php",
            data:' nombre=' +  nombre + '&direccion=' + direccion + '&nit=' + nit + '&telefono=' + telefono + '&apellido=' + apellido + '&codigo=' + codigo + '&trasDato=' + trasDato,
            success: function(resp)
            {

                

                if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
                    
						
                  cierre();
				  if(typeof llamarCliente === 'function') 
					  {
							//Es seguro ejecutar la función
							llamarCliente();
						}
						else
						{
							location.reload();
						}
					
                }


            }     
        });
    


}

function editarCliente(id,url)
{
	
    $('#modal3P').openModal();
    $('#imagenver1').attr('src',url)
    $('#btnInsertarP33').attr('href',url)
	trasDato = 2;
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/clientesControlador.php",
            data:' id=' +  id + '&trasDato=' + trasDato,
            success: function(resp)
            {
				$('#mensajeP2').html(resp);
            }     
        });
	
}


function eliminarCliente(id,url)
{
	
    if(confirm("Desea eliminar esta foto?")){
	    trasDato = 7;
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/clientesControlador.php",
            data:' id=' +  id + '&url=' + url + '&trasDato=' + trasDato,
            success: function(resp)
            {
				$('#mensajeP2').html(resp);
            }     
        });
    }
	
}

$('#modalcliente').click(function(){
	$('#modal4').closeModal();
	cierre();
	//alert('sdjhfkjshfjk');
});


$('#btnInsertarP').click(function(){

	//cierre();
	//$('#modalP').closeModal();

	
});

function subirImagenes(archivo,tipoAR,id,idusua){
	//document.getElementById('barra_de_progreso').hidden = false;
	var archivos=archivo.files;
    var cant = archivos.length
    for(i=0;i<cant;i++){
	var size=archivos[i].size;
	var type=archivos[i].type;
	var name=$('#nombreP').val();
    $('#Loading').openModal();
    cierre();
    var usua=idusua;
   // alert(archivo);
    	if(size<(80*(1024*1024))){
        if(type=="image/png" || type=="image/jpg" || type=="image/jpeg"){    
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
                    $('#Loading').closeModal();
					$('#mensajeP2').html(respuesta);
				}, 
				function(progreso, valor) 
				{
                    
					$("#barra_de_progreso").val(valor);
					$("#barra_de_progreso1").val(valor);
				}
			);
        }else{
            $('#mensajeP2').html('La imagen debe ser de tipo PNG');
            
        }
		}else{
        	$('#mensajeP2').html('La imagen es muy pesada, se recomienda subir imagenes de menos de 2MB.');
            
        }
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
    if(size<(80*(1024*1024))){
        if(type=="image/png" || type=="image/jpg" || type=="image/jpeg"){    
            if (archivo.files && archivo.files[0]) {
            var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById(id+'Puesta').src = e.target.result;
                    }
                    reader.readAsDataURL(archivos[i]);
            }
        }else{
            $('#mensajeP2').html('La imagen debe ser de tipo PNG');
            location.href="#mensajeP2";
           
        }
    }else{
        $('#mensajeP2').html('La imagen es muy pesada, se recomienda subir imagenes de menos de 2MB.');
        location.href="#mensajeP2";
    }
}