</div>
</div>

<div class="has-modal modal fade" id="showDetaildModal">
    <div class="modal-dialog modal-dialog-centered" id="modalSize">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="showDetaildModalTile"><?php echo e(__('common.New Client Information')); ?></h4>
                <button type="button" class="close icons" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="showDetaildModalBody">

            </div>

            <!-- Modal footer -->

        </div>
    </div>
</div>


<!--  Start Modal Area -->
<div class="modal fade invoice-details" id="showDetaildModalInvoice">
    <div class="modal-dialog large-modal modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(__('common.Add Invoice')); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="showDetaildModalBodyInvoice">
            </div>

        </div>
    </div>
</div>


<!-- ================Footer Area ================= -->
<footer class="footer-area">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 text-center">
                <p> <?php echo app('general_setting')->copyright_text; ?> </p>
            </div>
        </div>
    </div>
</footer>
<!-- ================End Footer Area ================= -->


<?php echo $__env->make('backEnd.partials.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php /**PATH C:\projects\ERP\erp_github\resources\views/backEnd/partials/footer.blade.php ENDPATH**/ ?>