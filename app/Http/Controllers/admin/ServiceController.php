<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $data = Service::orderBy('created_at', 'desc')->where('is_delete', '0')->paginate(15);
        // dd($data);
        return view('admin.service.servicelisting', compact('data'));
    }
    public function create()
    {
        return view('admin.service.addservice');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $service = new Service();

        $service->service_header = $request->service_header;
        $service->header_img_alt = $request->header_img_alt;
        $service->service_banner_alt = $request->service_banner_alt;

        if ($request->hasFile('service_banner_image')) {
            $file = $request->file('service_banner_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Service images');
            $file->move($path, $filename);
            $service->service_banner_image = $filename;
        }
        
        $service->ser_url = $request->ind_url;
        $service->work_title = $request->work_title;
        $service->work_desc = $request->work_desc;
        if ($request->hasFile('service_header_image')) {
            $file = $request->file('service_header_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Service images');
            $file->move($path, $filename);
            $service->service_header_image = $filename;
        }
        $work_tab_lables = $request->work_tab_label;
        $work_tab_desc = $request->work_tab_desc;
        $work_tab_img_alt = $request->work_tab_img_alt;
        $work_tab_icon_alt = $request->work_tab_icon_alt;
        $work_tab_images = [];
        if ($request->hasFile('work_tab_image')) {
            $work_tab_images = [];

            foreach ($request->file('work_tab_image') as $file) {
                $filename = $file->getClientOriginalName();
                $path = public_path('/Service images');
                $file->move($path, $filename);
                $work_tab_images[] = $filename;
            }
        }

        if ($request->hasFile('work_tab_icon')) {
            $work_tab_icons = [];

            foreach ($request->file('work_tab_icon') as $file) {
                $filename = $file->getClientOriginalName();
                $path = public_path('/Service images');
                $file->move($path, $filename);
                $work_tab_icons[] = $filename;
            }
        }
        foreach ($work_tab_lables as $index => $work_tab_lable) {
            $work_tab_data[] = [
                'work_tab_label' => $work_tab_lable,
                'work_tab_desc' => $work_tab_desc[$index],
                'work_tab_images' => $work_tab_images[$index],
                'work_tab_icons' => $work_tab_icons[$index],
                'work_tab_img_alt' => $work_tab_img_alt[$index],
                'work_tab_icon_alt' => $work_tab_icon_alt[$index],

            ];
        }
        $service->work_tab_data = json_encode($work_tab_data);


        if ($request->hasFile('wall_image')) {
            $file = $request->file('wall_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Service images');
            $file->move($path, $filename);
            $service->wall_image = $filename;
        }
        $wall_titles = $request->get('wall_title');
        $wall_descriptions = $request->get('wall_description');
        $wall_title_description = [];
        foreach ($wall_titles as $index => $wall_title) {
            $wall_title_description[] = [
                'wall_title' => $wall_title,
                'wall_description' => $wall_descriptions[$index],
            ];
        }
        $service->wall_title_description = json_encode($wall_title_description);

        if ($request->hasFile('key_image')) {
            $file = $request->file('key_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Service images');
            $file->move($path, $filename);
            $service->key_image = $filename;
        }
        $service->key_description = $request->key_description;
        $service->key_image_alt = $request->key_image_alt;
        $service->save();

        return redirect('/admin/service')->with('success', 'Industry Added Successfully');
    }


    public function edit($id)
    {
        $data = Service::find($id);
        // dd($data);
        return view('admin.service.editservice', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        $service->service_header = $request->service_header;
        $service->header_img_alt = $request->header_img_alt;
        $service->ser_url = $request->ser_url;
        $service->work_title = $request->work_title;
        $service->work_desc = $request->work_desc;

        $service->service_banner_alt = $request->service_banner_alt;

        if ($request->hasFile('service_banner_image')) {
            $file = $request->file('service_banner_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Service images');
            $file->move($path, $filename);
            $service->service_banner_image = $filename;
        }
        
        if ($request->hasFile('service_header_image')) {
            $file = $request->file('service_header_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Service images');
            $file->move($path, $filename);
            $service->service_header_image = $filename;
        }

        $work_tab_labels = $request->work_tab_label;
        $work_tab_desc = $request->work_tab_desc;
        $work_tab_img_alt = $request->work_tab_img_alt;
        $work_tab_icon_alt = $request->work_tab_icon_alt;

        $existing_work_tab_images = json_decode($service->work_tab_data, true) ?? [];

        if ($request->has('delete_img')) {
            foreach ($request->delete_img as $deleteImage) {
                foreach ($existing_work_tab_images as $index => $existingImage) {
                    if ($existingImage['work_tab_images'] === $deleteImage) {
                        unset($existing_work_tab_images[$index]);
                        break;
                    }
                }
            }
        }

        $workTabImages = $request->file('work_tab_image') ?? [];
        $workTabIcons = $request->file('work_tab_icon') ?? [];

        $maxFiles = max(count($workTabImages), count($workTabIcons), count($work_tab_labels));

        for ($index = 0; $index < $maxFiles; $index++) {
            if (isset($workTabImages[$index])) {
                $imageFile = $workTabImages[$index];
                $imageFilename = $imageFile->getClientOriginalName();
                $imagePath = public_path('/Service images');
                $imageFile->move($imagePath, $imageFilename);
            } else {
                $imageFilename = $existing_work_tab_images[$index]['work_tab_images'] ?? null;
            }

            if (isset($workTabIcons[$index])) {
                $iconFile = $workTabIcons[$index];
                $iconFilename = $iconFile->getClientOriginalName();
                $iconPath = public_path('/Service images');
                $iconFile->move($iconPath, $iconFilename);
            } else {
                $iconFilename = $existing_work_tab_images[$index]['work_tab_icons'] ?? null;
            }

            $existing_work_tab_images[$index] = [
                'work_tab_label' => $work_tab_labels[$index] ?? $existing_work_tab_images[$index]['work_tab_label'] ?? '',
                'work_tab_desc' => $work_tab_desc[$index] ?? $existing_work_tab_images[$index]['work_tab_desc'] ?? '',
                'work_tab_images' => $imageFilename,
                'work_tab_icons' => $iconFilename,
                'work_tab_img_alt' => $work_tab_img_alt[$index] ?? $existing_work_tab_images[$index]['work_tab_img_alt'] ?? '',
                'work_tab_icon_alt' => $work_tab_icon_alt[$index] ?? $existing_work_tab_images[$index]['work_tab_icon_alt'] ?? '',
            ];
        }

        // Save updated work tab data
        $service->work_tab_data = json_encode($existing_work_tab_images);

        // Handle wall image
        if ($request->hasFile('wall_image')) {
            $file = $request->file('wall_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Service images');
            $file->move($path, $filename);
            $service->wall_image = $filename;
        }

        // Handle wall titles and descriptions
        $wall_titles = $request->get('wall_title');
        $wall_descriptions = $request->get('wall_description');
        $wall_title_description = [];
        foreach ($wall_titles as $index => $wall_title) {
            $wall_title_description[] = [
                'wall_title' => $wall_title,
                'wall_description' => $wall_descriptions[$index],
            ];
        }
        $service->wall_title_description = json_encode($wall_title_description);

        // Handle key image
        if ($request->hasFile('key_image')) {
            $file = $request->file('key_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Service images');
            $file->move($path, $filename);
            $service->key_image = $filename;
        }

        // Save key description
        $service->key_description = $request->key_description;

        // Save the service data
        $service->save();

        return redirect('/admin/service')->with('success', 'Service Updated Successfully');
    }





    public function destroy($id)
    {
        $data = Service::find($id);
        $data->is_delete = '1';
        $data->update();
        return redirect()->back()->with('success', 'Your service Has Been Deleted Successfully!');
    }
}
