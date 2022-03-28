<?php include(ROOT . '/views/fragments/libraryHeader.php'); ?>

    <div class='container-fluid mt-xs-5 mt-md-3 mx-auto px-1' style='min-height: 100vh'>
        <div class="container-fluid mt-5 pt-5 pt-sm-0 mt-sm-0 mx-auto row justify-content-center">
            <div class="container col-sm-12 col-md-10 col-lg-8 pt-3 row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/folders/">Teczki</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nowa teczka</li>
                    </ol>
                </nav>
            </div>
            <div class="container col-sm-12 col-md-10 col-lg-8 mb-3 row">
                <form class="row align-items-center" method="post" action="#">
                    <div class="container mt-3 pt-4 border bg-light">
                        <h2 class="mb-4 text-center">Nowa teczka</h2>
                        <div class="mb-3">
                            <label for="exampleInputText1" class="form-label">Nazwa teczki</label>
                            <input type="text" class="form-control" name="name_folder"
                                   value="<?php echo $name_folder; ?>">
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">Notatki (opcjonalnie)</span>
                            <textarea class="form-control" name="note"
                                      aria-label="Notatki"><?php echo $note; ?></textarea>
                        </div>
                        <div class="mb-3 text-center">
                            <input type="submit" class="btn btn-outline-dark" name="submit" value="Dodaj teczkę">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include(ROOT . '/views/fragments/footer.php');

