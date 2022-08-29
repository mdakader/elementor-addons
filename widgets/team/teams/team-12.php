<?php
$team_style = $settings['team_style'];
?>

<div class="easy-addons-team">
    <div class="team-wrapper <?php echo esc_attr($team_style) ?>">
        <div class="our-team">
            <div class="team-img">
                <img src="<?php echo esc_url($settings['team_image']['url']) ?>" alt="Image"/>
            </div>
            <div class="team-content">
                <h3 class="post-title">Williamson<span>Web Developer</span></h3>
            </div>
            <ul class="social-links">
                <li><a href="#" class="fab fa-facebook"></a></li>
                <li><a href="#" class="fab fa-google"></a></li>
                <li><a href="#" class="fab fa-twitter"></a></li>
            </ul>
        </div>
    </div>
</div>