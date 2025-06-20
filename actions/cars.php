    <?php

    require '../database/connection.php';
    function VerifyVariables()
    {
        $Valid_Categories = ['Sport', 'Sudan', 'Truck', 'Suv', 'Convertible'];
        $Valid_Steering = ['Manual', 'Automatic'];

        // Check if all fields exist
        $Required_Fields = [
            'Make',
            'Model',
            'Year',
            'Price_Per_Day',
            'Category',
            'Steering',
            'Image_Path',
            'Description',
            'Fuel_Type',
            'Fuel',
            'Transmission',
            'Seats',
            'Is_Available'
        ];

        foreach ($Required_Fields as $Field) {
            if (empty($_POST[$Field])) {
                die("Missing field: $Field");
            }
        }

        // Validate each field
        $Make = filter_var($_POST['Make'], FILTER_SANITIZE_STRING);
        $Model = filter_var($_POST['Model'], FILTER_SANITIZE_STRING);

        $Year = filter_var($_POST['Year'], FILTER_VALIDATE_INT);
        if ($Year === false || $Year < 1900 || $Year > 2025) {
            die("Invalid year");
        }

        $Price_Per_Day = filter_var($_POST['Price_Per_Day'], FILTER_VALIDATE_FLOAT);
        if ($Price_Per_Day === false || $Price_Per_Day < 0) {
            die("Invalid price");
        }

        if (!in_array($_POST['Category'], $Valid_Categories)) {
            die("Invalid category");
        }
        $Category = $_POST['Category'];

        if (!in_array($_POST['Steering'], $Valid_Steering)) {
            die("Invalid steering");
        }
        $Steering = $_POST['Steering'];

        $Image_Path = filter_var($_POST['Image_Path'], FILTER_SANITIZE_STRING);
        $Description = filter_var($_POST['Description'], FILTER_SANITIZE_STRING);
        $Fuel_Type = filter_var($_POST['Fuel_Type'], FILTER_SANITIZE_STRING);
        $Transmission = filter_var($_POST['Transmission'], FILTER_SANITIZE_STRING);

        $Fuel = filter_var($_POST['Fuel'], FILTER_VALIDATE_FLOAT);
        if ($Fuel === false || $Fuel < 0) {
            die("Invalid fuel amount");
        }

        $Seats = filter_var($_POST['Seats'], FILTER_VALIDATE_INT);
        if ($Seats === false || $Seats < 1 || $Seats > 50) {
            die("Invalid seat count");
        }

        // Convert Yes/No to 1/0
        if ($_POST['Is_Available'] === 'Yes') {
            $Is_Available = 1;
        } elseif ($_POST['Is_Available'] === 'No') {
            $Is_Available = 0;
        } else {
            die("Invalid availability");
        }

        // Return all validated data
        return [
            'Make' => $Make,
            'Model' => $Model,
            'Year' => $Year,
            'Price_Per_Day' => $Price_Per_Day,
            'Category' => $Category,
            'Steering' => $Steering,
            'Image_Path' => $Image_Path,
            'Description' => $Description,
            'Fuel_Type' => $Fuel_Type,
            'Fuel' => $Fuel,
            'Transmission' => $Transmission,
            'Seats' => $Seats,
            'Is_Available' => $Is_Available
        ];
    }




    $Clean_Data = VerifyVariables();

    $sql =
        "INSERT INTO cars (Make,Model,Year,Price_Per_Day,Category,Steering,Image_Path,Description,
            Fuel_Type,Fuel,Transmission,Seats,Is_Available,Created_At) 
            VALUES (:Make,:Model,:Year,:Price_Per_Day,:Category,:Steering,:Image_Path,:Description,
            :Fuel_Type,:Fuel,:Transmission,:Seats,:Is_Available,Created_At) ";

    $insert_car = $conn->prepare($sql);


    $insert_car->bindParam(':Make', $Clean_Data['Make']);
    $insert_car->bindParam(':Model', $Clean_Data['Model']);
    $insert_car->bindParam(':Year', $Clean_Data['Year']);
    $insert_car->bindParam(':Price_Per_Day', $Clean_Data['Price_Per_Day']);
    $insert_car->bindParam(':Category', $Clean_Data['Category']);
    $insert_car->bindParam(':Steering', $Clean_Data['Steering']);
    $insert_car->bindParam(':Image_Path', $Clean_Data['Image_Path']);
    $insert_car->bindParam(':Description', $Clean_Data['Description']);
    $insert_car->bindParam(':Fuel_Type', $Clean_Data['Fuel_Type']);
    $insert_car->bindParam(':Fuel', $Clean_Data['Fuel']);
    $insert_car->bindParam(':Transmission', $Clean_Data['Transmission']);
    $insert_car->bindParam(':Seats', $Clean_Data['Seats']);
    $insert_car->bindParam(':Is_Available', $Clean_Data['Is_Available']);

    $insert_car->execute();
    header("location: ../pages/auto-succes")
    ?>