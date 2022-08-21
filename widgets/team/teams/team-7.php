<?php
$team_style = $settings['team_style']; ?>
<div class="easy-addons-team">
    <div class="team-wrapper <?php echo esc_attr($team_style) ?>">
        <div class="our-team">
            <div class="pic">
                <img src="<?php echo esc_url($settings['team_image']['url']) ?>" alt="Image"/>
            </div>
            <div class="team-content">
                <h3 class="post-title">Williamson<small>Web Developer</small></h3>
                <ul class="social-link">
                    <li><a href="#" class="fab fa-facebook"></a></li>
                    <li><a href="#" class="fab fa-google"></a></li>
                    <li><a href="#" class="fab fa-twitter"></a></li>
                </ul>
                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum massa ac
                    risus auctor venenatis. Pellentesque non. </p>
            </div>
        </div>
    </div>
</div>