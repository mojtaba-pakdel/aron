@extends('Admin.master')
@section('css')
    <link href="/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
@endsection
@section('title-meta')
    <title>{{$article->title}}</title>
    <meta name="description" content="{{$article->meta_description}}">
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
                                {{$article->title}}ویرایش مقاله
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form kt-form--label-right" action="{{route('articles.update',['article'=>$article->slug])}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PATCH')}}
                        @include('Admin.section.errors')
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>عنوان:</label>
                                    <input type="text" name="title" class="form-control" value="{{$article->title}}" placeholder="عنوان مقاله را وارد کنید ">
                                    <span class="form-text text-muted">عنوان مقاله را وارد کنید</span>
                                </div>
                                <div class=" col-lg-6 col-md-6 col-sm-12">
                                    <label class="col-form-label col-lg-3 col-sm-12">دسته بندی</label>
                                    <select class="form-control kt-select2" id="kt_select2_3" name="category[]" multiple="multiple">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{in_array($category->id , $article->categories()->pluck('id')->toArray())? "selected":""}} >{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>خلاصه مطلب:</label>
                                    <div class="kt-input-icon">
                                        <textarea name="description" class="form-control" placeholder="خلاصه مطلب">{{$article->description}}</textarea>
                                    </div>
                                    <span class="form-text text-muted">خلاصه مطلب</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label> متن کامل:</label>
                                    <div class="kt-input-icon">
                                        <textarea name="body" class="form-control" placeholder="متن کامل">{{$article->body}}</textarea>
                                    </div>
                                    <span class="form-text text-muted"> متن کامل</span>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>برچسب ها:</label>
                                    <input type="text" name="tags" class="form-control" placeholder="تگ ها را وارد کنید" value="{{$article->tags}}">
                                    <span class="form-text text-muted">در سایت جستجوبر اساس این تگها انجام میشود</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>عکس:</label>
                                    <input type="file" name="images" class="form-control" placeholder="تگ ها را وارد کنید">
                                    <span class="form-text text-muted">یک عکس انتخاب کنید</span>
                                </div>

                            </div>
                            <div class="form-group row">
                                    @foreach($article->images['images'] as $key => $image)
                                        <div class="col-lg-3 col-md-3">
                                            <label>
                                                {{$key}}
                                                <input type="radio" name="imagesThumb" value="{{$image}}" {{$article->images['thumb'] == $image? "checked":""}}  />
                                                <a href="{{$image}}">
                                                    <img src="{{$image}}" class="img-thumbnail" alt="">
                                                </a>
                                            </label>
                                        </div>
                                    @endforeach
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>کلمات کلیدی:</label>
                                    <input type="text" name="meta_keywords" class="form-control" placeholder="کلمات کلیدی را وارد کنید" value="{{$article->meta_keywords}}">
                                    <span class="form-text text-muted">مفید برای موتور های جستجو و سئو</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>توضیحات متا:</label>
                                    <input type="text" name="meta_description" class="form-control" placeholder="توضیحات متا را وارد کنید " value="{{$article->meta_description}}">
                                    <span class="form-text text-muted">مفید برای موتور های جستجوو سئو</span>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <label> وضعیت:</label>
                                    <input name="status" data-switch="true" type="checkbox" {{($article->status == 1) ? "checked=\"checked\"" : "" }} data-on-text="فعال" data-handle-width="50" data-off-text="غیر فعال" data-on-color="success">
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
        });
    </script>

@endsection
