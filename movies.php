<?php 
    require_once "templates/header.php";
    
    //Verifica se o usuário está autenticado
    require_once "models/movie.php";
    require_once "dao/movieDAO.php";


    //Pegar o id do filme
    $id = filter_input(INPUT_GET, "id");

    $movie;

    $movieDao = new MovieDAO($conn, $BASE_URL);

    if(empty($id)) {

        $message->setMessage("O filme não foi encontrado", "error","/index.php");
        
    }else {

        $movie = $movieDao->findById($id);

        //verifica se o filme existe
        
        if(!$movie) {
            
            $message->setMessage("O filme não foi encontrado", "error","/index.php");
            
        }
    }

    //Checar se imagem vazia

    if($movie->image == "" ) {

        $movie->image = "movie_cover.jpg";
    }

    //Checar se o filme é do usuário

    $userOwnsMovie = false;
    
    if(!empty($userData)) {
        
        if($userData->id === $movie->users_id) {
            
            $userOwnsMovie = true;
        }
            
    }

    $alreadyReviewed = false;

    ?>

    <div id="main-container" class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-6 movie-container">
                <h1 class="page-title"><?= $movie->title ?></h1>
                <p class="movie-details">
                    <span>Duração: <?= $movie->length ?></span>
                    <span class="pipe"></span>
                    <span><?= $movie->category ?></span>
                    <span class="pipe"></span>
                    <i class="fas fa-star">9</i>

                    <iframe src="<?= $movie->trailer ?>" width="560" height="315" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encryted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p><?= $movie->description ?></p>
                </p>

            </div>
            
            <div class="col-md-4">
                <div class="movie-image-container" style="background-image: url('<?= $BASE_URL ?>/img/movies/<?= $movie->image ?>')"></div>
            </div>

            <div class="offset-md-1 col-md-10" id="reviews-container">
                <h3 id="reviews-title">Avaliações</h3>

                <!-- Verifica se habilita review para usuário ou não -->
                <?php if(!empty($userData && !$userOwnsMovie && !$alreadyReviewed)): ?>
                <div class="col-md-12" id="review-form-container">
                    <h4>Envie sua avaliação</h4>
                    <p class="page-description">Deixe sua nota e comentário sobre o filme</p>
                    <form action="<?= $BASE_URL ?>/review_process.php" id="review-form" method="POST">
                        <input type="hidden" name="type" value="create">
                        <input type="hidden" name="movies_id" value="<?= $movie->id ?>">
                        <div class="form-group">
                            <label for="rating">Nota do filme:</label>
                            <select name="rating" id="rating" class="form-control">
                                <option value="">Selecione</option>
                                <option value="10">10</option>
                                <option value="9">9</option>
                                <option value="8">8</option>
                                <option value="7">7</option>
                                <option value="6">6</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="review">Seu comentário</label>
                            <textarea name="review" id="review"  rows="3" class="form-control"></textarea>
                        </div>
                        <input type="submit" value="Enviar comentário" class="btn card-btn ">
                    </form>
                </div>
                <?php endif; ?>

                <!-- Comentários -->

                <div class="col-md-12 review">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="profile-image-container review-image" style="background-image: url('<?= $BASE_URL ?>/img/users/user.png')">

                            </div>
                            <div class="col-md-9 author-details-container">
                                <h4 class="author-name">
                                    <a href="">Teste Gilvan</a>
                                    <p><i class="fas fa-star">9</i></p>
                                </h4>
                            </div>
                            <div class="col-md-12">
                                <p class="comment-title">Comentário</p>
                                <p>Este é o comentário do usuário</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once "templates/footer.php"; ?>