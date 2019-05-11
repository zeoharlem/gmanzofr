<!DOCTYPE html>
<html lang="en" data-textdirection="LTR" class="loading">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    {{assets.outputCss('login')}}
    {{ getTitle() }}
    <style type="text/css">
    body, html{background: #F5F5F5 !important;}
  </style>
</head>
<body>
    <div class="login-form">
      <form method="post" action="{{ url('backend/login') }}">
        <div class="top">
          <img src="img/kode-icon.png" alt="icon" class="icon">
          <h1>NetMartNg</h1>
          <h4>Admin Page</h4>
        </div>
          {{flash.output()}}
        <div class="form-area">
          <div class="group">
            <input type="text" class="form-control" name="username" placeholder="Username">
            <i class="fa fa-user"></i>
          </div>
          <div class="group">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <i class="fa fa-key"></i>
          </div>
          
          <button type="submit" class="btn btn-default btn-block">LOGIN</button>
        </div>
      </form>
      <div class="footer-links row">
        <div class="col-xs-6"><a href="#"><i class="fa fa-external-link"></i> Forgot Password</a></div>
        
      </div>
    </div>

    {{assets.outputJs('loginfooters')}}
</body>