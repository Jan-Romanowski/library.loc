<?php include(ROOT . '/views/headers/header.php'); ?>

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
        <p class="fs-5">
            <a href="editSong/<?php echo $songsItem['id_song'];?>">Edycja utworu</a><br>
            <a href="delete/<?php echo $songsItem['id_song'];?>">Usunąć utwór</a>
        </p>
    </div>
    <div class="p-5 mt-4 border bg-light">
        <h2>Pliki</h2>
        <p class="fs-5">
            <?php
            foreach ($files as $filesItem): ?>
               <a href="<?php echo $filesItem['dwnlpath'];?>" download=""><?php echo $filesItem['filename'];?></a><br>
            <?php endforeach;
            ?>
        </p>
    </div>
    <div class="container-fluid d-flex flex-column justify-content-center w-50">
        <div class="mb-3 lg-3">
            <form action="uploadFile/<?php echo $songsItem['id_song']; ?>" method="post" class="" enctype="multipart/form-data" style="margin-top: 30px;">
                <div class="container-fluid mb-3">
                    <label for="formFile" class="form-label">Wgraj plik</label>
                    <input type="text" name="id_folder" value="<?php echo $songsItem['id_song']; ?>" hidden>
                    <input class="form-control" type="file" multiple accept=".wav,.pdf,.mp3" aria-label="browser" name="filename[]" id="formFile">
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-dark px-3 mt-3">Wyślij</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
