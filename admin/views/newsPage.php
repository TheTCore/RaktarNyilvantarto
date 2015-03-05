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
		
		<?php if ($_SESSION['rights']==1 || $_SESSION['rights']==2 || $_SESSION['rights']==3) : ?>
	
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
				<label>Rovat:</label>
				<br>
				<select name="tag">
				<?php 
					foreach ($tags as $tag) {
						echo '<option value="'.$tag['id'].'">'.$tag['description'].'</option>';
					}
				?>
				</select>
				<br>
				<?php if ($_SESSION['rights']==1 || $_SESSION['rights']==2) : ?>
					<label>Publikálható: </label>
					<input type="checkbox" name="published" value="1">
					<br>
				<?php endif; ?>
				<input type="submit" name="newsSubmit">
			</form>
			
		<?php else : ?>
		
			<p>Nincs jogosultsága az oldal megtekintéséhez.</p>
		
		<?php endif; ?>
  
	<?php endif; ?>
	
</div>

<?php
include('includes/footer.php');
