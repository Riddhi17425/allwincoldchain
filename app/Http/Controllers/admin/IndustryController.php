<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Industry;

class IndustryController extends Controller
{
    public function index()
    {
        $data = Industry::orderBy('created_at', 'desc')->where('is_delete', '0')->paginate(15);
        // dd($data);
        return view('admin.industry.industrylisting', compact('data'));
    }
    public function create()
    {
        return view('admin.industry.addindustry');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $industry = new Industry();

        $industry->industry_header = $request->industry_header;
        $industry->title = $request->title;
        $industry->heading = $request->heading;
        $industry->ind_url = $request->ind_url;
        $industry->work_title = $request->work_title;
        $industry->work_desc = $request->work_desc;
        $industry->meta_title = $request->meta_title;
        $industry->meta_description = $request->meta_description;
        $industry->header_img_alt = $request->header_img_alt;
        if ($request->hasFile('industry_header_image')) {
            $file = $request->file('industry_header_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Industry images');
            $file->move($path, $filename);
            $industry->industry_header_image = $filename;
        }
        $work_tab_lables = $request->work_tab_label;
        $work_tab_desc = $request->work_tab_desc;
        $tab_icon_alt = $request->tab_icon_alt;
        $tab_img_alt = $request->tab_img_alt;
        $work_tab_images = [];
        if ($request->hasFile('work_tab_image')) {
            $work_tab_images = [];

            foreach ($request->file('work_tab_image') as $file) {
                $filename = $file->getClientOriginalName();
                $path = public_path('/Industry images');
                $file->move($path, $filename);
                $work_tab_images[] = $filename;
            }
        }

        if ($request->hasFile('work_tab_icon')) {
            $work_tab_icons = [];

            foreach ($request->file('work_tab_icon') as $file) {
                $filename = $file->getClientOriginalName();
                $path = public_path('/Industry images');
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
                'tab_icon_alt' => $tab_icon_alt[$index],
                'tab_img_alt' => $tab_img_alt[$index],
            ];
        }
        // dd($work_tab_data);
        $industry->work_tab_data = json_encode($work_tab_data);


        if ($request->hasFile('wall_image')) {
            $file = $request->file('wall_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Industry images');
            $file->move($path, $filename);
            $industry->wall_image = $filename;
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
        $industry->wall_title_description = json_encode($wall_title_description);

        if ($request->hasFile('key_image')) {
            $file = $request->file('key_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Industry images');
            $file->move($path, $filename);
            $industry->key_image = $filename;
        }
        $industry->key_description = $request->key_description;
        $industry->key_image_alt = $request->key_image_alt;
        $industry->save();

        return redirect('/admin/industry')->with('success', 'Industry Added Successfully');
    }


    public function edit($id)
    {
        $data = Industry::find($id);
        // dd($data);
        return view('admin.industry.editindustry', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $industry = Industry::find($id);

        $industry->industry_header = $request->industry_header;
        $industry->title = $request->title;
        $industry->heading = $request->heading;
        $industry->ind_url = $request->ind_url;
        $industry->work_title = $request->work_title;
        $industry->work_desc = $request->work_desc;
        $industry->meta_title = $request->meta_title;
        $industry->meta_description = $request->meta_description;
        $industry->header_img_alt = $request->header_img_alt;
        $industry->is_check = $request->has('is_check') ? 1 : 0; 
        if ($request->hasFile('industry_header_image')) {
            $file = $request->file('industry_header_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Industry images');
            $file->move($path, $filename);
            $industry->industry_header_image = $filename;
        }

        $work_tab_labels = $request->work_tab_label;
        $work_tab_desc = $request->work_tab_desc;
        $tab_icon_alt = $request->tab_icon_alt;
        $tab_img_alt = $request->tab_img_alt;
        $existing_work_tab_images = json_decode($industry->work_tab_data, true) ?? [];

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

        $workTabImages = $request->file('work_tab_image') ?? [];
        $workTabIcons = $request->file('work_tab_icon') ?? [];

        $maxFiles = max(count($workTabImages), count($workTabIcons), count($work_tab_labels), count($work_tab_desc));

        for ($index = 0; $index < $maxFiles; $index++) {
            if (isset($workTabImages[$index])) {
                $imageFile = $workTabImages[$index];
                $imageFilename = $imageFile->getClientOriginalName();
                $imagePath = public_path('/Industry images');
                $imageFile->move($imagePath, $imageFilename);
            } else {
                $imageFilename = $existing_work_tab_images[$index]['work_tab_images'] ?? null;
            }

            if (isset($workTabIcons[$index])) {
                $iconFile = $workTabIcons[$index];
                $iconFilename = $iconFile->getClientOriginalName();
                $iconPath = public_path('/Industry images');
                $iconFile->move($iconPath, $iconFilename);
            } else {
                $iconFilename = $existing_work_tab_images[$index]['work_tab_icon'] ?? null;
            }

            $existing_work_tab_images[$index] = [
                'work_tab_label' => $work_tab_labels[$index] ?? $existing_work_tab_images[$index]['work_tab_label'] ?? '',
                'work_tab_desc'  => $work_tab_desc[$index] ?? $existing_work_tab_images[$index]['work_tab_desc'] ?? '',
                'work_tab_images' => $imageFilename,
                'work_tab_icons'   => $iconFilename,
                'tab_icon_alt'   => $tab_icon_alt[$index] ?? $existing_work_tab_images[$index]['tab_icon_alt'] ?? '',
                'tab_img_alt'   => $tab_img_alt[$index] ?? $existing_work_tab_images[$index]['tab_img_alt'] ?? '',
            ];
        }


        // dd(json_encode($existing_work_tab_images));

        $industry->work_tab_data = json_encode($existing_work_tab_images);

        if ($request->hasFile('wall_image')) {
            $file = $request->file('wall_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Industry images');
            $file->move($path, $filename);
            $industry->wall_image = $filename;
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
        $industry->wall_title_description = json_encode($wall_title_description);

        if ($request->hasFile('key_image')) {
            $file = $request->file('key_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Industry images');
            $file->move($path, $filename);
            $industry->key_image = $filename;
        }
        $industry->key_description = $request->key_description;
        $industry->is_check = $request->has('is_check') ? 1 : 0; 
        $industry->save();

        return redirect('/admin/industry')->with('success', 'Industry Updated Successfully');
    }

    public function destroy($id)
    {
        $data = Industry::find($id);
        $data->is_delete = '1';
        $data->update();
        return redirect()->back()->with('success', 'Your industry Has Been Deleted Successfully!');
    }
}
