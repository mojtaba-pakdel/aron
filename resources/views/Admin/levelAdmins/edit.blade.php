@extends('Admin.master')
@section('css')
    <link href="/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
@endsection
@section('title-meta')
    <title>ویرایش مقام</title>
    <meta name="description" content="ویرایش مقام">
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
                      ویرایش مقام -{{$user->name}}
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form kt-form--label-right" action="{{route('level.update', ['id'=>$user->id])}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @include('Admin.section.errors')
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class=" col-lg-12 col-md-12 col-sm-12">
                                    <label >نقش ها</label>
                                    <select class="form-control kt-select2" id="kt_select2_3" name="role_id">
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}"  {{ $user->hasRole($role->name) ? "selected" : ""}}>{{$role->name}} - {{$role->label}}</option>
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
