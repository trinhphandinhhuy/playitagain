<header id="header" class="page-topbar">
<div class="navbar-fixed">
   <nav id="nav_f" class="default_color" role="navigation">
       <div class="container default_color">
           <div class="nav-wrapper row">
             <div id="logohere" class="col s12 m6 l6">
               <a href="http://playitaga.in" id="logo-container" class="brand">Playitaga.in</a>
             </div>
            <div class="col s12 m6 l6">
              <div class="header-search-wrapper ">
                <?php $attributes = array('class' => '', 'role' => 'search'); ?>
                  <?php echo form_open('search', $attributes) ; ?>
                    <i class="mdi-action-search"></i>
                    <input type="text" class="header-search-input z-depth-2" name="video_name" placeholder="Enter video name...">
                <?php echo form_close() ; ?></li>
              </div>

            </div>

           </div>
       </div>
   </nav>
</div>
</header>
<!-- Fixed navbar -->
