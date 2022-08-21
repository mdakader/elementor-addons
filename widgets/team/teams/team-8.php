<div class="our-team">
    <div class="pic">
        <img src="images/img-1.jpg" alt="">
        <div class="social_media_team">
            <ul class="team_social">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="team-prof">
        <h3 class="post-title"><a href="#">Williamson</a></h3>
        <span class="post">Web designer</span>
    </div>
</div>

<style>
    .our-team{
        text-align: center;
    }
    .our-team .pic{
        position: relative;
        overflow: hidden;
    }
    .our-team .pic img{
        width: 100%;
        height: auto;
        transition: all 0.2s ease 0s;
    }
    .our-team:hover .pic img{
        transform: translateY(-15px);
    }
    .our-team .social_media_team{
        position: absolute;
        bottom: -20%;
        width: 100%;
        background-color:#ea6153;
        transition: all 0.35s ease 0s;
    }
    .our-team:hover .social_media_team{
        bottom: 0px;
    }
    .our-team .team_social{
        padding: 0;
        margin: 0;
        list-style: none;
        height: 100%;
    }
    .our-team .team_social li{
        display: inline-block;
        margin-right: 5px;
    }
    .our-team .team_social li a{
        width: 45px;
        height: 45px;
        line-height: 45px;
        display: block;
        color:#fff;
        font-size: 18px;
        transition: all 1.3s ease 0s;
    }
    .our-team .team_social li a:hover{
        background: #fff;
        color:#424242;
    }
    .our-team .team-prof{
        margin-top: 10px;
    }
    .our-team .post-title a{
        text-transform: capitalize;
        color:#424242;
        transition: all 0.2s ease 0s;
    }
    .our-team .post-title a:hover{
        text-decoration: none;
        color:#ea6153;
    }
    .our-team .post{
        color:#ea6153;
        font-size: 18px;
        text-transform: capitalize;
    }
    @media screen and (max-width: 990px){
        .our-team{
            margin-bottom: 30px;
        }
    }
</style>