<?php
require_once "templates/header.php";
require_once "dao/movieDAO.php";


//DAO dos filmes
$movieDao = new MovieDAO($conn, $BASE_URL);

//Categorias de filmes
$latestMovies = $movieDao->getLatestMovies();
$actionMovies = $movieDao->getMoviesByCategorys("Ação");
$comedyMovies = $movieDao->getMoviesByCategorys("Comédia");
?>

<div id="main-container" class="container-fluid">
    <h2 class="section-title">Filmes novos</h2>
    <p class="section-description">Veja as Críticas dos últimos filmes adicionados</p>
    <div class="movies-container">

        <?php foreach ($latestMovies as $movies) : ?>

            <?php require "templates/movie_card.php"; ?>

        <?php endforeach; ?>

        <?php if (count($latestMovies) === 0) : ?>

            <p class="empty-list">Ainda não há filmes cadastrados!</p>

        <?php endif; ?>
    </div>

    <h2 class="section-title">Comédia</h2>
    <p class="section-description">Veja os melhores filmes de comédia</p>
    <div class="movies-container">

        <?php foreach ($comedyMovies as $movies) : ?>

            <?php require "templates/movie_card.php"; ?>

        <?php endforeach; ?>

        <?php if (count($comedyMovies) === 0) : ?>

            <p class="empty-list">Ainda não há filmes cadastrados!</p>

        <?php endif; ?>
    </div>

    <h2 class="section-title">Ação</h2>
    <p class="section-description">Veja os melhores filmes de comédia</p>
    <div class="movies-container">
        
        <?php foreach ($actionMovies as $movies) : ?>

            <?php require "templates/movie_card.php"; ?>

        <?php endforeach; ?>

        <?php if (count($actionMovies) === 0) : ?>

            <p class="empty-list">Ainda não há filmes cadastrados!</p>

        <?php endif; ?>
    </div>
</div>

<?php require_once "templates/footer.php"; ?>