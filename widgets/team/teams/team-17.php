<?php
$team_style = $settings['team_style'];
?>

<div class="easy-addons-team">
    <div class="team-wrapper <?php echo esc_attr($team_style) ?>">
        <div class="our-team">
            <div class="pic">
                <img src="<?php echo esc_url($settings['team_image']['url']) ?>" alt="Image"/>
                <ul class="social-links">
                    <li><a href="#" class="fab fa-twitter"></a></li>
                    <li><a href="#" class="fab fa-google-plus"></a></li>
                    <li><a href="#" class="fab fa-linkedin"></a></li>
                    <li><a href="#" class="fab fa-facebook"></a></li>
                </ul>
            </div>
            <div class="team-content">
                <h3 class="title">Williamson</h3>
                <span class="post">web developer</span>
            </div>
        </div>
    </div>
</div>