<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Tìm kiếm</label>
            <input type="search" class="form-control" name="\search"
                placeholder="Nhập tên sản phẩm ..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active">
                    <a href="/" class="">Trang chủ</a>
                </li>
                {!! \App\Helpers\Menu::menus($menus) !!}
            </ul>
        </nav><!-- End .mobile-nav -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

<!-- Plugins JS File -->
<script src="/template/client/js/jquery.min.js"></script>
<script src="/template/client/js/bootstrap.bundle.min.js"></script>
<script src="/template/client/js/jquery.hoverIntent.min.js"></script>
<script src="/template/client/js/jquery.waypoints.min.js"></script>
<script src="/template/client/js/superfish.min.js"></script>
<script src="/template/client/js/owl.carousel.min.js"></script>
<script src="/template/client/js/bootstrap-input-spinner.js"></script>
<script src="/template/client/js/jquery.plugin.min.js"></script>
<script src="/template/client/js/jquery.magnific-popup.min.js"></script>
<script src="/template/client/js/jquery.countdown.min.js"></script>
<!-- Main JS File -->
<script src="/template/client/js/main.js"></script>
<script src="/template/client/js/demos/demo-10.js"></script>
@yield('footer')
