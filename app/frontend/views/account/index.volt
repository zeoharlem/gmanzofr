
{% extends "templates/base.volt" %}

{% block head %}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
{% endblock %}

{% block content %}

<article id="post-8" class="hentry">

    <div class="entry-content">
            <div class="woocommerce">
                    <div class="customer-login-form">
                            <span class="or-text">or</span>

                            <div class="col2-set" id="customer_login">

                                    <div class="col-1">


                                            <h2>Login</h2>

                                            <form method="post" class="login" action="{{url('login')}}">

                                                    <p class="before-login-text">
                                                            Welcome back! Sign in to your account
                                                    </p>

                                                    <p class="form-row form-row-wide">
                                                            <label for="username">Username or email address
                                                            <span class="required">*</span></label>
                                                            <input type="text" class="input-text" name="username" id="username" />
                                                    </p>

                                                    <p class="form-row form-row-wide">
                                                            <label for="password">Password
                                                            <span class="required">*</span></label>
                                                            <input class="input-text" type="password" name="password" id="password" />
                                                    </p>


                                                    <p class="form-row">
                                                            <input class="button" type="submit" value="Login" name="login">
                                                            <!--<label for="rememberme" class="inline">
                                                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember me
                                                            </label>-->
                                                    </p>

                                                    <!--<p class="lost_password">
                                                            <a href="login-and-register.html">Lost your password?</a>
                                                    </p>-->

                                            </form>


                                    </div><!-- .col-1 -->

                                    <div class="col-2">

                                            <h2>Register</h2>
                                            {{ flash.output() }}
                                            <form method="post" class="register" action="{{url('register')}}">

                                                    <p class="before-register-text">
                                                            Create your very own account
                                                    </p>

                                                    <p class="form-row form-row-wide">
                                                            <label for="firstname">First Name
                                                            <span class="required">*</span></label>
                                                            <input type="text" class="input-text" name="firstname" id="firstname" />
                                                    </p>

                                                    <p class="form-row form-row-wide">
                                                            <label for="lastname">Last Name
                                                            <span class="required">*</span></label>
                                                            <input type="text" class="input-text" name="lastname" id="lastname" />
                                                    </p>

                                                    <p class="form-row form-row-wide">
                                                            <label for="phonenumber">Phone Number
                                                            <span class="required">*</span></label>
                                                            <input type="text" class="input-text" name="phonenumber" id="phonenumber" />
                                                    </p>

                                                    <p class="form-row form-row-wide">
                                                            <label for="address">Address
                                                            <span class="required">*</span></label>
                                                            <textarea class="input-text" name="address"></textarea>
                                                    </p>

                                                    <p class="form-row form-row-wide">
                                                            <label for="reg_email">Email address
                                                            <span class="required">*</span></label>
                                                            <input type="email" class="input-text" name="email" id="reg_email" value="" />
                                                    </p>


                                                    <p class="form-row form-row-wide">
                                                            <label for="password">Password
                                                            <span class="required">*</span></label>
                                                            <input type="password" autocomplete="off" class="input-text" name="password" id="password" />
                                                    </p>
                                                    
                                                            <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}">
                                                            <?php //echo \Multiple\Frontend\Recaptcha\Recaptcha::get('6LccIiQUAAAAAFsuiqaxMjzknreJ1ZScMI1tmUy3','',true); ?>
                                                            <div class="g-recaptcha form-row form-row-wide" data-sitekey="6Lev2EEUAAAAAPYTKnvBZXHVglceGx-IPHpyDRQT"></div>

                                                    
                                                    
                                                    <p class="form-row">
                                                            <input type="submit" class="button" name="register" value="Register" />
                                                    </p>

                                                    <div class="register-benefits">
                                                            <h3>Sign up today and you will be able to :</h3>
                                                            <ul>
                                                                    <li>Speed your way through checkout</li>
                                                                    <li>Track your orders easily</li>
                                                                    <li>Keep a record of all your purchases</li>
                                                            </ul>
                                                    </div>

                                            </form>

                                    </div><!-- .col-2 -->

                            </div><!-- .col2-set -->

                    </div><!-- /.customer-login-form -->
            </div><!-- .woocommerce -->
    </div><!-- .entry-content -->

</article><!-- #post-## -->
</div>
</div>
{% endblock %}