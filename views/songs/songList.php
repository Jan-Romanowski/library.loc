<?php include(ROOT . '/views/headers/header.php'); ?>

<div class='container gx-3' style='min-height: 100vh';>

    <div class="container-fluid p-3">
        <h2 class="text-center mb-5">Utwory</h2>
        <div class="row align-items-start mb-3">
            <?php if(User::checkRoot("moder") || User::checkRoot("admin")): ?>
            <a href="/songs/newSong/" class="btn btn-outline-dark px-1 mx-3 col-1">Nowy Utwór</a>
			<?php endif; ?>

            <div class="col">
                <form class="row" action="/songs/search/" method="post">
                    <div class="col-7 x-3">
                        <input type = "text" name="word" class="form-control" placeholder="Szukaj*" value="<?php if(isset($_SESSION['word'])) echo $_SESSION['word'];?>">
                    </div>
                    <div class="col-1 px-3">
                        <input type="submit" name="submit" class="btn btn-outline-dark px-5" value="Szukaj">
                    </div>
                </form>
            </div>
        </div>


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
                        </div>
        <div class="dropdown">
             Sortowanie wg:
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

<?php include(ROOT . '/views/headers/footer.php');