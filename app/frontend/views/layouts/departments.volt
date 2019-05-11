

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
	                <h1>{{ action }}</h1>
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
                            <li><a href="#">Home</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            <li><a href="#">Departments</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            <li class="active">{{ action }}</li>
                        </ul>
                    </div>
                       
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->

<!--Start departments single area-->
<section id="departments-single-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 pull-right">  
                
                {{ this.getContent() }}
                
                <div class="service-plan">
                    <div class="sec-title">
                        <h1>Our Services</h1>
                        <span class="border"></span>
                    </div>
                    <div class="row">
                        <!--Start single box-->
                        <div class="col-md-6">
                            <div class="single-box">
                                <div class="icon-holder">
                                    <span class="flaticon-transport"></span>
                                </div>
                                <div class="text-box">
                                    <h3>24 Hrs Ambulance</h3>
                                    <p>How all this mistaken idea denoucing pleasure and praisings pain was born complete account expound.</p>
                                </div>
                            </div>
                        </div>
                        <!--End single box-->
                        <!--Start single box-->
                        <div class="col-md-6">
                            <div class="single-box">
                                <div class="icon-holder">
                                    <span class="flaticon-drink"></span>
                                </div>
                                <div class="text-box">
                                    <h3>Food & Dietry</h3>
                                    <p>There anyone who loves or pursues or to obtain pain of itself, because it is but because occasionally.</p>
                                </div>
                            </div>
                        </div>
                        <!--End single box-->
                        <!--Start single box-->
                        <div class="col-md-6">
                            <div class="single-box">
                                <div class="icon-holder">
                                    <span class="flaticon-avatar"></span>
                                </div>
                                <div class="text-box">
                                    <h3>Special Nurses</h3>
                                    <p>Pursues or desires to obtain pain itself, because is pain, because occasionally circumstances occur procure.</p>
                                </div>
                            </div>
                        </div>
                        <!--End single box-->
                        <!--Start single box-->
                        <div class="col-md-6">
                            <div class="single-box">
                                <div class="icon-holder">
                                    <span class="flaticon-church"></span>
                                </div>
                                <div class="text-box">
                                    <h3>Places of Worship</h3>
                                    <p>Undertakes laborious physical exercise, except to obtain some advantage from it but who has any right.</p>
                                </div>
                            </div>
                        </div>
                        <!--End single box-->
                    </div>
                </div>
                
                
            </div> 
            
            <div class="col-lg-3 col-md-4 col-sm-7 col-xs-12 pull-left">
                <div class="departments-sidebar">
                    <!--Start single sidebar-->
                    <div class="single-sidebar">
                        <div class="title">
                            <h3>Departments</h3>    
                        </div>
                        <ul class="all-departments">
                                    <li class="<?php echo $setActive->setActiveLink('cardiology'); ?>"><a href="{{ url("departments/cardiology") }}">Cardiac Clinic</a></li>
                                    <li class="<?php echo $setActive->setActiveLink('antenatal'); ?>"><a href="{{ url("departments/antenatal")}}">Ante-Natal Care</a></li>
                                    <li class="<?php echo $setActive->setActiveLink('gynecology'); ?>"><a href="{{ url("departments/gynecology")}}">Gynecology</a></li>
                                    <li class="<?php echo $setActive->setActiveLink('immunization'); ?>"><a href="{{ url("departments/immunization")}}">Immunization</a></li>
                                    <li class="<?php echo $setActive->setActiveLink('neurology'); ?>"><a href="{{ url("departments/neurology")}}">Neurology</a></li>
                                    <li class="<?php echo $setActive->setActiveLink('orthopaedics'); ?>"><a href="{{ url("departments/orthopaedics")}}">Orthopaedics</a></li>
                                    <li class="<?php echo $setActive->setActiveLink('pediatrician'); ?>"><a href="{{ url("departments/pediatrician")}}">Pediatrician</a></li>
                                    <li class="<?php echo $setActive->setActiveLink('physioteraphy'); ?>"><a href="{{ url("departments/physioteraphy") }}">Physioteraphy</a></li>
                                    <li class="<?php echo $setActive->setActiveLink('familymedicine'); ?>"><a href="{{ url("departments/familymedicine") }}">Family Medicine</a></li>
                                    <li class="<?php echo $setActive->setActiveLink('ultrasound'); ?>"><a href="{{ url("departments/ultrasound") }}">Ultra Sound</a></li>
                                    <li class="<?php echo $setActive->setActiveLink('xray'); ?>"><a href="{{ url("departments/xray") }}">X-Ray</a></li>
                        </ul>
                    </div> 
                    <!--Ens single sidebar--> 
                    <!--Start single sidebar
                    <div class="single-sidebar">
                        <div class="title">
                            <h3>Opening Hours</h3>    
                        </div>
                        <ul class="opening-time">
                            <li>Mon to Friday: <span>09.00 to 18.00</span></li>
                            <li>Saturday: <span>10.00 to 16.00</span></li>
                            <li>Sunday: <span>10.00 to 14.00</span></li>
                        </ul>
                    </div> 
                    -->
                    <!--Ens single sidebar--> 
                    <!--Start single sidebar-->
                    <div class="single-sidebar">
                        <div class="title">
                            <h3>Quick Contact</h3>    
                        </div>
                        <div class="contact-us">
                            <ul class="contact-info">
                                <li>
                                    <div class="icon-holder">
                                        <span class="flaticon-pin"></span>
                                    </div>
                                    <div class="text-holder">
                                        <h5>Park Drive, Varick 2nd Str<br>NY 10012, USA</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-holder">
                                        <span class="flaticon-technology"></span>
                                    </div>
                                    <div class="text-holder">
                                        <h5>Getwell@Hospitals.com</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-holder">
                                        <span class="flaticon-technology-1"></span>
                                    </div>
                                    <div class="text-holder">
                                        <h5>(123) 0200 12345 & 7890</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div> 
                    <!--Ens single sidebar-->       
                </div>    
            </div>
            
        </div>
    </div>
</section>
<!--End Medical Departments area--> 

{% endblock %}
