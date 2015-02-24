<?php include('includes/header.php'); ?>

<div id="content">
  <h2>Hírek rögzítése</h2>
  
	<?php if (isset($_SESSION['msg'])) : ?>
	
	<p><?php print($_SESSION['msg']); unset($_SESSION['msg']); ?></p>
	<br>
	<ul id="navigation" class="nav nav-pills">
      <li role="presentation"><a href="?q=hirek">Új hír</a></li>
    </ul>
	
	<?php else : ?>
	
  <form name="newsForm" method="post" id="newsForm">
    <label>Cím:</label>
    <br>
    <input type="text" name="title" class="shortText">
    <br>
	<label>Bevezető:</label>
    <br>
    <textarea name="lead" class="leadText"></textarea>
    <br>
    <label>Szövegtörzs:</label>
    <br>
    <textarea name="text" class="longText"></textarea>
    <br>
	<label>Dátum:</label>
    <br>
    <input type="text" name="date" class="shortText">
    <br>
    <input type="submit" name="newsSubmit">
  </form>
  
	<?php endif; ?>
	
</div>

<?php
include('includes/footer.php');
