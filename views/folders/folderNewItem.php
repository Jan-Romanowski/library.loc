<?php include(ROOT . '/views/headers/header.php'); ?>

    <a href="/folders/" class="btn btn-outline-dark m-4 float-start">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
        Powrót
    </a>

<div class='container-sm gx-5 mt-4 w-50' style='min-height: 100vh'>
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
		</div>
	</form>
</div>
<?php include(ROOT . '/views/headers/footer.php');

