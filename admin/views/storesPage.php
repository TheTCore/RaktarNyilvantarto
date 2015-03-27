<?php include('includes/header.php'); ?>

<div id="content">

    <!--raktárak táblázat formázás-->
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

    <?php if (isset($_SESSION['sresult'])) : ?>

        <?php
        if (!empty($_SESSION['sresult'])) {
            echo '<table>';
            echo '<th>Raktár Id</th><th>Település</th><th>Irányító szám<th>Cím</th><th>Manager Id</th>';
            foreach ($_SESSION['sresult'] as $item) {
                echo '<tr>';
                echo '<td class="store_id">' . $item['id'] . '</div>';
                echo '<td class="city">' . $item['city'] . '</div>';
                echo '<td class="post_code">' . $item['post_code'] . '</div>';
                echo '<td class="address">' . $item['address'] . '</div>';
                echo '<td class="manager_id">' . $item['manager_id'] . '</div>';
                echo '<tr>';
            }
            echo '</table>';
        } else {
            echo '<p>Nincs találat.</p>';
        }
        unset($_SESSION['sresult']);
        ?>
        <br>
        <ul id="navigation" class="nav nav-pills">
            <li role="presentation"><a href="?q=stores">Vissza</a></li>
        </ul>

    <?php else : ?>

        <h2>Raktárak Listája</h2>

        <table>
            <?php
            echo '<th>Raktár Id</th><th>Település</th><th>Irányító szám<th>Cím</th><th>Manager Id</th>';
            foreach ($stores as $item) {
                echo '<tr>';
                echo '<td class="sid">' . $item['id'] . '</td>';
                echo '<td class="scity">' . $item['city'] . '</td>';
                echo '<td class="spost">' . $item['post_code'] . '</td>';
                echo '<td class="saddress">' . $item['address'] . '</d>';
                echo '<td class="smid">' . $item['manager_id'] . '</d>';
                echo '</tr>';
            }
            ?>
        </table>
        <br><div class="divider"></div>
        <h2>Keresés a raktárak között:</h2>

        <form name="searchForm" method="post" id="searchForm">
            <br>
            <label>Raktár azonosítóban:</label>
            <br>
            <input type="text" name="store_id">
            <br>
            <label>Városban:</label>
            <br>
            <input type="text" name="city" class="shortText">
            <br>
            <input type="submit" name="storeSearchSubmit" value="Keresés">
        </form>
        
    <?php endif; ?>

</div>



<?php
include('includes/footer.php');
