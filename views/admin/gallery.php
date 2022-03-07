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
            <div class="row justify-content-center">
                <?php
                $i=1;
                foreach ($files as $filesItem):
                    ?>
                    <div class="container col-sm-12 col-md-12 col-lg-6 mb-4">
						<?php ComFun::crutch($filesItem['file'], $i); ?>
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
