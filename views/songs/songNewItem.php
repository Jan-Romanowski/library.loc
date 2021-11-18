<?php include(ROOT . '/views/headers/header.php'); ?>

    <div class='container-sm gx-5 mt-4 w-50 ';>
        <form method="post" action="#">
            <h2 class="mb-4 text-center"><?php echo $message; ?></h2>
            <?php if(isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="mb-3">
                <label for="exampleInputText1" class="form-label">Nazwa utworu</label>
                <input type="text" required class="form-control" name="song_name" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputText2" class="form-label">Ilość partytur</label>
                <input type="number" required class="form-control" name="count_p" value="<?php echo $count_p; ?>">
                <div id="passwordHelpBlock" class="form-text">
                    Nie może być ujemna.
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputText3" class="form-label">Autor</label>
                <input type="text" required class="form-control" name="autor" value="<?php echo $author; ?>">
                <div id="passwordHelpBlock" class="form-text">
                    Pole Autor ma byc w postaci 'Nazwisko. I.'
                </div>
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="typeSong" id="typeSong1" value="two" checked>
                    <label class="form-check-label" for="typeSong1">
                        Utwór wielogłosowy
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="typeSong" id="typeSong2" value="one">
                    <label class="form-check-label" for="typeSong2">
                        Utwór jednogłosowy
                    </label>
                </div>
            </div>
            <div class="mb-5">
                <label for="exampleInputText4" class="form-label">Teczka</label>
                <select class="form-select" name="folders" aria-label="Default select example">
                    <option value="<?php echo $folder_id; ?>" hidden selected><?php echo $folder_name; ?></option>
                    <?php foreach ($foldersList as $foldersListItem): ?>
                    <option value="<?php echo $foldersListItem['id_folder']; ?>"><?php echo $foldersListItem['name_folder']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text">Notatki (opcjonalnie)</span>
                <textarea class="form-control" name="notatki" aria-label="Notatki"><?php echo $note; ?></textarea>
            </div>
            <div class="mb-4">
                <div class="container-fluid" style="text-align: center">
                    <input type="submit" name="submit" class="btn btn-outline-secondary w-25">
                </div>
            </div>

        </form>
    </div>
<?php include(ROOT . '/views/headers/footer.php');
