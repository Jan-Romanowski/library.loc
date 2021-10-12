<?php include(ROOT . '/views/headers/header.php');

  if($result):
      echo '<p class="text-center">Nowa teczka została pomyślnie dodana do biblioteki !</p>';
  else:?>
     <div class='container-sm gx-5 mt-4 w-50 '>
        <form method="post" action="#">
            <div class="container-md w-75">
                <h2 class="mb-4 text-center">Nowa teczka</h2>
                <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Nazwa teczki</label>
                    <input type="text" class="form-control" name="name_folder" value="<?php echo $name_folder; ?>">
                </div>
                <div class="mb-3">
                    <span class="input-group-text">Notatki (opcjonalnie)</span>
                    <textarea class="form-control" name="note" aria-label="Notatki"><?php echo $note; ?></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" name="submit" class="btn btn-outline-secondary w-25">
                </div>
        </form>
    </div>
<?php
    endif;
