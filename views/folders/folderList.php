<?php include(ROOT . '/views/headers/header.php'); ?>

<div class="container p-3 gx-5 w-50">
    <a href="/folders/newFolder" class = "col-2 btn btn-outline-secondary mb-3">
        Nowa teczka
    </a>
    <table class='table table-hover'>
        <tr class="bg-light"><td>Nazwa teczki</td><td></td>
        </tr>
        <?php
        foreach ($foldersList as $foldersListItem): ?>
            <tr>
                <td><?php echo $foldersListItem['name_folder'] ?></td>
                <td>
                    <button class="btn btn-outline-dark px-2 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Opcje
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Zmienić nazwę</a></li>
                        <li><a class="dropdown-item" href="#">Usunąć teczkę</a></li>
                    </ul>
                </td>
            </tr>
        <?php endforeach;  ?>
    </table>
</div>
<?php