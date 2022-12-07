<?php include_once(ROOT . '/views/fragments/siteHeader.php'); ?>
    <body class="main_body">
    <style>

        img {
            height: 230px;
            animation: slidein 3s;
            border-radius: 10px;
            object-fit: cover;
        }

    </style>
    <div class='container-fluid text-white' style='background-color: rgba(1,1,1, 0.7); min-height: 100vh'>
        <div class="container-fluid row gx-0 justify-content-center">
            <div class="container-fluid col-sm-12 col-md-10 col-lg-8 mb-3">

                <h1 class="text-center mt-4 mb-5">Galeria</h1>

                <div class="row g-1 justify-content-center">

                        <?php foreach ($galleryList as $galleryItem): ?>

                      <div class="card bg-dark col-4 m-4 pt-3" style="width: 18rem;" onclick=document.location="/main/galleryFolder/<?php echo $galleryItem['id']; ?>">
                          <div class="card-header text-center">
                                <?php if(Gallery::isFolderEmpty($galleryItem['id'])){ ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="200" fill="grey" class="bi bi-card-image" viewBox="0 0 16 16">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                                </svg>
                                <?php }else{ ?>

                                    <?php

                                    $dir = ROOT.'/public_html/gallery/'.$galleryItem['id'];;

                                    if (is_dir($dir)) {
                                        if ($dh = opendir($dir)) {
                                            while (false !== ($file = readdir($dh))) {
                                                if ($file != "." && $file != "..") {
                                                    $path = $dir . '/' . $file;
                                                    $files = '/gallery/'.$galleryItem['id'].'/'.$file;
                                                }
                                            }
                                        }
                                    }
                                    ?>

                                <img src="<?php echo $files; ?>" class="card-img-top" alt="...">
														<?php } ?>
                          </div>
                          <div class="card-body text-center">
                              <h5 class="card-title"><?php echo $galleryItem['name'] ?></h5>
                          </div>
                      </div>

									<?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
    </body>
    <script>
        $('#menu__chor').addClass('active');
    </script>
<?php include(ROOT . '/views/fragments/footer.php');