<?php include('includes/header.php'); ?>
        
        <div id="content">
            <?php if(isset($_SESSION['logged'])) :?>
                <p>Üdv az admin oldalon!</p>
            <?php else :?>
 
            <?php endif; ?>
        </div>
 <?php include('includes/footer.php');?>