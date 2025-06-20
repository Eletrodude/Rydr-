<?php 

require '../database/connection.php';







 $sql =
        "INSERT INTO cars (Make,Model,Year,Price_Per_Day,Category,Steering,Image_Path,Description,
        Fuel_Type,Fuel,Transmission,Seats,Is_Available,Created_At) 
        VALUES (:Make,:Model,:Year,:Price_Per_Day,:Category,:Steering,:Image_Path,:Description,
        :Fuel_Type,:Fuel,:Transmission,:Seats,:Is_Available,Created_At) ";

$insert_car = $conn->prepare($sql);


$insert_car->bindParam(':Make',$_POST['Make']);
$insert_car->bindParam(':Model',$_POST['Model']);
$insert_car->bindParam(':Year',$_POST['Year']);
$insert_car->bindParam(':Price_Per_Day',$_POST['Price_Per_Day']);
$insert_car->bindParam(':Category',$_POST['Category']);
$insert_car->bindParam(':Steering',$_POST['Steering']);
$insert_car->bindParam(':Image_Path',$_POST['Image_Path']);
$insert_car->bindParam(':Description',$_POST['Description']);
$insert_car->bindParam(':Fuel_Type',$_POST['Fuel_Type']);
$insert_car->bindParam(':Fuel',$_POST['Fuel']);
$insert_car->bindParam(':Transmission',$_POST['Transmission']);
$insert_car->bindParam(':Seats',$_POST['Seats']);
$insert_car->bindParam(':Is_Available',$_POST['Is_Available']);

$insert_car->execute();
header("location: ../pages/auto-succes.php")




















?>