<div class="modal fade admin-query" id="Apply_Leave_Edit">
    <div class="modal-dialog modal_800px modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('leave.Edit Apply Leave') }}</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="ti-close "></i>
                </button>
            </div>

            <div class="modal-body">
                <form action="" id="applyLeaveEditForm" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="user" value="{{ $apply_leave->user_id }}">
                        <input type="hidden" name="id" value="{{ $apply_leave->id }}" class="edit_id">
                        <div class="col-xl-4">
                            <div class="primary_input mb-15">
                                <label class="primary_input_label" for="">{{ __('leave.Apply Date') }}</label>
                                <div class="primary_datepicker_input">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="">
                                                <input placeholder="{{ __('common.Date') }}" class="primary_input_field primary-input date form-control" id="apply_date" type="text" name="apply_date" value="{{ date('m/d/Y', strtotime($apply_leave->apply_date)) }}" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="start-date-icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="">{{ __('leave.Leave Type') }}</label>
                                <select class="primary_select mb-25" name="leave_type_id" id="leave_type_id" required>
                                    @foreach ($types as $leave_type)
                                        <option value="{{ $leave_type->id }}" @if ($apply_leave->leave_type_id == $leave_type->id) selected @endif>{{ $leave_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="edit_leave_day">{{ __('leave.Day') }} *</label>
                                <select  class="primary_select day mb-25" name="day"
                                         id="edit_leave_day">
                                    <option value="0" {{$apply_leave->day == 0 ? 'selected' : '' }}>{{ __('leave.Half Day') }}</option>
                                    <option value="1" {{$apply_leave->day == 1 ? 'selected' : ''}}>{{ __('leave.Single Day') }}</option>
                                    <option value="2" {{$apply_leave->day == 2 ? 'selected' : ''}}>{{ __('leave.Multiple Day') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="primary_input mb-15">
                                <label class="primary_input_label leave_date" @if($apply_leave->day == 2) style="display: none" @endif>{{ __('leave.Leave Date') }} *</label>
                                <label class="primary_input_label leave_from"
                                       @if($apply_leave->day != 2) style="display: none" @endif>{{ __('leave.Leave From') }} * </label>
                                <div class="primary_datepicker_input">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="">
                                                <input placeholder="{{ __('common.Date') }}" class="primary_input_field primary-input date form-control" id="start_date" type="text" name="start_date" value="{{ date('m/d/Y', strtotime($apply_leave->start_date)) }}" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="start-date-icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <ul id="half_day_checkbox" class="permission_list sms_list edit_half_day_checkbox">
                                <li class="mr-0 pr-2 edit_half" >
                                    <label data-id="color_option"
                                           class="primary_checkbox d-flex mr-12">
                                        <input name="half" {{$apply_leave->leave_from == 1 || $apply_leave->leave_from == 2 ? 'checked' : ''}} value="1" class="de_active half_day_from" type="checkbox" id="edit_start_date_half_day">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>{{ __('leave.Half Day') }}</p>
                                </li>
                                <li class="mr-0 pr-2 edit_start_date_half_day_option" >
                                    <label data-id="bg_option"
                                           class="primary_checkbox d-flex mr-12">
                                        <input name="from_day" id="status_to" {{$apply_leave->leave_from == 1 ? 'checked' : ''}} value="1" class="active"
                                               type="radio">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>{{ __('leave.First Half') }}</p>
                                </li>
                                <li class="mr-0 pr-2 edit_start_date_half_day_option"  >
                                    <label data-id="color_option"
                                           class="primary_checkbox d-flex mr-12">
                                        <input name="from_day" value="2" {{$apply_leave->leave_from == 2 ? 'checked' : ''}} id="" class="de_active"
                                               type="radio">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>{{ __('leave.Second Half') }}</p>
                                </li>
                            </ul>
                        </div>

                        <div class="col-xl-6 edit_leave_to">
                            <div class="primary_input mb-15">
                                <label class="primary_input_label" for="">{{ __('leave.Leave To') }}</label>
                                <div class="primary_datepicker_input">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="">
                                                <input placeholder="{{ __('common.Date') }}" class="primary_input_field primary-input date form-control" id="end_date" type="text" name="end_date" value="{{ date('m/d/Y', strtotime($apply_leave->end_date)) }}" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="start-date-icon"></i>
                                        </button>
                                        <span class="text-danger" id="end_date_error"></span>
                                    </div>
                                </div>
                            </div>
                            <ul id="end_date_half_day_checkbox" class="permission_list sms_list">
                                <li class="mr-0 pr-2 " >
                                    <label data-id="color_option"
                                           class="primary_checkbox d-flex mr-12">
                                        <input name="half_to" {{$apply_leave->leave_to == 1 || $apply_leave->leave_to == 2 ? 'checked' : ''}} value="1" class="de_active half_day_to"
                                               type="checkbox" id="edit_end_date_half_day">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>{{ __('leave.Half Day') }}</p>
                                </li>
                                <li class="mr-0 pr-2 edit_end_date_half_option">
                                    <label data-id="bg_option"
                                           class="primary_checkbox d-flex mr-12">
                                        <input name="to_day" id="status_to" {{$apply_leave->leave_to == 1  ? 'checked' : ''}} value="1" class="active"
                                               type="radio">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>{{ __('leave.First Half') }}</p>
                                </li>
                                <li class="mr-0 pr-2 edit_end_date_half_option">
                                    <label data-id="color_option"
                                           class="primary_checkbox d-flex mr-12">
                                        <input name="to_day" value="2" {{$apply_leave->leave_to == 2  ? 'checked' : ''}}  class="de_active"
                                               type="radio">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>{{ __('leave.Second Half') }}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-2 mt-30 makeup_option" id="edit_make_up_option_column">
                            <ul id="make_up_leave_checkbox" class="permission_list sms_list " >
                                <li class="mr-0 pr-2 " >
                                    <label data-id="color_option"
                                           class="primary_checkbox d-flex mr-12">
                                        <input name="makeup_leave" {{$apply_leave->makeup_leave == 1  ? 'checked' : ''}} id="edit_makeup_leave" value="1" class="de_active"
                                               type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>{{ __('leave.Make Up Leave') }}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-4" id="edit_make_up_option">
                            <div class="primary_input mb-15">
                                <label class="primary_input_label">{{ __('leave.Make Up Leave Date') }} *</label>
                                <div class="primary_datepicker_input">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="">
                                                <input placeholder="{{ __('common.Date') }}"
                                                       class="primary_input_field primary-input form-control"
                                                       type="text" name="makeup_date"
                                                       value="{{date('m/d/Y')}}"
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="start-date-icon"></i>
                                        </button>
                                        <span class="text-danger" id="end_date_error"></span>
                                    </div>
                                </div>
                            </div>
                            <ul id="make_up_half_day_checkbox" class="permission_list sms_list edit_half_day_checkbox">
                                <li class="mr-0 pr-2 edit_makeup_half" @if($apply_leave->day == 1) style="display: none" @endif>
                                    <label data-id="bg_option"
                                           class="primary_checkbox d-flex mr-12">
                                        <input name="makeup_half" id="status_makeup" {{$apply_leave->makeup_half == 1 ? 'checked' : ''}} value="1" class="active"
                                               type="radio">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>{{ __('leave.First Half') }}</p>
                                </li>
                                <li class="mr-0 pr-2 edit_makeup_half" @if($apply_leave->day == 1) style="display: none" @endif>
                                    <label data-id="color_option"
                                           class="primary_checkbox d-flex mr-12">
                                        <input name="makeup_half" value="2" id="to_makeup_inactive" {{$apply_leave->makeup_half == 2 ? 'checked' : ''}} class="de_active"
                                               type="radio">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>{{ __('leave.Second Half') }}</p>
                                </li>
                            </ul>
                        </div>

                        <div class="col-xl-6">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="">{{ __('leave.Reason') }}</label>
                                <input name="reason" class="primary_input_field name" placeholder="{{ __('leave.Reason') }}" type="text" value="{{ $apply_leave->reason }}" required>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="">{{ __('leave.Attachment') }} </label>
                                <div class="primary_file_uploader">
                                    <input class="primary-input" type="text" id="placeholderFileOneName" placeholder="{{ __('common.Browse File') }}" readonly="">
                                    <button class="" type="button">
                                        <label class="primary-btn small fix-gr-bg"
                                               for="document_file_1">{{__("common.Browse")}} </label>
                                        <input type="file" class="d-none" name="file" id="document_file_1">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="d-flex justify-content-center pt_20">
                                <button type="submit" class="primary-btn semi_large2  fix-gr-bg"
                                        id="save_button_parent"><i
                                        class="ti-check"></i>{{ __('common.Update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


