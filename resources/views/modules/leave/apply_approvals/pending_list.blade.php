@extends('backEnd.master')
@section('mainContent')
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px">{{ __('leave.Pending Leave') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="apply_leave_list">
                                <table class="table Crm_table_active3">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('common.ID') }}</th>
                                        <th scope="col">{{ __('leave.Type') }}</th>
                                        <th scope="col">{{ __('leave.Staff') }}</th>
                                        <th scope="col">{{ __('common.Email') }}</th>
                                        <th scope="col">{{ __('leave.From') }}</th>
                                        <th scope="col">{{ __('leave.To') }}</th>
                                        <th scope="col">{{ __('leave.Apply Date') }}</th>
                                        <th scope="col">{{ __('common.Status') }}</th>
                                        <th scope="col">{{ __('common.Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pending_leaves as $key => $apply_leave)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $apply_leave->leave_type->name }}</td>
                                            <td>{{ $apply_leave->user->name }}</td>
                                            <td>{{ $apply_leave->user->email }}</td>
                                            <td>{{ dateConvert($apply_leave->start_date) }}</td>
                                            <td>{{ dateConvert($apply_leave->end_date) }}</td>
                                            <td>{{ dateConvert($apply_leave->apply_date) }}</td>
                                            <td>
                                                @if ($apply_leave->status == 0)
                                                    <span class="badge_3">{{__('leave.Pending')}}</span>
                                                @elseif ($apply_leave->status == 1)
                                                    <span class="badge_1">{{__('leave.Approved')}}</span>
                                                @else
                                                    <span class="badge_4">{{__('leave.Cancelled')}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <input type="hidden" name="user_id" id="user_id"
                                                       value="{{ $apply_leave->user_id }}">
                                                <!-- shortby  -->
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenu2" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        {{ __('common.Select') }}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenu2">
                                                        @if (permissionCheck('apply_leave.view'))
                                                            <a href="#" class="dropdown-item"
                                                               onclick="edit_apply_leave_modal({{ $apply_leave->id }})">{{__('common.View')}}</a>
                                                        @endif
                                                        @if (permissionCheck('apply_leave.destroy'))
                                                            <a onclick="confirm_modal('{{route('apply_leave.destroy', $apply_leave->id)}}');"
                                                               class="dropdown-item">{{__('common.Delete')}}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- shortby  -->
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" class="approval_div" value="{{ request()->is('leave/pending') ? 1 : 0 }}">
    </section>
    <div class="edit_form">

    </div>
    @include('backEnd.partials.delete_modal')
@endsection
@push('scripts')
    <script type="text/javascript">
        function edit_apply_leave_modal(el) {
            let approval_div = $('.approval_div').val();
            var user_id = $('#user_id').val();
            $.post('{{ route('apply_leave.view') }}', {
                _token: '{{ csrf_token() }}',
                id: el,
                user_id: user_id
            }, function (data) {
                $('.edit_form').html(data);
                if (approval_div == 1)
                        $('.approval_area').show();
                    else
                        $('.approval_area').hide();
                $('#Apply_Leave_Edit').modal('show');
                $('select').niceSelect();
            });
        }

    </script>
@endpush
