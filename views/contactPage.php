<?php include('includes/header.php'); ?>

        <div id="content">
            <h2><?php echo $page['title']; ?></h2>
            
            <?php echo $page['text']; ?>
            
            <h3>Üzenetküldés:</h3>    
            <form name="contactForm" method="post">
                <label>Név:</label>
                <br>
                <input type="text" name="contactName">
                <br>
                <label>e-mail:</label>
                <br>
                <input type="email" name="contactEmail">
                <br>
                <label>Üzenet:</label>
                <br>
                <textarea name="contactMessage">Üzenj itt!</textarea>
                <br>
                <input type="submit" name="contactSubmit">
            </form>
            
            <p>Google map
            
        </div>

<?php include('includes/footer.php');
