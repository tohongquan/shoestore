<div class="intro-slider-container slider-container-ratio mb-2">
    <div class="intro-slider owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl"
        data-owl-options='{"nav": false}'>
        @foreach ($sliders as $slider)
            <div class="intro-slide">
                <figure class="slide-image">
                    <picture>
                        <source media="(max-width: 480px)" srcset="{{ $slider->thumb }}">
                        <img src="{{ $slider->thumb }}" style="max-height: 900px;max-width: 100%;" alt="{{ $slider->name }}">
                    </picture>
                </figure><!-- End .slide-image -->

                <div class="intro-content">
                    <h3 class="intro-subtitle">{!! $slider->description !!}</h3><!-- End .h3 intro-subtitle -->
                    <h1 class="intro-title text-white">{{ $slider->name }}</h1><!-- End .intro-title -->

                    {{-- <div class="intro-price text-white">from $9.99</div><!-- End .intro-price --> --}}
                    <br><br>
                    <a href="{{ $slider->link }}" class="btn btn-white-primary btn-round">
                        <span>Mua ngay</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
        @endforeach
    </div><!-- End .intro-slider owl-carousel owl-simple -->
    <span class="slider-loader"></span><!-- End .slider-loader -->
</div><!-- End .intro-slider-container -->
