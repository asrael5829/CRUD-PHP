<?php 
    include("conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM alumno";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
       //*https://datatables.net/download/ estilos tabla */
       // jquery https://releases.jquery.com/
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> PAGINA ALUMNO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="estilos.css">
        <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
 
    </head>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Ingrese los Datos</h1>
                                <form action="insertar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="cod_estudiante" placeholder="Codigo estudiante">
                                    <input type="text" class="form-control mb-3" name="dni" placeholder="Cedula">
                                    <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres">
                                    <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos">
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" id="mitabla">
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Cedula</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['cod_estudiante']?></th>
                                                <th><?php  echo $row['dni']?></th>
                                                <th><?php  echo $row['nombres']?></th>
                                                <th><?php  echo $row['apellidos']?></th>    
                                                <th><a href="actualizar.php?id=<?php echo $row['cod_estudiante'] ?>" 
                                                class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['cod_estudiante'] ?>" 
                                                class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                    $('#mitabla').DataTable( {
                        language: {
                            url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
                        }
                    } );
                } );
        </script>
        <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>

    </body>
 
</html>
