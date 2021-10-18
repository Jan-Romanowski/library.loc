<?php include(ROOT . '/views/headers/header.php'); ?>

<div class="container p-3 gx-4 w-75">
    <a href="/folders/newFolder" class = "col-2 btn btn-outline-secondary mb-3">
        Nowa teczka
    </a>


    <div class="d-flex align-content-around flex-wrap">
        <?php
        foreach ($foldersList as $foldersListItem): ?>
                <div class="col-sm-4">
                    <div class="card m-2">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $foldersListItem['name_folder'] ?></h5>
                            <p class="card-text">Utworów w teczce: <?php echo Folders::countSongsInFolder($foldersListItem['id_folder']) ?></p>
                            <p>
                                <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $foldersListItem['id_folder'] ?>" aria-expanded="false" aria-controls="collapseExample">
                                    Pokarz utwory
                                </button>
                            </p>
                            <div class="collapse" id="collapseExample<?php echo $foldersListItem['id_folder'] ?>">
                                <div class="card card-body">
                                    <?php

                                    $songList = Folders::getSongsFromFolder($foldersListItem['id_folder']);
                                    foreach ($songList as $song){
                                        echo "<a href='/songs/".$song['id_song']."'>".$song['name_song']."</a><br>";
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endforeach;  ?>
    </div>
</div>
<?php