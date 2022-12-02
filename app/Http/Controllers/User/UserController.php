<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Market;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $market = Market::where('user_id', auth()->user()->id)->get();

        $cart = Cart::join('market', 'carts.market_id', '=', 'market.id')
            ->join('statuses', 'carts.status_id', '=', 'statuses.id')->select('carts.*', 'market.name as market_name', 'market.price as market_price', 'market.image as market_image', 'statuses.name as status_name', 'market.category_id as category_id')
            ->where('carts.user_id', Auth::id())
            ->orderBy('created_at', 'desc')->get();

        // cart total price

        $total = 0;
        foreach ($cart as $c) {
            $total += $c->price;
        }

        // $market_id = $cart->pluck('market_id');
        // $market_info = Market::whereIn('id', $market_id)->get();

        return view('user.index', compact('market', 'categories', 'cart', 'total'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // create post

        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store post

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);

        $validated['user_id'] = auth()->user()->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $validated['image'] = $new_name;
        }

        if (Market::create($validated)) {
            return redirect()->route('profile')->with(success('Товар успешно добавлен'));
        } else {
            return redirect()->route('profile')->with(danger('Ошибка добавления товара'));
        }

        // Market::create($validated);
        // return redirect()->route('profile')->with(success(__('Вы успешно добавили товар.')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get user info
        
        // $users = DB::table('users')->get();;

        $user = User::find($id);

        return view('user.show', compact('user',));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $market = Market::find($id);
        return view('user.edit', compact('market'));
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
        $market = Market::find($id);

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $validated['user_id'] = auth()->user()->id;
        if ($request->file('image')) {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $validated['image'] = $new_name;
        }

        Market::whereId($id)->update($validated);
        return redirect()->route('profile')->with(success(__('Вы успешно обновили товар.')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete post
        $market = Market::find($id);
        $market->delete();
        
        return redirect()->route('profile')->with(success(__('Вы успешно удалили товар.')));
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function delete_cart($id)
    {
        // remove amount from cart to market

        $cart = Cart::find($id);
        $market = Market::find($cart['market_id']);
        $market['amount'] += $cart['quantity'];
        $market->save();

        if (Cart::find($id)->delete()) {
            return redirect()->back()->with(success(__('Вы успешно удалили товар из корзины.')));
        }
    }
}
