<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Category;
use App\Book;
use App\Author;
use App\Customer;
use App\Order;
use App\Address;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    //
    public function login(){
        return view('loginadmin');
    }
    public function admin_index(){
        return view('indexadmin');
    }
    public function admin_login(Request $request){
        $admin=Admin::where('email',$request->fullname)->where('password',md5($request->psw))->first();
        // dd($admin);
        if($admin){
            Session::put('username',$admin);
            return view('index');
        }
        else return redirect::to('admin-login');
    }
    public function product(){
        $category=Category::all();
        $book=Book::with('category')->with('author')->get();
        $author=Author::all();
        $customer=Customer::all();
        // dd($book);
        return view('productsadmin')->with(compact('category','book','author', 'customer'));
    }
    // public function customer(){
    //     return view('customeradmin');
    // }

    public function category(){
        $category=Category::all();
        $book = Book::all();
        $author = Author::all();
        $customer=Customer::all();
        return view('categoryadmin')->with(compact('category', 'book', 'author', 'customer'));
    }

    public function categorybook(Request $request){
        $category = new Category();
        $category->name=$request->input('tentheloai');
        $category->status = true;
        $category->save();
        return redirect('categoryadmin')->with('status', 'Add success!');


    }
    public function destroy(Request $request,$id){
        // dd($id);
        $category = Category::find($id);

        $category->delete();
        return redirect()->action('AdminController@category')->with('status','Dữ liệu xóa thành công.');
    }

    // lay gia tri ra tra ve trang can sua
    public function update($id)
    {
        $namecategory = Category::find($id);
        return view('updatecategory')->with(compact('namecategory'));
    }
    public function updatename(Request $request, $id)
    {
        $namecategory = Category::find($id);
        $namecategory->name = $request->tentheloai;
        // $namecategory->update();
        // dd($namecategory);
        $namecategory->save();
        return redirect()->action('AdminController@category');

    }
    // Them cuon sach
    public function productadmin(Request $request){
        // dd($request->all());
        $book = new Book();
        $book->name=$request->input('tensp');
        $book->description = $request->input('desc');
        $book->price = $request->input('dg');
        $book->image = $request->input('ha');
        $book->author_id=$request->input('tacgia');
        // $image=null;
        if($request->hasfile('ha')){
            $file=$request->file('ha');
            $file_name=time().rand(1,2000).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'),$file_name);
            $image=$file_name;

        }
        $book->image=$image;
        $book->quality = $request->input('sl');
        $book->status = true;
        $book->category_id=$request->input('loaisp');

        // dd($category);
        $book->save();

        return redirect('productsadmin')->with('status', 'Add success!');
    }

    public function deletebook(Request $request,$id){
        // dd($id);
        $book = Book::find($id);
        $path='images/'.$book->image;
        if(file_exists($path)){
            unlink(($path));
        }
        $book->delete();
        return redirect()->action('AdminController@product')->with('status','Dữ liệu xóa thành công.');
    }
    public function updateid(Request $request, $id){
        $idbook= Book::findOrFail($id);
        $categorybook = Category::all();
        // dd($idbook);
        return view('updatebook')->with(compact('idbook','categorybook'));
    }

    public function updatebooks(Request $request, $id){
        $book = Book::find($id);
        $book->name=$request->input('tensp');
        $book->description = $request->input('desc');
        $book->price = $request->input('dg');
        $book->image = $request->input('ha');
        // $image=null;
        if($request->hasfile('ha')){
            $file=$request->file('ha');
            $file_name=time().rand(1,2000).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'),$file_name);
            $image=$file_name;

        }
        $book->image=$image;
        $book->quality = $request->input('sl');
        $book->status = true;
        $book->category_id=$request->input('loaisp');

        // dd($book);
        $book->save();

        return redirect('productsadmin')->with('status', 'Add success!');
    }

    // Ham show tac gia

    public function author(){
        $author=Author::all();
        $category = Category::all();
        $book = Book::all();
        $customer=Customer::all();
        return view('authoradmin')->with(compact('author','category', 'book', 'customer'));
    }
   // Ham them tac gia, redirect la da ve duong dan, ham author chua view roi
    public function nameauthor(Request $request){
        $nameauthor = new Author();
        $nameauthor ->name=$request->input('tentacgia');
        $nameauthor ->status = true;
        $nameauthor ->save();
        return redirect()->action('AdminController@author')->with('status', 'Add success!');


    }

    public function deleteauthor(Request $request,$id){
        // dd($id);
        $author = Author::find($id);
        // dd($author);
        $author->delete();
        return redirect()->action('AdminController@author')->with('status','Dữ liệu xóa thành công.');
    }
    public function update_id_author(Request $request, $id){
        $idauthor= Author::findOrFail($id);

        return view('updateauthoradmin')->with(compact('idauthor'));
    }



    public function updateauthor(Request $request, $id){
        $author = Author::find($id);
        // dd($author);
        $author->name=$request->input('tentacgia');

        $author->save();
        return redirect()->action('AdminController@author')->with('status', 'Update success!');
    }

    public function customer_admin(){
        $customer=Customer::all();
        $category = Category::all();
        $book = Book::all();
        $author = Author::all();
        return view('customeradmin')->with(compact('customer', 'category', 'book', 'author'));
    }

    // Ham show ra view order admin
    public function orderadmin(){
        $category = Category::all();
        $customer=Customer::all();
        $author = Author::all();
        $book = Book::all();
        // Sau model la dau ::
        $order = Order::with('customer')->with('address')->get();
        $address=Address::with('order')->get();
        // dd($order);
        return view('orderadmin')->with(compact('category', 'author', 'book', 'customer', 'order'));
    }

    public function updatestatus(Request $request, $idorder){
        $idorder = Order::find($idorder);
        // dd($request->input('status'));
        if(strcmp($request->input('status'),1)==0){
            //status của name trong thẻ select
            $idorder->status='Chờ xác nhận';
        }
        elseif(strcmp($request->input('status'),2)==0){
            $idorder->status='Đã duyệt';
        }
        elseif(strcmp($request->input('status'),3)==0){
            $idorder->status='Đang giao hàng';
        }
        else{
            $idorder->status='Đã giao';

        }

        $idorder->save();
        // dd($idorder);
        // status của biến thông báo
        return redirect()->action('AdminController@orderadmin')->with('status','Cập nhật đơn hàng thành công');

    }
}
