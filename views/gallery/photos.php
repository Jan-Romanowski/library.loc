<?php include(ROOT . '/views/fragments/libraryHeader.php'); ?>

	<style>

      .img {
          height: 230px;
          animation: slidein 3s;
          border-radius: 10px;
          cursor: pointer;
          object-fit: cover;
      }

      .img:hover {
          transform: scale(1.1);
          transition: all 0.8s;
      }

	</style>
	<div class='container-fluid mt-xs-5 mt-md-3 mx-auto px-1' style='min-height: 100vh'>
		<div class="container-fluid mt-5 pt-5 pt-sm-0 mt-sm-0 mx-auto row justify-content-center">
			<div class="container-fluid col-12 col-md-10 col-lg-8 col-xl-8">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/admin/">Zarządzanie</a></li>
                        <li class="breadcrumb-item"><a href="/gallery/index/">Galeria</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo $galleryItem['name']; ?></li>
					</ol>
				</nav>
				<h1 class="text-center mb-5"><?php echo $galleryItem['name']; ?></h1>

                <button type="button" class="btn btn-outline-dark m-3" data-bs-toggle="modal" data-bs-target="#static">
                    Dodaj zdjęcie
                </button>
                <div class="modal fade" id="static" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                     aria-labelledby="staticBackdropL" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="/gallery/uploadPhoto/" method="post" class="" enctype="multipart/form-data"
                                  style="margin-top: 30px;">
                                <input type="text" name="id" value="<?php echo $galleryItem['id']; ?>" hidden>
                                <div class="container-fluid mb-3">
                                    <h5 class="text-center">Nowe zdjęcie</h5>
                                    <label for="formFile" class="form-label">Wgraj plik</label>
                                    <input class="form-control" type="file" multiple accept=".png,.jpg,.jpeg"
                                           aria-label="browser" name="filename" id="formFile">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-success">Wgraj zdjęcie</button>
                                    <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Confij
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row g-1 justify-content-center">

                    <?php
                    $i = 1;
                    foreach ($files as $filesItem):

                        ?>
                        <div class="container col-sm-12 col-md-12 col-lg-6 mb-4 p-1">
                            <?php ComFun::crutch($filesItem['file'], $i, $filesItem['filename']); ?>
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
