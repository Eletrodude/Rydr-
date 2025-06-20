<?php

function Get_Popular_Cars($conn, $limit = 4) {
    $sql = "SELECT * FROM cars WHERE Is_Available = 1 ORDER BY Created_At DESC LIMIT :limit";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function Get_Recommended_Cars($conn, $limit = 8) {
    $sql = "SELECT * FROM cars WHERE Is_Available = 1 ORDER BY Price_per_day ASC LIMIT :limit";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function Get_All_Cars($conn) {
    $sql = "SELECT * FROM cars WHERE Is_Available = 1 ORDER BY Created_At DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function Display_Car_Card($car) {
    $default_image = "assets/images/products/car-default.svg";
    $image_path = !empty($car['Image_Path']) ? $car['Image_Path'] : $default_image;
    
    echo '<div class="car-details">';
    echo '<div class="car-brand">';
    echo '<h3>' . htmlspecialchars($car['Make'] . ' ' . $car['Model']) . '</h3>';
    echo '<div class="car-type">' . htmlspecialchars($car['Category']) . '</div>';
    echo '</div>';
    echo '<img src="' . htmlspecialchars($image_path) . '" alt="' . htmlspecialchars($car['Make'] . ' ' . $car['Model']) . '">';
    echo '<div class="car-specification">';
    echo '<span><img src="assets/images/icons/gas-station.svg" alt="" width="10%" height="100%">' . htmlspecialchars($car['Fuel']) . 'L</span>';
    echo '<span><img src="assets/images/icons/car.svg" alt="">' . htmlspecialchars($car['Steering']) . '</span>';
    echo '<span><img src="assets/images/icons/profile-2user.svg" alt="">' . htmlspecialchars($car['Seats']) . ' Personen</span>';
    echo '</div>';
    echo '<div class="rent-details">';
    echo '<span><span class="font-weight-bold">€' . number_format($car['Price_per_day'], 2) . '</span> / dag</span>';
    echo '<a href="/car-detail?id=' . $car['Car_ID'] . '" class="button-primary">Bekijk nu</a>';
    echo '</div>';
    echo '</div>';
}

?>