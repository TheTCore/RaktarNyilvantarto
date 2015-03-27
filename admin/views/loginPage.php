<?php include('includes/header.php'); ?>

<div id="content">

    <?php if (isset($_SESSION['logged'])) : ?>

        <p>Üdv a raktárniylvántartóban , <?php echo $_SESSION['name']; ?>!</p>

    <?php else : ?>

        <?php if (isset($_SESSION['msg2'])) : ?>
            <p><?php
                print($_SESSION['msg2']);
                unset($_SESSION['msg2']);
                ?></p>
            <br>
        <?php endif; ?>
            
        <?php if (isset($_SESSION['msg3'])) : ?>
            <p><?php
                print($_SESSION['msg3']);
                unset($_SESSION['msg3']);
                ?></p>
            <br>
        <?php endif; ?>
            
        <h2>Bejelentkezés</h2>
        <form name="loginForm" method="post">
            <label>Felhasználónév:</label>
            <br>
            <input type="text" name="uName">
            <br>
            <label>Jelszó:</label>
            <br>
            <input type="password" name="uPass">
            <br><br>
            <input type="submit" name="loginSubmit" value="Bejelentkezés">
        </form><br>
        <div class="divider"></div>
        <h2>Regisztráció</h2>
        <?php if (isset($_SESSION['msg'])) : ?>

            <p><?php
                print($_SESSION['msg']);
                unset($_SESSION['msg']);
                ?></p>
            <br>
            <b>Új felhasználó regisztrálása után, kérem lépjen kapcsolatba egy adminisztrátorral a felhasználó aktiválásával kapcsolban.<br>
                E-Mailes kapcsolat esetén kérem említse meg miért van szüksége a weboldal használatára, mellékletet is elfogadunk.<br>
                Ez szükséges biztonsági okokból.<br></b>
        <?php else: ?>
            <form name="registrationForm" method="post">
                <label>Felhasználónév:</label><br>
                <input type="text" name="ruName" maxlength="50"><br>
                <label>Jelszó:</label><br>
                <input type="password" name="ruPass"><br>
                <label><abbr title="A személyi igazolványon szereplő név">Név:</abbr></label><br>
                <input type="text" name="ruRealName"><br>
                <label>E-mail:</label><br>
                <input type="text" name="ruEmail"><br>
                <label>Telefonszám:</label><br>
                <input type="text" name="ruPhone" maxlength="20"><br><br>
                <input type="submit" name="regSubmit" value="Regisztráció">
            </form>
        <?php endif; ?>
    <?php endif; ?>

</div>

<?php
include('includes/footer.php');
