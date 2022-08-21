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
        <h3 class="post-title"><a href="#">williamson</a></h3>
        <span class="post">Web Desginer</span>
    </div>
</div>

<style>
    .our-team{
        text-align: center;
    }
    .pic{
        position: relative;
        overflow: hidden;
    }
    .pic img{
        width: 100%;
        height: auto;
    }
    .social_media_team{
        position: absolute;
        top:100%;
        width: 100%;
        height: 100%;
        background-color:rgba(222, 79, 0, 0.8);
        transition: all 0.35s ease 0s;
    }
    .team_social{
        list-style: none;
        padding: 0;
        height: 100%;
        position: relative;
        top:40%;
    }
    .team_social > li{
        display: inline-block;
        margin: 0 5px 5px 0;
    }
    .team_social > li > a{
        width: 45px;
        height: 45px;
        line-height: 45px;
        border: 1px solid #fff;
        display: block;
        color:#fff;
        font-size: 18px;
        transition: all 1.3s ease 0s;
    }
    .team_social > li > a:hover{
        background: #fff;
        color:#de4f00;
        transition: all 1.3s ease 0s;
    }
    .team-prof{
        margin-top: 10px;
    }
    .post-title > a{
        text-transform: capitalize;
        color:#424242;
        transition: all 0.2s ease 0s;
    }
    .post-title > a:hover{
        text-decoration: none;
        color:#de4f00;
    }
    .post{
        color:#de4f00;
        font-size: 18px;
    }
    .pic:hover .social_media_team{
        top:0;
    }
    @media screen and (max-width: 990px){
        .our-team{
            margin-bottom: 30px;
        }
    }
</style>