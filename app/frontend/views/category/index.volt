{% extends "templates/base.volt" %}

{% block head %}

{% endblock %}

{% block content %}
<section>
<header>
    <h2 class="h1">Categories</h2>
</header>
<div class="woocommerce columns-4">
    <ul class="product-loop-categories">
    {% for keys, values in catSimple %}
		<li class="product-category product">
			<a href="{{url('category/browse?c='~values['category_id']~'&category='~values['title'])}}">
                <img src="{{ url('assets/uploads/'~values['img']) }}" class="img-responsive" alt="{{values['title'] | capitalize}}">
                <h3>
                {{values['title'] | capitalize}}			<mark class="count">(2)</mark>
                </h3>
		    </a>

		</li><!-- /.item -->
    {% endfor %}
    </ul>
</div>
</section>
</div>
</div>
{% endblock %}