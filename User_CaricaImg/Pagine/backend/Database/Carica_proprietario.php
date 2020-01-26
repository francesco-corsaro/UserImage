<?php


function insert_3val($tabel,$colonna1,$val1,$colonna2,$val2,$colonna3,$val3) {
    
    
    require 'ConnectDataBase.php';
    
    $sql = "INSERT INTO $tabel ($colonna1, $colonna2,$colonna3)
        VALUES ( '$val1', '$val2' , '$val3')";
    if ($conn->query($sql) === TRUE) {
        global $stato;
        $stato= " | Dati Caricati | ";
        
    } else {
        global $stato;
        $stato="Error: " . $sql . "<br>" . $conn->error;
        
    }
    $conn->close();
}
$nome=$_POST['proprietario'];
insert_3val('Foto','nome',$nome,'BaseName',$baseName,'Path',$target_file);
echo '<br> Stato: '.$stato;
?>
