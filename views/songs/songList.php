<?php include(ROOT . '/views/headers/header.php'); ?>

<div class='container gx-3' style='min-height: 100vh';>

    <div class="container-fluid p-3">
        <div class="row align-items-start mb-3">


            <div class="accordion accordion-flush col-5" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Filtry
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="dropdown">
                                Typ utworów:
                                <button class="btn btn-outline-dark dropdown-toggle px-3 text-end" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php

                                    if(isset($_SESSION['Sorting_songs_label']))
                                        echo $_SESSION['Sorting_songs_label'];
                                    else
                                        echo 'Pokarz utwory';
                                    ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="/songs/songsFilter-1">Wszystkie</a></li>
                                    <li><a class="dropdown-item" href="/songs/songsFilter-2" style="color: #0d6efd">Wielogłosowe</a></li>
                                    <li><a class="dropdown-item" href="/songs/songsFilter-3" style="color: #f3a123">Jednogłosowe</a></li>
                                </ul>
                            </div><br>
                            <div class="dropdown">
                                Sortowanie wg.:
                                <button class="btn btn-outline-dark dropdown-toggle px-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php

                                    if(isset($_SESSION['Sorting_label']))
                                        echo $_SESSION['Sorting_label'];
                                    else
                                        echo 'Sortuj';
                                    ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="/songs/priorityFilter-1">Nazwy utwora (A-z)</a></li>
                                    <li><a class="dropdown-item" href="/songs/priorityFilter-2">Nazwy utwora (z-A)</a></li>
                                    <li><a class="dropdown-item" href="/songs/priorityFilter-3">Autora (A-z)</a></li>
                                    <li><a class="dropdown-item" href="/songs/priorityFilter-4">Autora (z-A)</a></li>
                                    <li><a class="dropdown-item" href="/songs/priorityFilter-5">Numeru teczki (Rosnąco)</a></li>
                                    <li><a class="dropdown-item" href="/songs/priorityFilter-6">Numeru teczki (Malejąco)</a></li>
                                </ul>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <form class="row" method="post">
                    <div class="col-11 x-3">
                        <input type = "text" name="word" class="form-control" placeholder="Szukaj*" value="<?php if(isset($_SESSION['word'])) echo $_SESSION['word'];?>">
                    </div>
                    <div class="col-1 px-3">
                        <input type="submit" name="submit" class="btn btn-outline-dark px-5" value="Szukaj">
                    </div>
                </form>
            </div>








        <table class='table table-hover p-3'>
            <tr class="bg-light"><td>Numer teczki</td>
                <td>Nazwa utworu</td>
                <td>Ilość partytur</td>
                <td>Autor</td>
                <td>Teczka</td>
            </tr>
            <?php
            foreach ($songsList as $songsListItem): ?>
                <tr>
                    <td><?php echo $songsListItem['id_song'] ?></td>
                    <td><a href="/songs/<?php echo $songsListItem['id_song'];?>"<?php if(isset($songsListItem) && $songsListItem['one_voice']==1) echo "style='color: #f3a123';" ?>><?php echo $songsListItem['name_song'] ?></a></td>
                    <td><?php echo $songsListItem['count'] ?></td>
                    <td><?php echo $songsListItem['author'] ?></td>
                    <td><?php echo $songsListItem['name_folder'] ?></td>
                </tr>
            <?php endforeach;  ?>
        </table>
        <div class="container-fluid mt-4 d-flex justify-content-evenly">
            <?php echo $pagination->get(); ?>
        </div>

    </div>
</div>

<?php