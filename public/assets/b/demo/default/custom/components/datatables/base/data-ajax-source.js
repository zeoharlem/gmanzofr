var DatatablesDataSourceAjaxServer = function () {

    //== Private functions
    var stringVi    = 'gmanzofr';
    var urlPath     = window.location;
    var fullUrlPath = urlPath.protocol+'//'+urlPath.hostname+urlPath.pathname;
    var urlPathRow  = urlPath.pathname.substring(0, urlPath.pathname.indexOf(stringVi)+stringVi.length);
    var urlRowString    = urlPath.protocol+'//'+urlPath.hostname+urlPathRow;

    // basic demo
    var demo = function() {
        var datatable = $('#m_table_1').DataTable({
            method: 'GET',
            responsive: true,
            searchDelay: 500,
            processing: true,
            pageSize: 20,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
            ajax: urlRowString+'/backend/products/getproducts',
            pagination: true,
            search: {
                input: $('#generalSearch'),
            },

            // columns definition
            columns: [
                {data: "product_id"},
                {data: "title"},
                {data: "image"},
                {data: "category"},
                {data: "sub_category"},
                {data: "current_stock"},
                {data: "price"},
                {data: "product_id"},
            ],
            columnDefs: [{
                targets: 2,
                data: "image",
                render: function ( data, type, row, meta ) {
                    return "<img src='"+urlRowString+"/assets/uploads/"+data+"' width='50' />";
                }
            },{
                targets: -1,
                render: function(data, type, row, meta){
                    //var dropup = (datatable.getPageSize() - e) <= 4 ? 'dropup' : '';
                    return '\
						<div class="dropdown">\
							<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">\
                                <i class="la la-ellipsis-h"></i>\
                            </a>\
						  	<div class="dropdown-menu dropdown-menu-right">\
						    	<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>\
						    	<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>\
						    	<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>\
						  	</div>\
						</div>\
					';
                    }
                }
            ]
        });

        $('#m_form_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'category');
        });

        $('#m_form_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'sub_category');
        });

        $('#m_form_status, #m_form_type').selectpicker();
    };

    var handleDatableOrderRow   = function(){
        var orderTableRow   = $('#orderTableRow').DataTable({
            method: 'GET',
            responsive: true,
            searchDelay: 500,
            processing: true,
            pageSize: 20,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
            ajax: urlRowString+'/backend/order',
            pagination: true,
            search: {
                input: $('#generalSearch'),
            },

            // columns definition
            columns: [
                {data: "order_id"},
                {data: "trans_id"},
                {data: "firstname"},
                {data: "lastname"},
                {data: "phonenumber"},
                {data: "date_of_order"},
                {data: "register_id"},
                {data: "order_id"},
            ],
            columnDefs: [{
                targets: -1,
                data: "image",
                render: function ( data, type, row, meta ) {
                    return "<button class='btn btn-primary btn-sm'>View</button>";
                }
            }]
        });
    }

    return {
        // public functions
        init: function() {
            demo();
            handleDatableOrderRow();
        },
    };
}();

$(document).ready(function() {
    DatatablesDataSourceAjaxServer.init();
});