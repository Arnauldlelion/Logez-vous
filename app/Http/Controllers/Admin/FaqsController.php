<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::orderBy('created_at', 'DESC')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a faq resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a faqly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'description' => 'required|string'
        ]);

        $faq = new Faq();
        $faq->type = $request->get('type');
        $faq->title = $request->get('title');
        $faq->description = $request->get('description');
        $faq->save();

        return redirect()->route('admins.faqs.index');
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
        $data['faq'] = Faq::findOrFail($id);
        return view('admin.faqs.edit', $data);
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
            'type' => 'required',
            'title' => 'required',
            'description' => 'required|string',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->type = $request->get('type');
        $faq->title = $request->get('title');
        $faq->description = $request->get('description');

        $faq->save();

        return redirect()->route('admins.faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        Storage::delete($faq->logo);
        $faq->delete();

        return redirect()->route('admins.faqs.index');
    }
}
