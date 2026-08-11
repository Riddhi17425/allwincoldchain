<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::orderBy('created_at', 'desc')->where('is_delete', '0')->paginate(15);
        // dd($data);
        return view('admin.product.productlisting', compact('data'));
    }
    public function create()
    {
        return view('admin.product.addproduct');
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $product = new Product();
        $product->product_header = $request->input('product_header');
        $product->title = $request->input('title');
        $product->prod_url = $request->input('prod_url');
        $product->product_desc = $request->input('product_desc');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->prod_header_alt = $request->input('prod_header_alt');
        $product->prod_icon_alt = $request->input('prod_icon_alt');

        if ($request->hasFile('product_header_image')) {
            $file = $request->file('product_header_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Product images');
            $file->move($path, $filename);
            $product->product_header_image = $filename;
        }

        if ($request->hasFile('product_icon')) {
            $file = $request->file('product_icon');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Product images');
            $file->move($path, $filename);
            $product->product_icon = $filename;
        }

        $tableData = [];
        $tableLabels = $request->input('Table_label');
        $tableDescs = $request->input('Table_desc');
        $tableImages = $request->file('Table_image');
        $tableAlt = $request->input('prod_img_alt');
// dd($tableAlt);
        foreach ($tableLabels as $index => $label) {
            $image = $tableImages[$index];
            $imageFilename = $image->getClientOriginalName();
            $imagePath = public_path('/Product images');
            $image->move($imagePath, $imageFilename);

            $tableData[] = [
                'label' => $label,
                'desc' => $tableDescs[$index],
                'image' => $imageFilename,
                'alt' => $tableAlt[$index],
            ];
        }
        $product->table_details = json_encode($tableData);

        $product->save();

        return redirect('/admin/product')->with('success', 'Product Added Successfully');
    }


    public function edit($id)
    {
        $data = Product::find($id);
        // dd($data);
        return view('admin.product.editproduct', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
    
        $product->product_header = $request->input('product_header');
        $product->title = $request->input('title');
        $product->prod_url = $request->input('prod_url');
        $product->product_desc = $request->input('product_desc');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
    
        if ($request->hasFile('product_header_image')) {
            $file = $request->file('product_header_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Product images');
            $file->move($path, $filename);
            $product->product_header_image = $filename;
        }
    
        if ($request->hasFile('product_icon')) {
            $file = $request->file('product_icon');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Product images');
            $file->move($path, $filename);
            $product->product_icon = $filename;
        }
    
        $tableLabels = $request->input('table_label');
        $tableDescs = $request->input('table_desc');
        $tableAlt = $request->input('prod_img_alt');
        $existing_work_tab_images = json_decode($product->table_details, true) ?: [];
    
        if ($request->has('delete_img')) {
            foreach ($request->delete_img as $deleteImage) {
                foreach ($existing_work_tab_images as $index => $existingImage) {
                    if ($existingImage['image'] === $deleteImage) {
                        unset($existing_work_tab_images[$index]);
                        break;
                    }
                }
            }
        }
    
        $tableImages = $request->file('table_image') ?? [];
        $maxEntries = max(count($tableLabels), count($tableDescs), count($tableImages));
    
        for ($index = 0; $index < $maxEntries; $index++) {
            if (isset($tableImages[$index])) {
                $file = $tableImages[$index];
                $filename = $file->getClientOriginalName();
                $path = public_path('/Product images');
                $file->move($path, $filename);
            } else {
                $filename = $existing_work_tab_images[$index]['image'] ?? null;
            }
    
            $existing_work_tab_images[$index] = [
                'label' => $tableLabels[$index] ?? $existing_work_tab_images[$index]['label'] ?? '',
                'desc' => $tableDescs[$index] ?? $existing_work_tab_images[$index]['desc'] ?? '',
                'image' => $filename,
                'alt' => $tableAlt[$index] ?? $existing_work_tab_images[$index]['alt'] ?? '',
            ];
        }
    
        $product->table_details = json_encode($existing_work_tab_images);
    
        $product->save();
    
        return redirect('/admin/product')->with('success', 'Product Updated Successfully');
    }
    






    public function destroy($id)
    {
        $data = Product::find($id);
        $data->is_delete = '1';
        $data->update();
        return redirect()->back()->with('success', 'Your service Has Been Deleted Successfully!');
    }
}
