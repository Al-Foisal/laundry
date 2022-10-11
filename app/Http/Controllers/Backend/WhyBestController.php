<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WhyBest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WhyBestController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $why_bests = WhyBest::all();

        return view('backend.why_best.index', compact('why_bests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('backend.why_best.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        if ($request->hasFile('image')) {

            $image_file = $request->file('image');

            if ($image_file) {

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/why_best/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }

        }

        WhyBest::create([
            'image'   => $final_name1,
            'name'    => $request->name,
            'details' => $request->details,
        ]);

        return to_route('admin.why_bests.index')->withToastSuccess('New best criteria added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(WhyBest $why_best) {
        return view('backend.why_best.edit', compact('why_best'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WhyBest $why_best) {

        if ($request->hasFile('image')) {

            $image_file = $request->file('image');

            if ($image_file) {

                $image_path = public_path($why_best->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/why_best/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
                $why_best->update([
                    'image' => $final_name1,
                ]);
            }

        }

        $why_best->update([
            'name'    => $request->name,
            'details' => $request->details,
        ]);

        return to_route('admin.why_bests.index')->withToastSuccess('Best criteria updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WhyBest $why_best) {
        $image_path = public_path($why_best->image);

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $why_best->delete();

        return to_route('admin.why_bests.index')->withToastSuccess('Best criteria deleted successfully');
    }

}
