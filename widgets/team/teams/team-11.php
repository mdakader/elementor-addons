<?php
$team_style = $settings['team_style'];
?>

<div class="easy-addons-team">
    <div class="team-wrapper <?php echo esc_attr($team_style) ?>">
        <div class="our-team">
            <div class="pic">
                <img src="<?php echo esc_url($settings['team_image']['url']) ?>" alt="Image"/>
            </div>
            <div class="team-content">
                <h3 class="title">Kristiana</h3>
                <span class="post">Web Designer</span>
            </div>
            <ul class="social">
                <li><a href="#" class="fab fa-facebook"></a></li>
                <li><a href="#" class="fab fa-google-plus"></a></li>
                <li><a href="#" class="fab fa-instagram"></a></li>
                <li><a href="#" class="fab fa-linkedin"></a></li>
            </ul>
        </div>
    </div>
</div>