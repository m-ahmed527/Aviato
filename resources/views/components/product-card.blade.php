@props([
    'img' => $img ?? '',
    'name',
    'price',
    'sale' => $sale ?? '',
    'link' => $link ?? '',
])


<div class="col-md-4">
    <a href="">
        <div class="product-item">
            <div class="product-thumb">
                <span class="bage">{{ $sale }}</span>

                <img class="img-responsive" src="{{ asset($img) }}" alt="product-img" />

                <div class="preview-meta">
                    <ul>
                        <li>
                            <span data-toggle="modal" data-target="#product-modal">
                                <i class="tf-ion-ios-search-strong"></i>
                            </span>
                        </li>
                        <li>
                            <a href="#!"><i class="tf-ion-ios-heart"></i></a>
                        </li>
                        <li>
                            <a href="#!"><i class="tf-ion-android-cart"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="product-content">
                <h4><a href="{{ $link }}">{{ $name }}</a></h4>
                <p class="price">${{ $price }}</p>
            </div>
        </div>
    </a>
</div>
