<?php include(ROOT . '/views/headers/header.php'); ?>

    <div class='container-sm gx-5 mt-4 w-50 ';>
            <form method="post" action="#">
                <h2 class="mb-4 text-center">Nowa aktualność</h2>
                <?php if(isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Nagłówek</label>
                    <input type="text" required class="form-control" name="header" value="">
                </div>
                <div class="input-group mb-4">
                    <span class="input-group-text">Tekst</span>
                    <textarea class="form-control" name="text" aria-label="Notatki"></textarea>
                </div>

                <div class="mb-4">
                    <div class="container-fluid" style="text-align: center">
                        <input type="submit" name="submit" class="btn btn-outline-secondary w-25">
                    </div>
                </div>
            </form>
    </div>
<?php include(ROOT . '/views/headers/footer.php');

