<div class="header-top">
    <div class="container">
        <div class="header-left">
            <div class="header-dropdown">
                <a href="#">VNĐ</a>
                <div class="header-menu">
                    <ul>
                        <li><a href="#">VNĐ</a></li>
                        <li><a href="#">USD</a></li>
                    </ul>
                </div><!-- End .header-menu -->
            </div><!-- End .header-dropdown -->

            <div class="header-dropdown">
                <a href="#">Vi</a>
                <div class="header-menu">
                    <ul>
                        <li><a href="#">Tiếng Việt</a></li>
                        <li><a href="#">English</a></li>
                    </ul>
                </div><!-- End .header-menu -->
            </div><!-- End .header-dropdown -->
        </div><!-- End .header-left -->

        <div class="header-right">

            <ul class="top-menu">
                <li>
                    <a href="#">Links</a>
                    <ul>
                        <li><a href="tel:#"><i class="icon-phone"></i> +0123 456 789</a></li>
                    </ul>
                </li>
            </ul><!-- End .top-menu -->

            @if (Session::has('email_client'))
                <div class="header-dropdown">
                    <a href="#">{{ Session::get('firstname_client') . ' ' . Session::get('lastname_client') }}</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">Thông tin chi tiết</a></li>
                            <li><a href="/logout">Đăng Xuất</a></li>
                        </ul>
                    </div>
                </div>
            @else
                <li><a href="/register.html"><i class="icon-user"></i>Đăng Kí</a></li>
                <li><a href="/login.html"><i class="icon-user"></i>Đăng Nhập</a></li>
            @endif
        </div><!-- End .header-right -->
    </div><!-- End .container -->
</div><!-- End .header-top -->

@section('footer')
<style>
    .header-menu ul{
        min-width: 0px !important;
    }
</style>
@endsection
