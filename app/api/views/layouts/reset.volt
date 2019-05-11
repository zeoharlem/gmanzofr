<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        {{getTitle()}}
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        {{ this.assets.outputCss('login') }}
            
        {% block head %} {% endblock %}
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{url('assets/admin/pages/css/lock.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
<body data-open="click" data-menu="vertical-overlay-menu" data-col="1-column" class="vertical-layout vertical-overlay-menu 1-column blank-page bg-full-screen-image">
    <!-- START PRELOADER-->

    <div id="preloader-wrapper">
      <div id="loader" class="ball-scale loader-white">
        <div></div>
      </div>
      <div class="loader-section section-top bg-success"></div>
      <div class="loader-section section-bottom bg-success"></div>
    </div>

    <!-- END PRELOADER-->
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="robust-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
            <div class="card-header no-border pb-0">
                <div class="card-title text-xs-center">
                    <img src="{{url('assets/images/logo_empire.png')}}" alt="Empire Funds">
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>We will send you a link to reset your password.</span></h6>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal" method="post" novalidate>
                        <fieldset class="form-group has-feedback has-icon-left">
                            <input type="email" class="form-control form-control-lg input-lg" name="email" id="user-email" placeholder="Type Your Email Address" required>
                            <div class="form-control-position">
                                <i class="icon-mail6"></i>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-success btn-lg btn-block"><i class="icon-lock4"></i> Reset Password</button>
                    </form>
                </div>
            </div>
            <div class="card-footer no-border">
                <p class="float-sm-left text-xs-center"><a href="{{url('index')}}" class="card-link">Login</a></p>
                <p class="float-sm-right text-xs-center">New to Empire Funds? <a href="{{url('register/')}}" class="card-link">Create Account</a></p>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
     {{assets.outputJs('loginfooters')}}   
    </body>
</html>