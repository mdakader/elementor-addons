<div class="our-team">
  <div class="team-image">
    <img src="images/img-1.jpg">
    <p class="description">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate.
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
<style>
    .our-team{
        border-left: 8px solid #3b336a;
        border-bottom: 8px solid #3b336a;
    }
    .our-team .team-image{
        position: relative;
        text-align: center;
    }
    .our-team img{
        width: 100%;
        height: auto;
    }
    .our-team .description{
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        font-size: 14px;
        color: #fff;
        line-height: 30px;
        padding: 40px 50px;
        opacity: 0;
        background-color: rgba(59, 51, 106, 0.6);
        transition: all 0.5s ease 0s;
    }
    .our-team:hover .description{
        opacity: 1;
    }
    .our-team .social{
        padding: 10px 0 0 0;
        margin: 0;
        list-style: none;
        position: absolute;
        top: 40px;
        left: -27px;
        background: #3b336a;
        text-align: center;
        transform: translate(25px, 0px) rotateY(90deg);
        transition: all 0.5s ease 0s;
    }
    .our-team:hover .social{
        transform: translate(0px, 0px) rotateY(0deg);
    }
    .our-team .social li{
        display: block;
        margin-bottom: 10px;
    }
    .our-team .social li a{
        display: block;
        width: 40px;
        height: 35px;
        font-size: 17px;
        color: #fff;
        line-height: 30px;
        transition: all 0.5s ease 0s;
    }
    .our-team .social li a:hover{
        background: #bc3fbf;
    }
    .our-team .team-info{
        padding: 20px;
    }
    .our-team .title{
        font-size: 18px;
        color: #3b336a;
        letter-spacing: 4px;
        margin: 0 0 15px 0;
        transition: all 0.5s ease 0s;
    }
    .our-team .post{
        display: block;
        font-size: 14px;
        color: #3b336a;
        text-transform: capitalize;
    }
    .our-team .title:hover,
    .our-team .post:hover{
        color: #bc3fbf;
    }
    @media only screen and (max-width: 990px){
        .our-team{ margin-bottom: 30px; }
    }
    @media only screen and (max-width: 767px){
        .our-team .social{ left: -20px; }
    }
    @media only screen and (max-width: 480px){
        .our-team .social{ left: -20px; }
    }

</style>