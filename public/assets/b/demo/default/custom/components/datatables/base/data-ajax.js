//== Class definition

var DatatableRemoteAjaxDemo = function() {
  //== Private functions
  var stringVi    = 'gmanzofr';
  var urlPath     = window.location;
  var fullUrlPath = urlPath.protocol+'//'+urlPath.hostname+urlPath.pathname;
  var urlPathRow  = urlPath.pathname.substring(0, urlPath.pathname.indexOf(stringVi)+stringVi.length);
  var urlRowString    = urlPath.protocol+'//'+urlPath.hostname+urlPathRow;

  // basic demo
  var demo = function() {

    var datatable = $('.m_datatable').mDatatable({
      // datasource definition
      data: {
        type: 'remote',
        source: {
          read: {
            // sample GET method
            method: 'GET',
            url: urlRowString+'/backend/products/getproducts',
            map: function(raw) {
              // sample data mapping
              var dataSet = raw;
              if (typeof raw.data !== 'undefined') {
                dataSet = raw.data;
              }
              return dataSet;
            },
          },
        },
        pageSize: 20,
        serverPaging: true,
        serverFiltering: true,
        serverSorting: true,
      },

      // layout definition
      layout: {
        scroll: false,
        footer: false
      },

      // column sorting
      sortable: true,

      pagination: true,

      toolbar: {
        // toolbar items
        items: {
          // pagination
          pagination: {
            // page size select
            pageSizeSelect: [10, 20, 30, 50, 100],
          },
        },
      },

      search: {
        input: $('#generalSearch'),
      },

      // columns definition
      columns: [
        {
          field: 'key_num',
          title: '#',
          sortable: false, // disable sort for this column
          width: 40,
          selector: false,
          textAlign: 'center',
        },
          {
          field: 'product_id',
          title: 'ID',
          // sortable: 'asc', // default sort
          filterable: true, // disable or enable filtering
          width: 50,
        }, {
              field: 'image',
              title: 'Image',
              width: 150,
              template: function(row) {
                  // callback function support for column rendering
                  return "<img src='"+urlRowString+"/assets/uploads/"+row.image+"' width='50' />";
              },
          },{
          field: 'title',
          title: 'Product Title',
          width: 150,
          template: function(row) {
            // callback function support for column rendering
            return row.title;
          },
        }, {
          field: 'category',
          title: 'Category',
        }, {
              field: 'sub_category',
              title: 'Sub Category',
          },{
          field: 'current_stock',
          title: 'Stock',
          width: 100,
        }, {
          field: 'price',
          title: 'Price',
        }, {
          field: 'Actions',
          width: 110,
          title: 'Actions',
          sortable: false,
          overflow: 'visible',
          template: function (row, index, datatable) {
            var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
            return '\
						<div class="dropdown ' + dropup + '">\
							<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">\
                                <i class="la la-ellipsis-h"></i>\
                            </a>\
						  	<div class="dropdown-menu dropdown-menu-right">\
						    	<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>\
						    	<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>\
						    	<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>\
						  	</div>\
						</div>\
						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">\
							<i class="la la-edit"></i>\
						</a>\
						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">\
							<i class="la la-trash"></i>\
						</a>\
					';
          },
        }],
    });

    $('#m_form_status').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'category');
    });

    $('#m_form_type').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'sub_category');
    });

    $('#m_form_status, #m_form_type').selectpicker();

  };

  return {
    // public functions
    init: function() {
      demo();
    },
  };
}();

jQuery(document).ready(function() {
  DatatableRemoteAjaxDemo.init();
});