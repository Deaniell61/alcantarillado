<?php


function mostrarCliente()
{
echo "<script>
	if(document.getElementById('tipoVenta'))
	{
		$('#tipoVenta').material_select('destroy');
	}
	</script>";


    //creacion de la tabla
?>

<table id='tablaPro' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Vista Previa</th>
            <th>Nombre</th>
            <th>Tamaño</th>
            <th>Tipo</th>

            <th></th>


        </tr>
    </thead>
    <tbody>
        <?php
	$extra="";
    $mysql = conexionMysql();
    $sql = "SELECT nombre,url,tamanio,tipo,id FROM archivos where video='0' ";
    $tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay Compras BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {

                $tabla .= "<tr>";

                $tabla .="<td><img style=\"width:50px;height:50px;\" src='" .$fila["1"]."'></td>";
                $tabla .="<td>"     .$fila["0"].    "</td>";
                $tabla .="<td>" .round(((($fila["2"])/1024)/1024),3).      " MB</td>";
				$tabla .="<td>" .$fila["3"].      "</td>";

                $tabla .="<td class='anchoC'>";
				
                $tabla .="<a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesm ver' onclick=\"editarCliente('".$fila["4"]."','".$fila["1"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a>";
                $tabla .="<a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm elim' onclick=\"eliminarCliente('".$fila["4"]."','".$fila["1"]."')\"><i class='material-icons left'><img class='iconoeditcrud' style=\"height:20px;width:20px;\" src='../app/img/boton-borrar.png' /></i></a>";


                $tabla .= "</tr>";

            }

            $resultado->free();//librerar variable


            $respuesta = $tabla;
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

    }

    //cierro la conexion
    $mysql->close();

    //debuelvo la variable resultado
    return printf($respuesta);
        ?>
    </tbody>
</table>
<?php

}


function mostrarFotos($datos)
{
	$extra="";
    $mysql = conexionMysql();
    $sql = "SELECT nombre,url,tamanio,tipo,id,fecha FROM archivos where video='0' ";
    $tabla="";
    $tabla2="";
    $cont=0;
    $fecha="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay Fotos Disponibles</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {
                if($fecha!=substr($fila[5],0,10)){
                    $fecha = substr($fila[5],0,10);
                    $tabla2 .= '<li class="col-sm-12 text-center"><strong>'.$fecha.'</strong></li>';
                }
                if($cont==0){
                    $extra="active";
                }else{
                    $extra="";
                }
                $tabla .= '<div class="'.$extra.' item" data-slide-number="'.$cont.'"><img src="../app/'.substr($fila[1],3).'" style="width:100%;height:100%;"><span style="color: black;z-index: 3;position: absolute;margin-top: -10%;padding-left: 2%;background-color: white;width: 100%;">'.$fila[0].'</span></div>';
                
                $tabla2 .= '<li class="col-sm-3"><a class="thumbnail" id="carousel-selector-'.$cont.'"><img src="../app/'.substr($fila[1],3).'" style="width:100%;height:100%;"></a></li>';
                $cont++;
            }

            $resultado->free();//librerar variable


            $respuesta = '<script>$(\'#slidesMini\').html(\''.$tabla2.'\');$(\'#slidesGra\').html(\''.$tabla.'\');</script>';
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

    }
    
    //cierro la conexion
    $mysql->close();

    //debuelvo la variable resultado
    echo ($respuesta);
     

}

function mostrarVideos($datos)
{
	$extra="";
    $mysql = conexionMysql();
    $sql = "SELECT nombre,url,tamanio,tipo,id,fecha FROM archivos where video='1' ";
    $tabla="";
    $tabla2="";
    $cont=0;
    $fecha="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay Videos Disponibles</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {
                if($fecha!=substr($fila[5],0,10)){
                    $fecha = substr($fila[5],0,10);
                    $tabla2 .= '<li class="col-sm-12 text-center"><strong>'.$fecha.'</strong></li>';
                }
                if($cont==0){
                    $extra="active";
                }else{
                    $extra="";
                }
                $tabla .= '<div class="'.$extra.' item" data-slide-number="'.$cont.'"><video  style="width: 100%;height:100%;" autoplay="true" controls="controls"><source src="../app/'.substr($fila[1],3).'"  type="video/mp4; codecs=\"avc1.42E01E, mp4a.40.2\"; video/ogg; codecs=\"theora,vorbis\"; video/webm; codecs=\"vp8,vorbis\";video/x-ms-wmv">Your browser does not support HTML5 video.</video><span style="color: black;z-index: 3;position: absolute;margin-left: -100%;background-color: white;width: 100%;">'.$fila[0].'</span></div>';
                $tabla2 .= '<li class="col-sm-3"><a class="thumbnail" id="carousel-selector-'.$cont.'"><video  style="width: 100%;height:100%;" autoplay="true" controls="controls"><source src="../app/'.substr($fila[1],3).'"  type="video/mp4; codecs=\"avc1.42E01E, mp4a.40.2\"; video/ogg; codecs=\"theora,vorbis\"; video/webm; codecs=\"vp8,vorbis\";video/x-ms-wmv">Your browser does not support HTML5 video.</video></a></li>';
                $cont++;
                

            }

            $resultado->free();//librerar variable


            $respuesta = '<script>$(\'#slidesMini\').html(\''.$tabla2.'\');$(\'#slidesGra\').html(\''.$tabla.'\');</script>';
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

    }
    
    //cierro la conexion
    $mysql->close();

    //debuelvo la variable resultado
    echo ($respuesta);
     

}

?>
