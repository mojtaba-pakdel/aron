@extends('Admin.master')
@section('css')
    <link href="/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
@endsection
@section('title-meta')
    <title>ایجاد دوره</title>
    <meta name="description" content="ایجاد مقاله">
@endsection
@section('content')
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">
            <div class="col-lg-12">

                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                               ایجاد دوره آموزشی
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form kt-form--label-right" action="{{route('courses.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Admin.section.errors')
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>عنوان:</label>
                                    <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="عنوان مقاله را وارد کنید ">
                                    <span class="form-text text-muted">عنوان دوره را وارد کنید</span>
                                </div>
                                <div class=" col-lg-3 col-md-3 col-sm-12">
                                    <label >نوع دوره</label>
                                    <select class="form-control kt-select2" id="kt_select2_3" name="type">
                                            <option value="vip" >اعضای ویژه</option>
                                            <option value="cash" >نقدی</option>
                                            <option value="free" selected >رایگان</option>
                                    </select>
                                </div>
                                <div class=" col-lg-3 col-md-3 col-sm-12">
                                    <label >دسته بندی</label>
                                    <select class="form-control kt-select2" id="kt_select2_3" name="category[]" multiple="multiple">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" >{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label> متن کامل:</label>
                                    <div class="kt-input-icon">
                                        <textarea name="body" class="cke form-control" placeholder="متن کامل">{{old('body')}}</textarea>
                                    </div>
                                    <span class="form-text text-muted"> متن کامل</span>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>برچسب ها:</label>
                                    <input type="text" name="tags" class="form-control" placeholder="تگ ها را وارد کنید" value="{{old('tags')}}">
                                    <span class="form-text text-muted">در سایت جستجوبر اساس این تگها انجام میشود</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>قیمت:</label>
                                    <input type="text" name="price" class="form-control" placeholder="قیمت را وارد کنید" value="{{old('price')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>عکس:</label>
                                    <input type="file" name="images" class="form-control" placeholder="تگ ها را وارد کنید">
                                    <span class="form-text text-muted">یک عکس انتخاب کنید</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>کلمات کلیدی:</label>
                                    <input type="text" name="meta_keywords" class="form-control" placeholder="کلمات کلیدی را وارد کنید" value="{{old('meta_keywords')}}">
                                    <span class="form-text text-muted">مفید برای موتور های جستجو و سئو</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>توضیحات متا:</label>
                                    <input type="text" name="meta_description" class="form-control" placeholder="توضیحات متا را وارد کنید " value="{{old('meta_description')}}">
                                    <span class="form-text text-muted">مفید برای موتور های جستجوو سئو</span>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <label> وضعیت:</label>
                                    <input name="status" data-switch="true" type="checkbox" checked="checked" data-on-text="فعال" data-handle-width="50" data-off-text="غیر فعال" data-on-color="success">
                                </div>
                            </div>

                        </div>

                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary">ارسال</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>

                <!--end::Portlet-->


            </div>
        </div>
    </div>

    <!-- end:: Content -->
@endsection
@section('page-script')
    <script src="/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
    <script src="/vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
    <script src="/js/demo1/pages/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>
    <script src="/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
    <script src="/js/demo1/pages/crud/forms/widgets/select2.js" type="text/javascript"></script>
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body' , {
            filebrowserUploadMethod : 'form',
            filebrowserUploadUrl : '/admin/panel/upload-image',
            filebrowserImageUploadUrl : '/admin/panel/upload-image'
        })
    </script>
@endsection
