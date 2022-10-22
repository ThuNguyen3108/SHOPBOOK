@extends('Customer/indexcustomer')
@section('content')

<section class="products" id="products">

    
    @if($book->isEmpty() ) <h1 class="heading"> <span>Không có Kết quả tìm kiếm cho "{{$char}}"</span> </h1>
    @else  <h1 class="heading"> <span>Kết quả tìm kiếm cho "{{$char}}"</span> </h1>
    @endif
    <div class="box-container">
        @foreach($book as $book)
        <div class="box">
            <span class="discount"></span>
            <div class="image">
                <a href="{{URL::to('Customer/detailbook/'.$book->id)}}"> <img src="{{URL::to('images/'.$book->image)}}" alt=""></a>
               
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    {{-- <a href="#" class="cart-btn-products">add to cart</a> --}}
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>{{$book->name}}</h3>
                <div class="price">{{$book->price}} VND</div>
            </div>
        </div>
        @endforeach
    </div>

</section>

@endsection