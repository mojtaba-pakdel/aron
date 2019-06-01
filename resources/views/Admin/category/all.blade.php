@extends('Admin.master')
@section('css')
    <link href="/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/vendors/general/sweetalert2/dist/sweetalert2.rtl.css" rel="stylesheet" type="text/css" />
@endsection
@section('title-meta')
    <title>آرشیو دسته بندی ها</title>
    <meta name="description" content="آرشیو دسته بندی های پنل مدیریت">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        آرشیو دسته بندی ها
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">&nbsp;
                            <a href="{{route('categories.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                ایجاد دسته بندی جدید
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
                        <th>ردیف</th>
                        <th>عنوان </th>
                        <th>والد</th>
                        <th>مقدار بازدید</th>
                        <th>نویسنده</th>
                        <th>تاریخ انتشار</th>
                        <th>وضعیت</th>
                        <th>تنظیمات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr class="row_{{$category->id}}">
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td></td>
                        <td>{{$category->viewCount}}</td>
                        <td>----</td>
                        <td>{{verta($category->created_at)}}</td>
                        <td>{!! $category->status == 1 ? "<span class=\"btn\">انتشار</span>":"<span class=\"btn\">عدم انتشار</span>" !!}</td>
                        <td>
                            <a href="{{route('categories.edit',['category'=>$category->slug])}}"  class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                                <i class="la la-edit"></i>
                            </a>
                            <button type="button" data-model="categories" data-id="{{$category->slug}}" class="btn  btn-custom kt_sweetalert_demo_9">  <i class="fa fa-trash"></i></button>
                        </td>
                        <td></td>
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
