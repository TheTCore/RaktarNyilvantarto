<?php include ('includes/header.php'); ?>

<div id="content">
    <?php if (isset($_SESSION['msg'])) : ?>
	
	<p><?php print($_SESSION['msg']); unset($_SESSION['msg']); ?></p>
	<br>
	<ul id="navigation" class="nav nav-pills">
      <li role="presentation"><a href="?q=users">Új felhasználó</a></li>
    </ul>
<?php else : ?>
    <style>
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            border-color: #666666
        }
        
        th{
            background-color: #dedede;
        }
        
        td{
            background-color: #FFFFFF;
        }
    </style>

    
    <?php
// Create connection
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Username</th><th>Password</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["uname"] . "</td><td> " . $row["upass"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?> 




    <h2>Új felhasználó</h2>
    <form name="usersForm" method="post">
        <label>Felhasználónév:</label><br>
        <input type="text" name="userName"><br>
        <label>Jelszó:</label><br>
        <input type="password" name="userPass"><br>
        <input type="submit" name="userSubmit">
    </form>
    
    <?php endif; ?>
    
</div>

<?php include ('includes/footer.php');?>