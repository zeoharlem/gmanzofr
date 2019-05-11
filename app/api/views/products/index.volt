
{% block content %}
<div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-12">
            {{flash.output()}}
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title"><a href="{{url('backend/products')}}"><strong>Add To Product | Reset</strong></a></h4>
                <div class="example">
                  <form autocomplete="off" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label class="control-label" for="inputBasicFirstName">Product Title</label>
                        <input type="text" class="form-control input-lg" id="inputBasicFirstName" name="title"
                        placeholder="Type Products Title" autocomplete="off" required />
                      </div>
                      <div class="col-sm-6">
                      {% if selectedCategory is defined %}
                        <label class="control-label" for="inputBasicLastName">Category</label>
                        <input type="text" class="form-control input-lg" disabled name="category_name" value="{{categoryName}}" />
                      {% else %}
                        <label class="control-label" for="inputBasicLastName">Category</label>
                            <select class="form-control input-lg selectpicker" required name="category">
                            {% for keys, values in categories %}
                                <option value="{{values.category_id}}">{{values.category_name}}</option>
                            {% endfor %}
                              </select>
                       {% endif %}
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail"><strong>Product Description</strong></label>
                      <textarea class="form-control input-lg" name="description" placeholder="Briefly Describe Yourself"></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                          <label class="control-label" for="inputBasicPassword">Purchase Price</label>
                          <input type="text" class="form-control input-lg" id="inputBasicPassword" name="purchase_price"
                          placeholder="Enter Purchase Price" required autocomplete="off" />
                        </div>
                        <div class="col-sm-4">
                          <label class="control-label" for="inputBasicPassword">Sale(s) Price</label>
                          <input type="text" class="form-control input-lg" id="inputBasicPassword" name="sale_price"
                          placeholder="Enter Sales Price" required autocomplete="off" />
                        </div>
                        <div class="col-sm-4">
                          <label class="control-label" for="inputBasicPassword">Delivery Cost</label>
                          <input type="text" class="form-control input-lg" id="inputBasicPassword" name="shipping_cost"
                          placeholder="Enter Delivery Cost" required autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                          <label class="control-label" for="inputBasicPassword">Brand</label>
                          <input type="text" class="form-control input-lg" id="inputBasicPassword" name="brand"
                          placeholder="Type the brand of Product" autocomplete="off" />
                        </div>
                        <div class="col-sm-4">
                          <label class="control-label" for="inputBasicPassword">Current Stock</label>
                          
                          <input type="text" class="form-control input-lg" id="inputBasicPassword" name="current_stock"
                          placeholder="Enter the current stock" required autocomplete="off" />
                        </div>
                        <div class="col-sm-4">
                          <label class="control-label" for="inputBasicPassword"><strong>Discount (%)</strong></label>
                          <input type="text" class="form-control input-lg" id="inputBasicPassword" name="discount"
                          placeholder="Discount calculated in percentage(%)" autocomplete="off" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Image width size !> 300 &amp; height size !> 300</label>
                        <input type="file" name="front_image" required class="form-control" style="border:none !important;">
                    </div>
                    
                    <div class="form-group">
                      <div class="checkbox-custom checkbox-default">
                        <input type="checkbox" id="inputBasicRemember" checked autocomplete="off"
                        />
                        <label for="inputBasicRemember"><strong>Have you confirmed the input(s)</strong></label>
                      </div>
                    </div>
                    <div class="form-group">
                    {% if selectedCategory is defined %}
                      <input type="hidden" name="category" value="{{selectedCategory}}" />
                    {% endif %}
                      <input type="hidden" name="sub_category" value="0" />
                      <button type="submit" class="btn btn-default btn-lg">Submit / Create Product</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End Example Basic Form -->
            </div>
        </div>
    </div>
</div>
{% endblock %}
