<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\IndustryFaq;
use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryFaqController extends Controller
{
    public function index()
    {
        $data = IndustryFaq::orderBy('created_at', 'desc')->where('is_delete', '0')->paginate(15);
        $industrylist = Industry::where('is_delete', '0')->get();
        return view('admin.industryfaq.industryfaqlisting', compact('data', 'industrylist'));
    }

    public function create()
    {
        $industrylist = Industry::where('is_delete', '0')->get();
        $data = IndustryFaq::orderBy('created_at', 'desc')->where('is_delete', '0')->first(); // Use first() to get a single record
        return view('admin.industryfaq.addindustryfaq', compact('data', 'industrylist'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'title.*' => 'required',
        ], [
            'title.*.required' => 'Please enter the title.',
        ]);

        $post = new IndustryFaq;
        $post->industry_id = $request->get('industry_id');
        $post->industryname = $request->get('industryname');

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

        return redirect('/admin/industryfaq')->with('success', 'Industry detail Added Successfully');
    }

    public function edit($id)
    {
        $data = IndustryFaq::find($id);
        $industrylist = Industry::where('is_delete', '0')->get();
        return view('admin.industryfaq.editindustryfaq', compact('data', 'industrylist'));
    }

    public function update(Request $request, $id)
    {
        $post = IndustryFaq::find($id);
        $post->industry_id = $request->get('industry_id');
        $post->industryname = $request->get('industryname');

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
        $data = IndustryFaq::find($id);
        $data->is_delete = '1';
        $data->update();
        return redirect()->back()->with('success', 'Your Industry detail has been deleted successfully!');
    }
}
