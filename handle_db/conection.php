<?php
try{
    $mysqli = new mysqli("localhost","root","","loginusuario");

}catch (mysqli_sql_exception $e){
    
 echo "Error: " . $e;
};


?>