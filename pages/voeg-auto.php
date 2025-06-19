<?php require "includes/header.php" ?>

<form  action="/register-handler" method="post" class="account-form" >
 <h2>Voeg een auto</h2>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="message">
                <?= $_SESSION['message'] ?>
            </div>
        <?php
            session_destroy();
        endif; ?>

        <label for="email">Uw e-mail</label>
        <input type="email" name="email" id="email" placeholder="johndoe@gmail.com" value="<?= isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : '' ?>" required autofocus>
        
    </form>


</form>





<?php require 'includes/footer.php'?>

