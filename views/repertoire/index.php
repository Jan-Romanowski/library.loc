<?php include(ROOT . '/views/fragments/libraryHeader.php'); ?>

    <style>
        .anim{
            cursor: pointer;
        }
        .anim:hover{
            transform: scale(1.03);
            transition: all 0.8s;
        }
    </style>

    <div class='container-fluid mt-xs-5 mt-md-3 mx-auto px-1' style='min-height: 100vh'>
        <div class="container-fluid mt-5 pt-5 pt-sm-0 mt-sm-0 mx-auto row justify-content-center">
            <div class="container-fluid col-12 col-md-10 col-lg-8 col-xl-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/">Zarządzanie</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Repertuar</li>
                    </ol>
                </nav>
                <h1 class="text-center mb-5">Repertuar</h1>

                <div class="row g-1 justify-content-center">

                    <div class="container col-sm-10 col-md-9 col-lg-8 p-3 mb-3">
                        <div class="card anim shadow rounded" style="height: 7rem;" onclick=document.location="/repertoire/newRepertoire/0">
                            <div class="card-body text-center">
                                <br>
                                Nowy repertuar
                            </div>
                        </div>
                    </div>

                        <?php foreach($repertoireList as $repertoireListItem): ?>

                      <div class="container col-sm-10 col-md-9 col-lg-8 p-3 mb-3 h-auto">
                          <div class="card anim shadow rounded" >
                              <div class="card-header" onclick=document.location="/repertoire/<?php echo $repertoireListItem['id']; ?>/0/">
                                <?php echo $repertoireListItem['header']; ?>
                              </div>
                              <div class="card-body" onclick=document.location="/repertoire/<?php echo $repertoireListItem['id']; ?>/0/">
                                <?php echo $repertoireListItem['text']; ?>
                              </div>
                          </div>
                      </div>

                        <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>

<?php include(ROOT . '/views/fragments/footer.php');

