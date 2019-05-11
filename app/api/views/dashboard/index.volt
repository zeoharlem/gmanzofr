{% extends "templates/base.volt" %}
{% block head %}

{% endblock %}

{% block content %}


  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="active">This is a quick overview of some features</li>
    </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="index.html" class="btn btn-light">Dashboard</a>
        <a href="#" class="btn btn-light"><i class="fa fa-refresh"></i></a>
        <a href="#" class="btn btn-light"><i class="fa fa-search"></i></a>
        <a href="#" class="btn btn-light" id="topstats"><i class="fa fa-line-chart"></i></a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-widget">

  <!-- Start Top Stats -->
  <div class="col-md-12">
  <ul class="topstats clearfix">
    <li class="arrow"></li>
    
    <li class="col-xs-6 col-lg-4">
      <span class="title"><i class="fa fa-calendar-o"></i> This Week</span>
      <h3>&#8358;<?php echo number_format($weekRow, 2); ?></h3>
      <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i></b> From last week</span>
    </li>
    <li class="col-xs-6 col-lg-4">
      <span class="title"><i class="fa fa-shopping-cart"></i> Today's Sales</span>
      <h3 class="color-up">&#8358;<?php echo number_format($dayRow, 2); ?></h3>
      <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i></b> Today's sales so far</span>
    </li>
    <li class="col-xs-6 col-lg-4">
      <span class="title"><i class="fa fa-users"></i> Month Sales</span>
      <h3>&#8358;<?php echo number_format($monthRow, 2); ?></h3>
      <span class="diff"><b class="color-down"><i class="fa fa-caret-down"></i></b>Total Month Sales</span>
    </li>
    
  </ul>
  </div>
  <!-- End Top Stats -->


  <!-- Start First Row -->
  <div class="row">


    <!-- Start Files -->
    <div class="col-md-12">
      <div class="panel panel-widget" style="height:450px;">
        <div class="panel-title">
          Category(ies) <span class="label label-danger">{{catCount}}</span>
          <ul class="panel-tools">
            <li><a class="icon"><i class="fa fa-refresh"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
        <div class="panel-body table-responsive">

          <table class="table table-dic table-hover ">
            <tbody>
              {% for keys, values in categories %}
                  <tr>
                    <td><i class="fa fa-folder-o"></i>{{ values.category_name | capitalize}}</td>
                    
                    <td class="text-r"><a href="{{url('backend/products/?category_id='~values.category_id~'&n='~values.category_name)}}"><strong>Enter Product</strong></a></td>
                  </tr>
                {% endfor %}
            </tbody>
          </table>          

        </div>
      </div>
    </div>
    <!-- End Files -->

  </div>  
  <!-- End First Row -->
  


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
{% endblock %}