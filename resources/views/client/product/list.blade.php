<div class="products" id="test">
    <div class="row" id="late">
        @if($products->total()!=0)
            {!! \App\Helpers\Product::show_product_menu($products) !!}
            @if($products->hasPages())
                <div class="col-md-12 mt-4">
                    <ul class="pagination">
                        @if(isset($_GET['products']))
                            <li class="paginate_button page-item {{($products->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link"
                                   href="?sort={{$_GET['products']}}&page={{$products->currentPage()-1}}">Sau</a>
                            </li>
                        @elseif(isset($_GET['sort']))
                            <li class="paginate_button page-item {{($products->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link"
                                   href="?sort={{$_GET['sort']}}&page={{$products->currentPage()-1}}">Sau</a>
                            </li>
                        @else
                            <li class="paginate_button page-item {{($products->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $products->url(1) }}">Sau</a>
                            </li>
                        @endif
                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                            @if(isset($_GET['products']))
                                <li class="paginate_button page-item {{($products->currentPage() == $i) ? ' active' : '' }}">
                                    <a class="page-link"
                                       href="{{ '?products='.$_GET['products'].'&page='.$i }}">{{ $i }}</a>
                                </li>
                            @elseif(isset($_GET['sort']))
                                <li class="paginate_button page-item {{($products->currentPage() == $i) ? ' active' : '' }}">
                                    <a class="page-link"
                                       href="{{ '?sort='.$_GET['sort'].'&page='.$i }}">{{ $i }}</a>
                                </li>
                            @else
                                <li class="paginate_button page-item {{($products->currentPage() == $i) ? ' active' : '' }}">
                                    <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                </li>
                            @endif
                        @endfor
                        @if(isset($_GET['products']))
                            <li class="paginate_button page-item {{($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link"
                                   href="?sort={{$_GET['products']}}&page={{$products->currentPage()+1}}">Sau</a>
                            </li>
                        @elseif(isset($_GET['sort']))
                            <li class="paginate_button page-item {{($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link"
                                   href="?sort={{$_GET['sort']}}&page={{$products->currentPage()+1}}">Sau</a>
                            </li>
                        @else
                            <li class="paginate_button page-item {{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link"
                                   href="{{ $products->url($products->currentPage()+1) }}">Trước</a>
                            </li>
                        @endif

                    </ul>
                </div>
            @else

            @endif
        @else
            <h4>Không có sản phẩm</h4>
        @endif

    </div><!-- End .row -->

    <div class="load-more-container text-center">
{{--        <a href="#" class="btn btn-outline-darker btn-load-more">More Products <i class="icon-refresh"></i></a>--}}
    </div><!-- End .load-more-container -->
</div><!-- End .products -->
