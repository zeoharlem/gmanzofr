{% extends "templates/base.volt" %}

{% block head %}

{% endblock %}
{% block content %}
<div class="m-subheader-search">
	<h2 class="m-subheader-search__title">
		Dashboard
		<span class="m-subheader-search__desc">Online Shoping Management</span>
	</h2>

</div>
    <div class="m-content">
        {{ this.getContent() }}
    </div>
{% endblock %}