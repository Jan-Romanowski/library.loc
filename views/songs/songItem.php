<?php include(ROOT . '/views/headers/header.php'); ?>

<div class='container-fluid mt-xs-5 mt-md-3 mx-auto px-1' style='min-height: 100vh'>
    <div class="container-fluid mt-5 pt-5 pt-sm-0 mt-sm-0 mx-auto row justify-content-center">
        <div class="container col-sm-12 col-md-10 col-lg-8 pt-3 row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/songs/">Utwory</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Szczegóły utworu</li>
                </ol>
            </nav>
        </div>
        <div class="container col-sm-12 col-md-10 col-lg-8 mb-3 row">
            <div class="container-fluid p-5 mt-4 border row bg-light col-12">
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <h1><?php echo $songsItem['name_song']; ?></h1><br>
                    <a href="#" class="btn btn-outline-dark p-5 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-music-note" viewBox="0 0 16 16">
                            <path d="M9 13c0 1.105-1.12 2-2.5 2S4 14.105 4 13s1.12-2 2.5-2 2.5.895 2.5 2z"/>
                            <path fill-rule="evenodd" d="M9 3v10H8V3h1z"/>
                            <path d="M8 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 13 2.22V4L8 5V2.82z"/>
                        </svg>
                    </a>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <p class="fs-4">
                        Numer teczki: <?php echo $songsItem['id_song']; ?><br>
                        Ilość partytur: <?php echo $songsItem['count_p']; ?><br>
                        Autor: <?php echo $songsItem['author']; ?><br>
                        Typ utworu: <?php echo $typeSong; ?><br>
                        Teczka: <?php echo $songsItem['name_folder']; ?><br>

						<?php if ($songsItem['note'] != '') {
							echo 'Notatki: ' . $songsItem['name_folder'];
						} ?>
                    </p>
					<?php if(User::checkRoot("moder") || User::checkRoot("admin")): ?>
                        <button class="btn btn-outline-primary mb-1" onclick=document.location="editSong/<?php echo $songsItem['id_song']; ?>">
                            Edycja utworu
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-fill"
                                 viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </button>
                        <br><br>

                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Usunąć utwór
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill"
                                 viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </button>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                             aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Napewno chcesz usunąć ten utwór ?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn btn-outline-danger w-25"
                                                onclick=document.location="delete/<?php echo $songsItem['id_song']; ?>">Tak
                                        </button>
                                        <button type="button" class="btn btn-outline-success w-25" data-bs-dismiss="modal">Nie</button>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
                </div>
            </div>
            <div class="container-fluid p-5 mt-4 border row bg-light col-12 mb-5">
                <h2>Pliki</h2>
                <p class="fs-5">
					<?php
					foreach ($files as $filesItem): ?>
                        <a href="<?php echo $filesItem['dwnlpath'];?>" download=""><?php echo $filesItem['filename'];?></a><a class="float-end" href="/songs/deleteFile/<?php echo $songsItem['id_song'].'/'.$filesItem['filename']; ?>">Usunąć</a><br>
					<?php endforeach;
					?>
                </p>
				<?php if(User::checkRoot("moder") || User::checkRoot("admin")): ?>
                    <div class="container-fluid d-flex flex-column justify-content-center">
                        <div class="mb-3 lg-3">
                            <form action="uploadFile/<?php echo $songsItem['id_song']; ?>" method="post" class="" enctype="multipart/form-data" style="margin-top: 30px;">
                                <div class="container-fluid mb-3">
                                    <label for="formFile" class="form-label">Wgraj plik</label>
                                    <input type="text" name="id_folder" value="<?php echo $songsItem['id_song']; ?>" hidden>
                                    <input class="form-control" type="file" multiple accept=".wav,.pdf,.mp3" aria-label="browser" name="filename" id="formFile">
                                </div>
                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-outline-dark px-5 mt-3">Wyślij</button>
                                </div>
                            </form>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include(ROOT . '/views/headers/footer.php');
