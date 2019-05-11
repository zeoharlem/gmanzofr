

{% extends "templates/base.volt" %}

{% block head %}

{% endblock %}

{% block content %}
    <nav class="woocommerce-breadcrumb">
        <a href="{{url('dashboard')}}">Dashboard</a>
        <span class="delimiter"><i class="fa fa-angle-right"></i></span>
        <a href="{{url('dashboard/order')}}">Order History</a>
        <span class="delimiter"><i class="fa fa-angle-right"></i></span>
        <a href="{{url('trackorder')}}">Track Order</a>
        <span class="delimiter"><i class="fa fa-angle-right"></i></span>
        <a href="{{url('logout')}}"><strong>Log Out</strong></a>
    </nav>
        {{this.getContent()}}
    </div>
</div>
{% endblock %}
