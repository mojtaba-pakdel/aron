@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <div class="alert-text">
            <h4 class="alert-heading">خطا!</h4>
            <p>حطاهای زیر را بررسی و رفع نمائید تا مطالب به درستی درج شوند. با تشکر</p>
            @foreach($errors->all() as $error)
                <p>{{$error}} <i class="flaticon-questions-circular-button"></i></p>
                <hr>
            @endforeach
        </div>
    </div>
@endif
