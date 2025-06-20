<?php require "includes/header.php" ?>
<?php require 'database/connection.php' ?>
<?php require 'includes/car-functions.php' ?>

<?php
// Get cars from database
$Popular_Cars = Get_Popular_Cars($conn, 4);
$Recommended_Cars = Get_Recommended_Cars($conn, 8);
?>

<header>
    <div class="advertorials">
        <div class="advertorial">
            <h2>Hét platform om een auto te huren</h2>
            <p>Snel en eenvoudig een auto huren. Natuurlijk voor een lage prijs.</p>
            <a href="#" class="button-primary">Huur nu een auto</a>
            <img src="assets/images/car-rent-header-image-1.png" alt="">
            <img src="assets/images/header-circle-background.svg" alt="" class="background-header-element">
        </div>
        <div class="advertorial">
            <h2>Wij verhuren ook bedrijfswagens</h2>
            <p>Voor een vaste lage prijs met prettig voordelen.</p>
            <a href="#" class="button-primary">Huur een bedrijfswagen</a>
            <img src="assets/images/car-rent-header-image-2.png" alt="">
            <img src="assets/images/header-block-background.svg" alt="" class="background-header-element">
        </div>
    </div>
</header>

<main>
    <h2 class="section-title">Populaire auto's</h2>
    <div class="cars">
        <?php if (empty($Popular_Cars)): ?>
            <p>Geen auto's beschikbaar.</p>
        <?php else: ?>
            <?php foreach ($Popular_Cars as $car): ?>
                <?php Display_Car_Card($car); ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
    <h2 class="section-title">Aanbevolen auto's</h2>
    <div class="cars">
        <?php if (empty($Recommended_Cars)): ?>
            <p>Geen aanbevolen auto's beschikbaar.</p>
        <?php else: ?>
            <?php foreach ($Recommended_Cars as $car): ?>
                <?php Display_Car_Card($car); ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
    <div class="show-more">
        <a class="button-primary" href="/ons-aanbod">Toon alle</a>
    </div>
</main>

<?php require "includes/footer.php" ?>