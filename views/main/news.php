<?php include_once(ROOT . '/views/fragments/main_header.php'); ?>

<style>

img{
	animation: slidein 3s;
        border-radius: 10px;
        cursor: pointer;
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
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 container-fluid mb-5">

			<?php
			foreach ($newsList as $newsListItem):?>

				<div class="col">
					<div class="card bg-dark mb-3">
						<div class="card-body">
							<h5 class="card-title"><?php echo $newsListItem['header']; ?></h5>
							<p class="card-text text-truncate" style="max-height: 100px;"><?php echo $newsListItem['text']; ?></p>
							<h6 class="card-subtitle mb-2 text-muted"><?php echo $newsListItem['date_news']; ?></h6>
							<h6 class="card-subtitle mb-2 text-muted"><?php echo $newsListItem['autor']; ?></h6>
                            <a href="/main/newsItem/<?php echo $newsListItem['id_news']; ?>" class="btn btn-outline-info">Szczegóły</a>
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