<!--http://bestjquery.com/tutorial/our-team/demo20/-->
<?php
$team_style = $settings['team_style'];
?>

<div class="easy-addons-team">
    <div class="team-wrapper <?php echo esc_attr($team_style) ?>">
        <div class="our-team">
            <div class="pic">
                <img src="<?php echo esc_url($settings['team_image']['url']) ?>" alt="Image"/>
            </div>
            <ul class="social-link">
                <li><a href="#" class="fab fa-facebook"></a></li>
                <li><a href="#" class="fab fa-google"></a></li>
                <li><a href="#" class="fab fa-twitter"></a></li>
            </ul>
            <div class="team-content">
                <h3 class="post-title">Williamson<small>Web Developer</small></h3>
            </div>
        </div>
    </div>
</div>