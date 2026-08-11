<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceFaq;
use Illuminate\Http\Request;

class ServiceFaqController extends Controller
{
    public function index()
    {
        $data = ServiceFaq::orderBy('created_at', 'desc')->where('is_delete', '0')->paginate(15);
        $servicelist = Service::where('is_delete', '0')->get();
        return view('admin.servicefaq.servicefaqlisting', compact('data', 'servicelist'));
    }

    public function create()
    {
        $data = ServiceFaq::orderBy('created_at', 'desc')->where('is_delete', '0')->first(); // Use first() to get a single record
        $servicelist = Service::where('is_delete', '0')->get();
        return view('admin.servicefaq.addservicefaq', compact('data', 'servicelist'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'title.*' => 'required',
        ], [
            'title.*.required' => 'Please enter the title.',
        ]);

        $post = new ServiceFaq;
        $post->service_id = $request->get('industry_id');
        $post->servicename = $request->get('industryname');

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

        return redirect('/admin/servicefaq')->with('success', 'Service detail Added Successfully');
    }

    public function edit($id)
    {
        $data = ServiceFaq::find($id);
        $servicelist = Service::where('is_delete', '0')->get();
        return view('admin.servicefaq.editiservicefaq', compact('data', 'servicelist'));
    }

    public function update(Request $request, $id)
    {
        $post = ServiceFaq::find($id);
        $post->service_id = $request->get('industry_id');
        $post->servicename	 = $request->get('industryname');

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
        return redirect('/admin/industryfaq')->with('success', 'Industry detail Updated Successfully');
    }

    public function destroy($id)
    {
        $data = ServiceFaq::find($id);
        $data->is_delete = '1';
        $data->update();
        return redirect()->back()->with('success', 'Your Industry detail has been deleted successfully!');
    }
}
