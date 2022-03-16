<?php include(ROOT . '/views/fragments/header.php'); ?>

	<div class='container-fluid mt-xs-5 mt-md-3 mx-auto px-1' style='min-height: 100vh'>
		<div class="container-fluid mt-5 pt-5 pt-sm-0 mt-sm-0 mx-auto row justify-content-center">
			<div class="container-fluid col-12 col-md-10 col-lg-8 col-xl-8">
				<h1 class="text-center mb-5">Zarządzanie stroną</h1>
                <div class="row justify-content-start">

                    <div class="card m-3" style="width: 17rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" fill="currentColor" class="bi bi-people-fill mt-3 card-img-top" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                        </svg>
                        <div class="card-body">
                            <h5 class="card-title">Lista Użytkowników</h5>
                            <p class="card-text">Użytkownicy biblioteki, edycja uprawnień, usuwanie.</p>
                            <div class="text-center">
                                <a href="/users/view/" class="btn btn-primary">Zarządzaj</a>
                            </div>
                        </div>
                    </div>

                    <div class="card m-3" style="width: 17rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" fill="currentColor" class="bi bi-person-lines-fill mt-3 card-img-top" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                        </svg>
                        <div class="card-body">
                            <h5 class="card-title">Wnioski o rejestrację</h5>
                            <p class="card-text">Wnioski o rejestracje oczekujące na akceptację</p>
                            <div class="text-center">
                                <a href="/queries/" class="btn btn-primary">Wnioski <span class="badge bg-danger"><?php if(Queries::getCountQueries()) echo Queries::getCountQueries(); ?></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="card m-3" style="width: 17rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" fill="currentColor" class="bi bi-images mt-3 card-img-top" viewBox="0 0 16 16">
                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                            <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"/>
                        </svg>
                        <div class="card-body">
                            <h5 class="card-title">Galeria</h5>
                            <p class="card-text">Zarządzanie galerią zdjęć, koncerty i wyjazdy</p>
                            <div class="text-center">
                                <a href="/admin/gallery/" class="btn btn-primary">Zarządzaj</a>
                            </div>
                        </div>
                    </div>

                    <div class="card m-3" style="width: 17rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" fill="currentColor" class="bi bi-journal-text mt-3 card-img-top" viewBox="0 0 16 16">
                            <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                        </svg>
                        <div class="card-body">
                            <h5 class="card-title">Aktualności</h5>
                            <p class="card-text">Zarządzanie aktualnościami, edycja, usuwanie</p>
                            <div class="text-center">
                                <a href="#" class="btn btn-primary">Zarządzaj</a>
                            </div>
                        </div>
                    </div>

                </div>
			</div>
		</div>
	</div>


<?php include(ROOT . '/views/fragments/footer.php');
