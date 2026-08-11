<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductFaq;
use Illuminate\Http\Request;

class ProductFaqController extends Controller
{
    public function index()
    {
        $data = ProductFaq::orderBy('created_at', 'desc')->where('is_delete', '0')->paginate(15);
        $productlist = Product::where('is_delete', '0')->get();
        return view('admin.productfaq.productfaqlisting', compact('data', 'productlist'));
    }

    public function create()
    {
        $data = ProductFaq::orderBy('created_at', 'desc')->where('is_delete', '0')->first(); // Use first() to get a single record
        $productlist = Product::where('is_delete', '0')->get();
        // dd($productlist);
        return view('admin.productfaq.addproductfaq', compact('data', 'productlist'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'title.*' => 'required',
        ], [
            'title.*.required' => 'Please enter the title.',
        ]);

        $post = new ProductFaq;
        $post->product_id = $request->get('product_id');
        $post->productname = $request->get('industryname');

        $titles = $request->get('title');
        // dd($titles);
        $descriptions = $request->get('description');
        $title_description = [];
        foreach ($titles as $index => $title) {
            $title_description[] = [
                'title' => $title,
                'description' => $descriptions[$index],
            ];
        }
        $post->title_description = json_encode($title_description);

        $post->save();

        return redirect('/admin/productfaq')->with('success', 'Product detail Added Successfully');
    }

    public function edit($id)
    {
        $data = ProductFaq::find($id);
        $productlist = Product::where('is_delete', '0')->get();
        return view('admin.productfaq.editiproductfaq', compact('data', 'productlist'));
    }

    public function update(Request $request, $id)
    {
        $post = ProductFaq::find($id);
        $post->product_id = $request->get('product_id');
        $post->productname	 = $request->get('industryname');

        $titles = $request->get('title');
        $descriptions = $request->get('description');
        $title_description = [];
        foreach ($titles as $index => $title) {
            $title_description[] = [
                'title' => $title,
                'description' => $descriptions[$index],
            ];
        }
        $post->title_description = json_encode($title_description);

        $post->save();
        return redirect('/admin/productfaq')->with('success', 'Product detail Updated Successfully');
    }

    public function destroy($id)
    {
        $data = ProductFaq::find($id);
        $data->is_delete = '1';
        $data->update();
        return redirect()->back()->with('success', 'Your Product detail has been deleted successfully!');
    }
}
