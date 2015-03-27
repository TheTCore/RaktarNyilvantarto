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

    <?php if ($_SESSION['rights'] <= 3) : ?>

        <h2>Saját Raktáraim</h2>

        <form name="activeForm" method="post" id="activeForm">
            <table>
                <?php
                $c = 1;
                foreach ($active as $item) {
                    echo '<tr>';
                    if ($item ['active']) {
                        echo '<td> <input type="hidden" name="stores' . $c . '" value="' . $item['id'] . '"><input type="checkbox" checked="checked" name="activate' . $c . '" value="1"></td>';
                    } else {
                        echo '<td> <input type="hidden" name="stores' . $c . '" value="' . $item['id'] . '"><input type="checkbox" name="activate' . $c . '" value="1"></td>';
                    }
                    echo '<td>' . $item['id'] . '</td>';
                    echo '<td>' . $item['post_code'] . " " . $item['city'] . " " . $item['address'] . '</td>';
                    echo '</tr>';
                    $c++;
                }
                ?>
            </table><br>
            <input type="submit" name="activeSubmit" value="Mentés">
        </form>

    <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>