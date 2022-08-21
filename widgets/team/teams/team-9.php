<!--http://bestjquery.com/tutorial/our-team/demo40/-->
<?php
$team_style = $settings['team_style']; ?>
<div class="easy-addons-team">
    <div class="team-wrapper <?php echo esc_attr($team_style) ?>">
        <div class="our-team">
            <div class="team_img">
                <img src="<?php echo esc_url($settings['team_image']['url']) ?>" alt="Image"/>
                <ul class="social">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                </ul>
            </div>
            <div class="team-content">
                <h3 class="title">kristina</h3>
                <span class="post">Web Designer</span>
            </div>
        </div>
    </div>
</div>