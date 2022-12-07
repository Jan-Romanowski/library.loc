<?php include_once(ROOT . '/views/fragments/siteHeader.php'); ?>
	<body class="main_body">
	<style>
        a{
            text-decoration: none;
        }
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
    <div class='container-fluid text-white' style='background-color: rgba(1,1,1, 0.7); min-height: 100vh'>
        <div class="container-fluid row gx-0 justify-content-center">
            <div class="container-fluid col-sm-12 col-md-10 col-lg-8 mb-3">
                <nav class="mt-2" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/main/gallery/">Galeria</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $galleryItem['name']; ?></li>
                    </ol>
                </nav>

				<h1 class="text-center mt-5 mb-5"><?php echo $galleryItem['name']; ?></h1>

				<div class="row g-1 justify-content-center">

					<?php
					$i = 1;
					foreach ($files as $filesItem):

						?>
						<div class="container col-sm-12 col-md-12 col-lg-6 mb-4 p-1">
							<?php ComFun::crutch_for_all($filesItem['file'], $i, $filesItem['filename']); ?>
						</div>
						<?php
						$i++;
					endforeach;
					?>
				</div>
			</div>
		</div>
	</div>

	</body>
	<script>
      $('#menu__chor').addClass('active');
	</script>
<?php include(ROOT . '/views/fragments/footer.php');