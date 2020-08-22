<?php
// Pengulangan
// For
// while
// do.. while
// foreach : Pengulangan Khusus Array

// for (nilai awal; kondisi terminasi; increment atau decrement)
// for($i = 0; $i < 5; $i++) {
//     echo "Hello World!<br>";
// }

// while
// $i = 0; //nilai aweal
// while ( $i <5)//kondisi terminasi {
//     echo "Hello World!<br>";
//     $i++; //increment atau decrement
// }


// do.. while
// blocknya akan dijalankan 1xterlebih dahulu  baru dicek (while) diakhir
// $i = 0; //nilai aweal
// do{
//     echo "Hello World!<br>";
//     $i++; $i++; //increment atau decrement
// } while ($i < 5); //kondisi terminasi
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1 - Pengulangan</title>
    <style>
    .warna-baris{
        background-color: #00ffff;
    }
    </style>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
    <?php
    // for($i = 1; $i <= 4; $i++) {
    //     echo "<tr>";
    //     for ($j = 1; $j <= 5; $j++) {
    //         echo "<td>$i,$j</td>";
    //     }
    //     echo "</tr>";
    // }
    ?>

    <?php for($i = 1; $i <= 5; $i++) : ?>
    <!-- Template Sintaks -->
        <?php if($i % 2 == 1) : ?>
            <tr class="warna-baris">
        <?php else : ?>
            <tr>
        <?php endif; ?>
            <?php for($j = 1; $j <= 5; $j++) : ?>
                <?php if($j % 2 == 0) : ?>
                    <td class="warna-baris">
                <?php else : ?> 
                    <td>
                <?php endif; ?>
                <?= "$i, $j"; ?></td>
            <?php endfor; ?>
        </tr>
            <?php endfor; ?> 
    
    </table>



</body>
</html>