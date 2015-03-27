<?php include($_SERVER['DOCUMENT_ROOT'] . '/RaktarNyilvantarto/admin/views/includes/header.php'); ?>

<div id="content">
    
    <?php if ($_SESSION['rights'] == 1 || $_SESSION['rights'] == 2 || $_SESSION['rights'] == 3) : ?>

            <form name="productForm" method="post" id="productForm">
                <label>Termék száma:</label>
                <br>
                <input type="text" name="id">
                <br>
                <label>Megnevezés:</label>
                <br>
                <input type="text" name="name" class="shortText">
                <br>
                <label>Leírás:</label>
                <br>
                <textarea cols="50" rows="5" name="description"></textarea>
                <br>
                <label>Ár:</label>
                <br>
                <input type="int" name="price">
                <br>
                <label>Raktár ID:</label>
                <br>
                <input type="text" name="store_id">
                <br>
                <label>Mennyiség (db):</label>
                <br>
                <input type="int" name="amount">
                <br>
                <input type="submit" name="productSubmit">
            </form>
    <?php endif; ?>
    
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/RaktarNyilvantarto/admin/views/includes/footer.php'); ?>