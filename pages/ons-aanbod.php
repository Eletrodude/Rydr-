<?php require "includes/header.php" ?>
<?php require 'database/connection.php' ?>
<?php require 'includes/car-functions.php' ?>

<?php
$All_Cars = Get_All_Cars($conn);
?>

<main>
    <h2>Ons aanbod</h2>
    
    <div class="cars">
        <?php if (empty($All_Cars)): ?>
            <p>Geen auto's beschikbaar in ons aanbod.</p>
        <?php else: ?>
            <?php foreach ($All_Cars as $car): ?>
                <?php Display_Car_Card($car); ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<?php require "includes/footer.php" ?>