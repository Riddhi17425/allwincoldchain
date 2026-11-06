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
        return view('admin.product.productlisting', compact('data'));
    }

    public function create()
    {
        return view('admin.product.addproduct');
    }

    public function store(Request $request)
    {
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
            $file->move(public_path('/product-images'), $filename);
            $product->product_header_image = $filename;
        }

        if ($request->hasFile('product_icon')) {
            $file = $request->file('product_icon');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/product-images'), $filename);
            $product->product_icon = $filename;
        }

        $tableData = [];
        $tableLabels = $request->input('Table_label', []);
        $tableDescs = $request->input('Table_desc', []);
        $tableImages = $request->file('Table_image', []);
        $tableAlt = $request->input('prod_img_alt', []);
        $ctaTitles = $request->input('cta_title', []);
        $ctaDescs = $request->input('cta_description', []);
        $ctaImages = $request->file('cta_image', []);
        $ctaImageAlts = $request->input('cta_image_alt', []);
        $ctaBtnTexts = $request->input('cta_btn_text', []);
        $ctaBtnUrls = $request->input('cta_btn_url', []);
        $tableHtmls = $request->input('table_html', []);

        foreach ($tableLabels as $index => $label) {
            $imageFilename = null;
            if (isset($tableImages[$index]) && $tableImages[$index]) {
                $image = $tableImages[$index];
                $imageFilename = $image->getClientOriginalName();
                $image->move(public_path('/product-images'), $imageFilename);
            }

            $ctaImageName = null;
            if (isset($ctaImages[$index]) && $ctaImages[$index]) {
                $ctaImageName = $ctaImages[$index]->getClientOriginalName();
                $ctaImages[$index]->move(public_path('/product-images'), $ctaImageName);
            }

            $tableData[] = [
                'label'         => $label,
                'desc'          => $tableDescs[$index] ?? '',
                'image'         => $imageFilename,
                'alt'           => $tableAlt[$index] ?? '',
                'cta_title'     => $ctaTitles[$index] ?? '',
                'cta_desc'      => $ctaDescs[$index] ?? '',
                'cta_image'     => $ctaImageName,
                'cta_image_alt' => $ctaImageAlts[$index] ?? '',
                'cta_btn_text'  => $ctaBtnTexts[$index] ?? '',
                'cta_btn_url'   => trim($ctaBtnUrls[$index] ?? ''),
                'table_html'    => $tableHtmls[$index] ?? '',
            ];
        }
        $product->table_details = json_encode($tableData);

        $product->save();

        return redirect('/admin/product')->with('success', 'Product Added Successfully');
    }

    public function edit($id)
    {
        $data = Product::find($id);
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
            $file->move(public_path('/product-images'), $filename);
            $product->product_header_image = $filename;
        }

        if ($request->hasFile('product_icon')) {
            $file = $request->file('product_icon');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/product-images'), $filename);
            $product->product_icon = $filename;
        }

        $tableLabels = $request->input('table_label', []);
        $tableDescs = $request->input('table_desc', []);
        $tableAlt = $request->input('prod_img_alt', []);
        $ctaTitles = $request->input('cta_title', []);
        $ctaDescs = $request->input('cta_description', []);
        $ctaImageAlts = $request->input('cta_image_alt', []);
        $ctaBtnTexts = $request->input('cta_btn_text', []);
        $ctaBtnUrls = $request->input('cta_btn_url', []);
        $tableHtmls = $request->input('table_html', []);
        $removeCtaImage = $request->input('remove_cta_image', []);
        $removeImage = $request->input('remove_image', []);

        $existingImages = $request->input('existing_image', []);
        $existingCtaImages = $request->input('existing_cta_image', []);

        $tableImages = $request->file('table_image', []);
        $ctaImages = $request->file('cta_image', []);

        $maxEntries = max(count($tableLabels), count($tableDescs));
        $newDetails = [];

        for ($index = 0; $index < $maxEntries; $index++) {

            if (isset($tableImages[$index]) && $tableImages[$index]) {
                $file = $tableImages[$index];
                $filename = $file->getClientOriginalName();
                $file->move(public_path('/product-images'), $filename);
            } elseif (!empty($removeImage[$index])) {
                $filename = null;
            } else {
                $filename = !empty($existingImages[$index]) ? $existingImages[$index] : null;
            }

            if (isset($ctaImages[$index]) && $ctaImages[$index]) {
                $ctaImageName = $ctaImages[$index]->getClientOriginalName();
                $ctaImages[$index]->move(public_path('/product-images'), $ctaImageName);
            } elseif (!empty($removeCtaImage[$index])) {
                $ctaImageName = null;
            } else {
                $ctaImageName = !empty($existingCtaImages[$index]) ? $existingCtaImages[$index] : null;
            }

            $newDetails[] = [
                'label'         => $tableLabels[$index] ?? '',
                'desc'          => $tableDescs[$index] ?? '',
                'image'         => $filename,
                'alt'           => $tableAlt[$index] ?? '',
                'cta_title'     => $ctaTitles[$index] ?? '',
                'cta_desc'      => $ctaDescs[$index] ?? '',
                'cta_image'     => $ctaImageName,
                'cta_image_alt' => $ctaImageAlts[$index] ?? '',
                'cta_btn_text'  => $ctaBtnTexts[$index] ?? '',
                'cta_btn_url'   => trim($ctaBtnUrls[$index] ?? ''),
                'table_html'    => $tableHtmls[$index] ?? '',
            ];
        }

        $product->table_details = json_encode($newDetails);

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
