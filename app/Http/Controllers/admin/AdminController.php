<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Market;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $users = User::all()->sortBy('id');
        $posts = Market::all()->sortByDesc('created_at')->sortByDesc('active');

        // $cart = DB::table('carts')->join('market', 'carts.market_id', '=', 'market.id')
        // ->join('statuses', 'carts.status_id', '=', 'statuses.id')
        // ->select('carts.*', 'market.name as market_name', 'market.price as market_price', 'market.image as market_image', 'statuses.name as status_name')
        // ->get();

        $cart = Cart::join('market', 'market.id', '=', 'carts.market_id')
        ->join('statuses', 'statuses.id', '=', 'carts.status_id')
        ->join('users', 'users.id', '=', 'carts.user_id')
        ->select('carts.*', 'market.name as market_name', 'market.description as market_description', 'market.price as market_price', 'market.image as market_image', 'statuses.name as status_name', 'market.category_id as category_id', 'users.name as user_name', 'users.surname as user_surname', 'users.patronymic as user_patronymic')
        ->get();
        $statuses = Status::orderBy('id', 'ASC')->get();

        // dd($cart);
        $total = 0;
        foreach ($cart as $c) {
            $total += $c->price;
        }

        $status_filter = request()->status;

        if ($status_filter) {
            $cart = Cart::join('market', 'market.id', '=', 'carts.market_id')
            ->join('statuses', 'statuses.id', '=', 'carts.status_id')
            ->join('users', 'users.id', '=', 'carts.user_id')
            ->select('carts.*', 'market.name as market_name', 'market.description as market_description', 'market.price as market_price', 'market.image as market_image', 'statuses.name as status_name', 'market.category_id as category_id', 'users.name as user_name', 'users.surname as user_surname', 'users.patronymic as user_patronymic')
            ->where('carts.status_id', $status_filter)
            ->get();
        }
        return view('admin.index', compact('posts', 'users', 'categories', 'cart', 'total', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $market = Market::find($id);
        $cart = Cart::find($id);
        $statuses = Status::orderBy('name', 'ASC')->get();
        return view('admin.edit', compact('market', 'categories', 'statuses', 'cart'));
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
        $user = User::find($id);

        $market = Market::find($id);

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'amount' => 'nullable',
        ]);

        $validated['user_id'] = auth()->user()->id;
        if ($request->file('image')) {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $validated['image'] = $new_name;
        }
        Market::whereId($id)->update($validated);

        // if status_id changed 

        if ($request->status_id) {
            $cart = Cart::where('market_id', $id)->first();
            $cart->status_id = $request->status_id;
            $cart->save();
        }

        return redirect()->route('dashboard')->with(success(__('Вы успешно обновили товар.')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Market::find($id)->delete()) {
            return redirect()->route('dashboard')->with(success(__('Вы успешно удалили товар.')));
        }

        // $market = Market::find($id);
        // $market->delete();
        // $user = User::find($id);
        // $user->delete();
        
        // return redirect()->route('dashboard')->with(success(__('Вы успешно удалили товар.')));
    }

    public function destroy_user($id)
    {
        if (User::find($id)->delete()) {
            return redirect()->route('dashboard')->with(success(__('Вы успешно удалили пользователя.')));
        }
    }

    public function active_status(Request $request)
    {
        $user = User::find($request->user_id);
        $user->active = $request->active;
        $user->save();


        success(__('Вы успешно изменили статус пользователя.'));
        return View::make('includes/alert');
    }

    public function market_status(Request $request)
    {
        $post = Market::find($request->id);
        $post->active = $request->active;
        $post->save();
        
        success(__('Вы успешно изменили статус пользователя.'));
        return View::make('includes/alert');
    }

    public function admin_status(Request $request)
    {
        $post = User::find($request->id);
        $post->admin = $request->admin;
        $post->save();
        
        success(__('Вы успешно изменили статус пользователя. (admin)'));
        return View::make('includes/alert');
    }

    public function destroy_category($id)
    {
        if (Category::find($id)->delete()) {
            return redirect()->route('dashboard')->with(success(__('Вы успешно удалили категорию.')));
        }
    }

    public function edit_status($id)
    {
        $cart = DB::table('carts')->join('market', 'market.id', '=', 'carts.market_id')->join('statuses', 'statuses.id', '=', 'carts.status_id')->select('carts.*', 'market.name', 'market.description', 'market.price', 'market.image', 'statuses.name as status_name')->where('carts.id', $id)->first();
        $statuses = Status::orderBy('id', 'ASC')->get();
        return view('admin.edit_status', compact('cart', 'statuses'));
    }

    public function update_status(Request $request, $id)
    {
        $validated = $request->validate([
            'status_id' => 'required',
            'reason' => 'nullable',
        ]);

        Cart::whereId($id)->update($validated);

        return redirect()->route('dashboard')->with(success(__('Вы успешно обновили статус.')));
    }

    public function delete_cart($id)
    {
        if (Cart::find($id)->delete()) {
            return redirect()->route('dashboard')->with(success(__('Вы успешно удалили товар из корзины.')));
        }
    }
}
