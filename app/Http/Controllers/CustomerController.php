<?php

namespace App\Http\Controllers;

use App\Address;
use App\Customer;
use App\Book;
use App\Category;
use App\Order;
use App\detailOrder;
use App\Author;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Darryldecode\Cart\Cart;
use Alert;
use Psy\Readline\Hoa\Console;

class CustomerController extends Controller
{
    //
    public function check_Login(){
        $customer=null;
        if(Session::get('customer')){
            $customer=Session::get('customer');
        }else Session::put('customer',null);

        if($customer){
            return redirect()->action('CustomerController@home');
        }
        else return redirect()->action('CustomerController@login');
    }
    public function home(){
        $category=Category::all();
        return view('Customer/indexcustomer')->with(compact('category'));
    }
    public function index(){
        $book=Book::with('author')->with('category')->get();
        $category=Category::all();

        return view('Customer/index')->with(compact('book','category'));

    }
    public function signup_customer(Request $request){
        $request->validate([
                    'username' => 'required|min:5|max:255',
                    'email' => 'required|email|unique:customer,email',
                    'phone'=> 'required|regex:/^0[0-9]{9}+$/',
                    'password' => 'required|regex:/^[A-Za-z]{4,}+[0-9]{1,}+[$&+,:;=?@#<>.^*()%!-]{1,}+.{1,}+$/',
                    're_password' => 'required|regex:/^[A-Za-z]{4,}+[0-9]{1,}+[$&+,:;=?@#<>.^*()%!-]{1,}+.{1,}+$/',

                ],
                [
                    'username' => 'Nhập username phải ít nhất 5 ký tự',
                    'email' => 'Vui lòng nhập email đúng định dạng',
                    'phone' => 'Phải là số điện thoại',
                    'password' => 'Không đúng định dạng. Gồm ít nhất 4 chữ, 1 số,1 ký tự đặc biệt và 1 kí tự ngẫu nhiên. Mẫu: anhthu7#1',
                    're_password' =>'Không đúng định dạng. Gồm ít nhất 4 chữ, 1 số,1 ký tự đặc biệt và 1 kí tự ngẫu nhiên. Mẫu: anhthu7#1',

                ]



            );


        $email=$request->input('email');
        $username=$request->input('username');
        $phone=$request->input('phone');
        $token=$request->_token;
        $password=$request->input('password');
        $re_password=$request->input('re_password');

            if(strcmp($password,$re_password)==0){
                $customer = new Customer();
                $customer->email = $email;
                $customer->username = $username;
                $customer->token = $request->_token;
                $customer->password = md5($password);
                $customer->phone = $phone;
                // dd($customer);
                $customer->save();
                Alert::success('Success',"Thành công");

                return redirect()->action('CustomerController@login');
            } else{
                // Alert::error('Error Title', "error");
                Alert::error('Error',"Thất bại");
                return redirect()->back()->with('status',"Đăng nhập chưa đúng");

            }


    }

    public function login_customer(Request $request){
        // dd($request->all());
        $customer=Customer::where('email',$request->email)->where('password',md5($request->password))->first();
        // dd($customer);
        if($customer){
            Session::put('customer',$customer);
            Alert::success('Thành công', 'Đăng nhập thành công');
            return redirect()->action('CustomerController@index');
        }
        else {
            Alert::error('Thất bại',"Thất bại");
            return redirect()->back()->with('status',"Đăng nhập chưa đúng");
        }
    }


    // Hien thi ra danh sach khach hang

    // Hien thi danh sach san pham khach hang

    public function product($id){
        // dd($id);
        // lay cuon sach co truong category trong sach so sanh vs danh muc lay dc
        $book = Book::where('category_id',$id)->get();
        // lay tat ca danh muc
        $category = Category::all();
        // lay ten the loai chi 1 dong
        $name_category = Category::where('id',$id)->first();
        // dd($book);
        //dd($name_category);

        return view('Customer/productcustomer')->with(compact('book', 'category', 'name_category'));
    }

    public function detail_book($id){
        $id_book = Book::where('id', $id)->with('category')->with('author')->first();
        // dd($id_book);
        $category = Category::all();
    //    dd($id_book);
        return view('Customer/detailbook')->with(compact('id_book', 'category'));
    }

    // Ham show ra my account
    public function myaccount(){
        $this->check_Login();
        $category = Category::all();
        $id_customer = Session::get('customer')->id;
        $name_address = Address::where('id_customer',$id_customer)->orderBy('id','DESC')->get();
        $order = Order::where('id_customer',$id_customer)->get();
        // lay ra don hang cua thang dang nhap vao
        // dd($name_address);
        // muon co gia tri ben view thi phai bo qua compact
        return view('Customer/myaccount')->with(compact('category','id_customer','name_address','order'));
    }

    // Ham show ra login nguoi dung
    public function login(){
        return view('Customer/login');
    }

    public function logout(){
        Session::put('customer',null);
        return redirect()->action('CustomerController@login');
    }

    //Ham show ra signup nguoi dung
    public function signup(){
        return view('Customer/signup');
    }

    //Ham show ra cart cua nguoi dung
    public function cart(){
            $name_address=null;
            $category = Category::all();
            if(Session::get('customer')){
                $name_address=Address::where('id_customer',Session::get('customer')->id)->orderBy('id','desc')->get();
            }
            Session::put('name_address',$name_address);
            // dd(\Cart::getContent());
            return view('Customer/cart')->with(compact('category'));


    }

    public function addtocart(Request $request,$id_book){
        // Tham so thu nhat la cai cot cua bang muon so sanh
        // Tham so thu hai la gia tri so sanh
        // Ham get la lay tat ca cac dong thoa dieu kien
        // Ham firt la lay 1 dong duy nhat
        $book = Book::where('id',$id_book)->first();
        // dd($book);


        $qty=$request->qty;
        // // dd($request->qty);
        if($qty< $book->quality){

            $data['id']=$book->id;
            $data['name']=$book->name;
            $data['quantity']=$qty;
            $data['price']=$book->price;
            $data['attributes']['image']=$book->image;
            $data['attributes']['original_qty']=$book->quality;
            \Cart::add(array(
                'id' => $book->id,
                'name' => $book->name,
                'quantity' => $qty,
                'price' => $book->price,
                'attributes' => array(
                    'image' => $book->image,
                    'original_qty' => $book->quality,
                )
            ));
            // dd($book->quality);
            // dd(\Cart::getContent());
            return redirect()->action('CustomerController@cart');
        }
        else return redirect()->back()->with('status',"Vượt quá số lượng");
        // Cart::destroy();
        // Cart::destroy(); //
        // cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'weight' => 550, 'options' => ['size' => 'large']]);
        // dd(Cart::content());

    }

    public function update_cart(Request $request,$id){
        // dd($request->qty);
        $data['quantity']=$request->qty;


        Cart::update($id, array(
            'quantity' => $request->qty,
        ));
        // dd($request->qty,$id);
        // return redirect()->back()->with('status',"Cập nhật thành công");
    }

    public function add_address(Request $request){
        $name_address = $request->input('name_address');
        $id_customer = Session::get('customer')->id;
        // dang nhap moi co session con lai bo qua compact
        $category = Category::all();
        $add_address = new Address();
        $add_address->name_address = $name_address;
        $add_address->id_customer = $id_customer;
        $add_address->save();
        $name_address = Address::where('id_customer',$id_customer)->orderBy('id','DESC')->get();
        // dd($name_address);
        //redirect dieu huong trang web
        // return view la ko co cap nhat chi lay ra thoi
        // return redirect da thay doi du lieu dieu huong den 1 trang nao do
        return redirect()->action('CustomerController@myaccount');
        // return view('Customer/myaccount')->with(compact('category','name_address'));


    }

    public function adddataOrder(Request $request){
        if(!Session::get('customer')){
            return redirect()->action('CustomerController@login');
        }else{
            $id_customer = Session::get('customer')->id;
            $id_address = $request->input('name_address');
            $tongtien = \Cart::getTotal();
            // dd(Cart::content());
            $addOrder = array();
            $addOrder['id_address'] = $id_address;
            $addOrder['id_customer'] = $id_customer;
            $addOrder['total_money']= $tongtien;
            $addOrder['status'] = 'Chờ xác nhận';
            //Insert bang order xong roi lay id de insert vao detailorder
            $id_order=Order::insertGetId($addOrder);
            // chua thong tin cua gio hang
            $content=\Cart::getContent();
            // dd($content)

            foreach($content as $content){
                $detailOrder =new detailOrder();
                $detailOrder->id_order =  $id_order;
                $detailOrder->id_book=  $content->id;
                $detailOrder->quality= $content->quantity;
                $detailOrder->price= $content->price;
                $detailOrder->total = $content->qty *  $content->price;
                $detailOrder->save();
                //   +id: 10
                //   +qty: "1"
                //   +name: "Mẹ"
                //   +price: 320000.0
                //   +weight: 0.0
                //   +options: Gloudemans\Shoppingcart\CartItemOptions {#303 ▶}
                //   +taxRate: 21
                //   -associatedModel: null
                //   -discountRate: 0
                //   +instance: "default"
                // lay ra so luong trong kho cua mot cuon sach
                $id_book = Book::where('id',$content->id)->first();
                // tim cuon sach va update lai so luong cua no
                $id_book->quality=$id_book->quality - $content->qty;
                $id_book->save();
            }
            \Cart::clear();
            return redirect()->action('CustomerController@cart');

        }
    }

    public function destroyorder(Request $request, $id){
        // dau tien tim tat ca chi tiet cua don hang ma minh truyen vao

        $detailOrder = detailOrder::where('id_order', $id)->get();
        // dd($detailOrder);
        foreach($detailOrder as $detailOrder){
            $book = Book::where('id',$detailOrder->id_book)->first();
            // gia tri nay = gia tri cu cong voi so luong sach ma ho dat
            $book->quality = $book->quality + $detailOrder->quality;
            $book->save();
            //id_book nam trong model detailOrder (model dang chi den)
            // gia tri do minh xac dinh trong bang khac
            // dd($book);
            $detailOrder->delete();
        }
        $order = Order::where('id',$id)->delete();
        return redirect()->action('CustomerController@myaccount');
    }

    public function change_password(Request $request, $id){
        $customer = Customer::where('id', $id)->first();
        // lay mat khau moi cua nguoi dung nhap vo
        $password = $request->input('new_password');
        $re_password=$request->input('re_password');
        // mat khau cua nguoi dung bang voi mk moi nhap vo

        if($re_password == $password){
            $customer->password = md5($password);
            $customer->save();
            return redirect()->action('CustomerController@myaccount')->with('status',"Cập nhật thành công");
        }
        else{
            return redirect()->action('CustomerController@myaccount')->with('status',"Mật khẩu không trùng khớp. Vui lòng nhập lại");
        }

    }

    public function search(Request $request){
        $char = $request->input('timkiem');
        $book = Book::where('name','LIKE','%'.$char.'%' )->get();
        $category = Category::all();
        // dd($book);
        return view('Customer/search')->with(compact('book','category','char'));
    }



}


