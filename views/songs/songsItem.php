<?php include(ROOT . '/views/fragments/libraryHeader.php'); ?>





<style>
    .downloadLine:hover{
        cursor: pointer !important;
    }
</style>

<body>

    <div class='container-fluid mt-xs-5 mt-md-3' style='min-height: 100vh'>
        <div class="container-fluid mt-5 mt-sm-2 row g-0 justify-content-center">
            <div class="container-fluid col-sm-12 col-md-10 col-lg-8 mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/songs/">Utwory</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Szczegóły utworu</li>
                    </ol>
                </nav>
            </div>
            <div class="container col-sm-12 col-md-10 col-lg-8 mb-3 row">
                <div class="container-fluid p-5 mt-4 border row g-0 bg-light col-12">

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

                        <table>
                          <tr>
                              <td>
                                  Numer teczki
                              </td>
                              <td class="px-3">
                                  <span class="badge bg-secondary"><?php echo $songsItem['id_song']; ?></span>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  Ilość partytur
                              </td>
                              <td class="px-3">
                                  <span class="badge bg-secondary"><?php echo $songsItem['count_p']; ?>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  Autor
                              </td>
                              <td class="px-3">
                                  <span class="badge bg-secondary"><?php echo $songsItem['author']; ?>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  Typ utworu
                              </td>
                              <td class="px-3">
                                  <span class="badge bg-secondary"><?php echo $typeSong; ?></span>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  Teczka
                              </td>
                              <td class="px-3">
                                  <span class="badge bg-secondary"><?php echo $songsItem['name_folder']; ?>
                              </td>

                          </tr>
                            <tr>
                                <td>
                                    Wyświetlenia
                                </td>
                                <td class="px-3">
                                  <span class="badge bg-secondary"><?php echo $songsItem['views']; ?>
                                </td>

                            </tr>
                      </table>
                        <p class="fs-4">
                                <?php if ($songsItem['note'] != '') {
                                    echo 'Notatki: ' . $songsItem['note'];
                                } ?>
                        </p>
											<?php
											if(User::isLogin()){
												if(User::checkRoot("admin")): ?>
                            <!--                        <button class="btn btn-outline-primary mb-1" data-bs-toggle="modal" data-bs-target="#numberForm">-->
                            <!--                            Zmiana numeru teczki-->
                            <!--                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-fill"-->
                            <!--                                 viewBox="0 0 16 16">-->
                            <!--                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>-->
                            <!--                            </svg>-->
                            <!--                        </button>-->
                            <!--                        <div class="modal fade" id="numberForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"-->
                            <!--                             aria-labelledby="staticBackdropLabel" aria-hidden="true">-->
                            <!--                            <div class="modal-dialog modal-dialog-centered">-->
                            <!--                                <div class="modal-content">-->
                            <!--                                    <div class="modal-header">-->
                            <!--                                        <h5 class="modal-title" id="staticBackdropLabel">Zmiana numeru teczki</h5>-->
                            <!--                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="modal-body">-->
                            <!--                                        <h5>Aktualny numer teczki - --><?php //echo $songsItem['id_song']; ?><!--</h5><br>-->
                            <!--                                        <label for="exampleInputText2" class="form-label">Numer teczki</label>-->
                            <!--                                        <input type="number" required class="form-control" name="count_p"-->
                            <!--                                               value="">-->
                            <!--                                        <div id="passwordHelpBlock" class="form-text">-->
                            <!--                                            Ma być unikalny-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="modal-footer">-->
                            <!--                                        <button type="button" class="btn btn btn-outline-danger w-25"-->
                            <!--                                                onclick=document.location="">Tak-->
                            <!--                                        </button>-->
                            <!--                                        <button type="button" class="btn btn-outline-success w-25" data-bs-dismiss="modal">Nie</button>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <!--                        <br>-->

                            <button class="btn btn-outline-primary mb-1" onclick=document.location="editSong/<?php echo $songsItem['id_song']; ?>">
                                Edycja danych utworu
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-fill"
                                     viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </button>
                            <br>

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
                                            <h5 class="modal-title" id="staticBackdropLabel">Napewno chcesz usunąć ten utwór i wszystkie pliki do tego utworu ? </h5>
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
												<?php endif; }?>
                    </div>
                </div>

                <div class="container-fluid p-5 mt-4 border row g-1 bg-light col-12 mb-5">

                    <h2>Pliki</h2>

                    <?php

                    if(User::isLogin()){

                        ?><h4>Midi</h4>
                        <div class="container-fluid .d-md-none .d-lg-block p-5 mt-4 border row g-1 bg-light col-12 mb-5" id="MyTarget"><?php
                        
                                ?><script>

                                const windowOuterWidth = window.outerWidth;
                                if(windowOuterWidth>600){
                                var myPlayer = new wimpyPlayer({
                                    media : "<?php
                                        foreach($audioFiles as $audioFilesItem){
                                        echo $audioFilesItem['dwnlpath'].' | '; 
                                        }
                                        ?>",
                                    skin : "/wimpy/wimpy.skins/itunesesc.tsv",
                                    startUpText : "Midi",
                                    
                                    // width : 700,
                                    // height : 300
                                });
                            }
                                </script>
                                
                                </div><?php
                        
                        
                    }

                    
                    ?>

                
					<?php if(User::isLogin()){ ?>
                    <div class="table-responsive">
                      <table class='table table-hover mt-3 mx-auto p-3'>
                          <tr class="bg-light">
                              <td>#</td>
                              <td>Nazwa</td>
                              <td></td>
                          </tr>

                            <?php

                            $merge = array_merge($files, $audioFiles);

                            foreach ($merge as $filesItem): 
                            ?>
                            <tr>

                                <td class="downloadLine align-middle">
                                    <?php

                                    $temp = '';

                                    if(strcmp($filesItem['filetype'], 'PDF') == 0){
                                        $temp = 'pdf';
                                    }
                                    else if(strcmp($filesItem['filetype'], 'WAV') == 0){
                                        $temp = 'wav';
                                    }
                                    else if(strcmp($filesItem['filetype'], 'MP3') == 0){
                                        $temp = 'mp3';
                                    }
                                    else{
                                        $temp = $filesItem['filetype'];
                                    }

                                    switch ($temp){
                                        case 'pdf': ?>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                                        </svg>

                                        <?php
                                        break;

                                    case 'mp3': ?>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-filetype-mp3" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5Zm-4.911 9.67h-.443v-.609h.422a.688.688 0 0 0 .322-.073.558.558 0 0 0 .22-.2.505.505 0 0 0 .076-.284.49.49 0 0 0-.176-.392.652.652 0 0 0-.442-.15.74.74 0 0 0-.252.041.625.625 0 0 0-.193.112.496.496 0 0 0-.179.349H7.71c.006-.157.04-.302.102-.437.063-.135.153-.252.27-.352.117-.101.26-.18.428-.237.17-.057.364-.086.583-.088.279-.002.52.042.723.132.203.09.36.214.472.372a.91.91 0 0 1 .173.539.833.833 0 0 1-.12.478.96.96 0 0 1-.619.439v.041a1.008 1.008 0 0 1 .718.434.909.909 0 0 1 .144.521c.002.19-.037.359-.117.507a1.104 1.104 0 0 1-.329.378c-.14.101-.302.18-.486.234-.182.053-.376.08-.583.08-.3 0-.558-.051-.77-.153a1.206 1.206 0 0 1-.487-.41 1.094 1.094 0 0 1-.178-.563h.726a.457.457 0 0 0 .106.258.664.664 0 0 0 .249.179.98.98 0 0 0 .357.067.903.903 0 0 0 .384-.076.598.598 0 0 0 .252-.217.56.56 0 0 0 .088-.319.556.556 0 0 0-.334-.522.81.81 0 0 0-.372-.079ZM.706 15.925v-2.66h.038l.952 2.16h.516l.946-2.16h.038v2.66h.715v-3.999h-.8l-1.14 2.596h-.026l-1.14-2.596H0v4h.706Zm5.458-3.999h-1.6v4h.792v-1.342h.803c.287 0 .53-.058.732-.173.203-.118.357-.276.463-.475a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.475-.158-.677a1.175 1.175 0 0 0-.46-.477 1.4 1.4 0 0 0-.733-.179Zm.545 1.333a.795.795 0 0 1-.085.381.574.574 0 0 1-.237.24.793.793 0 0 1-.375.082h-.66v-1.406h.66c.219 0 .39.06.513.182.123.12.184.295.184.521Z"/>
                                        </svg>

                                        <?php
                                        break;

                                    case 'wav': ?>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-filetype-wav" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.784 15.849l.741-2.789h.033l.74 2.789h.73l1.055-3.999h-.858l-.595 2.903h-.041l-.706-2.903H2.2l-.706 2.903h-.038l-.6-2.903H0l1.055 3.999h.73Zm3.715 0 .314-1.028h1.336l.313 1.028h.841L6.967 11.85h-.926L4.7 15.849h.8Zm1.002-3.234.49 1.617H5.977l.49-1.617H6.5Zm3.604 3.234h-.952L7.814 11.85h.917l.897 3.138h.038l.888-3.138h.879l-1.328 3.999Z"/>
                                        </svg>

                                        <?php
                                        break;

                                    default: ?>

                                    <?php
                                }
                                ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $filesItem['filename'];?>
                                </td>
                                <td class="">
                                    <div class="row gx-0 justify-content-evenly">
                                    <?php if(strcmp(strtoupper($filesItem['filetype']), 'PDF') == 0){ ?>
                                        <div class="col-12 col-sm-12 col-md-10 col-lg-4 my-1 my-lg-0 mx-0 px-1">
                                            <form action="/file/download/" style="display: inline" class="mx-0 px-0 w-100" method="post">
                                                <input type="hidden" name="filePath" value="<?php echo $filesItem['dwnlpath'];?>">
                                                <input class="btn btn-success w-100" type="submit" name="download" value="Pobrać">
                                            </form>
                                        </div>
                                        <?php }
                                        
                                        else{ ?>
                                        <div class="col-12 col-sm-12 col-md-10 col-lg-4 my-1 my-lg-0 mx-0 px-1">
                                            <a class='btn btn-success w-100' download href='<?php echo $filesItem['dwnlpath'];?>'>Pobrać</a>
                                        </div>
                                        <?php }
                                        
                                        
                                        ?>
                                        <?php if(strcmp(strtoupper($filesItem['filetype']), 'PDF') == 0){ ?>
                                            <div class="col-12 col-sm-12 col-md-10 col-lg-4 my-1 my-lg-0 mx-0 px-1">
                                                <form action="/file/openFile/" style="display: inline" class="mx-0 px-0 w-100" method="post">
                                                    <input type="hidden" name="filePath" value="<?php echo $filesItem['dwnlpath'];?>">
                                                    <input class="btn btn-success w-100" type="submit" name="open" value="Otworzyć">
                                                </form>
                                            </div>
                                            <?php } ?>
                                        <div class="col-12 col-sm-12 col-md-10 col-lg-4 my-1 my-lg-0 mx-0 px-1">
                                            <?php if(User::checkRoot("moder") || User::checkRoot("admin")): ?>
                                              <a class="btn btn-danger w-100"  href="/songs/deleteFile/<?php echo $songsItem['id_song'].'/'.$filesItem['filename']; ?>">Usunąć</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                                    <?php endforeach;?>
                      </table>
                    </div>

                                <?php if(User::checkRoot("admin")): ?>
                          <div class="container-fluid d-flex flex-column justify-content-center">
                              <div class="mb-3">
                                  <button type="button" class="btn btn-outline-dark m-3" data-bs-toggle="modal" data-bs-target="#static">
                                      Dodaj plik
                                  </button>
                                  <div class="modal fade" id="static" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropL" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                              <form action="uploadFile/<?php echo $songsItem['id_song']; ?>" method="post" class="p-3" enctype="multipart/form-data" style="margin-top: 30px;">
                                                  <div class="container-fluid mb-3">
                                                      <label for="formFile" class="form-label">Wgraj plik</label>
                                                      <input type="text" name="id_folder" value="<?php echo $songsItem['id_song']; ?>" hidden>
                                                      <input class="form-control" type="file" multiple accept=".wav,.pdf,.mp3" aria-label="browser" name="filename[]" id="formFile">
                                                  </div>
                                                  <div class="mb-3 text-center">
                                                      <button type="submit" class="btn btn-outline-success">Wyślij</button>
                                                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Confij</button>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        <?php endif; }else{?>
                      <p>Dostęp do plików mają tylko zarejestrowane użytkownicy.</p>
                      <a class="btn btn-outline-success w-auto" href="/users/login/">Zaloguj</a>
									<?php } ?>
                </div>
            </div>
        </div>
    </div>

    </body>

<?php include(ROOT . '/views/fragments/footer.php');
