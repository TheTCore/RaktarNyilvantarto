<?php include($_SERVER['DOCUMENT_ROOT'] . '/RaktarNyilvantarto/admin/views/includes/header.php'); ?>

<div id="content">
    <style type="text/css">

        th {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #dedede;
        }
        td {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #ffffff;
        }
    </style>

<?php if ($_SESSION['rights'] == 1 || $_SESSION['rights'] == 2 || $_SESSION['rights'] == 3) : ?>
    <h2>Termékek Listája</h2>

    <table>
        <?php
        echo '<th>Termék Id</th><th>Megnevezés</th><th>Leírás<th>Ár (Ft)</th><th>Raktár ID</th><th>Mennyiség (db)</th>';
        foreach ($products as $item) {
            echo '<tr>';
            echo '<td class="sid">' . $item['id'] . '</td>';
            echo '<td class="sname">' . $item['name'] . '</td>';
            echo '<td class="sdescription">' . $item['description'] . '</td>';
            echo '<td class="sprice">' . $item['price'] . '</td>'; 
            echo '<td class="sstore_id">' . $item['store_id'] . '</td>';
            echo '<td class="samount">' . $item['amount'] . '</d>';
            echo '</tr>';
        }
        ?>
    </table>
    
    <?php else : ?>
    
    <b>Nincs jogosultsága az oldal megtekintéséhez!<br>
    A felhasználó aktiválásához lépjen kapcsolatban egy adminisztártorral!</b>
    <?php endif; ?>
    
</div>
</div>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/raktarnyilvantarto/admin/views/includes/footer.php');