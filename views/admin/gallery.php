<?php include(ROOT . '/views/fragments/header.php'); ?>

<div class='container-fluid mt-xs-5 mt-md-3 mx-auto px-1' style='min-height: 100vh'>
	<div class="container-fluid mt-5 pt-5 pt-sm-0 mt-sm-0 mx-auto row justify-content-center">
		<div class="container-fluid col-12 col-md-10 col-lg-8 col-xl-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/">Zarządzanie</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Galeria</li>
                </ol>
            </nav>
            <h1 class="text-center mb-5">Galeria</h1>

                <button type="button" class="btn btn-outline-dark m-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Dodaj zdjęcie
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="/admin/uploadPhoto/" method="post" class="" enctype="multipart/form-data" style="margin-top: 30px;">
                                <div class="container-fluid mb-3">
                                    <h5 class="text-center">Nowe zdjęcie</h5>
                                    <label for="formFile" class="form-label">Wgraj plik</label>
                                    <input class="form-control" type="file" multiple accept=".png,.jpg,.jpeg" aria-label="browser" name="filename" id="formFile">
                                </div>
                                <div class="container-fluid mb-5">
                                    <label for="exampleInputText4" class="form-label">Kategoria</label>
                                    <select class="form-select" name="chapter" aria-label="Default select example">
                                        <option value="concerts" selected>Koncerty</option>
                                        <option value="trips">Wyjazdy</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-success w-25">Wgraj plik</button>
                                    <button type="button" class="btn btn-outline-secondary w-25" data-bs-dismiss="modal">Confij</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <div class="row justify-content-center">
                <?php
                $i=1;
                foreach ($files as $filesItem):
                    ?>
                    <div class="container col-sm-12 col-md-12 col-lg-6 mb-4">
						<?php ComFun::crutch($filesItem['file'], $i, $filesItem['filename'], $filesItem['chapter']); ?>
                    </div>
                <?php
                    $i++;
                    endforeach;
                    ?>
            </div>
		</div>
	</div>
</div>

<?php include(ROOT . '/views/fragments/footer.php');
