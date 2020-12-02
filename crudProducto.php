<?php

include_once 'Db.php';

/* Codigo para Insertar Datos */
if(isset($_POST['guardar']))
{
		
	 echo "Guardandoooooooooooooooooooo";
   $codProd = $MySQLiconn->real_escape_string($_POST['codPro']);
   $nomProd = $MySQLiconn->real_escape_string($_POST['nomProd']);
   $desc = $MySQLiconn->real_escape_string($_POST['desc']);
   $preProd = $MySQLiconn->real_escape_string($_POST['preProd']);
   $img = $MySQLiconn->real_escape_string($_POST['img']);
   $suc = $MySQLiconn->real_escape_string($_POST['suc']);

  $SQL = $MySQLiconn->query("INSERT INTO productos(codigoProducto,nombreProducto,descripcion,
  precio,imagenProducto,sucursal_idsucursal) VALUES('$codProd',
  '$nomProd','$desc','$preProd','$img','$suc')");
  
  if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
  header("Location:producto.php");
}

/* Codigo para eliminar Datos */
if(isset($_GET['eliminar']))
{
 $SQL = $MySQLiconn->query("DELETE FROM productos WHERE idproductos=".$_GET['eliminar']);
 header("Location:producto.php");
}


/* Codigo para Editar Datos */
if(isset($_GET['editar']))
{

 $SQL = $MySQLiconn->query("SELECT * FROM productos WHERE idproductos=".$_GET['editar']);
 $getROW = $SQL->fetch_array();
}

/* Codigo para Actualizar Datos */
if(isset($_POST['actualizar']))
{
 $SQL = $MySQLiconn->query("UPDATE productos SET codigoProducto='".$_POST['codPro']."'
 , nombreProducto='".$_POST['nomProd']."', descripcion='".$_POST['desc']."', precio='".$_POST['preProd']."'
 , imagenProducto='".$_POST['img']."', sucursal_idsucursal='".$_POST['suc']."' WHERE idproductos=".$_GET['editar']);
 header("Location:producto.php");
}


?>