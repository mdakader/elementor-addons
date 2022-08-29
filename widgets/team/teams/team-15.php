<!--http://bestjquery.com/tutorial/our-team/demo9/-->
<?php
$team_style = $settings['team_style'];
?>

<div class="easy-addons-team">
    <div class="team-wrapper <?php echo esc_attr($team_style) ?>">
        <div class="our-team">
            <div class="team-img">
                <img src="<?php echo esc_url($settings['team_image']['url']) ?>" alt="Image"/>
                <div class="social_media_team">
                    <div class="team-prof">
                        <h3 class="post-title">Williamson</h3>
                        <span class="post">Web Desginer</span>

                        <ul class="team_social">
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>