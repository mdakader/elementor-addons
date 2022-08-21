<!--http://bestjquery.com/tutorial/our-team/demo46/-->
<div class="our-team">
  <img src="images/img-1.jpg">
  <div class="team-content">
    <h3 class="title">Williamson</h3>
    <span class="post">web developer</span>
    <ul class="social">
      <li><a href="#"><i class="fab fa-facebook"></i></a></li>
      <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
    </ul>
  </div>
</div>
<style>
    .our-team{
        text-align: center;
        margin-bottom: 50px;
        position: relative;
    }
    .our-team:after{
        content: "";
        width: 100%;
        height: 100%;
        background: linear-gradient(60deg,#4da1a9,#99c24d);
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0.8;
        transform: scale(0);
        transition: all 0.5s ease 0s;
    }
    .our-team:hover:after{
        transform: scale(1);
    }
    .our-team img{
        width: 100%;
        height: auto;
    }
    .our-team .team-content{
        width: 75%;
        background: #fff;
        padding: 30px 0;
        margin: 0 auto;
        border: 1px solid #eee;
        position: absolute;
        bottom: -60px;
        left: 0;
        right: 0;
        z-index: 1;
        transition: all 0.3s ease 0s;
    }
    .our-team .title{
        font-size: 16px;
        font-weight: 700;
        color: #444;
        text-transform: uppercase;
        margin: 0 0 10px 0;
    }
    .our-team .post{
        display: block;
        font-size: 13px;
        color: #999;
        text-transform: capitalize;
    }
    .our-team .social{
        padding: 0;
        margin: 0;
        list-style: none;
        opacity: 0;
        transform: scale(0);
        transition: all 0.5s ease 0s;
    }
    .our-team:hover .social{
        opacity: 1;
        transform: scale(1);
    }
    .our-team .social li{
        display: inline-block;
        transition: all 0.5s ease 0s;
    }
    .our-team:hover .social li{
        margin: 20px 4px 0;
    }
    .our-team .social li a{
        display: block;
        width: 30px;
        height: 30px;
        background: #2e5077;
        font-size:15px;
        font-weight: 600;
        color: #d7e8ba;
        line-height: 30px;
        transition: all 0.5s ease 0s;
    }
    .our-team .social li a:hover{
        background: #4da1a9;
        color: #fff;
    }
    @media only screen and (max-width:990px){
        .our-team{ margin-bottom: 80px; }
    }
</style>