<?php
$pathfoto=array();
require 'backend/Database/ConnectDataBase.php';

$sql = "SELECT Nome, Path  FROM Foto";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div>
                <img src="'.$row['Path'].'" alt="Immagine non caricata" style="width:128px;height:128px;">
                <p>'.$row['Nome'].'</p>
              </div>';
    }
    
    $conn->close();
} else {
    echo "0 results";
}

var_dump($pathfoto);
