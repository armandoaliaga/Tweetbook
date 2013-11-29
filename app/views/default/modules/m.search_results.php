<div class="row">
    <div class="page-header col-lg-9">
    <h2 id="type">Resultados de busqueda: "<?php echo $search_param; ?>"</h2>
  </div>
</div>
<div class="row">
    <div class=" col-lg-9">
    <div class="list-group">  
    <?php
        foreach ($friends_result as $follower) {
           $email = $follower->email;                            
           $size = 65;
           $grav_url = "http://www.gravatar.com/avatar/".md5(strtolower( trim( $email ) ) ) . "?d=monsterid&s=" . $size;        
    ?>
        <a href="index.php?action=userprofile&tab=wall&user=<?php echo $follower->username; ?>" class="list-group-item">
            <div class="row">
                <div class=" col-lg-2">
                    <img src="<?php echo $grav_url ?>" />
                </div>
                <div class=" col-lg-6">
                    <h4 class="list-group-item-heading"><?php echo $follower->name." ". $follower->last_name; ?></h4>
                    <p class="list-group-item-text">Nombre de usuario: <?php echo $follower->username;?></p>
                    <p class="list-group-item-text">Email: <?php echo $follower->email;?></p>
                </div>
            </div>
        </a>
    <?php
        }
    ?>
    </div>
    </div>
</div>