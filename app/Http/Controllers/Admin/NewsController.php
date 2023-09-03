<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'DESC')->get();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required|string',
            'logo' => 'nullable|image'
        ]);

        $new = new News();
        $new->name = $request->get('name');
        $new->title = $request->get('title');
        $new->description = $request->get('description');
        if ($request->hasFile('logo')) {
            $new->logo = $request->file('logo')->store('news', 'public');
        }

        $new->save();

        return redirect()->route('admins.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['new'] = News::findOrFail($id);
        return view('admin.news.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required|string',
            'logo' => 'nullable|image'
        ]);

        $new = News::findOrFail($id);
        $new->name = $request->get('name');
        $new->title = $request->get('title');
        $new->description = $request->get('description');
        if ($request->hasFile('logo')) {
            Storage::delete($new->logo);
            $new->logo = $request->file('logo')->store('news', 'public');
        }

        $new->save();

        return redirect()->route('admins.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::findOrFail($id);
        Storage::delete($new->logo);
        $new->delete();

        return redirect()->route('admins.news.index');
    }
}
