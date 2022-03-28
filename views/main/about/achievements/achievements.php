<?php include_once(ROOT . '/views/fragments/siteHeader.php'); ?>
    <body class="main_body">
    <div class="container-fluid text-light text-lg-start gx-5 m-0 pb-5" style="background-color: rgba(1,1,1, 0.7); min-height: 100vh; margin-top: 20px; width: 100%;">
        <div class="container-fluid row justify-content-center p-5">
            <h2 class="mb-5 text-center">Osiągnięcia</h2>
            <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-9 container-fluid mb-5">

					<?php
					foreach ($achievementsList as $achievementsListItem):?>

              <div class="card bg-dark m-3">
                  <div class="row g-0">
                      <div>
                        <?php

                        $dir = ROOT.'/public/achievements/'.$achievementsListItem['id'];

                        if (is_dir($dir)) {
                            if ($dh = opendir($dir)) {
                                while (false !== ($file = readdir($dh))) {
                                    if ($file != "." && $file != "..") {
                                        $path = $dir . '/' . $file;
                                        $files = '/achievements/'.$achievementsListItem['id'].'/'.$file;
                                    }
                                }
                            }
                        }
                        ?>

                          <img src="<?php echo $files; ?>" class="img-fluid h-100 rounded-start" alt="...">
                      </div>
                      <div>
                          <div class="card-body">
                              <p class="card-text text-truncate" style="height: 100px"><?php echo $achievementsListItem['text']; ?></p>
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
        $('#menu__chor').addClass('active');
    </script>
<?php include(ROOT . '/views/fragments/footer.php');