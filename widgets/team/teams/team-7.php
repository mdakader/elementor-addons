<div class="our-team">
    <div class="pic">
        <img src="images/img-1.jpg" alt="">
    </div>
    <div class="team-content">
        <h3 class="post-title">Williamson<small>Web Developer</small></h3>
        <ul class="social-link">
            <li><a href="#" class="fab fa-facebook"></a></li>
            <li><a href="#" class="fab fa-google"></a></li>
            <li><a href="#" class="fab fa-twitter"></a></li>
        </ul>
        <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum massa ac risus auctor venenatis. Pellentesque non. </p>
    </div>
</div>
<style>
    .our-team{
        overflow: hidden;
    }
    .our-team .pic{
        transform:scale(1,1);
        transition:transform 0.30s ease;
        position: relative;
    }
    .our-team:hover .pic{
        transform:scale(1.1,1.1);
    }
    .our-team .pic:before{
        content: "";
        width:100%;
        height:100%;
        position: absolute;
        transition:background 0.50s ease-in-out ;
    }
    .our-team:hover .pic:before{
        background:rgba(255, 255, 255,0.5);
    }
    .our-team .pic img{
        width: 100%;
        height: auto;
    }
    .our-team .team-content{
        border-top: 1px solid #e5e5e5;
        position: relative;
        bottom: 0;
        background:#fff;
        text-align:center;
        padding: 32px 25px 5px;
        transition: all 0.3s ease 0s;
    }
    .our-team:hover .team-content{
        bottom:15%;
    }
    .our-team .post-title{
        margin:0;
        color:#000;
        font-size:13px;
        letter-spacing:2px;
        text-transform:uppercase;
    }
    .our-team .post-title:after{
        content: "";
        width: 15%;
        display: block;
        margin: 7% auto 10%;
        border-bottom: 2px solid #da3e65;
    }
    .our-team .post-title small{
        display: block;
        font-size:11px;
        margin-top:3%;
        letter-spacing:1px;
        text-transform:uppercase;
    }
    .our-team .social-link{
        padding:0;
        margin:0 0 4% 0;
    }
    .our-team .social-link li{
        list-style:none;
        display:inline-block;
        margin-right:15px;
    }
    .our-team .social-link li a{
        font-size:19px;
        color:#333;
    }
    .our-team .social-link li a.fa-facebook:hover{
        color:#5d82d1;
    }
    .our-team .social-link li a.fa-google:hover{
        color:#eb5e4c;
    }
    .our-team .social-link li a.fa-twitter:hover{
        color:#40bff5;
    }
    .our-team .description{
        line-height: 23px;
        padding: 0 20px;
        position: absolute;
        transition: opacity 0.3s ease 0s;
    }
</style>