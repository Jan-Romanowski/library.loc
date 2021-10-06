<?php include (ROOT.'/views/layouts/header.php'); ?>

    <div class='container-sm gx-5 mt-4 w-50 ';>
        <?php if($result):
            echo '<p class="text-center">Nowy utwór został pomyślnie dodany do biblioteki !</p>';
        else:
            ?>
        <form method="post" action="#">
            <h2 class="mb-4 text-center">Nowy utwór</h2>
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
            </div>
            <div class="mb-3">
                <label for="exampleInputText3" class="form-label">Autor</label>
                <input type="text" required class="form-control" name="autor" value="<?php echo $author; ?>">
            </div>

            <div class="mb-5">
                <label for="exampleInputText4" class="form-label">Teczka</label>
                <select class="form-select" name="folders" aria-label="Default select example">
                    <option value="8" hidden selected>Wybierz teczkę</option>
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
        <?php endif; ?>
    </div>
<?php
