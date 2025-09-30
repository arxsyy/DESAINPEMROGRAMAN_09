<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h3> Time </h3>
        <?php
        date_default_timezone_set("Asia/Jakarta"); // Perbaikan: menambahkan tanda titik koma
        echo date("h:i:sa");
        ?>
    </body>
</html>