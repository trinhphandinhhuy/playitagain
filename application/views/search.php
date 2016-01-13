<main>
    <div class="container">

        <div class="row">
          <div class="col s12 m8 l8 offset-m2 offset-l2">
            <h1 class="center-align text_h2"><a href="#" id="logo-container">Playitaga.in</a></h1>
            <h5 class="center header span_h2">Play your favourite Youtube videos again and again</h5>
              <?php echo form_open('search',array('id' => 'search-wrap' )) ; ?>
              <input type="text" class="form-control" name="video_name" id="search-front" placeholder="Enter video name...">
              <div class="col s6 m4 l4 offset-m4 offset-l4 offset-s3">
                <button class="btn-large waves-effect waves-light blue darken-1" type="submit">Search<i class="mdi-action-search right"></i></button>
              </div>

              <?php echo form_close() ; ?>

          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->

    </div>
</main>
