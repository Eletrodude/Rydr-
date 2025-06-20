<?php require "includes/header.php" ?>

<form  method="post" class="account-form" action='../actions/cars.php'>
    <h2>Voeg een auto</h2>

    
    <label for="Make">Car name</label>
    <input type="text" name="Make" id="Make" placeholder="Nissan">

    <label for="Model">Model</label>
    <input type="text" name="Model" id="Make" required>

    <label for="Year">Year</label>
    <input type="number" name="Year" id="Year" required>

    <label for="Price_Per_Day">Price per day</label>
    <input type="number" id="Price_Per_Day" name="Price_Per_Day" required>

    <label for="Category">Category</label>
    <select name="Category" id="Category" required>
        <option value="">Choose a category</option>
        <option value="Sport">Sport</option>
        <option value="Sudan">Sudan</option>
        <option value="Truck">Truck</option>
        <option value="Suv">Suv</option>
        <option value="Convertible">Convertible</option>
    </select>


    <label for="Steering">Steering</label>
    <select name="Steering" id="Steering">
        <option value="Manual">Manual</option>
        <option value="Automatic">Automatic</option>
    </select>


    <label for="Image_Path">Car Image</label>
    <input type="text" id="Image_Path" name="Image_Path">


    <label for="Description">Car Description</label>
    <input type="text" id ='Description' name="Description">

    <label for="Fuel_Type">Fuel Type</label>
    <input type="text" id="Fuel_Type" name="Fuel_Type">

    <label for="Fuel">Fuel Amount(L)</label>
    <input type="number" id="Fuel" name="Fuel">

    <label for="Transmission">Transmission</label>
    <input type="text" name="Transmission" id="Transmission">

    <label for="Seats">Seats</label>
    <input type="number" name="Seats" id='Seats'>

    <label for="Is_Available">Car Available?</label>
    <select name="Is_Available" id="Is_Available">Is the car available?
        <option value="Yes">Yes</option>
        <option value="No">No</option>

    </select>


    <input type="submit">

</form>


</form>





<?php require 'includes/footer.php' ?>