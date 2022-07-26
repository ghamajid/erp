<div class="modal fade admin-query" id="ApplyLoan">
    <div class="modal-dialog modal_800px modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('common.Apply For Loan') }}</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="ti-close "></i>
                </button>
            </div>

            <div class="modal-body">
                <form action="#" id="ApplyLoan_addForm">
                    <div class="row">
                        @if(Auth::user()->role->type == 'system_user')
                        <div class="col-xl-12">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="">{{ __('common.User') }} *</label>
                                <select class="primary_select mb-25 department_id" name="user" id="department_id" required>
                                    @foreach ($users as $key => $user)
                                        <option value="{{ $user->id }}" {{ $user->id == Auth::id() ? "selected" : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="user_id_error"></span>
                            </div>
                        </div>
                        @else
                        <input type="hidden" name="user" value="{{Auth::id()}}">
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="">{{ __('department.Department') }} *</label>
                                <select class="primary_select mb-25 department_id" name="department_id" id="department_id" required>
                                    @foreach (\Modules\Setup\Entities\Department::where('status', 1)->get() as $key => $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="department_id_error"></span>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="">{{ __('common.Type') }} *</label>
                                <select class="primary_select mb-25 loan_type" name="loan_type" id="loan_type" required>
                                    <option value="General">{{ __('common.General') }}</option>
                                    <option value="Emergency">{{ __('common.Emergency') }}</option>
                                </select>
                                <span class="text-danger" id="loan_type_error"></span>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="">{{ __('common.Title') }} *</label>
                                <input name="title" class="primary_input_field title" placeholder="{{ __('common.Title') }}" type="text" required>
                                <span class="text-danger" id="title_error"></span>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="primary_input mb-15">
                                <label class="primary_input_label" for="">{{ __('common.Loan Date') }}</label>
                                <div class="primary_datepicker_input">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="">
                                                <input placeholder="{{ __('common.Loan Date') }}" class="primary_input_field primary-input date form-control" id="loan_date" type="text" name="loan_date" value="" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="start-date-icon"></i>
                                        </button>
                                    </div>
                                    <span class="text-danger" id="loan_date_error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="">{{ __('common.Amount') }} *</label>
                                <input name="amount" id="amount" class="primary_input_field amount" placeholder="{{ __('common.Amount') }}" type="number" min="0" step="0.01" onkeyup="getMonthlyInstallment()" required>
                                <span class="text-danger" id="amount_error"></span>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="">{{ __('common.Total Month') }} *</label>
                                <input name="total_month" id="total_month" class="primary_input_field total_month" placeholder="{{ __('common.Total Month') }}" type="number" onkeyup="getMonthlyInstallment()" min="0" step="1" required>
                                <span class="text-danger" id="total_month_error"></span>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="">{{ __('common.Monthly Installment') }}</label>
                                <input name="monthly_installment" id="monthly_installment" class="primary_input_field monthly_installment" placeholder="00.00" type="number" min="0" step="0.01" readonly>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="">{{ __('common.Description') }} </label>
                                <textarea class="primary_textarea height_112" placeholder="{{ __('common.Description') }}" name="note" id="note" spellcheck="false"></textarea>
                                <span class="text-danger" id="note_error"></span>
                            </div>
                        </div>

                        <div class="col-lg-12 text-center">
                            <div class="d-flex justify-content-center pt_20">
                                <button type="submit" class="primary-btn semi_large2 fix-gr-bg" id="save_button_parent"><i class="ti-check"></i>{{ __('common.Save') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
