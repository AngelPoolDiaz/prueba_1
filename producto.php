<?php
include_once '../crudProducto.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 10px;
      border-radius: 25px;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: gray;
      padding: 5px;
      border-radius: 50px;
    }
    .form-group{
      display: inline-block;
    }
  </style>
</head>
<body>

<div class="">
  <div class="container text-center">
    <h1>Sistema Producto</h1>      
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="../index.php">Inicio</a></li>
        <li><a href="categoria.php">Categoria</a></li>
        <li><a href="producto.php">Producto</a></li>
        <li><a href="empleado.php">Empleados</a></li>
        <li><a href="cargo.php">Cargo</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Tu cuenta</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Carrito compras</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid ">
  
 <h2 class="text-center">PRODUCTOS</h2>
 <form method="post">

    <div class="form-group">
       <label class="control-label" for="ln">Codigo Producto</label>
       <div class="col">
          <input type="text" class="form-control text-uppercase" maxlength="50" name="codPro" placeholder="Codigo Producto"
          required value="<?php if(isset($_GET['editar'])) echo $getROW['codigoProducto'];  ?>"  />
       </div>
    </div>

    <div class="form-group">
       <label class="control-label" for="ln">Nombre Producto</label>
       <div class="col">
          <input type="text" class="form-control text-uppercase" maxlength="60" name="nomProd" placeholder="Nombre del Producto"
          required value="<?php if(isset($_GET['editar'])) echo $getROW['nombreProducto'];  ?>"  />
       </div>
    </div>

    <div class="form-group">
       <label class="control-label" for="ln">Descripcion</label>
       <div class="col">
          <input type="text" class="form-control text-uppercase" maxlength="255" name="desc" placeholder="Descripcion del producto"
          required value="<?php if(isset($_GET['editar'])) echo $getROW['descripcion'];  ?>"  />
       </div>
    </div>
    <div class="form-group">
       <label class="control-label" for="ln">Precio</label>
       <div class="col">
          <input type="number" class="form-control text-uppercase"  name="preProd" placeholder="Precio del producto"
          required value="<?php if(isset($_GET['editar'])) echo $getROW['precio'];  ?>"  />
       </div>
    </div>

    <div class="form-group">
       <label class="control-label" for="ln">Imagen</label>
       <div class="col">
          <input type="file" class="form-control text-uppercase" name="img"
          required value="<?php if(isset($_GET['editar'])) echo $getROW['imagenProducto'];  ?>"  />
       </div>
    </div>

    <div class="form-group">
       <label class="control-label" for="ln">Sucursal</label>
       <div class="col">
          <input type="number" class="form-control text-uppercase" name="suc" placeholder="Num. Sucursal"
          required value="<?php if(isset($_GET['editar'])) echo $getROW['sucursal_idsucursal'];  ?>"  />
       </div>
    </div>

    <div class="form-group">	      
       <?php
        if(isset($_GET['editar']))
         {
       ?>
       <div class="col-12">
          <button type="submit" class="btn btn-primary" name="actualizar">Actualizar</button>
         </div>
      <?php
     }
     else
     {
      ?>
      <div class="col-12">			 
        <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
      </div>
      <?php
     }
     ?>	      
    </div>
 </form>

 <h3>Listado de productos</h3>

 <table class="table table-hover table-bordered shadow p-3 mb-5 bg-white rounded">
   <tr>
       <th>ID</th>
      <!-- <th>Cantidad</th> -->
       <th>Codigo Producto</th>
       <th>Nombre Producto</th>   
       <th>Descripcion</th>
       <th>precio</th>
       <th>Imagen</th>
       <th>Num. Sucursal</th>
    </tr>

   <?php

   $res = $MySQLiconn->query("SELECT * FROM productos");
   while($row=$res->fetch_array())
   {
    ?>
       <tr>
         <td> <?php echo $row['idproductos']; ?> </td>
         <td> <?php echo $row['codigoProducto']; ?> </td>
         <td> <?php echo $row['nombreProducto']; ?> </td>
         <td> <?php echo $row['descripcion']; ?> </td>
         <td> <?php echo $row['precio']; ?> </td>
         <td> <?php echo $row['imagenProducto']; ?> </td>
         <td> <?php echo $row['sucursal_idsucursal']; ?> </td>
        
         <td>
           <a href="?editar=<?php echo $row['idproductos']; ?>" onclick="return confirm('¿Deseas Editarlo ?'); ">

             <span class="glyphicon glyphicon-pencil"></span>

           </a>

           <a href="?eliminar=<?php echo $row['idproductos']; ?>" onclick="return confirm('¿Seguro deseas eliminarlo?'); ">
             <span class="glyphicon glyphicon-trash"></span>
         </a>
       </td> 
       </tr>
       <?php
   }
   ?>
 </table>
 
</div>
<br><br>

<footer class="container-fluid text-center">
  <p>Copyright</p>  
  <form class="form-inline">Obtener ofertas:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Registrate</button>
  </form>
</footer>

</body>
</html>
