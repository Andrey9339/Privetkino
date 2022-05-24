<h1><?php echo $title; ?></h1>
  <hr>
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="<?php echo $player_code; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
  <div class="well info-block text-center">
    Год: <span class="badge"><?php echo $year; ?></span>
    Рейтинг: <span class="badge"><?php echo $rating; ?></span>
    Режиссер: <span class="badge"><?php echo $director; ?></span>
  </div>

  <div class="margin-8"></div>

  <h2>Описание фильма "<?php echo $title; ?>"</h2>
  <hr>
  <div class="well">
   <?php echo $descriptions_movie; ?>
  </div>
  <div class="margin-8"></div>

  <h2>Отзывы о фильме "<?php echo $title; ?>"</h2>
  <hr>

  <?php foreach ($comments as $key => $value): ?>
    <div class="panel panel-info">
    <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> <span><?php echo getUserNameById($value['user_id'])->username; ?></span></div>
    <div class="panel-body"> 
      <?php echo $value['comment_text']; ?>
    </div>
  </div>   
  <?php endforeach ?>


<?php if (!$this->dx_auth->is_logged_in()): ?>

  <form>
    <div class="form-group">
 <!--      <input type="text" placeholder="Ваше имя" class="form-control input-lg"> -->
    </div>
    <div class="form-group">
      <!-- <textarea class="form-control"></textarea> -->
      <p>Чтобы оставить комментарий к фильму, авторизуйтесь на сайте</p>
    </div>              
 <!--    <button class="btn btn-warning btn-lg pull-right">Отправить</button> -->
  </form>

      <?php else: ?>
      
  <form>
    <div class="form-group">
 <!--      <input type="text" placeholder="Ваше имя" class="form-control input-lg"> -->
    </div>
    <div class="form-group">
      <textarea class="form-control"></textarea>
    </div>              
    <button class="btn btn-warning btn-lg pull-right">Отправить</button>
  </form>


    <?php endif ?>