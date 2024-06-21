<?php

namespace App\Http\Controllers;

use App\Models\VideoGroup;
use Illuminate\Http\Request;

class VideoGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videoGroups = VideoGroup::all();
        return view('videogroup.view_videogroup', compact('videoGroups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videogroup.create_videogroup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'group_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $videoGroup = [
            'group_name' => $request->input('group_name'),
            'price' => $request->input('price'),
        ];

        if($request->hasFile('image'))
        {
            $imageFile = $request->file('image');
            $imageFileName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move('vide_groups', $imageFileName); // Store video file in 'storage/app/videos' folder
            $videoGroup["image"] = $imageFileName;
        }

        VideoGroup::create($videoGroup);

        return redirect()->route('video-group');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
