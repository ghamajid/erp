{{-- update modal --}}
<div class="modal fade admin-query" id="RenameAccount">
    <div class="modal-dialog modal_800px modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('account.Rename Account') }}</h4>
                <button type="button" class="close " data-dismiss="modal">
                    <i class="ti-close "></i>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('char_accounts.rename_account') }}" method="post">
                    @csrf
                    <div class="row">
                        <input type="text" class="account_id d-none" name="account_id">
                        <div class="col-xl-12">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label"
                                       for="">{{ __('common.Name') }}</label>
                                <input name="name" class="primary_input_field name" placeholder="{{ __('common.Name') }}" type="text" required>
                                <span class="text-danger" id="edit_name_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="d-flex justify-content-center pt_20">
                                <button type="submit" class="primary-btn semi_large2  fix-gr-bg"
                                        id="save_button_parent"><i class="ti-check"></i>{{ __('common.Update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
