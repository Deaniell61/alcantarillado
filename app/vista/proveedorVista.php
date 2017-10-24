<?php


function mostrarProveedor()
{

echo "<script>
		if(document.getElementById('tipoCompra'))
		{
			$('#tipoCompra').material_select('destroy');
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
    $sql = "SELECT nombre,url,tamanio,tipo,id FROM archivos where video='1' ";
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

                $tabla .="<td> <video style=\"width: 50px;height:50px;\" controls=\"controls\">
                <source src=\"" .$fila["1"]."\"  type='video/mp4; codecs=\"avc1.42E01E, mp4a.40.2\"; video/mov; video/flv; video/mkv; video/wmv'>
               
                Your browser does not support HTML5 video.
                    </video></td>";
                $tabla .="<td>"     .$fila["0"].    "</td>";
                $tabla .="<td>" .$fila["2"].      " bytes</td>";
				$tabla .="<td>" .$fila["3"].      "</td>";

                $tabla .="<td class='anchoC'>";
				
                $tabla .="<a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesm editar' onclick=\"editarProv('".$fila["4"]."','".$fila["1"]."')\")\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/editar.png' /></i></a>";



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


?>
