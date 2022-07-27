
@if (Illuminate\Support\Facades\Cache::get('language')->rtl == 1)
    <link rel="stylesheet" href="{{asset('backEnd/css/rtl/bootstrap.min.css')}}"/>
@else
    <link rel="stylesheet" href="{{asset('backEnd/vendors/css/bootstrap.min.css')}}"/>
@endif

<style>
    :root {
    @foreach($color_theme->colors as $color)
        --{{ $color->name}}: {{ $color->pivot->value }};
    @endforeach
    }
</style>

<link rel="stylesheet" href="{{asset('backEnd/vendors/css/jquery-ui.css')}}"/>

<link rel="stylesheet" href="{{asset('backEnd/vendors/css/jquery.data-tables.css')}}">
<link rel="stylesheet" href="{{asset('backEnd/vendors/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('backEnd/vendors/css/rowReorder.dataTables.min.css/')}}">
<link rel="stylesheet" href="{{asset('backEnd/vendors/css/responsive.dataTables.min.css')}}">

<link rel="stylesheet" href="{{asset('backEnd/vendors/css/bootstrap-datepicker.min.css')}}"/>
<link rel="stylesheet" href="{{asset('backEnd/vendors/css/bootstrap-datetimepicker.min.css')}}"/>
<link rel="stylesheet" href="{{asset('backEnd/vendors/css/daterangepicker.css')}}">


<link rel="stylesheet" href="{{asset('backEnd/vendors/css/themify-icons.css')}}"/>
<link rel="stylesheet" href="{{asset('backEnd/vendors/css/flaticon.css')}}"/>
<link rel="stylesheet" href="{{asset('backEnd/vendors/css/font-awesome.min.css')}}"/>
<link rel="stylesheet" href="{{asset('frontend/vendors/font_awesome/css/all.min.css')}}" />

<link rel="stylesheet" href="{{asset('frontend/vendors/text_editor/summernote-bs4.css')}}" />

<link rel="stylesheet" href="{{asset('backEnd/vendors/css/magnific-popup.css')}}"/>

<link rel="stylesheet" href="{{asset('backEnd/vendors/css/toastr.min.css')}}"/>

<link rel="stylesheet" href="{{asset('backEnd/vendors/css/fastselect.min.css')}}"/>
<link rel="stylesheet" href="{{asset('backEnd/vendors/js/select2/select2.css')}}"/>


<link rel="stylesheet" href="{{asset('backEnd/vendors/css/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/vendors/calender_js/core/main.css')}}">
<link rel="stylesheet" href="{{asset('frontend/vendors/calender_js/daygrid/main.css')}}">
<link rel="stylesheet" href="{{asset('frontend/vendors/calender_js/timegrid/main.css')}}">
<link rel="stylesheet" href="{{asset('frontend/vendors/calender_js/list/main.css/')}}">

  <link rel="stylesheet" href="{{ asset('css/parsley.css') }}" />
<!-- color picker  -->
<link rel="stylesheet" href="{{asset('frontend/vendors/color_picker/colorpicker.min.css/')}}">


<!-- metis menu  -->
<link rel="stylesheet" href="{{asset('frontend/css/metisMenu.css')}}">

@stack('styles')


@if(Illuminate\Support\Facades\Cache::get('language')->rtl == 1)
    <link rel="stylesheet" href="{{asset('backEnd/css/rtl/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('backEnd/css/rtl/infix.css')}}"/>
@else
    <link rel="stylesheet" href="{{asset('backEnd/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('backEnd/css/infix.css')}}"/>
@endif

<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" />
<link rel="stylesheet" href="{{asset('backEnd/vendors/css/nice-select.css')}}"/>

@if($setting->default_view == 'compact')
    <link rel="stylesheet" href="{{asset('frontend/css/themes/default_compact.css')}}" />
@endif

<link rel="stylesheet" href="{{asset('css/app.css')}}" />


@stack('css')
