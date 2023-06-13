<?php
include("./pageBase.php");
?>
<div class="content f-dir-column">
    <a href="../index.php"><img src="../img/logo.png" alt="Логотип Сасити" title="На главную" class="logo"></a>

    <h1>Правила</h1>
    <br>
    <div class="gr-desc ctrl-j wrapper">
        <!-- Предисловие перед правилами, текст берётся из БД -->
        <?php
        $RulesPrologue = $con->query("SELECT * FROM rules_prologue");
        while($RPResult = mysqli_fetch_assoc($RulesPrologue)){
            ?>
            <p class="ctrl-j"><?= $RPResult['text'] ?></p>
            <br>
            <?php
        }
        ?>
    </div>
    <br>
    <ul class="wrapper ctrl-e">
        <?php
        // Правила, берутся из БД и сортируются по id группы. Наказания тоже берутся по id через совмещение таблиц
        // Запрос на общую выборку информации из таблицы
        $get_r_groups = $con->query("SELECT * FROM `rule_groups`");

        while ($r_groups = mysqli_fetch_assoc($get_r_groups)) {
            // Получение текущей группы правил
            $r_groups_id = $r_groups['id'];
            // Совмещение таблиц с правилами и наказаниями для вывода последних по наведению.
            $get_rules = mysqli_query($con, "SELECT * FROM `rules` LEFT JOIN `punishes` ON `rules`.`punish` = `punishes`.`id` WHERE `group`='$r_groups_id'");
        ?>
            <p>
                <!-- Название группы -->
                <h2><?= $r_groups["name"]; ?></h2>
                <br>
                <!-- Описание группы -->
                <div class="ctrl-j gr-desc">
                    <?= $r_groups["desc"] ?>
                </div>
            </p>
            <br>
            <?php
            // Вывод правила как пункта списка, соответствующего обрабатываемой группе. В атрибуте title выводится название
            while ($rules = mysqli_fetch_assoc($get_rules)) {
            ?>
                <li class="ctrl-l" title="<?= $rules['pun_text'] ?>">
                    <?= $rules['desc'] ?>
                </li>
            <?php
            }
            ?>
            <br>
            <br>
        <?php
        }
        ?>
    </ul>
    <!-- Кнопка для возвращения на главную -->
    <a href="../index.php"><button class="neon-block">На главную</button></a>

</div>
 