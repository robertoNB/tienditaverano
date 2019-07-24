<?php
    require_once("conecta.php");
    $result=mysqli_query($con,"select * from marca");
    echo "<select name='idMarca' id='select' class='select'> ";
    while($row=mysqli_fetch_array($result)){
        $id=$row["idMarca"];
        $nom=$row["nomMarca"];
        echo "<option value='$id'>$nom</option>";
    }
    echo "</select>";
?>


