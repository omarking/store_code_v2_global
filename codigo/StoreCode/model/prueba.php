        <?php 
        include("../model/conexion.php");                                  
        $rs = mysqli_query($conect, "SELECT MAX(FolioVenta) AS id FROM venta;");
        if ($row = mysqli_fetch_row($rs)) {
        $id = trim($row[0]);        
        }                   
        echo $id;        
        mysqli_close($conect);  
        ?>