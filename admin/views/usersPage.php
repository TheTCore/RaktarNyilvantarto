<?php include('includes/header.php'); ?>

<div id="content">
    
    <style type="text/css">

        td {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #ffffff;
        }
        
    </style>
    <h2>Keresés a Felhasználók között:</h2>

    <?php if (isset($_SESSION['sresult'])) : ?>

        <?php
        
        if (!empty($_SESSION['sresult'])) {
            foreach ($_SESSION['sresult'] as $item) {
                echo '<div>';
                echo '<div class="uname">' . $item['uname'] . '</div>';
                echo '<div class="name">' . $item['name'] . '</div>';
                echo '<div class="email">' . $item['email'] . '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>Nincs találat.</p>';
        }
        unset($_SESSION['sresult']);
        
        ?>
        <br>
        <ul id="navigation" class="nav nav-pills">
            <li role="presentation"><a href="?q=felhasznalok">Új keresés</a></li>
        </ul><br>
        <div class="divider"></div>

    <?php else : ?>

        <form name="searchForm" method="post" id="searchForm">
            <br>
            <label>Felhasználó névben:</label>
            <br>
            <input type="text" name="uname" class="shortText">
            <br>
            <label>Névben:</label>
            <br>
            <input type="text" name="name" class="shortText">
            <br>
            <label>E-mailben:</label>
            <br>
            <input type="text" name="email" class="shortText">
            <br><br>
            <input type="submit" name="searchSubmit" value="Keresés">
        </form><br>
<div class="divider"></div>
    <?php endif; ?>
    <hr>
    <h2>Felhasználók kezelése</h2>

    <?php if (isset($_SESSION['msg'])) : ?>

        <p><?php
            print($_SESSION['msg']);
            unset($_SESSION['msg']);
            ?></p>
        <br>
        <ul id="navigation" class="nav nav-pills">
            <li role="presentation"><a href="?q=felhasznalok">Új felhasználó</a></li>
        </ul>
    
    <?php else : ?>

    <?php if ($_SESSION['rights'] == 1) : ?>

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
                <label>Telefon szám:</label>
                <br>
                <input type="text" name="phone" maxlength="20">
                <br>
                <label>Jogosultsági kör:</label>
                <br>
                <select name="rights">
                    <?php
                    foreach ($rights as $right) {
                        echo '<option value="' . $right['id'] . '">' . $right['description'] . '</option>';
                    }
                    ?>
                </select>
                <br>
                <label>Aktív:</label>
                <br>
                <input type="checkbox" name="active" checked="1">
                <br>
                <input type="submit" name="usersSubmit">
            </form>

    <?php else : ?>
<div class="divider"></div>
            <p>Nincs jogosultsága az oldal megtekintéséhez.</p>

        <?php endif; ?>

    <?php if ($_SESSION['rights'] == 1 || $_SESSION['rights'] == 2) : ?>
            <br>
<div class="divider"></div>
            <hr>
            <h2>Inaktív felhasználók</h2>

            <form name="activeForm" method="post" id="activeForm">
                
                <table>
                    <?php
                    $c = 1;
                    foreach ($inactive as $item) {
                        echo '<tr>';
                        echo '<td class="tid"><input type="checkbox" name="activate' . $c . '" value="' . $item['id'] . '"></td>';
                        echo '<td class="ttag">' . $item['uname'] . '</td>';
                        echo '<td class="ttitle">' . $item['name'] . '</td>';
                        echo '</tr>';
                        $c++;
                    }
                    ?>
                </table>
                <br>
                <input type="submit" name="activeSubmit" value="Aktivál">
            </form>

        <?php endif; ?>
<?php endif; ?>

</div>

<?php
include('includes/footer.php');
