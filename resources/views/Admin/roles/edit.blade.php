@extends('Admin.master')
@section('css')
    <link href="/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
@endsection
@section('title-meta')
    <title>{{$role->name}}</title>
    <meta name="description" content="{{$role->label}}">
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
                                {{$role->name}}ویرایش نقش کاربری
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form kt-form--label-right" action="{{route('roles.update',['role'=>$role->id])}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PATCH')}}
                        @include('Admin.section.errors')
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>نام:</label>
                                    <input type="text" name="name" class="form-control" value="{{$role->name}}" placeholder="نام نقش را وارد کنید">
                                    <span class="form-text text-muted">نام نقش را وارد کنید</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>توضیحات:</label>
                                    <input type="text" name="label" class="form-control" value="{{$role->label}}" placeholder="توضیحات نقش را وارد کنید">
                                    <span class="form-text text-muted">توضیحات نقش را وارد کنید</span>
                                </div>


                            </div>
                            <div class="form-group row">
                                <div class=" col-lg-12 col-md-12 col-sm-12">
                                    <label>سطوح دسترسی</label>
                                    <select class="form-control kt-select2" id="kt_select2_3" name="permission_id[]" multiple="multiple">
                                        @foreach($permissions as $permission)
                                            <option value="{{$permission->id}}" {{in_array($permission->id , $role->permissions()->pluck('id')->toArray())? "selected":""}} >{{$permission->name}} - {{$permission->label}}</option>
                                        @endforeach
                                    </select>
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
