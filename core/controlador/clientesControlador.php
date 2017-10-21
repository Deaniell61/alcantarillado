<?php


if($_POST)
{
    require('../configCore.php');
    
    $transaccion = $_POST['trasDato'];
    
    
//-------------- gestion -----------/    
    if($transaccion == 1)
    {
        $datos[0]=$_POST['nombre'];
		$datos[1]=$_POST['direccion'];
		$datos[2]=$_POST['nit'];
		$datos[3]=$_POST['telefono'];
		$datos[4]=$_POST['apellido'];
        
        insertarCliente($datos);
        
        
    
    }
	else
	if($transaccion == 2)
    {
        $datos[0]=$_POST['id'];
		        
        editarCliente($datos);
        
        
    
    }
	else
	if($transaccion == 3)
    {
        $datos[0]=$_POST['nombre'];
		$datos[1]=$_POST['direccion'];
		$datos[2]=$_POST['nit'];
		$datos[3]=$_POST['telefono'];
		$datos[4]=$_POST['apellido'];
		$datos[5]=$_POST['codigo'];
        
        actualizarCliente($datos);
        
        
    
    }else
    if($transaccion == 4)
    {
        $index=$_POST['id'];
        if(isset($_FILES[$index])){
            $datos[0]=$_FILES[$index];
            $datos[1]=$_POST['cliente'];
            $datos[2]=$_POST['firma'];
            $datos[3]=$_POST['tipo'];
		    $datos[4]=$_POST['idUsua'];
            subir_archivos($datos);
        }
    }
    
//----------- fin gestion ----------/    
    
}

else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>