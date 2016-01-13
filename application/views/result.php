<main>
<?php if ($success_fail != null) : ?>
  <div class="container">
    <div class="row">
      <div  class="col s12">
          <h2 class="center header text_h2"> Top 20 results for <span class="span_h2">"<?php echo $video_name; ?>"</span></h2>
      </div>
          <?php foreach ($list as $videoid => $videotitle):?>
            <div class="col s12 m4 l4">
              <div class="card hoverable">
                <div class="card-image waves-effect waves-block waves-light">
                    <a href="<?php echo base_url()."view/".$videoid; ?>"><img class="activator" src="http://img.youtube.com/vi/<?php echo $videoid; ?>/0.jpg"></a>
                    
                </div>
              </div>
            </div>
          <?php endforeach;?>
    </div>
  </div>
<?php endif ; ?>
</main>
