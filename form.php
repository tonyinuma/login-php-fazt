<?php

    require 'datos/database.php';

    $busqueda=$conn->prepare("Select * from usuario");
    $busqueda->execute();
    $resultado = $busqueda->fetchAll();

?>

<table   class="table table-bordered">
   <tr>
      <th class="bg-primary" scope="col">Id</th>
      <th class="bg-primary" scope="col">Username</th>
      <th class="bg-primary" scope="col">email</th>
      <th class="bg-primary" scope="col">password</th>
      <th class="bg-primary" scope="col">created_at</th>
      <th class="bg-primary" scope="col">rol</th>
   </tr>
    <?php
      foreach($resultado as $res)
      {
        echo "<tr>";
        echo "<td>".$res["idusuario"]."</td>";
        echo "<td>".$res["username"]."</td>";
        echo "<td>".$res["email"]."</td>";
        echo "<td>".$res["password"]."</td>";
        echo "<td>".$res["create_time"]."</td>";
        echo "<td>".$res["rol_user"]."</td>";
        echo "</tr>";
      }
    ?>
</table>
