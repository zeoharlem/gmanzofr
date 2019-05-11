
{% block content %}
<!-- START CONTAINER -->
<div class="container-padding">


  <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          Inline Form
        </div>

            <div class="panel-body">
              <form class="form-inline">
                <div class="form-group">
                  <label for="example1" class="form-label">Name</label>
                  <input type="text" class="form-control" id="example1" placeholder="Jane Doe">
                </div>
                <div class="form-group">
                  <label for="example2" class="form-label">Email</label>
                  <input type="email" class="form-control" id="example2" placeholder="jane.doe@example.com">
                </div>
                <button type="submit" class="btn btn-default">Send</button>
              </form>
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
