<div class="row">
    <div class="page-header">  
        <h1>
            Reporte de Aministrador
        </h1>
    </div>
</div>
<div class="row">
    <h3>Total de usuarios registrados: <?php echo sizeof($users)-1 ?></h3>
</div>
<div class="row">
    <div class=" col-lg-11">
    <div class="list-group">  
    <?php
        foreach ($users as $follower) {
            if($follower->username!="admin")
            {
           $email = $follower->email;                            
           $size = 65;
           $grav_url = "http://www.gravatar.com/avatar/".md5(strtolower( trim( $email ) ) ) . "?d=monsterid&s=" . $size;        
        ?>
        <a href="#" class="list-group-item">
            <div class="row">
                <div class=" col-lg-2">
                    <img src="<?php echo $grav_url ?>" />
                </div>
                <div class=" col-lg-6">
                    <h4 class="list-group-item-heading"><?php echo $follower->name." ". $follower->last_name; ?></h4>
                    <p class="list-group-item-text"><b>Nombre:</b> <?php echo $follower->name;?></p>
                    <p class="list-group-item-text"><b>Apellido:</b> <?php echo $follower->last_name;?></p>
                    <p class="list-group-item-text"><b>Nombre de usuario:</b> <?php echo $follower->username;?></p>
                    <p class="list-group-item-text"><b>Email:</b> <?php echo $follower->email;?></p>
                </div>
            </div>
        </a>
    <?php
            }
        }
    ?>
    </div>
    </div>
</div>