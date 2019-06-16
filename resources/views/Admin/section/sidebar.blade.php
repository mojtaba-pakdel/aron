<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item " aria-haspopup="true">
                <a href="/admin/panel" class="kt-menu__link ">
                    <i class="kt-menu__link-icon flaticon-home"></i>
                    <span class="kt-menu__link-text">داشبورد</span>
                </a>
            </li>
            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">محتوا</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            @can('add-article')
            <li class="kt-menu__item  " aria-haspopup="true">
                <a href="{{route('articles.create')}}" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon-web"></i>
                    <span class="kt-menu__link-text">افزودن</span>
                </a>
            </li>
            @endcan
            <li class="kt-menu__item  " aria-haspopup="true">
                <a href="{{route('articles.index')}}" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon-web"></i>
                    <span class="kt-menu__link-text">لیست مطالب</span>
                </a>
            </li>
            <li class="kt-menu__item  " aria-haspopup="true" >
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon-web"></i>
                    <span class="kt-menu__link-text">دسته بندی ها</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  " aria-haspopup="true">
                            <a href="{{route('categories.index')}}" class="kt-menu__link kt-menu__toggle">
                                <i class="kt-menu__link-icon flaticon-web"></i>
                                <span class="kt-menu__link-text">لیست دسته بندی ها</span>
                            </a>
                        </li>
                        <li class="kt-menu__item  " aria-haspopup="true">
                            <a href="{{route('categories.create')}}" class="kt-menu__link kt-menu__toggle">
                                <i class="kt-menu__link-icon flaticon-web"></i>
                                <span class="kt-menu__link-text">افزودن دسته بندی</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">مدیریت دوره ها</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="kt-menu__item  " aria-haspopup="true">
                <a href="{{route('courses.create')}}" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon-web"></i>
                    <span class="kt-menu__link-text">افزودن</span>
                </a>
            </li>
            <li class="kt-menu__item  " aria-haspopup="true">
                <a href="{{route('courses.index')}}" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon-web"></i>
                    <span class="kt-menu__link-text">لیست دوره ها</span>
                </a>
            </li>
            <li class="kt-menu__item  " aria-haspopup="true" >
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon-web"></i>
                    <span class="kt-menu__link-text">دسته بندی دوره ها</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  " aria-haspopup="true">
                            <a href="{{route('category_courses.index')}}" class="kt-menu__link kt-menu__toggle">
                                <i class="kt-menu__link-icon flaticon-web"></i>
                                <span class="kt-menu__link-text">لیست دسته بندی ها</span>
                            </a>
                        </li>
                        <li class="kt-menu__item  " aria-haspopup="true">
                            <a href="{{route('category_courses.create')}}" class="kt-menu__link kt-menu__toggle">
                                <i class="kt-menu__link-icon flaticon-web"></i>
                                <span class="kt-menu__link-text">افزودن دسته بندی</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  " aria-haspopup="true" >
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon-web"></i>
                    <span class="kt-menu__link-text">قسمت های دوره ها</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  " aria-haspopup="true">
                            <a href="{{route('episodes.index')}}" class="kt-menu__link kt-menu__toggle">
                                <i class="kt-menu__link-icon flaticon-web"></i>
                                <span class="kt-menu__link-text">لیست ویدئو ها</span>
                            </a>
                        </li>
                        <li class="kt-menu__item  " aria-haspopup="true">
                            <a href="{{route('episodes.create')}}" class="kt-menu__link kt-menu__toggle">
                                <i class="kt-menu__link-icon flaticon-web"></i>
                                <span class="kt-menu__link-text">افزودن ویدئو ی جدید</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
