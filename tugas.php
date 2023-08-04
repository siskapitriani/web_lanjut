<?php
function hitungDeterminan($a, $b, $c, $d)  {
    $hasil = ($a * $d - $b * $c);
    echo "<table style='border-left: ...; border-right: ...;' cellspacing='5' cellpadding='5'>
        <tr>
            <td>| 2</td>
            <td>3 |</td>
        </tr>
        <tr>
            <td>| 4</td>
            <td>5 |</td>
        </tr>
        </table>";
    echo "Determinan dari matrix tersebut adalah " . $hasil;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php hitungDeterminan(1,2,3,4) ?>
</body>
</html>
