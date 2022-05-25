<?php include_once(ROOT . '/views/fragments/siteHeader.php'); ?>

<style>

    img{
        height: 200px;
        width: 400px;
        animation: slidein 3s;
        border-radius: 10px;
        cursor: pointer;
        object-fit: cover;
    }

    #cardf{
        cursor: pointer;
    }

    #cardf:hover{
        transform: scale(1.05);
        transition: all 0.8s;
        filter: brightness(105%);
    }

</style>

<body class="main_body">
<div class="container-fluid text-light text-lg-start pt-5 pb-3 px-sm-0 px-md-1 px-lg-1 px-xl-1" style="background-color: rgba(1,1,1, 0.7); min-height: 100vh; width: 100%;">
    <div class="container-fluid row gx-sm-1 gx-md-2 gx-lg-3 gx-xl-2 m-0 justify-content-center">
        <h2 class="mb-5 text-center">Aktualności</h2>
        <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 container-fluid mb-5">

          <div class="row g-0 justify-content-center p-sm-0 p-md-1 p-lg-2">

			<?php
			foreach ($newsList as $newsListItem):?>

                <div class="card bg-dark col-sm-12 col-md-11 col-lg-5 col-xl-3 mb-4 mx-sm-0 mx-md-0 mx-lg-2 mx-xl-2"
                     id="cardf" onclick=document.location="/main/newsItem/<?php echo $newsListItem['id_news']; ?>">
                        <div class="card-body">
                                <?php

                                $dir = ROOT.'/public_html/news/'.$newsListItem['id_news'];;

                                if (is_dir($dir)) {
                                    if ($dh = opendir($dir)) {
                                        while (false !== ($file = readdir($dh))) {
                                            if ($file != "." && $file != "..") {
                                                $path = $dir . '/' . $file;

                                                $name = stristr($file, '.', true);

                                                if(strcmp($name, 'top') == 0){
                                                    $files = '/news/'.$newsListItem['id_news'].'/'.$file;
                                                    break;
                                                }

                                            }
                                        }
                                    }
                                }
                                ?>
                            <img src="<?php echo $files; ?>" height="250px" class="img rounded-start w-100 mb-3"  alt="...">
                            <h5 class="card-title"><?php echo $newsListItem['header']; ?></h5>
                            <p class="card-text text-truncate" style="height: 100px"><?php echo $newsListItem['text']; ?></p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text"><small class="text-muted"><?php echo $newsListItem['autor']; ?></small></p>
                            <p class="card-text"><small class="text-muted"><?php echo $newsListItem['date_news']; ?></small></p>
<!--                            <a href="/main/newsItem/--><?php //echo $newsListItem['id_news']; ?><!--" class="btn btn-outline-info">Szczegóły</a>-->
                        </div>
                    </div>

			<?php endforeach; ?>
          </div>

		</div>
	</div>
</div>
</body>

	<script>
        $('#menu__aktualnosci').addClass('active');
	</script>

<?php include(ROOT . '/views/fragments/footer.php');