<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\CategoryPost;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            $category = Category::all();
//            dd($category);
            return view('category.index', compact('category'));
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
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->describe = $request->input('describe');
        $category->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới khách hàng thành công');
        //tao moi xong quay ve trang danh sach khach hang
        return redirect()->route('category.index');


//        return redirect('/category/index')->with('success','tạo mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryPost $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->describe = $request->describe;
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        Session::flash('success', 'Xóa khách hàng thành công');
        return redirect()->route('category.index');
    }

    public function searchCategory(Request $request)
    {
//

//        $products = DB::Table('products')->where('name','like','%')->paginate(5)->get();
        $category = category::where('name', 'like', '%' . $request->get('search') . '%')->paginate(5);
//        dd($products);

        return view('category.index', ['category' => $category]);
    }


    public function viewcompose()
    {
        return view('welcome');
    }
//    views share ko phải làm vậy đâu cha .. .để anh làm cho chà nhanh
//caí category ohải ko ?

// mà caí category chi nữa .. bảng mô cần ra đó ..ns đu


    public function show_category($id)
    {

//        $category_product = DB::table('products')->Join('categorys','products'.'category_id',
//            '=' . "categorys"."category_id")->where('products'.'id'.$id)->get();
//
//        $users = DB::table('products')->join('categorys', 'products.id', '=', 'categorys.id')->where('products.id'.$id)->get();

        $category_product = Product::where('category_id', $id)->get();

//        $category = DB::table('category')->where('category_id',$id)->get();

        return view('page.category.show_category', compact('category_product'));
    }

    //xóa cứng xóa mền và khôi phục

    public function trash()
    {
        $categorys = Category::onlyTrashed()->get();
        return view('category.trash', compact('categorys'));
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->route('category.index')->with('success', " $category->name đã được khôi phục !");
    }

    public function restoreAll()
    {
        $categorys = Category::onlyTrashed()->get();
        if (count($categorys) < 1) {
            return redirect()->route('category.trash')->with('error', "Thùng rác rỗng");
        } else {
            Category::onlyTrashed()->restore();
            return redirect()->route('category.index')->with('success', " Tất cả đã được khôi phục !");
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
        $category = Category::onlyTrashed()->get();
        if (count($category) < 1) {
            return redirect()->route('category.trash')->with('error', "Thùng rác rỗng !");
        } else {
            Category::onlyTrashed()->forceDelete();
            return redirect()->route('category.trash')->with('success', "Đã xóa tất cả !");
        }
    }


}
