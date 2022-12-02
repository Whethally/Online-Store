<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Market;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories = Category::orderBy('name', 'ASC')->get();

        // $categories = DB::table('market')
        //     ->join('categories', 'market.category_id', '=', 'categories.id')
        //     ->select('categories.name as category_name', 'categories.*')
        //     ->get();
            
        // filter by search
        $search = request()->search;

        $market = Market::all()->sortByDesc('created_at')->where('active', 1)->where('amount', '>', 0);

        if ($search) {
            $market = Market::where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('price', 'like', "%{$search}%")
                ->get();
        }

        // filter by category

        $category = request()->category;

        if ($category) {
            $market = Market::where('category_id', $category)->where('active', 1)->get();
        }

        // dd($categories);

        return view('home.index', compact('market', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("market.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return a post by id

        // get user_id with name

        $username = Market::join('users', 'market.user_id', '=', 'users.id')
        ->select('users.login')
        ->where('market.id', $id)->get()->implode('login',',');

        $market = Market::find($id);
        return view('market.show', compact('market', 'username'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cart()
    {
        return view('home.cart');
    }

    public function add_to_cart($id)
    {
        $market = Market::findOrFail($id);

        $cart = session()->get('cart', []);

        // check if product amount is 0
        

        if(isset($cart[$id])) {
            if ($cart[$id]['quantity'] == $cart[$id]['amount']) {
                return redirect()->back()->with(danger("{$cart[$id]["name"]} больше нет в наличии."));
            }
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $market->name,
                "quantity" => 1,
                "price" => $market->price,
                "image" => $market->image,
                "amount" => $market->amount,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with(success("{$cart[$id]["name"]} добавлен в корзину."));
    }

    public function update_cart(Request $request)
    {

        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);
            // session()->with(success('Корзина обновлена.'));
            if ($cart[$request->id]["quantity"] == $cart[$request->id]["amount"]) {
                danger("({$cart[$request->id]["name"]}) больше нет в наличии.");
                return View::make('includes/alert');
            } else {
                success('Количество товара обновлено.');
                return View::make('includes/alert');
            }
            // success('Количество товара обновлено.');
            // return View::make('includes/alert');
        }
    }

    public function remove_from_cart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
                success("{$cart[$request->id]["name"]} удален из корзины.");
                return View::make('includes/alert');
            }
            // return redirect()->back()->with(success('Товар удален из корзины.'));
        }
    }

    public function checkout()
    {
        if (Auth::check()) {
            if (session()->has('cart') && count(session()->get('cart')) > 0) {
                $cart = session()->get('cart');
                return view('home.checkout', compact('cart'));
            } else {
                return redirect()->back()->with(danger('Корзина пуста.'));
            }
        } else {
            return redirect()->route('login')->with(warning('Для оформления заказа необходимо авторизоваться.'));
        }
    }

    public function cart_order(Request $request)
    {
        $cart = session()->get('cart');
        // $total = 0;

        // Пользователь вводит свой пароль для подтверждения заказ

        if (Hash::check($request->password, Auth::user()->password)) {
            foreach($cart as $id => $details) {
                Cart::create([
                    'user_id' => Auth::user()->id,
                    'market_id' => $id,
                    'price' => $details['price'] * $details['quantity'],
                    'quantity' => $details['quantity'],
                    'status_id' => 1,
                ]);
            }
    
            foreach($cart as $id => $details) {
                $market = Market::find($id);
                $market->amount = $market->amount - $details['quantity'];
                $market->save();
            }
            session()->forget('cart');
            return redirect()->route('market')->with(success('Заказ оформлен.'));
        } else if ($request->password == null) {
            return redirect()->back()->with(warning('Введите пароль для подтверждения заказа.'));
        } else {
            return redirect()->back()->with(danger('Неверный пароль.'));
        }
        // $order->user_id = Auth::user()->id;
        // $order->market_id = $request->market_id;
        // $order->total = $total;

        // foreach($cart as $id => $details) {
        //     $order->products()->attach($id, ['quantity' => $details['quantity']]);
        // }

    }

    // public function orders()
    // {
    //     $orders = Order::where('user_id', Auth::user()->id)->get();
    //     return view('home.orders', compact('orders'));
    // }

    // public function order_details($id)
    // {
    //     $order = Order::find($id);
    //     return view('home.order_details', compact('order'));
    // }

    // public function order_delete($id)
    // {
    //     $order = Order::find($id);
    //     $order->delete();
    //     return redirect()->back()->with(success('Заказ удален.'));
    // }

    // public function order_cancel($id)
    // {
    //     $order = Order::find($id);
    //     $order->status = 0;
    //     $order->save();
    //     return redirect()->back()->with(success('Заказ отменен.'));
    // }

    // public function order_confirm($id)
    // {
    //     $order = Order::find($id);
    //     $order->status = 1;
    //     $order->save();
    //     return redirect()->back()->with(success('Заказ подтвержден.'));
    // }

    // public function order_complete($id)
    // {
    //     $order = Order::find($id);
    //     $order->status = 2;
    //     $order->save();
    //     return redirect()->back()->with(success('Заказ завершен.'));
    // }

    // public function order_return($id)
    // {
    //     $order = Order::find($id);
    //     $order->status = 3;
    //     $order->save();
    //     return redirect()->back()->with(success('Заказ возвращен.'));
    // }
}
