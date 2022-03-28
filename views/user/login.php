<?php include(ROOT . '/views/fragments/siteHeader.php'); ?>

    <div class="row mt-5">
			<?php if (isset($_SESSION["msg"]) && $_SESSION["msg"]): ?>
          <div class="container-fluid col-sm-12 col-md-10 col-lg-8">
              <div class="alert <?php echo $_SESSION["stat"]; ?> alert-dismissible fade show" role="alert">
								<?php echo $_SESSION["msg"]; ?>
								<?php $_SESSION["msg"] = null; ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          </div>
			<?php endif; ?>
    </div>

    <div class="container-fluid pt-5 mt-5 align-items-center" style="margin: auto; min-height: 100vh;">
        <form method="post" action="#">
            <h2 class="mb-5 mt-4 text-center">Zaloguj</h2>

            <div class="container col-lg-6 col-md-8 col-sm-12">
							<?php if (isset($errors) && is_array($errors)): ?>
                  <ul style="color: red">
										<?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
										<?php endforeach; ?>
                  </ul>
							<?php endif; ?>
                <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email"
                           value="<?php if (isset($email)) echo $email; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputText2" class="form-label">Hasło</label>
                    <input type="password" class="form-control" name="pass"
                           value="<?php if (isset($pass)) echo $pass; ?>">
                </div>
                <div class="mb-3">
                    <div class="container-fluid" style="text-align: center">
                        <a href="/users/register/">Załóż konto</a>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="container-fluid" style="text-align: center">
                        <input type="submit" class="btn btn-outline-dark px-3" name="submit" value="Zaloguj">
                    </div>
                </div>
            </div>

        </form>
    </div>

    <script>
        $('#menu__biblioteka').addClass('active');
    </script>

<?php include(ROOT . '/views/fragments/footer.php');
