<?php include (ROOT.'/views/layouts/header.php'); ?>

<div class='container gx-3' style='min-height: 100vh';>

    <div class="container-fluid p-3">
        <div class="row align-items-start mb-3">
            <form class="row" method="post" action="/songs/search">
            <a href="/songs/newSong" class = "col-2 btn btn-outline-secondary">
                Nowy utwór
            </a>

            <div class="col-2 dropdown">
                <button class="btn btn-outline-secondary px-3 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Sortuj według
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="/songs/filter-1">Nazwy utwora (A-z)</a></li>
                    <li><a class="dropdown-item" href="/songs/filter-2">Nazwy utwora (z-A)</a></li>
                    <li><a class="dropdown-item" href="/songs/filter-3">Autora (A-z)</a></li>
                    <li><a class="dropdown-item" href="/songs/filter-4">Autora (z-A)</a></li>
                    <li><a class="dropdown-item" href="/songs/filter-5">Numeru teczki (Rosnąco)</a></li>
                    <li><a class="dropdown-item" href="/songs/filter-6">Numeru teczki (Malejąco)</a></li>
                </ul>
            </div>

                <div class="col-3">
                    <input type = "text" name="word" class="form-control" placeholder="Szukaj*"">
                </div>
                <div class="col-5">
                    <input type="submit" name="submit" class="btn btn-outline-secondary w-25">
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
                    <td><a href="/songs/<?php echo $songsListItem['id_song'];?>"><?php echo $songsListItem['name_song'] ?></a></td>
                    <td><?php echo $songsListItem['count'] ?></td>
                    <td><?php echo $songsListItem['author'] ?></td>
                    <td><?php echo $songsListItem['name_folder'] ?></td>
                </tr>
            <?php endforeach;  ?>
        </table>
        <div class="container text-center px-5 pt-3 pb-3 gx-5">
            <?php echo $pagination->get(); ?>
        </div>
    </div>
</div>

<?php