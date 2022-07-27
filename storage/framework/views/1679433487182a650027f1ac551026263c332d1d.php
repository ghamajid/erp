<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('backEnd/css/custom.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="box_header common_table_header">
                <div class="main-title d-md-flex">
                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('common.Product List')); ?></h3>

                        <ul class="d-flex">
                            <?php if(permissionCheck('add_product.index')): ?>
                            <li><a class="primary-btn radius_30px mr-10 fix-gr-bg"
                                   href="<?php echo e(route("add_product.index")); ?>"><i
                                        class="ti-plus"></i><?php echo e(__('product.New Product')); ?></a>
                            </li>
                            <?php endif; ?>
                                <?php if(permissionCheck('add_product.csv_upload.store')): ?>
                            <li><a class="primary-btn radius_30px mr-10 fix-gr-bg"
                                   href="<?php echo e(route('add_product.csv_upload.create')); ?>"><i
                                        class="ti-export"></i><?php echo e(__('common.Upload Via CSV')); ?></a></li>
<?php endif; ?>
                        </ul>


                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Start Sms Details -->
        <div class="col-lg-12 student-details">
            <ul class="nav nav-tabs tab_column border-0" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#all" role="tab" data-toggle="tab"><?php echo e(__('common.Products')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#ComboProduct" role="tab"
                       data-toggle="tab"><?php echo e(__('product.Combo Product')); ?></a>
                </li>
            </ul>
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane fade show active" id="all">
                    <div class="white-box mt-2">
                        <div class="row">
                            <div class="col-12 select_sms_services">
                                <div class="QA_section QA_section_heading_custom check_box_table mt-50">
                                    <div class="QA_table ">
                                        <table class="table product_table scroll_datatable">
                                            <thead>
                                            <tr>

                                                <th scope="col"><?php echo e(__('product.Sl')); ?></th>
                                                <th scope="col"><?php echo e(__('product.Image')); ?></th>
                                                <th scope="col"><?php echo e(__('product.Name')); ?></th>
                                                <?php if(app('general_setting')->origin == 1): ?>
                                                    <th scope="col"><?php echo e(__('common.Part Number')); ?></th>
                                                <?php else: ?>
                                                    <th scope="col"><?php echo e(__('sale.SKU')); ?></th>
                                                <?php endif; ?>
                                                <th scope="col"><?php echo e(__('product.Brand')); ?></th>
                                                <th scope="col"><?php echo e(__('product.Model')); ?></th>
                                                <th scope="col"><?php echo e(__('product.Purchase Price')); ?></th>
                                                <th scope="col"><?php echo e(__('product.Selling Price')); ?></th>
                                                <th scope="col"><?php echo e(__('product.Min Price')); ?></th>
                                                <th scope="col"><?php echo e(__('product.Stock')); ?></th>
                                                <th scope="col"><?php echo e(__('product.Supplier')); ?></th>
                                                <th scope="col"><?php echo e(__('product.Product Type')); ?></th>
                                                <th scope="col"><?php echo e(__('product.Category')); ?></th>
                                                <th scope="col"><?php echo e(__('product.Stock Alert')); ?></th>
                                                <th scope="col"><?php echo e(__('common.Action')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>

                                            <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <?php if(app('general_setting')->origin == 1): ?>
                                                    <td></td>
                                                <?php else: ?>
                                                    <td></td>
                                                <?php endif; ?>
                                                <td>Total</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="ComboProduct">
                    <div class="white-box mt-2">
                        <div class="row">
                            <div class="col-12 select_sms_services">
                                <div class="QA_section QA_section_heading_custom check_box_table mt-50">
                                    <div class="QA_table ">
                                        <table class="table Crm_table_active3">
                                            <thead>
                                            <tr>

                                                <th scope="col"><?php echo e(__('product.Sl')); ?></th>
                                                <th scope="col"><?php echo e(__('product.Image')); ?></th>
                                                <th scope="col"><?php echo e(__('product.Name')); ?></th>
                                                <th scope="col"><?php echo e(__('product.Price')); ?></th>
                                                <th scope="col"><?php echo e(__('product.Regular Price')); ?></th>
                                                <th scope="col"><?php echo e(__('product.Total Product')); ?></th>
                                                <th scope="col"><?php echo e(__('common.Status')); ?></th>
                                                <th scope="col"><?php echo e(__('common.Enable')); ?></th>
                                                <th scope="col"><?php echo e(__('common.Action')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $comboProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comboProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>

                                                    <th><?php echo e($key+1); ?></th>
                                                    <td>
                                                        <?php if($comboProduct->image_source != null): ?>
                                                            <img style="height: 36px;"
                                                                 src="<?php echo e(asset($comboProduct->image_source)); ?>">
                                                        <?php else: ?>
                                                            <img style="height: 36px;"
                                                                 src="<?php echo e(asset('backEnd/img/no_image.png')); ?>"
                                                                 alt="<?php echo e(@$comboProduct->name); ?>">
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($comboProduct->name); ?></td>
                                                    <td><?php echo e(single_price($comboProduct->price)); ?></td>
                                                    <td><?php echo e(single_price($comboProduct->total_regular_price)); ?></td>
                                                    <td class="text-center"><?php echo e(count($comboProduct->combo_products)); ?> <?php echo e(__('product.pcs')); ?></td>
                                                    <td class="text-center">
                                                        <?php if($comboProduct->status == 0): ?>
                                                            <span class="badge_4"><?php echo e(__('product.Close')); ?></span>
                                                        <?php else: ?>
                                                            <span class="badge_1"><?php echo e(__('product.Open')); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <label class="switch_toggle"
                                                               for="active_checkbox<?php echo e($comboProduct->id); ?>">
                                                            <input type="checkbox"
                                                                   id="active_checkbox<?php echo e($comboProduct->id); ?>"
                                                                   <?php echo e(permissionCheck('combo_product.update_active_status') ? '' : 'disabled'); ?> <?php if($comboProduct->status == 1): ?> checked
                                                                   <?php endif; ?> value="<?php echo e($comboProduct->id); ?>"
                                                                   onchange="update_active_status(this)">
                                                            <div class="slider round"></div>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <!-- shortby  -->
                                                        <div class="dropdown CRM_dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle"
                                                                    type="button" id="dropdownMenu2"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false"> <?php echo e(__('common.Select')); ?>

                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                 aria-labelledby="dropdownMenu2">
                                                                <?php if(count($comboProduct->combo_products) > 0): ?>
                                                                    <?php if(permissionCheck('add_product.editCombo')): ?>
                                                                        <a href="<?php echo e(route('add_product.editCombo',$comboProduct->id)); ?>"
                                                                           class="dropdown-item"
                                                                           type="button"><?php echo e(__('common.Edit')); ?></a>
                                                                    <?php endif; ?>
                                                                    <?php if(permissionCheck('add_product.product_Detail')): ?>
                                                                        <a href="#" data-toggle="modal"
                                                                           class="dropdown-item"
                                                                           onclick="product_detail(<?php echo e($comboProduct->id); ?> , 'combo')"><?php echo e(__('common.View')); ?></a>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                                <?php if(permissionCheck('combo_product.destroy')): ?>
                                                                    <a onclick="confirm_modal('<?php echo e(route('combo_product.destroy',$comboProduct->id)); ?>');"
                                                                       class="dropdown-item edit_brand"><?php echo e(__('common.Delete')); ?></a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <!-- shortby  -->
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product_info">

    </div>
    <div class="modal fade admin-query" id="generate_barcode">
        <div class="modal-dialog modal_800px modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('product.Information to show in Labels')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="ti-close "></i>
                    </button>
                </div>
                <form action="<?php echo e(route('print.labels')); ?>" method="GET"><?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <table class="table table-borderless">
                            <tr>
                                <td class="pl-5"><?php echo e(__('product.Image')); ?></td>
                                <td><img class="product_image" src="" width="50px" alt=""></td>
                            </tr>
                            <tr>
                                <td class="pl-5"><?php echo e(__('product.Products')); ?> :</td>
                                <td class="product_name"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="pl-5"><?php echo e(__('product.SKU')); ?> :</td>
                                <td class="product_sku"></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                        <div class="row">
                            <input type="hidden" name="id" class="sku_id" value="">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="primary_input">
                                    <label class="primary_input_label"
                                           for=""><?php echo e(__('common.Type')); ?></label>
                                    <ul id="theme_nav" class="permission_list sms_list ">
                                        <li>
                                            <label data-id="bg_option"
                                                   class="primary_checkbox d-flex mr-12 ">
                                                <input name="name" id="name" type="checkbox" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                            <p><?php echo e(__('product.Product Name')); ?></p>
                                        </li>
                                        <li>
                                            <label data-id="color_option"
                                                   class="primary_checkbox d-flex mr-12">
                                                <input name="variation" id="variation" type="checkbox" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                            <p><?php echo e(__('product.Product Variation')); ?> (<?php echo e(__('common.recommended')); ?>)</p>
                                        </li>
                                        <li>
                                            <label data-id="color_option"
                                                   class="primary_checkbox d-flex mr-12">
                                                <input name="business_name" value="business_name" id="business_name"
                                                       type="checkbox" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                            <p><?php echo e(__('common.Business Name')); ?></p>
                                        </li>
                                        <li>
                                            <label
                                                class="primary_checkbox d-flex mr-12">
                                                <input name="product_price" value="price" id="price" type="checkbox"
                                                       checked>
                                                <span class="checkmark"></span>
                                            </label>
                                            <p><?php echo e(__('product.Price')); ?></p>
                                        </li>
                                        <li>
                                            <select class="primary_select mb-15 price_tax" id="tax" name="tax">
                                                <option value="1"><?php echo e(__('common.Inc. Tax')); ?></option>
                                                <option value="0"><?php echo e(__('common.Ex. Tax')); ?></option>
                                            </select>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label class="primary_input_label" for=""><?php echo e(__('product.Barcode Setting')); ?></label>
                                <select class="primary_select mb-15 per_sheet" name="page">
                                    <option value="20">20 <?php echo e(__('product.Labels Per Sheet')); ?></option>
                                    <option value="30">30 <?php echo e(__('product.Labels Per Sheet')); ?></option>
                                    <option value="32">32 <?php echo e(__('product.Labels Per Sheet')); ?></option>
                                    <option value="40">40 <?php echo e(__('product.Labels Per Sheet')); ?></option>
                                    <option value="50">50 <?php echo e(__('product.Labels Per Sheet')); ?></option>
                                    <option value="0"><?php echo e(__('product.Continuous Rolls')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="primary_input mb-15">
                                    <label class="primary_input_label" for=""> <?php echo e(__("product.No. of Label")); ?> </label>
                                    <input class="primary_input_field no_of_label" name="label"
                                           placeholder="<?php echo e(__("product.No. of Label")); ?>" type="number"
                                           value="<?php echo e(old('label')); ?>">
                                    <span class="text-danger"><?php echo e($errors->first('label')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="d-flex justify-content-center pt_20">

                                <button type="submit"
                                        class="primary-btn semi_large2 mr-2 fix-gr-bg"><?php echo e(__('product.Preview')); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <input type="hidden" id="currency_sym" name="currency_sym" value="<?php echo e(app('general_setting')->currency_symbol); ?>">
    <?php echo $__env->make('backEnd.partials.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backEnd.partials.approve_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush("scripts"); ?>
    <script type="text/javascript">
        (function ($){
            "use strict";
            $(document).ready(function () {
                $(document).on('change', '#price', function () {
                    if (!$(this).is(':checked'))
                        $('.price_tax').hide();
                    else
                        $('.price_tax').show();
                });
                $(document).on('click', '.generate_barcode', function () {
                    let id = $(this).data('id');

                    $('.id').val(id);
                })
                $('.product_table').DataTable({
                    processing: true,
                    serverSide: true,
                    "ajax": $.fn.dataTable.pipeline( {
                        url: '<?php echo e(route('product.product_list_dtbl')); ?>',
                        pages: 5 // number of pages to cache
                    } ),
                    language: {
                        search: "<i class='ti-search'></i>",
                        searchPlaceholder: trans('js.Quick Search'),
                        lengthMenu: trans('js.Show')+" _MENU_ " + trans('js.entries'),
                        zeroRecords: trans('js.No data available in table'),
                        info: trans('js.Showing page')+" _PAGE_ "+trans('js.of')+" _PAGES_",
                        infoEmpty: trans('js.No records available'),
                        infoFiltered: "( "+ trans('js.filtered from')+" _MAX_ "+trans('js.total records')+")",
                        paginate: {
                            next: "<i class='ti-arrow-right'></i>",
                            previous: "<i class='ti-arrow-left'></i>"
                        }
                    },

                    columns: [
                        { data: 'DT_RowIndex', name: 'id' },
                        { data: 'image', name: 'image' },
                        { data: 'product_name', name: 'product_name' },
                        { data: 'origin', name: 'origin' },
                        { data: 'brand', name: 'brand' },
                        { data: 'model', name: 'model' },
                        { data: 'purchase_price', name: 'purchase_price' },
                        { data: 'selling_price', name: 'selling_price' },
                        { data: 'min_selling_price', name: 'min_selling_price' },
                        { data: 'stock', name: 'stock' },
                        { data: 'supplier', name: 'supplier' },
                        { data: 'product_type', name: 'product_type' },
                        { data: 'category', name: 'category' },
                        { data: 'stock_alert', name: 'stock_alert' },
                        { data: 'action', name: 'action' }

                    ],
                    "footerCallback": function ( row, data, start, end, display ) {
                        var api = this.api(), data;

                        // converting to interger to find total
                        var parseFloat = function ( i ) {
                            return typeof i === 'string' ?
                                i.replace(/[^0-9\.]/g, '')*1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };

                        var purchaseTotal = api
                            .column( 6 , { page: 'current'})
                            .data()
                            .reduce( function (a, b) {
                                return parseFloat(a) + parseFloat(b);
                            }, 0 );
                        var sellTotal = api
                            .column( 7 , { page: 'current'})
                            .data()
                            .reduce( function (a, b) {
                                return parseFloat(a) + parseFloat(b);
                            }, 0 );
                        var minTotal = api
                            .column( 8 , { page: 'current'})
                            .data()
                            .reduce( function (a, b) {
                                return parseFloat(a) + parseFloat(b);
                            }, 0 );
                        var stockTotal = api
                            .column( 9 , { page: 'current'})
                            .data()
                            .reduce( function (a, b) {
                                return parseFloat(a) + parseFloat(b);
                            }, 0 );

                        var currency_sym = $('#currency_sym').val();
                        // Update footer by showing the total with the reference of the column index
                        $( api.column( 0 ).footer() ).html(trans('js.Total'));
                        $( api.column( 6 ).footer() ).html(currency_sym + ' ' +purchaseTotal.toFixed(2));
                        $( api.column( 7 ).footer() ).html(currency_sym + ' ' +sellTotal.toFixed(2));
                        $( api.column( 8 ).footer() ).html(currency_sym + ' ' +minTotal.toFixed(2));
                        $( api.column( 9 ).footer() ).html(stockTotal);
                    },
                    bLengthChange: true,
                    "bDestroy": true,

                    dom: 'Blfrtip',
                    buttons: [
                        {
                            extend: 'copyHtml5',
                            text: '<i class="fa fa-files-o"></i>',
                            title : $("#header_title").text(),
                            titleAttr: 'Copy',
                            footer: true,
                            exportOptions: {
                                columns: ':not(:last-child)',
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            text: '<i class="fa fa-file-excel-o"></i>',
                            titleAttr: 'Excel',
                            title : $("#header_title").text(),
                            messageTop: info,
                            margin: [10 ,10 ,10, 0],
                            footer: true,
                            exportOptions: {
                                columns: ':not(:last-child)',
                            },

                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-text"></i>',
                            titleAttr: 'CSV',
                            messageTop: info,
                            footer: true,
                            exportOptions: {
                                columns: ':not(:last-child)',
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf-o"></i>',
                            title : $("#header_title").text(),
                            titleAttr: 'PDF',
                            footer: true,
                            exportOptions: {
                                columns: ':not(:last-child)',
                            },
                            orientation: 'landscape',
                            pageSize: 'A3',
                            margin: [ 0, 0, 0,0 ],
                            alignment: 'center',
                            header: true,
                            messageTop: info,
                            messageBottom: trans('js.Generated By')+' : <?php echo e(auth()->user()->name); ?>',
                        },
                        {
                            text: '<i class="fa fa-print"></i>',
                            titleAttr: 'Print',
                            alignment: 'center',
                            title : window.dataTableHeadingText,
                            exportOptions: {
                                columns: ':not(:last-child)',
                            },
                            header: true,
                            extend: 'print',
                            footer: true,

                        },
                        {
                            extend: 'colvis',
                            text: '<i class="fa fa-columns"></i>',
                            postfixButtons: ['colvisRestore']
                        }
                    ],
                    columnDefs: [{
                        visible: false
                    }],
                    responsive: false,
                    ordering: false,
                    "scrollX": true
                });

                let table = $('.product_table').DataTable();

                table.on( 'draw', function () {
                    if($('.product_table tbody tr').length <= 3){
                        $('.dataTables_scrollBody').addClass('manage-table-height')
                    }else{
                        $('.dataTables_scrollBody').removeClass('manage-table-height')
                    }
                });

            });
        })(jQuery);

        function product_detail(el, type, range) {
            "use strict";
            $.post('<?php echo e(route('add_product.product_Detail')); ?>', {
                _token: '<?php echo e(csrf_token()); ?>',
                id: el,
                type: type,
                range: range,
            }, function (data) {
                $('.product_info').html(data);
                $('#Item_Details').modal('show');
            });
        }

        function update_active_status(el) {
            "use strict";
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('<?php echo e(route('combo_product.update_active_status')); ?>', {
                _token: '<?php echo e(csrf_token()); ?>',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    toastr.success("Successfully Updated", "Success");
                } else {
                    toastr.warning("Something went wrong");
                }
            });
        }

        function barcodeGenerator(image, name, sku, sku_id, stock) {
            "use strict";
            if (!stock || isNaN(stock))
                stock = 0;
            $('.product_image').attr("src", image);
            $('.product_name').text(name);
            $('.product_sku').text(sku);
            $('.sku_id').val(sku_id);
            $('.no_of_label').val(parseInt(stock));
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/product/product/list_products.blade.php ENDPATH**/ ?>