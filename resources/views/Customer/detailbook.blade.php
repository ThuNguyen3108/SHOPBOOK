@extends('Customer/indexcustomer')
@section('content')
<section class="container">
  <div class="seperate"></div>
  <br><br>
  <h1 class="heading"> <span>Chi tiết sản phẩm</span> </h1>
  <div class="book-detail">
    <img src="{{URL::to('images/'.$id_book->image)}}" alt="">
    <form action="{{URL::to('Customer/cart/'.$id_book->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="book-detail__info">
      
      <div class="book-detail__info__title">
        {{$id_book->name}}</div>
      <div class="book-detail__info__price">
       {{$id_book->price}}</div>
      <div class="book-detail__info__detail">
        <p class="book-detail__info__detail__title">Mã sách:{{$id_book->id}}</p>
        <p class="book-detail__info__detail__title">Số lượng:{{$id_book->quality}}</p>
        <input type = "number" name="qty" max = "{{$id_book->quality}}" min = "1" value = "1">
        <p class="book-detail__info__detail__title">Thể loại: {{$id_book->category->name}}</p>
        <p class="book-detail__info__detail__title">Tác giả: {{$id_book->author->name}}</p>
        
        {{-- <p class="book-detail__info__detail__title">Kho: 2</p> --}}
      
      </div>
      <div id="cartButton">
        
            <!-- <button  class="btn btn--secondary book-detail__button">Đã thêm vào giỏ</button> -->
          
          <button type="submit"  class="btn btn--primary book-detail__button">Thêm vào giỏ hàng</button>
        
      </div>
    </form>

    </div>

  </div>
  <div class="book-detail__content">
    <p class="book-detail__content__title">Sơ lược sách</p>
    <p class="book-detail__content__content">{{$id_book->description}}</p>
  </div>

  <h3 style="font-size: 25px; font-weight: bold; color: #00BFFF; margin: 20px 0;">Bình luận</h3>
 
</section>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif


@endsection