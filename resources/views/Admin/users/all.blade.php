@extends('Admin.master')
@section('css')
    <link href="/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/vendors/general/sweetalert2/dist/sweetalert2.rtl.css" rel="stylesheet" type="text/css" />
@endsection
@section('title-meta')
    <title>لیست کاربران</title>
    <meta name="description" content="لیست کاربران سایت">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="alert alert-light alert-elevate" role="alert">
            <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
            <div class="alert-text">
                DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.
                <br>For more info see <a class="kt-link kt-font-bold" href="https://datatables.net/" target="_blank">the official home</a> of the plugin.
            </div>
        </div>
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                    <h3 class="kt-portlet__head-title">
                        لیست کاربران سایت
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="la la-download"></i> Export
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__section kt-nav__section--first">
                                            <span class="kt-nav__section-text">Choose an option</span>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-print"></i>
                                                <span class="kt-nav__link-text">Print</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-copy"></i>
                                                <span class="kt-nav__link-text">Copy</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                                <span class="kt-nav__link-text">Excel</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-text-o"></i>
                                                <span class="kt-nav__link-text">CSV</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                                <span class="kt-nav__link-text">PDF</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            &nbsp;
                            <a href="{{route('articles.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                افزودن کاربر جدید
                            </a>
                            <a href="{{route('roles.index')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                سطوح دسترسی
                            </a>
                            <a href="{{route('articles.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                کاربران مدیریت
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                    <tr>
                        <th>نام کاربر</th>
                        <th>ایمیل </th>
                        <th>وضعیت ایمیل</th>
                        <th>تاریخ عضویت</th>
                        <th>تنظیمات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr class="row_{{$user->id}}">
                        <td>{{$user->name}}</td>
                        <td><a href="#">{{$user->email}}</td>
                        <td>تائید نشده</td>
                        <td>{{verta($user->created_at)}}</td>
                       <td>
{{--                            <a href="{{route('courses.edit',['course'=>$course->slug])}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                                <i class="la la-edit"></i>
                            </a>--}}
                            <button type="button" data-model="users" data-id="{{$user->id}}" class="btn  btn-custom kt_sweetalert_demo_9">  <i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <!--begin::Page Vendors(used by this page) -->
    <script src="/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="/js/demo1/pages/crud/datatables/extensions/colreorder.js" type="text/javascript"></script>
    <script src="/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
    <script src="/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
    <script src="/js/custom.js" type="text/javascript"></script>
@endsection
