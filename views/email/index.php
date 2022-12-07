<?php include(ROOT . '/views/fragments/libraryHeader.php'); ?>

    <style>
        .anim{
            cursor: pointer;
        }
        .anim:hover{
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
						<li class="breadcrumb-item active" aria-current="page">Email System</li>
					</ol>
				</nav>
				<h1 class="text-center mb-5">Email System</h1>

				<div class="row g-1 justify-content-center">

                    <div class="container col-sm-12 col-md-6 col-lg-4 p-3">
                        <div class="card anim shadow rounded" style="height: 8rem;" onclick=document.location="/email/newTemplate/0">
                            <div class="card-body text-center">
								<br>
                                Nowy szablon
                            </div>
                        </div>
                    </div>

                    <?php foreach($templatesList as $templatesListItem): ?>

                    <div class="container col-sm-12 col-md-6 col-lg-4 p-3">
                        <div class="card anim shadow rounded" style="height: 8rem;">
                            <div class="card-header" onclick=document.location="/email/<?php echo $templatesListItem['id']; ?>/0/">
                                <?php echo $templatesListItem['header']; ?>
                            </div>
                            <div class="card-body text-center text-truncate" onclick=document.location="/email/<?php echo $templatesListItem['id']; ?>/0/">
                                <?php echo $templatesListItem['text']; ?>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>

				</div>
			</div>
		</div>
	</div>

<?php include(ROOT . '/views/fragments/footer.php');

