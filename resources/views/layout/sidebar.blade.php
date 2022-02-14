<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{ asset('assets') }}/img/wall.png">
    <!--
Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
Tip 2: you can also add an image using data-image tag
Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <i class="material-icons">bookmark_border</i>
        </a>
        <a href="#" class="simple-text logo-normal">
            QUẢN LÝ SÁCH
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="https://cdn.iconscout.com/icon/free/png-512/code-280-460136.png" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        @if (Session::exists('name'))
                                    {{ Session::get('name') }}
                                    @else 
                                    {{ Session::get('name1') }}
                                @endif
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('show') }}">
                                <span class="sidebar-mini"> <i class="material-icons">manage_accounts</i> </span>
                                <span class="sidebar-normal"> THÔNG TIN CỦA TÔI </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="active">
                <a href="{{ route('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            @if (Session::exists("id"))
            <li class="{{ Request::is('admin') ? 'active' : '' }}">
                <a href=" {{ route('admin.index') }}">
                    <i class="material-icons">admin_panel_settings</i>
                    <p> Quản lý giáo vụ </p>
                    
                </a> 
                
            </li>
            @endif
            <li class="{{ Request::is('grade') ? 'active' : '' }}">
                <a href=" {{ route('grade.index') }}">
                    <i class="material-icons">class</i>
                    <p> Quản lý lớp học </p>
                </a>
            </li>
            <li class="{{ Request::is('student') ? 'active' : '' }}">
                <a href=" {{ route('student.index') }}">
                    <i class="material-icons">school</i>
                    <p> Quản lý sinh viên </p>
                </a>
            </li>
            <li class="{{ Request::is('course') ? 'active' : '' }}">
                <a href="{{ route('course.index') }}">
                    <i class="material-icons">hotel_class</i>
                    <p> Quản lý niên khóa </p>
                </a>
            </li>
            <li class="{{ Request::is('subject') ? 'active' : '' }}">
                <a href="{{ route('subject.index') }}">
                    <i class="material-icons">subject</i>
                    <p> Quản lý môn học </p>
                </a>
            </li>
            <li class="{{ Request::is('book') ? 'active' : '' }}">
                <a href="{{ route('book.index') }}">
                    <i class="material-icons">import_contacts</i>
                    <p> Quản lý sách </p>
                </a>
            </li>           
            <li class="">
                <a href="{{ route('register') }}">
                    <i class="material-icons">app_registration</i>
                    <p> Thông tin SV đăng ký </p>
                </a>
            </li>
            <li class="{{ Request::is('register') ? 'active' : '' }}">
                <a href="{{ route('register.index') }}">
                    <i class="material-icons">summarize</i>
                    <p> Quản lý đăng ký sách </p>
                </a>
            </li>
            <li class="{{ Request::is('bill') ? 'active' : '' }}">
                <a href="{{ route('bill.index') }}">
                    <i class="material-icons">date_range</i>
                    <p> Quản lý phiếu thu </p>
                </a>
            </li>
        </ul>
    </div>
</div>