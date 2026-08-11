<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAdmin;

class HomeAdminController extends Controller
{
    public function index()
    {
        $data = HomeAdmin::orderBy('created_at', 'desc')->where('is_delete', '0')->paginate(15);
        // dd($data);
            return view('admin.HomeAdmin.homeAdminlisting', compact('data'));
        }
    public function create()
    {
        return view('admin.HomeAdmin.addhomeAdmin');
        
    }

    public function store(Request $request)
    {
        $home = new HomeAdmin();
        $banner_labels = $request->banner_label;
        $banner_desc = $request->banner_desc;
        $banner_img = [];
        if ($request->hasFile('banner_image')) {
            $banner_img = [];

            // Loop through each uploaded file
            foreach ($request->file('banner_image') as $file) {
                $filename = $file->getClientOriginalName();
                $path = public_path('/home-page-images');
                $file->move($path, $filename);
                $banner_img[] = $filename;
            }
        }

        foreach ($banner_labels as $index => $banner_label) {
            $banner_data[] = [
                'banner_label' => $banner_label,
                'banner_desc' => $banner_desc[$index],
                'banner_img' => $banner_img[$index],
            ];
        }
        // dd($banner_data);
        $home->banner_data = json_encode($banner_data);
        $home->save();

        return redirect('/homeadmin/homeAdminlisting')->with('success', 'Home Admin Added Successfully');


    }
    public function edit($id)
    {
        $data = HomeAdmin::find($id);
        // dd($data);
        return view('admin.HomeAdmin.edithomeAdmin', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $home = HomeAdmin::find($id);
        $banner_labels = $request->banner_label;
        $banner_desc = $request->banner_desc;
        $banner_alt = $request->banner_alt;
    
        $existing_banner_data = json_decode($home->banner_data, true) ?? [];
    
        $uploaded_images = [];
        
        if ($request->hasFile('banner_image')) {
            foreach ($request->file('banner_image') as $index => $file) {
                $filename = $file->getClientOriginalName();
                $path = public_path('/home-page-images');
                $file->move($path, $filename);
                $uploaded_images[$index] = $filename; 
            }
        }
    
        $banner_data = [];
        foreach ($banner_labels as $index => $banner_label) {
            $image = isset($uploaded_images[$index])
                ? $uploaded_images[$index]
                : ($existing_banner_data[$index]['banner_img'] ?? null); 
    
            if ($image === null) {
                continue;
            }
    
            $banner_data[] = [
                'banner_label' => $banner_label,
                'banner_desc' => $banner_desc[$index],
                'banner_img' => $image, 
                'banner_alt' => $banner_alt[$index],
            ];
        }
    
        $home->banner_data = json_encode($banner_data);
        $home->save();
    
        return redirect('/admin/home')->with('success', 'Home Admin Updated Successfully');
    }
    public function destroy($id)
    {
        $data = HomeAdmin::find($id);
        $data->is_delete = '1';
        $data->update();
        return redirect()->back()->with('success', 'Your Home Banner Has Been Deleted Successfully!');
    }
}
