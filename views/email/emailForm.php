<?php include(ROOT . '/views/fragments/libraryHeader.php'); ?>

	<div class='container-fluid mt-xs-5 mt-md-3 mx-auto px-1' style='min-height: 100vh'>
		<div class="container-fluid mt-5 pt-5 pt-sm-0 mt-sm-0 mx-auto row justify-content-center">
			<div class="container col-sm-12 col-md-10 col-lg-8 pt-3 row">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/admin/">Zarządzanie</a></li>
						<li class="breadcrumb-item"><a href="/email/index">Email System</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edytor Szablonu</li>
					</ol>
				</nav>
			</div>
			<div class="container col-sm-12 col-md-10 col-lg-8 mb-3 row">
				<form class="row align-items-center" method="post" action="#">

					<div class="container mt-3 pt-3 border mb-3">
						<h2 class="mb-4 text-center">Edytor Szablonu</h2>
						<?php if (isset($errors) && is_array($errors)): ?>
							<ul>
								<?php foreach ($errors as $error): ?>
									<li style="color: red;"> - <?php echo $error; ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						<div class="mb-3">
							<label for="exampleInputText1" class="form-label">Temat</label>
							<input type="text" required class="form-control" name="header"
										 value="<?php echo $header; ?>">
							<div id="headerHelpBlock" class="form-text">
								Do 30 symboli.
							</div>
						</div>

                        <div class="input-group mb-3">

                            <div>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                                    Wyczyść formularz
                                </button>
                                <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Napewno chcesz wyczyścić wszystkie pola formularza ?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer">
                                                <?php if(isset($temp)): ?>
                                                <button type="button" class="btn btn btn-outline-success w-25" onclick=document.location="/email/<?php echo $templateItem['id']; ?>/2/">
                                                    Tak
                                                </button>
                                                <?php else: ?>
                                                <button type="button" class="btn btn btn-outline-success w-25" onclick=document.location="/email/newTemplate/0/">
                                                    Tak
                                                </button>
                                                <?php endif; ?>
                                                <button type="button" class="btn btn-outline-secondary w-25" data-bs-dismiss="modal">Nie</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="mx-2">
                                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Wygeneruj listę aktualnych utworów
                                    </button>
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                         aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Napewno chcesz wygenerować listę aktualnych utworów ? Skasują ci się wszystkie pola formularza. </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                            <?php if(isset($temp)): ?>
                                                    <button type="button" class="btn btn btn-outline-success" onclick=document.location="/email/<?php echo $templateItem['id']; ?>/1/">
                                                            <?php else: ?>
                                                        <button type="button" class="btn btn btn-outline-success" onclick=document.location="/email/newTemplate/1/">
                                                            <?php endif; ?>
                                                        Wygenerować
                                                    </button>
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cofnij</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php if(isset($temp)): ?>
                            <div>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">
                                    Usunąć szablon
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill"
                                         viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </button>
                                <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Napewno chcesz usunąć ten szablon ? </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn btn-outline-danger w-25"
                                                        onclick=document.location="/email/deleteTemplate/<?php echo $templateItem['id']; ?>">Tak
                                                </button>
                                                <button type="button" class="btn btn-outline-success w-25" data-bs-dismiss="modal">Nie</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Treść wiadomości</span>
                            <textarea class="form-control" name="text"
                                      aria-label="text" style="min-height: 150px;"><?php echo $text; ?></textarea><br>
                        </div>

                        <div class="mb-4">
                            <div class="container-fluid" style="text-align: center">

                                <input type="submit" class="btn btn-outline-success" name="submit" value="Zachowaj szablon">

                                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop4">
                                    Wyślij maile
                                </button>
                                <div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Uwaga</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p>
                                                    Napewno chcesz ten mail ? Uwaga, ten mail się wyśle do WSZYSTKICH użytkowników systemu.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn btn-outline-success disabled" onclick=document.location="#">
                                                        Wysłać
                                                    </button>
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cofnij</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

					</div>
				</form>
			</div>
		</div>
	</div>
<?php include(ROOT . '/views/fragments/footer.php');
