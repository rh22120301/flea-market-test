<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\DetailRequest;
use App\Http\Requests\SellRequest;
use App\Http\Requests\PurchaseRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Mylist;
use App\Models\Comment;
use App\Models\Condition;
use App\Models\Pay;
use App\Models\Purchase;
use App\Models\Category;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->query('tab', 'default');
        $keyword = $request->input('keyword'); 

        $query = Product::KeywordSearch($keyword);

        if (auth()->check()) {
            $query->where('sell_user_id', '!=', auth()->id());
        }

        $products = $query->get();

        $mylistProducts = [];
        if (auth()->check()) { 
            $productIds = auth()->user()->mylists()->pluck('product_id'); 
            $mylistProducts = Product::whereIn('id', $productIds)
            ->KeywordSearch($keyword)
            ->get();
        }

        return view('index', compact('products','tab','mylistProducts'));
    }

    public function profile()
    {
        $user = auth()->user();

        return view('profile', [
            'user' => $user,
            'isFirst' => !$user->profile_completed, // 初回なら true
        ]);
    }


    public function saveProfile(ProfileRequest $request)
    {
        $user = auth()->user();

        $data = $request->only(['name', 'postcode', 'address', 'building']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('profiles', 'public');
        }

        $user->fill($data);

        if (!$user->profile_completed) {
            $user->profile_completed = true;
        }

        $user->save();

        return redirect('/mypage')->with('success', 'プロフィールを更新しました');
    }


    public function mypage(Request $request)
    {
        $user = auth()->user();
        $tab = $request->query('tab', 'selluser');

        $boughtProducts = $user->boughtProducts()->latest()->get();
        $soldProducts = $user->soldProducts()->latest()->get();

        return view('mypage', [
            'user' => $user,
            'tab' => $tab,
            'boughtProducts' => $boughtProducts,
            'soldProducts' => $soldProducts,
        ]);
    }


    public function sellView()
    {
        $categories = Category::all();
        $conditions = Condition::all();

        return view('sell', compact('categories', 'conditions',));
    }

    public function sell(SellRequest $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->condition_id = $request->condition_id;
        $product->sell_user_id = auth()->id();
        $product->image = $request->file('image')->store('products', 'public');

        $product->save();

        $product->categories()->attach($request->categories);

        return redirect('/mypage');
    }

    public function detail($id) 
    { 
        $product = Product::with('condition', 'categories') ->findOrFail($id); 
        $liked = auth()->check() ? auth()->user()->mylists()->where('product_id', $product->id)->exists() : false;

        return view('detail', compact('product','liked')); 
    }

    public function like($id) 
    { 
        Mylist::firstOrCreate(
        [ 
            'user_id' => auth()->id(), 
            'product_id' => $id, 
        ]);

        return back();
    }

    public function unlike($id)
    {
        Mylist::where('user_id', auth()->id())
            ->where('product_id', $id)
            ->delete();

        return back();
    }

    public function comment($id, DetailRequest $request)
    {
        Comment::create([
            'user_id' => auth()->id(),
            'product_id' => $id,
            'detail' => $request->detail,
        ]);

        return back();
    }

    public function purchase($product_id)
    {
        $user = auth()->user();
        $product = Product::findOrFail($product_id);
        $pays = Pay::all();

        $postcode = session('purchase_postcode', $user->postcode);
        $address  = session('purchase_address', $user->address);
        $building = session('purchase_building', $user->building);

        return view('purchase', compact
        (
            'product', 
            'pays', 
            'postcode', 
            'address', 
            'building',
        ));
    }

    public function address(Request $request, $product_id)
    {
        $user = auth()->user();
        $product = Product::findOrFail($product_id);

        $postcode = session('purchase_postcode', $user->postcode);
        $address  = session('purchase_address', $user->address);
        $building = session('purchase_building', $user->building);

        return view('address', [
        'product' => $product,
        'postcode' => $postcode,
        'address' => $address,
        'building' => $building,
        'product_id' => $product_id,
        'user' => $user,
    ]);
    }

    public function addressUpdate(Request $request, $product_id)
    {
        session([
        'purchase_postcode' => $request->postcode,
        'purchase_address'  => $request->address,
        'purchase_building' => $request->building,
        ]);

        return redirect()->route('purchase', ['product_id' => $product_id]);
    }

    public function purchaseStore(PurchaseRequest $request, $product_id)
    {
        $user = auth()->user();
        $product = Product::findOrFail($product_id);

        if ($product->buy_user_id !== null) {
            return back()->withErrors(['product' => 'この商品はすでに購入されています']);
        }

        if ($product->sell_user_id == $user->id) {
            return back()->withErrors(['product' => '自分の商品は購入できません']);
        }

        $postcode = session('purchase_postcode', $user->postcode);
        $address  = session('purchase_address', $user->address);
        $building = session('purchase_building', $user->building);

        $pay_id = session('purchase_pay_id');

        Purchase::create([
            'user_id'    => $user->id,
            'product_id' => $product_id,
            'pay_id'     => $pay_id,
            'postcode'   => $postcode,
            'address'    => $address,
            'building'   => $building,
        ]);

        $product->buy_user_id = $user->id;
        $product->save();

        session()->forget(['purchase_postcode', 'purchase_address', 'purchase_building']);

        return redirect('/');
    }

    public function storePay(Request $request)
    {
        session(['purchase_pay_id' => $request->pay_id]);
        
        return redirect()->back();
    }

}