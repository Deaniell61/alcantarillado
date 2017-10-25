<?php


function insertarCliente($datos)
{
    
    

    $sql = "INSERT INTO cliente (nombre, Direccion, Telefono, Nit, apellido,estado) VALUES ('".$datos[0]."','".$datos[1]."','".$datos[3]."','".$datos[2]."','".$datos[4]."',1)";
    
    $mysql = conexionMysql(); 
    echo $sql;
    if($resultado = $mysql->query($sql))
    {
        $respuesta = "<div> Exito </div>";
    }
    else
    { 
        $respuesta = "<div>Error en en la insercion </div>"; 
        echo 1;
    }
    
    
    $mysql->close();
    
    return printf($respuesta);
    
    
}

function  editarCliente($datos)
{
    

    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT u.nombre,u.apellido,u.telefono,u.direccion,u.nit,u.idcliente FROM cliente u WHERE estado=1 and u.idcliente='".$datos[0]."'";
    
    if($resultado = $mysql->query($sql))
    {
      
    $fila = $resultado->fetch_row();    
        
    
    $form .="<script>";
    $form .=" \$('#nombreP').val('".$fila[0]."');";
	$form .=" \$('#apellidoP').val('".$fila[1]."');\$('#apellidoP').focus();";
	$form .=" \$('#direccionP').val('".$fila[3]."');\$('#direccionP').focus();";
	$form .=" \$('#telefonoP').val('".$fila[2]."');\$('#telefonoP').focus();";
	$form .=" \$('#nitP').val('".$fila[4]."');\$('#nombreP').focus();";
	$form .=" \$('#codigoP').val('".$fila[5]."');\$('#nitP').focus();\$('#nombreP').focus();";
	$form .=" ";
	
    $form .="</script>";
        
    $resultado->free();    
    
    }
    else
    {   
    
    $form = "<div>$sql</div>";
    
    }
    
    
    $mysql->close();
    
    return printf($form);
    
}

function  eliminarCliente($datos)
{
    
    $mysql = conexionMysql();
    $form="";
    $sql = "DELETE from archivos where id='".$datos[0]."'";
    
    if($mysql->query($sql))
    {
      if(file_exists('../'.$datos[1])){

          if(unlink('../'.$datos[1])){
              echo "<script>location.reload();</script>";
          }else{
            echo "<script>alert('archivo no eliminado')</script>";
            
          }
      }else{
        echo "<script>alert('archivo no existe')</script>";
        
      }
        
    
    }
    else
    {   
    
        $form = "<div>$sql</div>";
    
    }
    
    
    $mysql->close();
    
    echo  ($form);
    
}

function actualizarCliente($datos)
{
    
    

    $sql = "update cliente set nombre='".$datos[0]."', apellido='".$datos[4]."', direccion='".$datos[1]."',telefono='".$datos[3]."',nit='".$datos[2]."' where idcliente=".$datos[5]."";
    
    $mysql = conexionMysql(); 
    $mysql->query("BEGIN");
    if($resultado = $mysql->query($sql))
    {
        $respuesta = "<div> Exito </div>";
			$mysql->query("COMMIT");	
    }
    else
    { 
	$mysql->query("ROLLBACK");
        $respuesta = "<div>Error en en la insercion </div>"; 
        echo 1;
    }
    
    
    $mysql->close();
    
    return printf($respuesta);
    
    
}

function subir_archivos($datos){
    if (!empty($datos[0])) {
        $archivo = $datos[0];
        $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
        $tipo=$archivo['type'];
        $nombre=str_replace(".".$extension,"",$archivo['name']);
        $nombreUso=$archivo['name'];
        $ruta_provisional=$archivo['tmp_name'];
        $size=$archivo['size'];
        $dimensiones=getimagesize($ruta_provisional);
        $alto=$dimensiones[1];
        $ancho=$dimensiones[0];
        $subir=false;
        $mensaje='';
        $subir=true;
        $carpeta= 'archivos';

        if($tipo=='video/mp4' || $tipo=="video/avi" || $tipo=="video/mov" || $tipo=="video/flv" || $tipo=="video/mkv" || $tipo=='video/x-ms-wmv'){
            $carpeta= 'videos';
        }

        if($tipo == 'image/png' || $tipo=="image/jpg" || $tipo=='image/jpeg'){
            $carpeta= 'imagenes';
        }
            if($size < (80*(1024*1024))){
                $subir=true;
            }else{
                $mensaje="La imagen es muy grande";
            }
            
            if($subir==true){
                $dir=strtolower("../../app/imagenes/");
                    if(!is_dir($dir)) {
                        mkdir($dir, 0777);
                    }
                $dir=strtolower("../../app/imagenes/".$carpeta."/");
                    if(!is_dir($dir)) {
                        mkdir($dir, 0777);
                    }
                $dir=strtolower("../../app/imagenes/".$carpeta."/".date('d-m-Y')."/");
                    if(!is_dir($dir)) {
                        mkdir($dir, 0777);
                    }
                

                $file_name=strtolower($nombreUso);
                $add="";
                $file="";
                $add=$dir.$file_name;
                if (move_uploaded_file($ruta_provisional, $add)) {
                            $dat[0]=$dir;
                            $dat[1]=$file_name;
                            $dat[2]=$tipo;
                            $dat[3]=substr($add,3,strlen($add));
                            $dat[4]=$add;
                            $dat[5]=$size;
                            guardar_imagen($dat);
                }else{
                            echo "Error al subir el archivo1";
                }
            }else{
                echo "<script>alert('".$mensaje."');</script>";
            }
    }
}
function guardar_imagen($datos)
{
    $dir="/".$datos[0]."/";
    $foto=$datos[1];
    if(file_exists($datos[4])){
        if($datos[2]=="image/png" || $datos[2]=="image/jpg" || $datos[2]=="image/jpeg"){
            $sql = "insert into archivos(url,tipo,tamanio,nombre,video) values('".$datos[3]."','".$datos[2]."','".$datos[5]."','".$datos[1]."',0)";
        }else{
            $sql = "insert into archivos(url,tipo,tamanio,nombre,video) values('".$datos[3]."','".$datos[2]."','".$datos[5]."','".$datos[1]."',1)";
        }
        
    }
    
    $mysql = conexionMysql(); 
    $mysql->query("BEGIN");
    if($resultado = $mysql->query($sql))
    {
        $mysql->query("COMMIT");	
        
            $respuesta = "<script>
                            location.reload();
                        </script>";
        
        
			
    }
    else
    { 
	$mysql->query("ROLLBACK");
        $respuesta = "<div>Error en en la insercion </div>"; 
        echo 1;
    }
    
    
    $mysql->close();
    
    return printf($respuesta);
}
?>