<?php include('includes/header.php'); ?>

<div id="content">
  <h2>Felhasználók kezelése</h2>
  
	<?php if (isset($_SESSION['msg'])) : ?>
	
		<p><?php print($_SESSION['msg']); unset($_SESSION['msg']); ?></p>
		<br>
		<ul id="navigation" class="nav nav-pills">
			<li role="presentation"><a href="?q=felhasznalok">Új felhasználó</a></li>
		</ul>
	
	<?php else : ?>
	
		<?php if ($_SESSION['rights']==1) : ?>
	
			<form name="usersForm" method="post" id="newsForm">
				<label>Felhasználónév:</label>
				<br>
				<input type="text" name="uname" class="shortText">
				<br>
				<label>Jelszó:</label>
				<br>
				<input type="text" name="upass" class="shortText">
				<br>
				<label>Név:</label>
				<br>
				<input type="text" name="name" class="shortText">
				<br>
				<label>Email:</label>
				<br>
				<input type="text" name="email" class="shortText">
				<br>
				<label>Jogosultsági kör:</label>
				<br>
				<select name="rights">
				<?php 
					foreach ($rights as $right) {
						echo '<option value="'.$right['id'].'">'.$right['description'].'</option>';
					}
				?>
				</select>
				<br>
				<input type="submit" name="usersSubmit">
			</form>
			
		<?php else : ?>
		
			<p>Nincs jogosultsága az oldal megtekintéséhez.</p>
		
		<?php endif; ?>
		
	<?php endif; ?>
	
</div>

<?php
include('includes/footer.php');
