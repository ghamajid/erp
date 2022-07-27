<div class="modal-dialog  modal-dialog-centered ">
    <div class="modal-content">
        <?php
            $form_id = 'team_add_form';
            if(isset($quick_add)){
            $form_id = 'quick_add_team';
            }
        ?>
        <?php echo Form::open(['url' => route('team.store'), 'method' => 'post', 'id' => $form_id, 'files' =>true ]); ?>

        <div class="modal-header">
            <h4 class="modal-title"><?php echo e(__('project::project.Create Your team')); ?></h4>
            <button type="button" class="close " data-dismiss="modal">
                <i class="ti-close "></i>
            </button>
        </div>

        <div class="modal-body">
            <div class="row">

                <?php if ($__env->exists('project::team.form.create-edit')) echo $__env->make('project::team.form.create-edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>


<script>
    _formValidation('<?php echo e($form_id); ?>', true, 'team_modal');

    $('#members').tagsinput({
        addOnBlur: false,
        trimValue: true,
        triggerChange: true
    });


    $(document).on('keyup', '.bootstrap-tagsinput>input', function () {

        var val = $(this).val()
        var url = "<?php echo e(route('get-user-suggestion')); ?>";

        if (val.length > 1) {
            $.ajax({
                type: 'GET',
                url: url,
                data: {value: val},
                success: function (data) {

                    if (data && data.data) {
                        data = data.data;
                        var res = ''
                        res += `<ul class="asign_dropdown_list" >`

                        for (let i = 0; i < data.length; i++) {

                            res += `<li>
                                <div class="single_asign_member d-flex" data-value="${data[i].email}">
                                    <div class="asign_avater"><img src="${data[i].avatar}" alt="${data[i].name}" /> </div>
                                    <div class="asign_title"><span>${data[i].name}</span></div>
                                    <div class="asign_subtitle"><span>${data[i].email}</span></div>
                                </div>
                                </li>`

                        }

                        res += `</ul>`;
                        $('#user-suggestion-list').html(res)
                    }

                },
                error: function (error) {
                    ajax_error(error)
                }
            })
        }
    })


    $(document).on('click', '.single_asign_member', function (e) {
        e.preventDefault();
        let email = $(this).data('value');
        $('#members').tagsinput('add', email);
        $(".bootstrap-tagsinput>input").val("").focus();
        $('#user-suggestion-list').html("");


    })


</script>

<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/project/team/create.blade.php ENDPATH**/ ?>