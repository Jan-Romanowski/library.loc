<?php include(ROOT . '/views/fragments/libraryHeader.php'); ?>


    <style>

        img{
            height: 200px;
            width: 400px;
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

    <div class='container-fluid mt-xs-5 mt-md-3 mx-auto px-1' style='min-height: 100vh'>
        <div class="container-fluid mt-5 pt-5 pt-sm-0 mt-sm-0 mx-auto row justify-content-center">
            <div class="container-fluid col-12 col-md-10 col-lg-8 col-xl-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/">Zarządzanie</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Aktualnośći</li>
                    </ol>
                </nav>
                <h1 class="text-center mb-5"><strong>Aktualności</strong></h1>

                <a class="btn btn-outline-dark mb-3" href="/news/newItem/">Nowa wiadomość</a>

                <div class="row g-0 justify-content-center p-sm-0 p-md-1 p-lg-2">

                        <?php
                        foreach ($newsList as $newsListItem):?>

                      <div class="card col-sm-12 col-md-11 col-lg-5 col-xl-4 mb-3 mx-sm-0 mx-md-0 mx-lg-2 mx-xl-3">
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
                              <p class="card-text"><small class="text-muted"><?php ComFun::translateDate(date($newsListItem['date_news'])); ?></small></p>
                              <a href="/news/view/<?php echo $newsListItem['id_news']; ?>"
                                 class="btn btn-outline-info">Szczegóły</a>
                              <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                      data-bs-target="#staticBackdrop<?php echo $newsListItem['id_news']; ?>">
                                  Usunąć
                                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                       class="bi bi-trash-fill"
                                       viewBox="0 0 16 16">
                                      <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                  </svg>
                              </button>
                              <div class="modal fade" id="staticBackdrop<?php echo $newsListItem['id_news']; ?>"
                                   data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                   aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="staticBackdropLabel">Napewno chcesz usunąć
                                                  ten post ?</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                      aria-label="Close"></button>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-outline-danger w-25"
                                                      onclick=document.location="/news/delete/<?php echo $newsListItem['id_news']; ?>">
                                                  Tak
                                              </button>
                                              <button type="button" class="btn btn-outline-success w-25"
                                                      data-bs-dismiss="modal">Nie
                                              </button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                        <?php
                        $files = "";
                        endforeach; ?>
                </div>

            </div>
        </div>
    </div>
<?php include(ROOT . '/views/fragments/footer.php');
