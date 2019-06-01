@extends('Admin.master')
@section('css')
    <link href="/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
@endsection
@section('title-meta')
    <title>{{$episode->title}}</title>
    <meta name="description" content="{{$episode->meta_description}}">
    <meta name="keywords" content="{{$episode->meta_keywords}}">
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
                                {{$episode->title}}ویرایش ویدئوی
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form kt-form--label-right" action="{{route('episodes.update',['episode'=>$episode->slug])}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PATCH')}}
                        @include('Admin.section.errors')
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>عنوان:</label>
                                    <input type="text" name="title" class="form-control" value="{{$episode->title}}" placeholder="عنوان مقاله را وارد کنید ">
                                    <span class="form-text text-muted">عنوان دوره را وارد کنید</span>
                                </div>
                                <div class=" col-lg-3 col-md-3 col-sm-12">
                                    <label >نوع دوره</label>
                                    <select class="form-control kt-select2" id="kt_select2_3" name="type">
                                        <option value="vip" {{$episode->type == "vip" ? "selected" :""}}>اعضای ویژه</option>
                                        <option value="cash" {{$episode->type == "cash" ? "selected" :""}} >نقدی</option>
                                        <option value="free" {{$episode->type == "free" ? "selected" :""}} >رایگان</option>
                                    </select>
                                </div>
                                <div class=" col-lg-3 col-md-3 col-sm-12">
                                    <label>دسته بندی</label>
                                    <select class="form-control kt-select2" id="kt_select2_3" name="course_id" multiple="multiple">
                                        @foreach($courses as $course)
                                            <option value="{{$course->id}}" {{in_array($course->id , $episode->course()->pluck('id')->toArray())? "selected":""}} >{{$course->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label> متن کامل:</label>
                                    <div class="kt-input-icon">
                                        <textarea name="body" class="form-control" placeholder="متن کامل">{{$episode->body}}</textarea>
                                    </div>
                                    <span class="form-text text-muted"> متن کامل</span>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>برچسب ها:</label>
                                    <input type="text" name="tags" class="form-control" placeholder="تگ ها را وارد کنید" value="{{$episode->tags}}">
                                    <span class="form-text text-muted">در سایت جستجوبر اساس این تگها انجام میشود</span>
                                </div>
                                <div class="col-lg-3">
                                    <label>شماره قسمت:</label>
                                    <input type="text" name="number" class="form-control" placeholder="شماره قسمت رابه عدد وارد کنید" value="{{$episode->number}}">
                                </div>
                                <div class="col-lg-3">
                                    <label>زمان:</label>
                                    <input type="text" name="time" class="form-control" placeholder="زمان ویدئو را وارد کنید12:00" value="{{$episode->time}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                @foreach($episode->images['images'] as $key => $image)
                                    <div class="col-lg-3 col-md-3">
                                        <label>
                                            {{$key}}
                                            <input type="radio" name="imagesThumb" value="{{$image}}" {{$episode->images['thumb'] == $image? "checked":""}}  />
                                            <a href="{{$image}}">
                                                <img src="{{$image}}" class="img-thumbnail" alt="">
                                            </a>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>عکس:</label>
                                    <input type="file" name="images" class="form-control" >
                                    <span class="form-text text-muted">یک عکس انتخاب کنید</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>ویدئو:</label>
                                    <input type="file" name="videoUrl" class="form-control" >
                                    <span class="form-text text-muted">یک ویدئو انتخاب کنید</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>کلمات کلیدی:</label>
                                    <input type="text" name="meta_keywords" class="form-control" placeholder="کلمات کلیدی را وارد کنید" value="{{$episode->meta_keywords}}">
                                    <span class="form-text text-muted">مفید برای موتور های جستجو و سئو</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>توضیحات متا:</label>
                                    <input type="text" name="meta_description" class="form-control" placeholder="توضیحات متا را وارد کنید " value="{{$episode->meta_description}}">
                                    <span class="form-text text-muted">مفید برای موتور های جستجوو سئو</span>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <label> وضعیت:</label>
                                    <input name="status" data-switch="true" type="checkbox" {{($episode->status == 1) ?  "checked=\"checked\"" : "" }} data-on-text="فعال" data-handle-width="50" data-off-text="غیر فعال" data-on-color="success">
                                </div>
                            </div>

                        </div>

                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary">ویرایش</button>
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
