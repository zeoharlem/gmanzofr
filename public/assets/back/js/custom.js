/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    var stringVi    = 'gmanzofr/backend';
    var urlPath     = window.location;
    var fullpath    = urlPath.protocol+'//'+urlPath.hostname+urlPath.pathname;
    var frontend    = urlPath.pathname.substring(0, urlPath.pathname.indexOf(stringVi)+stringVi.length);
//    var frontend    = urlPath.pathname.substring(0, urlPath.pathname.indexOf('users')+5);
    var nBackend    = urlPath.protocol+'//'+urlPath.hostname+frontend;
    
    var productTab  = $('#example0').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": nBackend + "/products/show",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": '<div class="btn-group" role="group" aria-label="...">\n\
            <button type="button" class="btn btn-light btn-sm editBtn">Edit</button>\n\
            <button type="button" class="btn btn-light btn-sm">Remove</button>\n\
            <button type="button" class="btn btn-light btn-sm">Block</button>\n\
            </div>'
        },
        {
            "render": function(data, type, row){
                //return data + '{' + row[4] + '}';
                var uploadFrontApp  = nBackend.replace('backend', '');
                return '<img class="img-responsive" width="30%" src="'+uploadFrontApp+'/assets/uploads/'+data+'" />';
            },
            "targets": 5
        },
    ],
        "columns": [
            {"data": "product_id"},
            {"data": "title"},
            {"data": "category"},
            {"data": "current_stock"},
            {"data": "date_created"},
            {"data": "image"},
            {"data": "price"},
            {"data": ""},
        ]
    });
    /**
     * Products Click Monitor
     */
    $('#example0 tbody').on('click', 'button.editBtn', function () {
        var thisRow = $("#myModal3");
        var data    = productTab.row($(this).parents('tr') ).data();
        var title   = data['title'];
        var pr_id   = data['product_id'];
        thisRow.modal("show");
        thisRow.on("bs.modal.shown", function(ev){
            $(this).find(".modal-title").text(title);
        });
    });
    
    /**
     * 
     * @type type
     * Customers DataTable
     */
    var customers  = $('#customers').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": nBackend + "/customers/show",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": -1,
                "data": null,
                "defaultContent": '<div class="btn-group" role="group" aria-label="...">\n\
                <button type="button" class="btn btn-light btn-sm mailBtn">Mail</button>\n\
                <button type="button" class="btn btn-light btn-sm viewBtn">View</button>\n\
                </div>'
            },
        ],
        "columns": [
            {"data": "register_id"},
            {"data": "firstname"},
            {"data": "lastname"},
            {"data": "phonenumber"},
            {"data": "email"},
            {"data": ""},
        ]
    });
    
    $('#customers tbody').on('click', 'button.mailBtn', function () {
        var thisRow = $("#myModal3");
        var data    = customers.row($(this).parents('tr') ).data();
        thisRow.modal("show");
        thisRow.on("bs.modal.shown", function(ev){
            
        });
    });
    
    /**
     * ORder Task
     * DataTable Show
     * @type type
     */
    var orderTask  = $('#ordertask').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": nBackend + "/orders/show",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": -1,
                "data": null,
                "defaultContent": '<div class="btn-group" role="group" aria-label="...">\n\
                <button type="button" class="btn btn-light btn-sm mailBtn">Contact</button>\n\
                <button type="button" class="btn btn-light btn-sm viewBtn">View</button>\n\
                </div>'
            },
        ],
        "columns": [
            {"data": "trans_id"},
            {"data": "firstname"},
            {"data": "lastname"},
            {"data": "phonenumber"},
            {"data": "email"},
            {"data": "date_of_order"},
            {"data": null},
        ]
    });
});
