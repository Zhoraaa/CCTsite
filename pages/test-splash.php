<?php
include("../pageBase.php");
?>
<div class="content f-dir-column">
    <a href="../index.php"><img src="../img/logo.png" alt="Логотип Сасити" title="На главную" class="logo"></a>

    <!-- Название и сплэш -->
    <h1>CaCuTi</h1>
    <?php
    $q_splash = "SELECT * FROM splashes";
    $q_count = "SELECT COUNT(*) FROM splashes";

    $get_splash = mysqli_query($cctdb, $q_splash);
    $get_count = mysqli_query($cctdb, $q_count);
    $count = mysqli_fetch_array($get_count);

    $rand = rand(1, $count[0]);

    while ($splash = mysqli_fetch_array($get_splash)) {

        if ($splash["id"] == $rand) {
    ?>
            <h2>
                <?= $splash["text"] ?>
            </h2>
    <?php
        }
    }
    ?>
</div> 