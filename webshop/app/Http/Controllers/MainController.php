<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home(){
        $products = new Products();
        return view('welcome', ['products' => $products->all()]);
    }
    public function about(){
        return view('about');
    }
    public function view_product($id){
        $products = new Products();
        return view('view_product', ['product'=> $products::find($id)]);
    }
    public function cart(){
        $cart = new Cart();
        $products_model = new Products();
        $user_id = request()->user()->id;
        $carts = $cart::where('user_id','=',$user_id)->get();
        $products = array();
        $sum_price = 0;
        foreach($carts as $cart){
            $pr = $products_model::find($cart->product);
            array_push($products, array($pr, $cart->id));
            $sum_price+=$pr->price;
        }

        return view('cart', ['products' => $products, 'sum'=>$sum_price]);
    }
    public function add_to_cart(Request $request){
        $data = $request->validate(
            [
                'product_id' => ['required'],
                'count' => ['required']
            ]
        );
        $count = 0;
        if(!empty($request['count'])){
            $count = $request['count'];
        }
        $user_id = request()->user()->id;
        for($i=0;$i<$count;$i++){
            $cart = new Cart;
            $cart->product = (int)$request['product_id'];
            $cart->user_id = $user_id;
            $cart->save();
        }
        return redirect(route('home'));
    }
    public function checkout(Request $request){
        $cart = new Cart();
        $products_model = new Products();
        $user_id = request()->user()->id;
        $carts = $cart::where('user_id','=',$user_id)->get();
        $products = array();
        $sum_price = 0;
        foreach($carts as $cart){
            $pr = $products_model::find($cart->product);
            array_push($products, array($pr, $cart->id));
            $sum_price+=$pr->price;
        }
        return view('checkout',['products' => $products, 'sum'=>$sum_price]);
    }
    public function delete_item(Request $request){
        $data = $request->validate([
            'record_id' => ['required']
        ]);
        Cart::where('id',$request['record_id'])->firstorfail()->delete();
        return redirect(route('cart'));
    }
    public function login_view(){
        return view('login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email','string'],
            'password' => ['required','string'],
        ]);
        if(auth('web')->attempt($credentials)){
            return redirect(route('home'));
        }
        return redirect(route('login'))->withErrors(["email" => "Wrong Data!"]);
    }
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email','string','unique:users,email'],
            'name' => ['required','string'],
            'password' => ['required','string'],
        ]);

        $user = User::create([
            'email' => $credentials['email'],
            'name' => $credentials['name'],
            'password' => bcrypt($credentials['password'])
        ]);
        if($user){
            auth("web")->login($user);
        }
        return redirect(route('home'));
    }

    public function register_view(){
        return view('registartion');
    }
    public function logout_func(){
        auth('web')->logout();
        return redirect(route('home'));
    }
}

