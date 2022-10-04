<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WorkingProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WorkingProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $working_processes = WorkingProcess::all();

        return view('backend.working_process.index', compact('working_processes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('backend.working_process.create');
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
                $image_url = 'images/working_process/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }

        }

        WorkingProcess::create([
            'image'   => $final_name1,
            'name'    => $request->name,
            'details' => $request->details,
        ]);

        return to_route('admin.working_processes.index')->withToastSuccess('Working process added successfully.');
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
    public function edit(WorkingProcess $working_process) {
        return view('backend.working_process.edit', compact('working_process'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkingProcess $working_process) {

        if ($request->hasFile('image')) {

            $image_file = $request->file('image');

            if ($image_file) {

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/working_process/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
                $working_process->update([
                    'image' => $final_name1,
                ]);
            }

        }

        $working_process->update([
            'name'    => $request->name,
            'details' => $request->details,
        ]);

        return to_route('admin.working_processes.index')->withToastSuccess('Working process updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkingProcess $working_process) {
        $image_path = public_path($working_process->image);

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $working_process->delete();

        return to_route('admin.working_processes.index')->withToastSuccess('Working process deleted successfully');
    }
}
