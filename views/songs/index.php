<?php include(ROOT . '/views/fragments/libraryHeader.php'); ?>


    <style>

        #checkBoxJ:checked {
            background-color: #f3a123 !important;
            border-color: #f3a123 !important;
        }

    </style>

    <div class='container-fluid mt-xs-5 mt-md-3' style='min-height: 100vh'>
        <div class="container-fluid mt-5 mt-sm-2 row gx-0 justify-content-center">
            <div class="container-fluid col-sm-12 col-md-10 col-lg-8 mb-3">

                <h1 class="text-center m-3"><strong>Utwory</strong></h1>
							<?php

                            if(User::isLogin()){
                            if (User::checkRoot("admin")): ?>
                  <a href="/songs/newSong/" class="btn btn-outline-dark px-3 mb-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                           class="bi bi-file-earmark" viewBox="0 0 16 16">
                          <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                      </svg>
                      Nowy Utwór
                  </a>
							<?php endif;} ?>
                <div class="row align-items-start mb-3">
                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-md-3 m-1">
                        <form action="/songs/applyFilters/" method="post">
                            <div class="mb-3">
                                <strong>Filtry</strong>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input kek" type="checkbox" role="switch" name="checkBoxJ"
                                       id="checkBoxJ"
                                       onchange="form.submit()"
                                        <?php if (ComFun::checked("oneVoise")) echo "checked"; ?>
                                >
                                <label class="form-check-label" for="checkBoxJ">Utwory jednogłosowe</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="checkBoxW"
                                       id="checkBoxW"
                                       onchange="form.submit()"
                                        <?php if (ComFun::checked("multiVoise")) echo "checked"; ?>
                                >
                                <label class="form-check-label" for="checkBoxW">Utwory wielogłosowe</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="actual" id="actual"
                                       onchange="form.submit()"
                                        <?php if (ComFun::checked("actual")) echo "checked"; ?>
                                >
                                <label class="form-check-label" for="actual">Tylko aktualne</label>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-4 col-xl-3  m-1">
                        <div class="mb-3">
                            <strong>Sortowanie</strong>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Sortowanie według
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="/songs/priorityFilter-1">Tytuł utworu (A-z)</a></li>
                                <li><a class="dropdown-item" href="/songs/priorityFilter-2">Tytuł utworu (z-A)</a></li>
                                <li><a class="dropdown-item" href="/songs/priorityFilter-3">Kompozytor (A-z)</a></li>
                                <li><a class="dropdown-item" href="/songs/priorityFilter-4">Kompozytor (z-A)</a></li>
                                <?php if(User::isLogin()){ ?>
                                <li><a class="dropdown-item" href="/songs/priorityFilter-5">Numeru teczki (Rosnąco)</a></li>
                                <li><a class="dropdown-item" href="/songs/priorityFilter-6">Numeru teczki (Malejąco)</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5  m-1 gy-3">
                        <form class="row" action="/songs/search/" method="post">
                            <div class="col-12 mb-3">
                                <strong>Wyszukiwarka</strong>
                            </div>
                            <div class="col-md-8 col-md-8 mb-3">
                                <input type="text" id="srch" list="datalistOptions" name="word" class="form-control" placeholder="Szukaj*"
                                       value="<?php if (isset($_SESSION['word'])) echo $_SESSION['word']; ?>">
                                <datalist id="datalistOptions" style="max-height: 100px;">
                                </datalist>
                            </div>
                            <div class="col-md-4 col-md-2">
                                <input type="submit" name="submit" class="btn btn-outline-dark px-5" value="Szukaj">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class='table table-hover mx-auto p-3'>
                        <tr class="bg-light">
                            <td>#</td>
                            <td></td>
                            <td>Nazwa utworu</td>
                            <td class="text-center"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Aktualne"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-half" viewBox="0 0 16 16">
                                    <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/>
                                </svg>
                            </td>
                                <?php if(User::isLogin()){ ?>
                                    <td class="text-center"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Teczka"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                                            <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
                                        </svg>
                                    </td>
                                <?php } ?>
                            <td class="text-center"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Wyświetlenia"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </td>
                        </tr>
                            <?php
                            foreach ($songsList as $songsListItem): ?>
                          <tr class="h_anim pb-0 mb-0" onclick="document.location = '/songs/<?php echo $songsListItem['id_song']; ?>';">
                              <td class=""><?php echo $songsListItem['id_song'] ?></td>
                              <td class="">
                                  <a href="/songs/<?php echo $songsListItem['id_song']; ?>"
                                     class="btn btn-outline-dark float-end">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="27" fill="currentColor"
                                           class="bi bi-music-note-beamed" viewBox="0 0 16 16">
                                          <path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13c0-1.104 1.12-2 2.5-2s2.5.896 2.5 2zm9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2z"/>
                                          <path fill-rule="evenodd" d="M14 11V2h1v9h-1zM6 3v10H5V3h1z"/>
                                          <path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4V2.905z"/>
                                      </svg>
                                  </a>
                              </td>
                              <td>
                                  <a href="/songs/<?php echo $songsListItem['id_song']; ?>"
                                    <?php
                                    if(Songs::isFolderEmpty($songsListItem['id_song']) && User::isLogin() && ((User::checkRoot("admin"))))
                                        echo "style='color: red'";
                                    else if (isset($songsListItem) && $songsListItem['one_voice'] == 1)
                                        echo "style='color: #f3a123'";
                                    else
                                        echo '';
                                    ?>
                                  >
                                    <?php echo $songsListItem['name_song'] ?>
                                  </a>
                                  <br>
                                  <small style="font-size: 82%"><?php echo $songsListItem['author'] ?></small>
                              </td>
                              <!--   <td>--><?php //echo $songsListItem['count'] ?><!--</td>-->
                              <td class="text-center align-middle">
                                            <?php if ($songsListItem['actual'] == 0) { ?>
                                    <a class="<?php if (!User::checkRoot("admin")) echo 'btn disabled'; ?>"
                                       href="/songs/changeActual/<?php echo $songsListItem['id_song']; ?>" <?php if (isset($songsListItem) && $songsListItem['one_voice'] == 1) echo "style='color: #f3a123';" ?>>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                        </svg>
                                    </a>
                                            <?php } else { ?>
                                    <a class="<?php if (!User::checkRoot("admin")) echo 'btn disabled'; ?>"
                                       href="/songs/changeActual/<?php echo $songsListItem['id_song']; ?>" <?php if (isset($songsListItem) && $songsListItem['one_voice'] == 1) echo "style='color: #f3a123';" ?>>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                    </a>
																<?php } ?>
                              </td>
                                    <?php if(User::isLogin()){ ?>
                                        <td class="text-center align-middle"><span class="badge <?php if($songsListItem['one_voice'] == 1) echo 'bg-warning'; else echo 'bg-primary' ?>"><?php echo $songsListItem['name_folder'] ?></span></td>
                                        <?php } ?>
                              <td class="text-center align-middle text-center"><span class="badge bg-secondary"><?php echo $songsListItem['views'] ?></span></td>
                          </tr>
											<?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div class="container-fluid mt-4 d-flex justify-content-evenly">
							<?php echo $pagination->get(); ?>
            </div>
        </div>
    </div>


<script type="text/javascript">

    window.onload = () => {
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        let input = document.querySelector('#srch');
        input.oninput = function (){

            var dataList = document.querySelector("#datalistOptions");

            while (dataList.firstChild) {
                dataList.removeChild(dataList.firstChild);
            }

            let value = this.value.trim();

            console.log(value);

            $.ajax({
                method: "POST",
                url: "ajax/getSongs",
                data: { val: value }
            })
                .done(function( data ) {

                    var person = JSON.parse(data);
                    for (let i = 0; i < person.length; i++) {
                        var dataList = document.querySelector("#datalistOptions");

                        var opt = document.createElement("option");
                        opt.value = person[i];

                        dataList.appendChild(opt);
                    }
                });
        };

    };

</script>


<?php include(ROOT . '/views/fragments/footer.php');