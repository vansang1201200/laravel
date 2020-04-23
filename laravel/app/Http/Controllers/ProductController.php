<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreBlogPost;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()) {
            $products = Product::all();
//            if ($request->name) $products->where('name','like','%'.$request->name.'%');

//            jon categogy
            $category = Category::all();


            return view('product.index',compact('products','category'));
        }
        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {

        $product = new Product();
        $product->name     = $request->input('name');
        $product->producer    = $request->input('producer');
        $product->price      = $request->input('price');
        $product->img = base64_encode(file_get_contents($request->file('img')->getRealPath()));
        $product->describe_product    = $request->input('describe_product');
        $product->weight      = $request->input('weight');
//        dd($request->input('pro_hot'));
        if ($request->input('pro_hot') == 'on') {
            $product->pro_hot = true;
        }
//        $product->pro_hot      = $request->input('pro_hot');
        $product->category_id = $request->input('category_id');

        $product->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới khách hàng thành công');
        //tao moi xong quay ve trang danh sach khach hang
        return redirect()->route('product.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $show_product = Product::find($product->id);
//        dd($show_product);
        return view('product.detail', compact('show_product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->producer = $request->producer;
        $product->describe_product = $request->describe_product;
        $product->price = $request->price;
        $product->img = base64_encode(file_get_contents($request->file('img')->getRealPath()));
        $product->weight = $request->weight;
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Session::flash('success', 'Xóa khách hàng thành công');
        return redirect()->route('product.index');
    }
//    public function filterByCategory(Request $request){
//        $idCategory = $request->input('category_id');
        //kiem tra category co ton tai khong
//        $CategoryFilter = Category::findOrFail($idCategory);
        //lay ra tat ca product cua cityFiler
//        $products = product::where('category_ib',$CategoryFilter->id)->get();
//        $totalProductFilter = count($products);
//
//    }
    public function searchProduct(Request $request) {



        $products = Product::where('name', 'like', '%' . $request->get('search') . '%')->paginate(5);
//        dd($products);

        return view('product.index',['products'=>$products]);
    }

    //xóa cứng xóa mền và khôi phục

    public function trash(){
        $products = Product::onlyTrashed()->get();
        return view('product.trash', compact('products'));
    }
    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('product.index')->with('success', " $product->name đã được khôi phục !");
    }
    public function restoreAll()
    {
        $products = Product::onlyTrashed()->get();
        if (count($products) < 1) {
            return redirect()->route('product.trash')->with('error', "Thùng rác rỗng");
        } else {
            Product::onlyTrashed()->restore();
            return redirect()->route('product.index')->with('success', " Tất cả đã được khôi phục !");
        }
    }
//    public function delete($id)
//    {
//        $product = Product::onlyTrashed()->findOrFail($id);
//        $product->forceDelete();
//        return redirect()->route('product.trash')->with('success', "Xóa thành công $product->name !");
//    }
    public function deleteAll()
    {
        $product = Product::onlyTrashed()->get();
        if (count($product) < 1) {
            return redirect()->route('product.trash')->with('error', "Thùng rác rỗng !");
        } else {
            Product::onlyTrashed()->forceDelete();
            return redirect()->route('product.trash')->with('success', "Đã xóa tất cả !");
        }
    }



}
