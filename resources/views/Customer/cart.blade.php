@extends('Customer/indexcustomer')
@section('content')
<div class="container">
    <div class="seperate"></div>
    <section class="products" id="products">

        <h1 class="heading"> <span>Giỏ hàng</span> </h1>
    <?php
    $content=Cart::getContent();
    //    $book=session('book');
    // echo $book;
    // echo $content;
    ?>
    {{-- <form action="" method="post"> --}}
      <div class="cart-detail">
        <ul class="cart-detail__book">
            <!-- <p>Bạn chưa chọn quyển sách nào!</p> -->
            @foreach ($content as $item)


            <li class="cart-detail__book__item">
              <a><img src = "{{URL::to('images/'.$item->attributes->image)}}"class="cart-detail__book__item__image" alt="">
              </a>
              <div class="cart-detail__book__item__info">
                <a  class="cart-detail__book__item__info__title">
                 {{$item->name}}
                </a>
                <form action="{{URL::to('Customer/update-cart/'.$item->id)}}" method="POST">

                    @csrf
                    <input type="number" hidden id="priceOfBook" value="">
                    <p class="cart-detail__book__item__info__price"></p>
                    <p>Kho: còn {{$item->attributes->original_qty}}   quyển</p>
                    <label class="cart-detail__book__item__info__number" for="">Số lượng: <input  id="" name="qty" type="number" value="{{$item->quantity}}" min="1" max="{{$item->attributes->original_qty}}" ></label>
                    <button type="submit">Cập nhật</button>
                </form>
              </div>
            </li>
            @endforeach

        </ul>
        <div class="cart-detail__user-info">
          <div class="cart-detail__user-info__title">Thông tin nhận hàng</div>

          <form action="{{URL::to('Customer/adddataOrder')}}" method="post">
            @csrf
            <div class="cart-detail__user-info__detail">
              <input hidden type="text" name="MSKH" @if(Session::get('customer')) value="{{Session::get('customer')->id}}" @else value="" @endif>
              <p><b>Tên người nhận: </b></p>
              <p>
                @if(Session::get('customer'))
                  {{Session::get('customer')->username}}
                @endif
              </p>
              <p><b>Số điện thoại:</b></p>
              <p>
                @if(Session::get('customer'))
                  {{Session::get('customer')->phone}}
                @endif
              </p>
              <!-- <div class="cart-detail__user-info__detail__address"> -->
                <p><b>Địa chỉ: </b></p>
                 @if(Session::get('name_address'))

                  <select name="name_address" required id="address" size="1">

                    @foreach (Session::get('name_address') as $address)
                    <option   value="{{$address->id}}">{{$address->name_address}}</option>
                    @endforeach

                  </select>



                 @endif
                <p></p>
                <p><b>Tổng tiền:{{Cart::getTotal()}}</b></p>



              </div>
              <div class="cart-detail__user-info__detail__total">


                <b id="total" class="price"></b>
              </div>
              <div class="cart-detail__user-info__detail__total">
                <button type="submit" class="btn btn--primary">Đặt hàng</button>
              </div>
            </form>
            </div>


            <!-- <p style="line-height: 25px;">Bạn chưa đăng nhập, hãy đăng nhập để đặt hàng!</p> -->

        </div>
      </div>
    {{-- </form> --}}
  </div>
  </div>

  @endsection
