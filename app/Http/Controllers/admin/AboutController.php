<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $data = About::orderBy('created_at', 'desc')->where('is_delete', '0')->paginate(15);

        // dd($data);
        return view('admin.about.aboutlisting', compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $about = new About();

        if ($request->hasFile('bg_image')) {
            $file = $request->file('bg_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/About-us images');
            $file->move($path, $filename);
            $about->bg_image = $filename;
        }

        if ($request->hasFile('about_image')) {
            $file = $request->file('about_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/About-us images');
            $file->move($path, $filename);
            $about->about_image = $filename;
        }

        if ($request->hasFile('missson_image')) {
            $file = $request->file('missson_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/About-us images');
            $file->move($path, $filename);
            $about->missson_image = $filename;
        }

        if ($request->hasFile('vision_image')) {
            $file = $request->file('vision_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/About-us images');
            $file->move($path, $filename);
            $about->vision_image = $filename;
        }

        if ($request->hasFile('goal_image')) {
            $file = $request->file('goal_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/About-us images');
            $file->move($path, $filename);
            $about->goal_image = $filename;
        }

        if ($request->hasFile('who_image_f')) {
            $file = $request->file('who_image_f');
            $filename = $file->getClientOriginalName();
            $path = public_path('/About-us images');
            $file->move($path, $filename);
            $about->who_image_f = $filename;
        }

        if ($request->hasFile('who_image_s')) {
            $file = $request->file('who_image_s');
            $filename = $file->getClientOriginalName();
            $path = public_path('/About-us images');
            $file->move($path, $filename);
            $about->who_image_s = $filename;
        }

        $about->title = $request->title;
        $about->description = $request->description;
        $about->key_description = $request->key_description;
        $about->wall_title = $request->wall_title;
        $about->wall_desc = $request->wall_desc;
        $about->mission_title = $request->mission_title;
        $about->mission_desc = $request->mission_desc;
        $about->vision_title = $request->vision_title;
        $about->vision_desc = $request->vision_desc;
        $about->goal_title = $request->goal_title;
        $about->goal_desc = $request->goal_desc;
        $about->who_title = $request->who_title;
        $about->who_desc = $request->who_desc;
        $about->who_points = $request->who_points;

        $about->save();




        return view('admin.about.addabout');
    }

    public function edit($id)
    {
        $data = About::find($id);
        // dd($data);
        return view('admin.about.editabout', compact('data'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $about = About::find($id);

        if ($request->hasFile('bg_image')) {
            $file = $request->file('bg_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/About-us images');
            $file->move($path, $filename);
            $about->bg_image = $filename;
        }

        if ($request->hasFile('about_image')) {
            $file = $request->file('about_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/About-us images');
            $file->move($path, $filename);
            $about->about_image = $filename;
        }

        if ($request->hasFile('missson_image')) {
            $file = $request->file('missson_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/About-us images');
            $file->move($path, $filename);
            $about->missson_image = $filename;
        }

        if ($request->hasFile('vision_image')) {
            $file = $request->file('vision_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/About-us images');
            $file->move($path, $filename);
            $about->vision_image = $filename;
        }

        if ($request->hasFile('goal_image')) {
            $file = $request->file('goal_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/About-us images');
            $file->move($path, $filename);
            $about->goal_image = $filename;
        }

        if ($request->hasFile('who_image_f')) {
            $file = $request->file('who_image_f');
            $filename = $file->getClientOriginalName();
            $path = public_path('/About-us images');
            $file->move($path, $filename);
            $about->who_image_f = $filename;
        }

        if ($request->hasFile('who_image_s')) {
            $file = $request->file('who_image_s');
            $filename = $file->getClientOriginalName();
            $path = public_path('/About-us images');
            $file->move($path, $filename);
            $about->who_image_s = $filename;
        }

        $about->title = $request->title;
        $about->description = $request->description;
        $about->key_description = $request->key_description;
        $about->wall_title = $request->wall_title;
        $about->wall_desc = $request->wall_desc;
        $about->mission_title = $request->mission_title;
        $about->mission_desc = $request->mission_desc;
        $about->vision_title = $request->vision_title;
        $about->vision_desc = $request->vision_desc;
        $about->goal_title = $request->goal_title;
        $about->goal_desc = $request->goal_desc;
        $about->who_title = $request->who_title;
        $about->who_desc = $request->who_desc;
        $about->who_points = $request->who_points;
        $about->banner_img_alt = $request->banner_img_alt;
        $about->about_img_alt = $request->about_img_alt;
        $about->mission_img_alt = $request->mission_img_alt;
        $about->vision_img_alt = $request->vision_img_alt;
        $about->goal_img_alt = $request->goal_img_alt;
        $about->first_img_alt = $request->first_img_alt;
        $about->second_img_alt = $request->second_img_alt;

        $about->save();

        return redirect('/admin/about')->with('success', 'About Updated Successfully');
    }


    public function destroy($id)
    {
        $data = About::find($id);
        $data->is_delete = '1';
        $data->update();
        return redirect()->back()->with('success', 'Your Industry Has Been Deleted Successfully!');
    }
}
