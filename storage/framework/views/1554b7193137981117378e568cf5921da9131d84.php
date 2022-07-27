<script type="text/javascript">
    function confirm_modal(delete_url)
    {
        jQuery('#confirm-delete').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

<div class="modal fade admin-query" id="confirm-delete">
    <div class="modal-dialog modal_800px modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(__('common.Delete Confirmation')); ?></h4>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="ti-close "></i>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo e(__('common.It will delete all related data.')); ?></p>

                <div class="col-lg-12 text-center">
                    <div class="d-flex justify-content-center pt_20">
                        <a id="delete_link" class="primary-btn semi_large2 fix-gr-bg"><?php echo e(__('common.Delete')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/backEnd/partials/delete_modal.blade.php ENDPATH**/ ?>