<?php
$team_style = $settings['team_style'];
?>

<div class="easy-addons-team">
    <div class="team-wrapper <?php echo esc_attr($team_style) ?>">
        <div class="our-team">
            <div class="team-image">
                <img src="<?php echo esc_url($settings['team_image']['url']) ?>" alt="Image"/>
                <p class="description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper
                    quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis.
                    Maecenas vulputate.
                </p>
                <ul class="social">
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                </ul>
            </div>
            <div class="team-info">
                <h3 class="title">Williamson</h3>
                <span class="post">web developer</span>
            </div>
        </div>
    </div>
</div>
