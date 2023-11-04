<?php

    if(empty($movies->image)) {

        $movies->image = "movie_cover.jpg";
    }
?>

<div class="card movie-card">
    <div class="card-img-top" style="background-image: url('<?= $BASE_URL ?>/img/movies/<?= $movies->image ?>')"></div>
    <div class="card-body">
        <p class="card-rating">
            <i class="fas fa-star"></i>
            <span class="rating">9</span>
        </p>
        <h5 class="card-title"><a href="<?= $BASE_URL ?>/movies.php?id=<?= $movies->id ?>"><?= $movies->title ?></a></h5>
        <a href="<?= $BASE_URL ?>/movies.php?id=<?= $movies->id ?>" class="btn btn-primary rate-btn">Avaliar</a>
        <a href="<?= $BASE_URL ?>/movies.php?id=<?= $movies->id ?>" class="btn btn-primary card-btn">Conhecer</a>
    </div>

</div>