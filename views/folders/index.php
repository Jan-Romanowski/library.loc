<?php include(ROOT . '/views/fragments/libraryHeader.php'); ?>

    <div class='container-fluid mt-xs-5 mt-md-3 mx-auto px-1' style='min-height: 100vh'>
        <div class="container-fluid mt-5 pt-5 pt-sm-0 mt-sm-0 mx-auto row justify-content-center">
            <div class="container-fluid col-12 col-md-10 col-lg-8 col-xl-8">
                <h1 class="text-center mb-5"><strong>Teczki</strong></h1>
							<?php if (User::checkRoot("admin")): ?>
                  <a href="/folders/newFolder" class="btn btn-outline-dark m-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                           class="bi bi-folder-plus" viewBox="0 0 16 16">
                          <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
                          <path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
                      </svg>
                      Nowa teczka
                  </a>
							<?php endif; ?>
                <div class="d-flex align-content-around row flex-wrap">
									<?php
									foreach ($foldersList as $foldersListItem): ?>
                      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                          <div class="card m-2 shadow rounded">
                              <div class="card-body">
                                  <h5 class="card-title"><?php echo $foldersListItem['name_folder'] ?>
                                            <?php if (User::checkRoot("admin")): ?>
                                        <button type="button" class="btn float-end btn-outline-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop<?php echo $foldersListItem['id_folder']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 fill="currentColor" class="bi bi-trash-fill"
                                                 viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </button>
                                        <div class="modal fade"
                                             id="staticBackdrop<?php echo $foldersListItem['id_folder']; ?>"
                                             data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                             aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Napewno chcesz
                                                            usunąć tą teczkę ?<br> Teczka ma być pusta.</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-danger w-25"
                                                                onclick=document.location="delete/<?php echo $foldersListItem['id_folder']; ?>">
                                                            Tak
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success w-25"
                                                                data-bs-dismiss="modal">Nie
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
																		<?php endif; ?>

                                  </h5>
                                  <p class="card-text">Utworów: <span
                                              class="badge bg-secondary"><?php echo Folders::countSongsInFolder($foldersListItem['id_folder']) ?></span>
                                  </p>
																<?php if (User::checkRoot("moder") || User::checkRoot("admin")): ?>

																<?php endif; ?>
                                  <div class="accordion accordion mt-2" id="accordionFlushExample">
                                      <div class="accordion-item">

                                          <h2 class="accordion-header" id="flush-headingOne">
                                              <button class="accordion-button collapsed" type="button"
                                                      data-bs-toggle="collapse"
                                                      data-bs-target="#flush-collapse<?php echo $foldersListItem['id_folder'] ?>"
                                                      aria-expanded="false" aria-controls="flush-collapseOne">
                                                  Pokaż utwory
                                              </button>
                                          </h2>
                                          <div id="flush-collapse<?php echo $foldersListItem['id_folder'] ?>"
                                               class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                               data-bs-parent="#accordionFlushExample">

                                              <ul class="list-group">
                                                    <?php
                                                    $songList = Folders::getSongsFromFolder($foldersListItem['id_folder']);
                                                    foreach ($songList as $song) { ?>
                                                        <li class="list-group-item">
                                                            <div class="ms-2 me-auto">

                                                                <div class="">
                                                                    <?php echo "<a href='/songs/" . $song['id_song'] . "'>" . $song['name_song'] . "</a>"; ?>
                                                                    <p style="font-size: 82%"><?php echo $song['author'] ?></p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php } ?>
                                              </ul>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
									<?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php include(ROOT . '/views/fragments/footer.php');