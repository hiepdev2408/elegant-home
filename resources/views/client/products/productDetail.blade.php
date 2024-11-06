@extends('client.layouts.master')
@section('title')
    Chi tiết
@endsection
@section('content')
    <main class="main__content_wrapper">
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content">
                            <h1 class="breadcrumb__content--title text-white mb-10">Product Details</h1>
                            <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a class="text-white"
                                        href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Product Details</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start product details section -->
        <section class="product__details--section section--padding">
            <div class="container">
                <div class="row row-cols-lg-2 row-cols-md-2">
                    <div class="col">
                        <div class="product__details--media">
                            <div class="product__media--preview  swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-wrapper">
                                        @foreach ($product->galleries as $gallery)
                                            <div class="swiper-slide">
                                                <div class="product__media--preview__items">
                                                    <a class="product__media--preview__items--link glightbox"
                                                        data-gallery="product-media-preview"
                                                        href="{{ Storage::url($product->img_thumbnail) }}"><img
                                                            class="product__media--preview__items--img"
                                                            src="{{ Storage::url($product->img_thumbnail) }}"
                                                            alt="product-media-img"></a>
                                                    <div class="product__media--view__icon">
                                                        <a class="product__media--view__icon--link glightbox"
                                                            href="{{ Storage::url($product->img_thumbnail) }}"
                                                            data-gallery="product-media-preview">
                                                            <svg class="product__media--view__icon--svg"
                                                                xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                                height="22.443" viewBox="0 0 512 512">
                                                                <path
                                                                    d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                    fill="none" stroke="currentColor"
                                                                    stroke-miterlimit="10" stroke-width="32"></path>
                                                                <path fill="none" stroke="currentColor"
                                                                    stroke-linecap="round" stroke-miterlimit="10"
                                                                    stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                            </svg>
                                                            <span class="visually-hidden">Media Gallery</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="product__media--nav swiper">
                                <div class="swiper-wrapper">
                                    @foreach ($product->galleries as $gallery)
                                        <div class="swiper-slide">
                                            <img src="{{ Storage::url($gallery->img_path) }}" alt=""
                                                class="gallery-image">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper__nav--btn swiper-button-next"></div>
                                <div class="swiper__nav--btn swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product__details--info">
                            <form action="#">
                                <h2 class="product__details--info__title mb-15">{{ $product->name }}</h2>
                                <div class="product__details--info__price mb-10">
                                    <span class="current__price">{{ number_format($product->price_sale ?? 0, 0, ',', '.') }}
                                        VNĐ</span>
                                    <span class="old__price">{{ number_format($product->base_price ?? 0, 0, ',', '.') }}
                                        VNĐ</span>
                                </div>
                                <div class="product__details--info__rating d-flex align-items-center mb-15">
                                    <ul class="rating product__list--rating d-flex">
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list"><span class="rating__list--text">( 5.0)</span></li>
                                    </ul>
                                </div>
                                <p class="product__details--info__desc mb-20">{!! $product->content !!}</p>
                                <div class="product__variant">
                                    @php
                                        // Khởi tạo để chứ dữ liệu của attribute->name và attribute_value->value
                                        // Mục dích ở đây là mình sẽ đưa dữ liệu của attibute->name là key
                                        // Và attribute_value sẽ đưa về dạng value
                                        $groupedAttributes = [];
                                    @endphp

                                    @foreach ($product->variants as $variant)
                                        @foreach ($variant->attributes as $attribute)
                                            @php
                                                // Nhóm các attribute dựa vào attribute->name
                                                $attributeName = $attribute->attribute->name;
                                                $attributeValue = $attribute->attributeValue->value;

                                                // Thực hiện kiểm tra xem dữ liệu của attribute đã tồn tại trong mảng khởi tạo hay chưa
                                                // Nếu chưa tồn tại sẽ được lưu vào giá trị key
                                                if (!isset($groupedAttributes[$attributeName])) {
                                                    $groupedAttributes[$attributeName] = [];
                                                }

                                                // Thực hiện kiểm tra attributeValue đã có trong attribute hay chưa
                                                // Nếu đã có gia trị tương tự thì loại bỏ giá trị đã tồn tại để tránh sự trùng lặp
                                                if (!in_array($attributeValue, $groupedAttributes[$attributeName])) {
                                                    $groupedAttributes[$attributeName][] = $attributeValue;
                                                }
                                            @endphp
                                        @endforeach
                                    @endforeach

                                    @foreach ($groupedAttributes as $attributeName => $values)
                                        <div class="product__variant--list mb-20">
                                            <fieldset class="variant__input--fieldset">
                                                <legend class="product__variant--title mb-8">{{ $attributeName }}</legend>
                                                <div class="variant__color d-flex">
                                                    @foreach ($values as $value)
                                                        <div class="variant__color--list">
                                                            <button>{{ $value }}</button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </fieldset>
                                        </div>
                                    @endforeach


                                    <div class="product__variant--list quantity d-flex align-items-center mb-20">
                                        <div class="quantity__box">
                                            <button type="button"
                                                class="quantity__value quickview__value--quantity decrease"
                                                aria-label="quantity value" value="Decrease Value">-</button>
                                            <label>
                                                <input type="number" class="quantity__number quickview__value--number"
                                                    value="1" />
                                            </label>
                                            <button type="button"
                                                class="quantity__value quickview__value--quantity increase"
                                                aria-label="quantity value" value="Increase Value">+</button>
                                        </div>
                                        <button class="quickview__cart--btn primary__btn" type="submit">Add To
                                            Cart</button>
                                    </div>
                                    <div class="product__variant--list mb-15">
                                        <a class="variant__wishlist--icon mb-15" href="wishlist.html"
                                            title="Add to wishlist">
                                            <svg class="quickview__variant--wishlist__svg"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path
                                                    d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="32" />
                                            </svg>
                                            Add to Wishlist
                                        </a>
                                        <button class="variant__buy--now__btn primary__btn" type="submit">Buy it
                                            now</button>
                                    </div>
                                    <div class="product__variant--list mb-15">
                                        <div class="product__details--info__meta">
                                            <p class="product__details--info__meta--list"><strong>SKU:</strong>
                                                <span>{{ $product->sku }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="quickview__social d-flex align-items-center mb-15">
                                    <label class="quickview__social--title">Social Share:</label>
                                    <ul class="quickview__social--wrapper mt-0 d-flex">
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank"
                                                href="https://www.facebook.com/">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524"
                                                    viewBox="0 0 7.667 16.524">
                                                    <path data-name="Path 237"
                                                        d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z"
                                                        transform="translate(-960.13 -345.407)" fill="currentColor" />
                                                </svg>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank"
                                                href="https://twitter.com/">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384"
                                                    viewBox="0 0 16.489 13.384">
                                                    <path data-name="Path 303"
                                                        d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z"
                                                        transform="translate(-951.23 -1140.849)" fill="currentColor" />
                                                </svg>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank"
                                                href="https://www.skype.com/">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.482" height="16.481"
                                                    viewBox="0 0 16.482 16.481">
                                                    <path data-name="Path 284"
                                                        d="M879,926.615a4.479,4.479,0,0,1,.622-2.317,4.666,4.666,0,0,1,1.676-1.677,4.482,4.482,0,0,1,2.317-.622,4.577,4.577,0,0,1,2.43.678,7.58,7.58,0,0,1,5.048.961,7.561,7.561,0,0,1,3.786,6.593,8,8,0,0,1-.094,1.206,4.676,4.676,0,0,1,.7,2.411,4.53,4.53,0,0,1-.622,2.326,4.62,4.62,0,0,1-1.686,1.686,4.626,4.626,0,0,1-4.756-.075,7.7,7.7,0,0,1-1.187.094,7.623,7.623,0,0,1-7.647-7.647,7.46,7.46,0,0,1,.094-1.187A4.424,4.424,0,0,1,879,926.615Zm4.107,1.714a2.473,2.473,0,0,0,.282,1.234,2.41,2.41,0,0,0,.782.829,5.091,5.091,0,0,0,1.215.565,15.981,15.981,0,0,0,1.582.424q.678.151.979.235a3.091,3.091,0,0,1,.593.235,1.388,1.388,0,0,1,.452.348.738.738,0,0,1,.16.481.91.91,0,0,1-.48.753,2.254,2.254,0,0,1-1.271.321,2.105,2.105,0,0,1-1.253-.292,2.262,2.262,0,0,1-.65-.838,2.42,2.42,0,0,0-.414-.546.853.853,0,0,0-.584-.17.893.893,0,0,0-.669.283.919.919,0,0,0-.273.659,1.654,1.654,0,0,0,.217.782,2.456,2.456,0,0,0,.678.763,3.64,3.64,0,0,0,1.158.574,5.931,5.931,0,0,0,1.639.235,5.767,5.767,0,0,0,2.072-.339,2.982,2.982,0,0,0,1.356-.961,2.306,2.306,0,0,0,.471-1.431,2.161,2.161,0,0,0-.443-1.375,3.009,3.009,0,0,0-1.2-.894,10.118,10.118,0,0,0-1.865-.575,11.2,11.2,0,0,1-1.309-.311,2.011,2.011,0,0,1-.8-.452.992.992,0,0,1-.3-.744,1.143,1.143,0,0,1,.565-.97,2.59,2.59,0,0,1,1.488-.386,2.538,2.538,0,0,1,1.074.188,1.634,1.634,0,0,1,.622.49,3.477,3.477,0,0,1,.414.753,1.568,1.568,0,0,0,.4.594.866.866,0,0,0,.574.2,1,1,0,0,0,.706-.254.828.828,0,0,0,.273-.631,2.234,2.234,0,0,0-.443-1.253,3.321,3.321,0,0,0-1.158-1.046,5.375,5.375,0,0,0-2.524-.527,5.764,5.764,0,0,0-2.213.386,3.161,3.161,0,0,0-1.422,1.083A2.738,2.738,0,0,0,883.106,928.329Z"
                                                        transform="translate(-878.999 -922)" fill="currentColor" />
                                                </svg>
                                                <span class="visually-hidden">Skype</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank"
                                                href="https://www.youtube.com/">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582"
                                                    viewBox="0 0 16.49 11.582">
                                                    <path data-name="Path 321"
                                                        d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z"
                                                        transform="translate(-951.269 -1359.8)" fill="currentColor" />
                                                </svg>
                                                <span class="visually-hidden">Youtube</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="guarantee__safe--checkout">
                                    <h5 class="guarantee__safe--checkout__title">Guaranteed Safe Checkout</h5>
                                    <img class="guarantee__safe--checkout__img"
                                        src="{{ asset('themes/client/risingtheme.com/html/demo-furea/furea/assets/img/other/safe-checkout.webp') }}"
                                        alt="Payment Image">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product__details--tab__section section--padding">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <ul class="product__details--tab d-flex mb-30">
                            <li class="product__details--tab__list active" data-toggle="tab" data-target="#description">
                                Mô tả</li>
                            <li class="product__details--tab__list" data-toggle="tab" data-target="#reviews">Sản phẩm
                                Đánh giá</li>
                            <li class="product__details--tab__list" data-toggle="tab" data-target="#information">
                                Thông tin bổ sung</li>
                            <li class="product__details--tab__list" data-toggle="tab" data-target="#custom">Tùy chỉnh
                                Nội dung</li>
                        </ul>
                        <div class="product__details--tab__inner border-radius-10">
                            <div class="tab_content">
                                <div id="reviews" class="tab_pane active show">
                                    <div class="product__reviews">
                                        <div class="product__reviews--header">
                                            <h3 class="product__reviews--header__title mb-20">Bình luận</h3>
                                            @if (Auth::check())
                                                <a class="actions__newreviews--btn primary__btn" href="#writereview">Viết
                                                    bình
                                                    luận</a>
                                            @endif

                                        </div>
                                        <div class="reviews__comment--area">


                                            @if ($product->comments())
                                                @foreach ($product->comments->where('parent_id', null) as $comment)
                                                    <div class="reviews__comment--list d-flex">
                                                        <div class="reviews__comment--thumbnail">
                                                            @if ($comment->user->avatar)
                                                                <img src="{{ Storage::url($comment->user->avatar) }}"
                                                                    alt="comment-thumbnail">
                                                            @else
                                                                <img src="{{ asset('themes/image/logo.jpg') }}"
                                                                    alt="comment-thumbnail">
                                                            @endif

                                                        </div>
                                                        <div class="reviews__comment--content">
                                                            <h4 class="reviews__comment--content__title">
                                                                {{ $comment->user->name }}</h4>

                                                            <p class="reviews__comment--content__desc">
                                                                {!! $comment->comment !!}
                                                            </p>
                                                            <span
                                                                class="reviews__comment--content__date">{{ $comment->created_at->format('d-m-Y') }}</span>
                                                            <!-- Nút "Reply" để mở form -->
                                                            <button type="button"class="btn btn-dark"
                                                                onclick="toggleReplyForm({{ $comment->id }})">Trả
                                                                lời</button>

                                                            <!-- Form tạo phản hồi (ẩn theo mặc định) -->
                                                            <form action="{{ route('comments') }}" method="POST"
                                                                id="replyForm-{{ $comment->id }}"
                                                                style="display: none;">
                                                                @csrf


                                                                <div class="row">
                                                                    <input type="hidden" name="parent_id"
                                                                        value="{{ $comment->id }}">
                                                                    <input type="hidden" name="product_id"
                                                                        value="{{ $product->id }}">
                                                                    <div class="col-12 mb-10">
                                                                        <textarea class="reviews__comment--reply__textarea" name="comment" placeholder="Bình luận của bạn..."></textarea>
                                                                    </div>

                                                                </div>
                                                                <button class="text-white primary__btn"
                                                                    data-hover="Submit" type="submit">Gửi</button>
                                                            </form>
                                                        </div>


                                                    </div>



                                                    @if ($comment->replies)
                                                        <!-- Hiển thị các phản hồi -->
                                                        @foreach ($comment->replies as $reply)
                                                            <div class="reviews__comment--list margin__left d-flex">
                                                                <div class="reviews__comment--thumbnail">
                                                                    @if ($reply->user->avatar)
                                                                        <img src="{{ Storage::url($reply->user->avatar) }}"
                                                                            alt="comment-thumbnail">
                                                                    @else
                                                                        <img src="{{ asset('themes/image/logo.jpg') }}"
                                                                            alt="comment-thumbnail">
                                                                    @endif
                                                                </div>
                                                                <div class="reviews__comment--content">
                                                                    <h4 class="reviews__comment--content__title">
                                                                        {{ $reply->user->name }}</h4>

                                                                    <p class="reviews__comment--content__desc">
                                                                        {!! $reply->comment !!}
                                                                    </p>
                                                                    <span
                                                                        class="
                                                                        ">{{ $reply->created_at->format('d-m-Y') }}</span>


                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @else
                                                <p>Chưa có bình luận nào. Hãy là người đầu tiên bình luận!</p>
                                            @endif
                                        </div>
                                        <div id="writereview" class="reviews__comment--reply__area">
                                            @if (Auth::check())
                                                <form action="{{ route('comments') }}" method="post">
                                                    @csrf
                                                    <h3 class="reviews__comment--reply__title mb-15">Thêm Bình Luận </h3>

                                                    <div class="row">
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product->id }}">
                                                        <div class="col-12 mb-10">
                                                            <textarea class="reviews__comment--reply__textarea" name="comment" placeholder="Bình luận của bạn..."></textarea>
                                                        </div>

                                                    </div>
                                                    <button class="text-white primary__btn" data-hover="Submit"
                                                        type="submit">Gửi</button>
                                                </form>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div id="description" class="tab_pane">
                                    <div class="product__tab--content">
                                        <div class="product__tab--content__items mb-40 d-flex align-items-center">
                                            <div class="product__tab--content__thumbnail">
                                                <img class="product__tab--content__thumbnail--img display-block"
                                                    src="assets/img/product/product1.webp" alt="product-tab">
                                            </div>
                                            <div class="product__tab--content__right">
                                                <div class="product__tab--content__step mb-20">
                                                    <h4 class="product__tab--content__title">Modern Swivel Chair</h4>
                                                    <p class="product__tab--content__desc">Lorem ipsum dolor sit, amet
                                                        consectetur adipisicing elit. Nam provident sequi, nemo sapiente
                                                        culpa nostrum rem eum perferendis quibusdam, magnam a vitae
                                                        corporis! Magnam enim modi, illo harum suscipit tempore aut dolore
                                                        doloribus deserunt voluptatum illum,</p>
                                                </div>
                                                <div class="product__tab--content__step">
                                                    <h4 class="product__tab--content__title">Fashion Plastic Chair</h4>
                                                    <p class="product__tab--content__desc">Lorem ipsum dolor sit, amet
                                                        consectetur adipisicing elit. Nam provident sequi, nemo sapiente
                                                        culpa nostrum rem eum perferendis quibusdam, magnam a vitae
                                                        corporis! Magnam enim modi, illo harum suscipit tempore aut dolore
                                                        doloribus deserunt voluptatum illum,</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product__tab--content__items d-flex align-items-center">
                                            <div class="product__tab--content__thumbnail">
                                                <img class="product__tab--content__thumbnail--img display-block"
                                                    src="assets/img/product/product2.webp" alt="product-tab">
                                            </div>
                                            <div class="product__tab--content__right">
                                                <div class="product__tab--content__step mb-20">
                                                    <h4 class="product__tab--content__title">Design Living Sofa</h4>
                                                    <p class="product__tab--content__desc">Lorem ipsum dolor sit, amet
                                                        consectetur adipisicing elit. Nam provident sequi, nemo sapiente
                                                        culpa nostrum rem eum perferendis quibusdam, magnam a vitae
                                                        corporis! Magnam enim modi, illo harum suscipit tempore aut dolore
                                                        doloribus deserunt voluptatum illum,</p>
                                                </div>
                                                <div class="product__tab--content__step">
                                                    <h4 class="product__tab--content__title">Folding Tables Chairs</h4>
                                                    <p class="product__tab--content__desc">Lorem ipsum dolor sit, amet
                                                        consectetur adipisicing elit. Nam provident sequi, nemo sapiente
                                                        culpa nostrum rem eum perferendis quibusdam, magnam a vitae
                                                        corporis! Magnam enim modi, illo harum suscipit tempore aut dolore
                                                        doloribus deserunt voluptatum illum,</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="information" class="tab_pane">
                                    <div class="product__tab--conten">
                                        <div class="product__tab--content">
                                            <div class="product__tab--content__step mb-30">
                                                <h4 class="product__tab--content__title mb-10">Nam provident sequi</h4>
                                                <p class="product__tab--content__desc">Lorem ipsum dolor sit, amet
                                                    consectetur adipisicing elit. Nam provident sequi, nemo sapiente culpa
                                                    nostrum rem eum perferendis quibusdam, magnam a vitae corporis! Magnam
                                                    enim modi, illo harum suscipit tempore aut dolore doloribus deserunt
                                                    voluptatum illum, est porro? Ducimus dolore accusamus impedit ipsum
                                                    maiores, ea iusto temporibus numquam eaque mollitia fugiat laborum dolor
                                                    tempora eligendi voluptatem quis necessitatibus nam ab?</p>
                                            </div>
                                            <div class="product__tab--content__step">
                                                <h4 class="product__tab--content__title mb-10">More Details</h4>
                                                <ul>
                                                    <li class="product__tab--content__list">
                                                        <svg class="product__tab--content__list--icon"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="48" d="M268 112l144 144-144 144M392 256H100">
                                                            </path>
                                                        </svg>
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam,
                                                        dolorum?
                                                    </li>
                                                    <li class="product__tab--content__list">
                                                        <svg class="product__tab--content__list--icon"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="48" d="M268 112l144 144-144 144M392 256H100">
                                                            </path>
                                                        </svg>
                                                        Magnam enim modi, illo harum suscipit tempore aut dolore?
                                                    </li>
                                                    <li class="product__tab--content__list">
                                                        <svg class="product__tab--content__list--icon"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="48" d="M268 112l144 144-144 144M392 256H100">
                                                            </path>
                                                        </svg>
                                                        Numquam eaque mollitia fugiat laborum dolor tempora;
                                                    </li>
                                                    <li class="product__tab--content__list">
                                                        <svg class="product__tab--content__list--icon"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="48" d="M268 112l144 144-144 144M392 256H100">
                                                            </path>
                                                        </svg>
                                                        Sit amet consectetur adipisicing elit. Quo delectus repellat facere
                                                        maiores.
                                                    </li>
                                                    <li class="product__tab--content__list">
                                                        <svg class="product__tab--content__list--icon"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="48" d="M268 112l144 144-144 144M392 256H100">
                                                            </path>
                                                        </svg>
                                                        Repellendus itaque sit quia consequuntur, unde veritatis. dolorum?
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="custom" class="tab_pane">
                                    <div class="product__tab--content">
                                        <div class="product__tab--content__step mb-30">
                                            <h4 class="product__tab--content__title mb-10">Nam provident sequi</h4>
                                            <p class="product__tab--content__desc">Lorem ipsum dolor sit, amet consectetur
                                                adipisicing elit. Nam provident sequi, nemo sapiente culpa nostrum rem eum
                                                perferendis quibusdam, magnam a vitae corporis! Magnam enim modi, illo harum
                                                suscipit tempore aut dolore doloribus deserunt voluptatum illum, est porro?
                                                Ducimus dolore accusamus impedit ipsum maiores, ea iusto temporibus numquam
                                                eaque mollitia fugiat laborum dolor tempora eligendi voluptatem quis
                                                necessitatibus nam ab?</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('style-libs')
    <style>
        .gallery-image {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
@endsection
@section('script-libs')
    <script>
        function toggleReplyForm(commentId) {
            const replyForm = document.getElementById(`replyForm-${commentId}`);
            if (replyForm.style.display === "none") {
                replyForm.style.display = "block";
            } else {
                replyForm.style.display = "none";
            }
        }
    </script>
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                d="M112 244l144-144 144 144M256 120v292" />
        </svg></button>
    <script src="{{ asset('themes/client/assets/js/plugins/swiper-bundle.min.js') }}" defer="defer"></script>
    <script src="{{ asset('themes/client/assets/js/plugins/glightbox.min.js') }}" defer="defer"></script>

    <!-- Customscript js -->
    <script src="{{ asset('themes/client/assets/js/script.js') }}" defer="defer"></script>
@endsection
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
</body>

</html>