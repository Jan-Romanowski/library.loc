<?php include_once(ROOT . '/views/fragments/siteHeader.php'); ?>

<style>

    img{
        height: 200px;
        animation: slidein 3s;
        border-radius: 10px;
        cursor: pointer;
        object-fit: cover;
    }

    img:hover{
        transform: scale(1.1);
        transition: all 0.8s;
    }

</style>

<body class="main_body">
<div class="container-fluid text-light text-lg-start gx-5 m-0 pb-5" style="background-color: rgba(1,1,1, 0.7); min-height: 100vh; margin-top: 20px; width: 100%;">
    <div class="container-fluid row justify-content-center p-5">
        <h2 class="mb-5 text-center">Aktualności</h2>
        <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-9 container-fluid mb-5">

			<?php
			foreach ($newsList as $newsListItem):?>

                <div class="card bg-dark mb-3">
                    <div class="row g-0">
                        <div class="col-12 col-sm-4 col-md-4 col-lg-5 col-xl-5">

                            <?php

							$dir = ROOT.'/public/news/'.$newsListItem['id_news'];;

							if (is_dir($dir)) {
								if ($dh = opendir($dir)) {
									while (false !== ($file = readdir($dh))) {
										if ($file != "." && $file != "..") {
											$path = $dir . '/' . $file;
											$files = '/news/'.$newsListItem['id_news'].'/'.$file;
										}
									}
								}
							}
                            ?>

                            <img src="<?php echo $files; ?>" class="img-fluid h-100 rounded-start" alt="...">
                        </div>
                        <div class="col-12 col-sm-8 col-md-8 col-lg-7 col-xl-7">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $newsListItem['header']; ?></h5>
                                <p class="card-text text-truncate" style="height: 100px"><?php echo $newsListItem['text']; ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo $newsListItem['autor']; ?></small></p>
                                <p class="card-text"><small class="text-muted"><?php echo $newsListItem['date_news']; ?></small></p>
                                <a href="/main/newsItem/<?php echo $newsListItem['id_news']; ?>" class="btn btn-outline-info">Szczegóły</a>
                            </div>
                        </div>
                    </div>
                </div>

			<?php endforeach; ?>

		</div>
	</div>
</div>
</body>

	<script>
        $('#menu__aktualnosci').addClass('active');
	</script>

<?php include(ROOT . '/views/fragments/footer.php');