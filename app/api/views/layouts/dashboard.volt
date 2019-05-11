{% extends "templates/base.volt" %}

{% block head %}
    
{% endblock %}

{% block content %}
<div class="content-header row">
<div class="content-header-left col-md-6 col-xs-12">
            <h2 class="content-header-title mb-0">Dashboard</h2>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('dashboard/') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Dashboard
                  </li>
                </ol>
              </div>
            </div>
          </div>

</div>


    <div class="row">
        <div class="col-md-12">
            <div class="content-header">{{ flash.output() }}</div>
        </div>



        <div class="col-xs-12">

        <!-- Button Group Sizes end -->
        </div>
    </div>
    
{{ this.getContent() }}
            


{% endblock %}
