<?php include(ROOT . '/views/fragments/libraryHeader.php'); ?>

	<div class='container-fluid mt-xs-5 mt-md-3 mx-auto px-1' style='min-height: 100vh'>
		<div class="container-fluid mt-5 pt-5 pt-sm-0 mt-sm-0 mx-auto row justify-content-center">
			<div class="container col-sm-12 col-md-10 col-lg-8 pt-3 row">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/admin/">Zarządzanie</a></li>
						<li class="breadcrumb-item"><a href="/gallery/index/">Galeria</a></li>
						<li class="breadcrumb-item active" aria-current="page">Nowy folder</li>
					</ol>
				</nav>
			</div>
			<div class="container col-sm-12 col-md-10 col-lg-8 mb-3 row">
				<form class="row g-1 align-items-center" method="post" action="#">

					<div class="container mt-3 pt-3 border p-5 mb-3">
						<h2 class="mb-4 text-center">Nowy folder</h2>
						<?php if (isset($errors) && is_array($errors)): ?>
							<ul>
								<?php foreach ($errors as $error): ?>
									<li style="color: red;"> - <?php echo $error; ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						<div class="mb-3">
							<label for="exampleInputText1" class="form-label">Nazwa folderu</label>
							<input type="text" required class="form-control" name="name"
										 value="<?php echo $name; ?>">
						</div>

						<div class="mb-4">
							<div class="container-fluid" style="text-align: center">
								<input type="submit" class="btn btn-outline-dark" name="submit" value="Zapisz">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include(ROOT . '/views/fragments/footer.php');
