<?php
if(isset($_SESSION["current_user"]))
{
        $followers = Follow::find_all_by_followed_user_id($_SESSION["current_user"]->id);
?>
<div>
    <?php
    if(sizeof($followers)>0)
    {
    ?>
    <h5><b>Te persiguen...</b></h5>
    <div class="list-group"  style="overflow-y: auto; height: 320px;">  
    <?php
    }
        foreach ($followers as $follow) {
           $follower = User::find($follow->follower_user_id);
           $email = $follower->email;                            
           $size = 45;
           $grav_url = "http://www.gravatar.com/avatar/".md5(strtolower( trim( $email ) ) ) . "?d=monsterid&s=" . $size;        
    ?>
        <a style='width:100%;' href="index.php?action=userprofile&tab=wall&user=<?php echo $follower->username; ?>" class="list-group-item">
            <div class="row">
                <div class=" col-lg-3">
                    <img src="<?php echo $grav_url ?>" />
                </div>
                <div class=" col-lg-9">
                    <h4 class="list-group-item-heading"><?php echo $follower->name." ". $follower->last_name; ?></h4>
                    <p class="list-group-item-text">Usuario: <?php echo $follower->username;?></p>
                </div>
            </div>
        </a>
    <?php
        }
    ?>
    </div>
</div>
<?php
}
?>