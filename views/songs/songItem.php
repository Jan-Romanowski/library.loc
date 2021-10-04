<?php include (ROOT.'/views/layouts/header.php'); ?>

<div class='container gx-5' style='min-height: 100vh';>
    <div class="p-5 mt-4 border bg-light">
        <h1><?php echo $songsItem['name_song']; ?></h1><br>
        <p class="fs-4">
            Numer teczki: <?php echo $songsItem['id_song']; ?><br>
            Ilość partytur: <?php echo $songsItem['count_p']; ?><br>
            Autor: <?php echo $songsItem['author']; ?><br>
            Teczka: <?php echo $songsItem['name_folder']; ?><br>

            <?php if($songsItem['note']!=''){
                echo 'Notatki: '.$songsItem['name_folder'];}?>
        </p>
    </div>

</div>

<?php
