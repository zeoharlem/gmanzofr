
{% extends "templates/base.volt" %}

{% block head %}

{% endblock %}

{% block content %}

<!--Start breadcrumb area-->     
<section class="breadcrumb-area" style="background-image: url({{url("assets/front/images/resources/breadcrumb-bg.jpg")}});">
	<div class="container">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="breadcrumbs">
	                <h1>Our Gallery</h1>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="breadcrumb-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="left pull-left">
                        <ul>
                            <li><a href="index-2.html">Home</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            <li class="active">Gallery</li>
                        </ul>
                    </div>
                       
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->

<!--Start project with text area--> 
<section class="main-project-area">
    <div class="container">
        <div class="row">
            <!--Start single project item-->
            <div class="col-md-4 col-sm-4 col-xs-12 filter-item robustness workouts">
                <div class="single-project-item">
                    <div class="img-holder">
                        <img src="{{ url("assets/front/images/projects/1.jpg")}}" alt="Awesome Image">
                        <div class="overlay-style-one">
                            <div class="box">
                                <div class="content">
                                    <a href="project-single.html">Happy Young Family</a>
                                    <span class="border"></span>
                                    <p>Healthy Food</p>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div> 
            </div>
            <!--End single project item-->
            
            
        </div>
        <div class="row">
            <div class="col-md-12"> 
                <ul class="post-pagination text-center">
                    <li><a href="#"><i class="fa fa-caret-left" aria-hidden="true"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                </ul>
            </div> 
        </div>
    </div>
</section>                            
<!--End project with text area-->   
{% endblock %}