<?php
$listt = mysqli_query($connection, "SELECT * FROM `gallery`");
/*function excess($files_gallery) {
    $result = array();
    for ($i = 0; $i < count($files_gallery); $i++) {
        if ($files_gallery[$i] != "." && $files_gallery[$i] != "..") {
            $result[] = $files_gallery[$i];
        }
    }
    return $result;
}*/
while ($list_name =  mysqli_fetch_assoc($listt)){?>
    <div class="foto-card">
        <div class = "description">
            <p class = "name"><?php echo $list_name ['rus_name'] ?></p><!-- rus_name !-->
            <p class = "date"><?php echo $list_name ['date'] ?></p><!--date !-->
            <a href="album.php?name=<?php echo $list_name ['name'] ?>">Открыть альбом</a> <!-- name !-->
        </div>
        <div class="foto">
            <!-- Cкрипт для нахождения изображений !-->
            <?php 
                $dir_gallery = "../img/gallery/" . $list_name['link'] . "/" ; // Путь к директории, в которой лежат изображения
                $files_gallery = scandir($dir_gallery); // Получаем список файлов из этой директории
                $files_gallery = excess($files_gallery); // Удаляем лишние файлы
            ?>
            <img src="<?= $dir_gallery."/".$files_gallery[1]?>" alt="Фотография">
        </div>
    </div>
<?php } ?>
<?php mysqli_close($connection);  ?>