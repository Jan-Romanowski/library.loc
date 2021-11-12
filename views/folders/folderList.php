<?php include(ROOT . '/views/headers/header.php'); ?>

<div class="container p-3 gx-4 w-75">
    <a href="/folders/newFolder" class = "col-2 btn btn-outline-dark mb-3">
        Nowa teczka
    </a>

    <div class="d-flex align-content-around flex-wrap">
        <?php
        foreach ($foldersList as $foldersListItem): ?>
                <div class="col-sm-4">
                    <div class="card m-2 bg-light">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $foldersListItem['name_folder'] ?></h5>
                            <p class="card-text">Utworów w teczce: <?php echo Folders::countSongsInFolder($foldersListItem['id_folder']) ?></p>
                            <?php if(User::checkRoot("moder") || User::checkRoot("admin")): ?>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $foldersListItem['id_folder']; ?>">
                                Usunąć teczkę
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill"
                                     viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </button>
                            <div class="modal fade" id="staticBackdrop<?php echo $foldersListItem['id_folder']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Napewno chcesz usunąć tą teczkę ?<br> Teczka ma być pusta.</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger w-25"
                                                    onclick=document.location="delete/<?php echo $foldersListItem['id_folder']; ?>">Tak
                                            </button>
                                            <button type="button" class="btn btn-outline-success w-25" data-bs-dismiss="modal">Nie</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="accordion accordion mt-2" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $foldersListItem['id_folder'] ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                            Pokarz utwory
                                        </button>
                                    </h2>
                                    <div id="flush-collapse<?php echo $foldersListItem['id_folder'] ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
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
                    </div>
                </div>
        <?php endforeach;  ?>
    </div>
</div>
<?php