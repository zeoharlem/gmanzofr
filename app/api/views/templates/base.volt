
<!DOCTYPE html>
<html lang="en">


        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="robots" content="all">

        {{getTitle()}}
        
        {{ this.assets.outputCss('headers') }}
            
        {% block head %} {% endblock %}
        

    <body>
    <!-- //////////////////////////////////////////////////////////////////////////// --> 
        <!-- START CONTENT -->
        
            {{ partial("partials/headerview") }}

            <div class="content">
                        {% block content %}{% endblock %}
                
            
        <!-- END CONTAINER -->

            {{ partial("partials/footer") }}
            </div>
            {{ partial("partials/menu") }}
        
            {{ this.assets.outputJs('footers') }}

    </body>
</html>