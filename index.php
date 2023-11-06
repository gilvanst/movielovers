<?php
require_once "templates/header.php";
require_once "dao/movieDAO.php";


//DAO dos filmes
$movieDao = new MovieDAO($conn, $BASE_URL);

//Categorias de filmes
$latestMovies = $movieDao->getLatestMovies();
$actionMovies = $movieDao->getMoviesByCategorys("Ação");
$adventureMovies = $movieDao->getMoviesByCategorys("Aventura");
$animationMovies = $movieDao->getMoviesByCategorys("Animação");
$scienceMovies = $movieDao->getMoviesByCategorys("Ficção Científica");
$terrorMovies = $movieDao->getMoviesByCategorys("Terror");
?>

<div id="main-container" class="container-fluid">
    <h2 class="section-title">Novos Filmes</h2>
    <p class="section-description">Veja as Críticas dos últimos filmes adicionados</p>
    <div class="movies-container">

        <?php foreach ($latestMovies as $movie) : ?>

            <?php require "templates/movie_card.php"; ?>

        <?php endforeach; ?>

        <?php if (count($latestMovies) === 0) : ?>

            <p class="empty-list">Ainda não há filmes cadastrados!</p>

        <?php endif; ?>
    </div>

    
    <h2 class="section-title">Ação</h2>
    <p class="section-description">Veja os melhores filmes de comédia</p>
    <div class="movies-container">
        
        <?php foreach ($actionMovies as $movie) : ?>

            <?php require "templates/movie_card.php"; ?>

        <?php endforeach; ?>

        <?php if (count($actionMovies) === 0) : ?>

            <p class="empty-list">Ainda não há filmes cadastrados!</p>

        <?php endif; ?>
    </div>

    <h2 class="section-title">Aventura</h2>
    <p class="section-description">Veja os melhores filmes de comédia</p>
    <div class="movies-container">

        <?php foreach ($adventureMovies as $movie) : ?>

            <?php require "templates/movie_card.php"; ?>

        <?php endforeach; ?>

        <?php if (count($adventureMovies) === 0) : ?>

            <p class="empty-list">Ainda não há filmes cadastrados!</p>

        <?php endif; ?>
    </div>

    <h2 class="section-title">Animação</h2>
    <p class="section-description">Veja os melhores filmes de comédia</p>
    <div class="movies-container">
        
        <?php foreach ($animationMovies as $movie) : ?>

            <?php require "templates/movie_card.php"; ?>

        <?php endforeach; ?>

        <?php if (count($animationMovies) === 0) : ?>

            <p class="empty-list">Ainda não há filmes cadastrados!</p>

        <?php endif; ?>
    </div>

    <h2 class="section-title">Ficção Científica</h2>
    <p class="section-description">Veja os melhores filmes de comédia</p>
    <div class="movies-container">
        
        <?php foreach ($scienceMovies as $movie) : ?>

            <?php require "templates/movie_card.php"; ?>

        <?php endforeach; ?>

        <?php if (count($scienceMovies) === 0) : ?>

            <p class="empty-list">Ainda não há filmes cadastrados!</p>

        <?php endif; ?>
    </div>

    <h2 class="section-title">Terror</h2>
    <p class="section-description">Veja os melhores filmes de comédia</p>
    <div class="movies-container">
        
        <?php foreach ($terrorMovies as $movie) : ?>

            <?php require "templates/movie_card.php"; ?>

        <?php endforeach; ?>

        <?php if (count($terrorMovies) === 0) : ?>

            <p class="empty-list">Ainda não há filmes cadastrados!</p>

        <?php endif; ?>
    </div>
</div>

<?php require_once "templates/footer.php"; ?>