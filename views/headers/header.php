<!DOCTYPE html>

<header>
	<link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="/js/javascript.js" type="text/javascript"></script>
	<script src="/css/bootstrap/js/bootstrap.bundle.min.js"></script>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0 fixed-top">
		<div class="container-fluid">
			<object class="m-0 p-0"
							type = "image/svg+xml"
							height="55px;"
							data = "/images/Logo/logo.svg">
					<img class="m-0 p-0" src = "/images/Logo/logo.svg"/>
			</object>
			<a class="navbar-brand" href="#">Biblioteka Chóru Katedralnego</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent" >
				<ul class="navbar-nav">
                        <?php if(User::checkRoot("admin") || User::checkRoot("moder")): ?><!-- FOR ADMIN AND MODERATOR -->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/cabinet/">Konto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/songs/">Utwory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/folders/">Teczki</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/view/">Użytkowniki</a>
                        </li>
                        <li>
                            <a class="nav-link" href="/queries/">Wnioski <span class="badge bg-secondary"><?php echo Queries::getCountQueries(); ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/news/">Aktualnośći</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/logout/">Wyloguj</a>
                        </li>
                    <?php else: ?> <!-- FOR USER -->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/cabinet/">Konto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/songs/">Utwory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/folders/">Teczki</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/logout/">Wyloguj</a>
                        </li>
                    <?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>
</header>