<?php include('includes/header.php'); ?>

<div id="content">
    <?php if ($_SESSION['rights'] == 1 || $_SESSION['rights'] == 2 || $_SESSION['rights'] == 3) : ?>
    
        <?php if (isset($_SESSION['msg'])) : ?>
            <p><?php
                print($_SESSION['msg']);
                unset($_SESSION['msg']);
                ?></p>
            <br>
        <?php endif; ?>
            
        <form name="storeForm" method="post" id="storeForm">
            <label>Raktár száma:</label>
            <br>
            <input type="text" name="id" class="shortText">
            <br>
            <label>Irányító száma:</label>
            <br>
            <input type="text" name="post_code" class="shortText">
            <br>
            <label>Város:</label>
            <br>
            <input type="text" name="city" class="shortText">
            <br>
            <label>Utca, házszám:</label>
            <br>
            <input type="text" name="address" class="shortText">
            <br>
            <label>Manager azonosító száma:</label>
            <br>
            <input type="int" name="manager_id">
            <br>
            <input type="submit" name="storeSubmit">
        </form>
    <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>