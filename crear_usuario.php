<?php include "includes/header.php" ?>

<?php

if (isset($_POST["crearUsuario"])) {
    
  // Obtener valores
  $titulo = $_POST["titulo"];
  $descripcion = $_POST["descripcion"];

  // Validar si esta vacio
  if (empty($titulo) || empty($descripcion)) {
    $error = "Error, algunos campos obligatorios están vacios";
  }else {
    // Si entra aqui es porque se puede ingresar el nuevo registro
    $query = "INSERT INTO notas(titulo, descripcion, fecha, usuario_id)VALUES(:titulo, :descripcion, :fecha, :usuario_id)";

    $fechaActual = date('Y-m-d');

    $stmt = $conexion->prepare($query);

    $stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR);
    $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
    $stmt->bindParam(":fecha", $fechaActual, PDO::PARAM_STR);
    $stmt->bindParam(":usuario_id", $idUsuario, PDO::PARAM_INT);

    $resultado = $stmt->execute;

    if ($resultado) {
      $mensaje = "Registro de nota creado correctamente"; 
    }else {
      $error = "Error, no se pudo crear la nota";
    }

  }
}


?>


<div class="row">
    <div class="col-sm-12">
     
            <h4 class="bg-success text-white">Mensaje</h4>
     
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
       
            <h4 class="bg-danger text-white">Error</h4>
      
    </div>
</div>



              <div class="card-header">               
                <div class="row">
                  <div class="col-md-9">
                    <h3 class="card-title">Crear un nuevo usuario</h3>
                  </div>                 
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                  <form role="form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">            

                      <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control">
                      </div>

                      <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" class="form-control">
                      </div>

                       <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="text" name="telefono" class="form-control">
                      </div>    

                       <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control">
                      </div>   

                      <div class="mb-3">
                       <label for="rol" class="form-label">Rol:</label>
                        <select class="form-control" name="rol" aria-label="Default select example">                       
                        <option value="">Selecciona una opción</option>
                        <option value="0">Registrado</option>
                        <option value="1">Administrador</option>
                        </select>  
                    </div>   

                            <button type="submit" name="crearUsuario" class="btn btn-primary"><i class="fas fa-cog"></i> Crear Usuario</button>  

                        </div>
                      </form>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->


<?php include "includes/footer.php" ?>

<!-- page script -->
<script>
  $(function () {   
    $('#tblRegistros').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    }); 
  });
</script>
