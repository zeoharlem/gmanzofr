{% extends "templates/base.volt" %}
{% block head %}

{% endblock %}

{% block content %}


  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Customers Table</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('backend/dashboard') }}">Products</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Customers Tables</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="{{ url('backend/dashboard') }}" class="btn btn-light">Dashboard</a>
        <a href="#" class="btn btn-light"><i class="fa fa-refresh"></i></a>
        <a href="#" class="btn btn-light"><i class="fa fa-search"></i></a>
        <a href="#" class="btn btn-light" id="topstats"><i class="fa fa-line-chart"></i></a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->

  <!-- Start Presentation -->
  <div class="row presentation">

    <div class="col-lg-8 col-md-6 titles">
      <span class="icon color10-bg"><i class="fa fa-table"></i></span>
      <h1>Customers Table</h1>
      
    </div>

    <div class="col-lg-4 col-md-6">
      <ul class="list-unstyled list">
        <li><i class="fa fa-check"></i>Easy to Use<li>
        <li><i class="fa fa-check"></i>Group Options<li>
        <li><i class="fa fa-check"></i><a href="#" target="_blank">Customers</a><li>
      </ul>
    </div>

  </div>
  <!-- End Presentation -->

{{ this.getContent() }}
{% endblock %}