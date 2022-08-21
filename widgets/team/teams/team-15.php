<!--http://bestjquery.com/tutorial/our-team/demo9/-->
<div class="our-team">
  <div class="pic">
    <img src="images/img-1.jpg" alt="">
    <div class="social_media_team">
      <div class="team-prof">
        <h3 class="post-title">Williamson</h3>
        <span class="post">Web Desginer</span>

        <ul class="team_social">
          <li><a href="#"><i class="fab fa-facebook"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
        </ul>
      </div>
    </div>
  </div>

  <style>
      .our-team{
          overflow: hidden;
          text-align: center;
      }
      .pic{
          position: relative;
      }
      .pic img{
          width: 100%;
          height: 100%;
          transform: scale(1);
          transition: all 0.3s ease-in-out 0s;
      }
      .social_media_team{
          position: absolute;
          top:0;
          width: 100%;
          height: 100%;
          opacity: 0;
          background-color: rgba(74, 163, 223, 0.95);
          transition: all 0.3s ease-in-out 0s;
      }
      .team-prof{
          position: relative;
          top:30%;
      }
      .post-title{
          color: #fff;
          font-size: 26px;
          font-weight: 700;
          margin: 0 0 10px;
      }
      .post{
          color: #fff;
          display: block;
          font-size: 10px;
          font-weight: 700;
          margin: 0 0 40px;
          text-transform: uppercase;
      }
      .team_social{
          list-style: none;
          padding: 0;
      }
      .team_social > li{
          display: inline-block;
      }
      .team_social > li > a{
          width: 28px;
          height: 28px;
          line-height: 16px;
          font-size: 14px;
          background: #fff;
          display: block;
          color:#303030;
          border-radius: 3px;
          padding-top: 7px;
          transition: all 0.2s ease-in-out 0s;
      }
      .team_social > li > a:hover{
          background: rgba(255, 255, 255, 0.3);
          color: #ffffff;
      }
      .our-team:hover .pic img{
          transform: scale(1.15);
      }
      .our-team:hover .social_media_team{
          opacity: 1;
      }
      @media screen and (max-width: 990px){
          .our-team{
              margin-bottom: 30px;
          }
      }
  </style>