@extends('Customer/indexcustomer')
@section('content')

<section class="home" id="home">

    <div class="row">

        <div class="content">
            <h3>Thư's BookStore</h3>
            <p>Bạn cô đơn ư? Đừng lo lắng. Mọi cuốn sách đều sẵn sàng kết thân với bạn!</p>
            <a href="#" class="btn">Đăng ký tài khoản</a>
        </div>

        <div class="swiper books-slider">
            <div class="swiper-wrapper">
                @foreach ($book as $book)
                <a href="#" class="swiper-slide"><img src="{{URL::to('images/'.$book->image)}}" alt=""></a>
                @endforeach

            </div>
            <img src="{{URL::to('images/home/stand.png')}}" class="stand" alt="">
        </div>

    </div>

</section>
<!-- home section ense  -->

<!-- icons section starts  -->

<section class="icons-container">

    <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <div class="content">
            <h3>Miễn phí giao hàng</h3>
            <p>Giao hàng miễn phí đơn đặt hàng trên 30$</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-lock"></i>
        <div class="content">
            <h3>Bảo mật thanh toán</h3>
            <p>Bảo mật khi thanh toán trên thiết bị di động</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-redo-alt"></i>
        <div class="content">
            <h3>Dễ dàng hoàn trả</h3>
            <p>Hoàn trả đơn hàng sau 3 ngày</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-headset"></i>
        <div class="content">
            <h3>Tư vấn 24/7</h3>
            <p>Gọi cho tôi bất cứ lúc nào</p>
        </div>
    </div>

</section>

<!-- icons section ends -->

<!-- featured section starts  -->

<section class="featured" id="featured">

    <h1 class="heading"> <span>Sách bán chạy</span> </h1>

    <div class="swiper featured-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>

                <div class="image">
                    <img src="{{asset('images/home/book-10.png')}}" alt="">
                </div>
                <div class="content">
                    <h3>featured books</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <a href="#" class="btn">Thêm vào giỏ</a>
                </div>
            </div>


        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>

<!-- featured section ends -->



<!-- arrivals section starts  -->

<section class="arrivals" id="arrivals">

    <h1 class="heading"> <span>Sách đặc sắc</span> </h1>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-1.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>


        </div>

    </div>

</section>

<!-- arrivals section ends -->

<!-- deal section starts  -->

<section class="deal">

    <div class="content">
        <h3>Ưu đãi trong ngày</h3>
        <h1>Lên tới 50</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde perspiciatis in atque dolore tempora quaerat at fuga dolorum natus velit.</p>
        <a href="#" class="btn">shop now</a>
    </div>

    <div class="image">
        <img src="{{asset('images/home/deal-img.jpg')}}" alt="">
    </div>

</section>

<!-- deal section ends -->

<!-- reviews section starts  -->

{{-- <section class="reviews" id="reviews">

    <h1 class="heading"> <span>Phản hồi từ khách hàng</span> </h1>

    <div class="swiper reviews-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <img src="image/pic-1.png" alt="">
                <h3>john deo</h3>
                <p>Tuyệt vời, giao hàng nhanh, đã mua nhiều lần nên mọi người cứ yên tâm, lần sau sẽ ủng hộ.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-2.png" alt="">
                <h3>john deo</h3>
                <p>Shop bán nhiều loại, tuy ở xa nhưng giao hàng rất nhanh.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-3.png" alt="">
                <h3>john deo</h3>
                <p>Quá ngạc nhiên, sách rất hay, cám ơn Thư's BookStore!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            <div class="swiper-slide box">
                <img src="image/pic-4.png" alt="">
                <h3>john deo</h3>
                <p>Tuyệt vời, giao hàng nhanh, đã mua nhiều lần nên mọi người cứ yên tâm, lần sau sẽ ủng hộ.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-5.png" alt="">
                <h3>john deo</h3>
                <p>Tuyệt vời, giao hàng nhanh, đã mua nhiều lần nên mọi người cứ yên tâm, lần sau sẽ ủng hộ.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-6.png" alt="">
                <h3>john deo</h3>
                <p>Tuyệt vời, giao hàng nhanh, đã mua nhiều lần nên mọi người cứ yên tâm, lần sau sẽ ủng hộ.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

        </div>

    </div>

</section> --}}

<!-- reviews section ends -->

<!-- blogs section starts  -->

{{-- <section class="blogs" id="blogs">

    <h1 class="heading"> <span>our blogs</span> </h1>

    <div class="swiper blogs-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <div class="image">
                    <img src="image/blog-1.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title goes here</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="image/blog-2.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title goes here</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="image/blog-3.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title goes here</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="image/blog-4.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title goes here</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="image/blog-5.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title goes here</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, odio.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

        </div>

    </div>

</section> --}}

@endsection
