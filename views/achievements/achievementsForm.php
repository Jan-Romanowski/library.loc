<?php include(ROOT . '/views/fragments/libraryHeader.php'); ?>

	<div class='container-fluid mt-xs-5 mt-md-3 mx-auto px-1' style='min-height: 100vh'>
		<div class="container-fluid mt-5 pt-5 pt-sm-0 mt-sm-0 mx-auto row justify-content-center">
			<div class="container-fluid col-12 col-md-10 col-lg-8 col-xl-8">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/admin/">Zarządzanie</a></li>
						<li class="breadcrumb-item"><a href="/achievement/index/">Osiągnięcia</a></li>
						<li class="breadcrumb-item active" aria-current="page">Nowa nagroda</li>
					</ol>
				</nav>
				<form method="post" action="#">
					<h2 class="mb-4 text-center">Nowa nagroda</h2>
					<?php if (isset($errors) && is_array($errors)): ?>
						<ul>
							<?php foreach ($errors as $error): ?>
								<li> - <?php echo $error; ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<div class="input-group mb-4">
						<span class="input-group-text">Nazwa nagrody i opis</span>
						<textarea class="form-control" name="text" style="min-height: 200px;"
											aria-label="Notatki"></textarea>
					</div>
					<div class="mb-4">
						<div class="container-fluid" style="text-align: center">
							<input type="submit" name="submit" value="Dodaj" class="btn btn-outline-secondary w-25">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php include(ROOT . '/views/fragments/footer.php');

