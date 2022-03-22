<?php include_once(ROOT . '/views/fragments/main_header.php'); ?>
	<body class="main_body">
	<style>

        .custom_img{
            animation: slidein 3s;
            border-radius: 10px;
            cursor: pointer;
        }
        .custom_img:hover{
            transform: scale(1.1);
            transition: all 0.8s;
        }

	</style>
	<div class="container-fluid text-light text-lg-start gx-5 m-0 pb-5" style="background-color: rgba(1,1,1, 0.7); min-height: 100vh; margin-top: 20px; width: 100%;">
		<div class="container-fluid row justify-content-center p-5">
			<div class="container row justify-content-center">
				<div class="container col-sm-12 col-md-12 col-lg-8">

                    <h1 class="text-center mt-4 mb-5"><strong>Szczegóły <?php echo $newsItem['header']; ?></strong></h1>

                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">

                        <?php
                        $i=0;
                        foreach ($files as $filesItem): ?>
                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide-to="<?php echo $i;?>"
                                <?php if($i==0){
                                        echo 'class="active" aria-current="true"';
                                }
								$i++;
                                ?>
                                    aria-label="Slide <?php echo $i;?>">
                            </button>
                        <?php
						    endforeach;
						?>
                        </div>
                        <div class="carousel-inner" style="max-height: 500px;">
							<?php
							$p=0;
							foreach ($files as $filesItem): ?>
                            <div class="carousel-item <?php if($p==0){ echo 'active'; } $p++;?>">
                                <img src="<?php echo $filesItem['file']; ?>" class="d-block w-100" alt="...">
                            </div>
							<?php
							endforeach;
							?>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Предыдущий</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Следующий</span>
                        </button>
                    </div>

                    <div class="container-fluid">
                        <div class="container-fluid pt-5">
                            <h5 class="text-center"><?php echo $newsItem['header']; ?></h5>
                            <p><?php echo $newsItem['text']; ?></p>
                            <h6 class="card-subtitle mb-2 text-muted mt-5"><?php echo $newsItem['date_news']; ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $newsItem['autor']; ?></h6>
				        </div>
			        </div>
		        </div>
	        </div>
        </div>
    </div>
	</body>
	<script>
        $('#menu__aktualnosci').addClass('active');
	</script>

<?php include(ROOT . '/views/fragments/footer.php');