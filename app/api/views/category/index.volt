
{% block content %}
<!-- START CONTAINER -->
<div class="container-padding">


  <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          Category Title(s)
        </div>

            <div class="panel-body">
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

  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Small Modal</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- End Moda Code -->
{% endblock %}
