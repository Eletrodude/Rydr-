<?php
require "includes/header.php";
require "database/connection.php";

$CarID = isset($_GET['id']) ? intval($_GET['id']) : null;

if (!$CarID) {
    echo "<p>Geen geldige auto opgegeven.</p>";
    require "includes/footer.php";
    exit;
}

$stmt = $conn->prepare("SELECT * FROM cars WHERE Car_ID = :Car_ID LIMIT 1");
$stmt->bindParam(':Car_ID', $CarID, PDO::PARAM_INT);
$stmt->execute();
$Car = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$Car) {
    echo "<p>Auto niet gevonden.</p>";
    require "includes/footer.php";
    exit;
}
?>

<main class="car-detail">
    <div class="grid">
        <div class="row">
            <div class="advertorial">
                <h2><?= htmlspecialchars($Car['Make'] . ' ' . $Car['Model']) ?></h2>
                <p><?= htmlspecialchars($Car['Description']) ?></p>
                <img src="<?= htmlspecialchars($Car['Image_Path']) ?>" alt="">
                <img src="assets/images/header-circle-background.svg" alt="" class="background-header-element">
            </div>
        </div>
        <div class="row white-background">
            <h2><?= htmlspecialchars($Car['Make'] . ' ' . $Car['Model']) ?></h2>
            <div class="rating">
                <span class="stars stars-4"></span>
                <span>440+ reviewers</span>
            </div>
            <p><?= htmlspecialchars($Car['Description']) ?></p>
            <div class="car-type">
                <div class="grid">
                    <div class="row"><span class="accent-color">Type Car</span><span><?= htmlspecialchars($Car['Category']) ?></span></div>
                    <div class="row"><span class="accent-color">Capacity</span><span><?= htmlspecialchars($Car['Seats']) ?> personen</span></div>
                </div>
                <div class="grid">
                    <div class="row"><span class="accent-color">Steering</span><span><?= htmlspecialchars($Car['Steering']) ?></span></div>
                    <div class="row"><span class="accent-color">Fuel</span><span><?= htmlspecialchars($Car['Fuel']) ?>L (<?= htmlspecialchars($Car['Fuel_Type']) ?>)</span></div>
                </div>
                <div class="call-to-action">
                    <div class="row"><span class="font-weight-bold">€<?= number_format($Car['Price_per_day'], 2) ?></span> / dag</div>
                    <div class="row"><a href="" class="button-primary">Huur nu</a></div>
                </div>
            </div>
        </div>
    </div>
</main>
