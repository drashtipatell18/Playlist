<?php

namespace App\Http\Controllers;

use App\Models\VideoGroup;
use Illuminate\Http\Request;

class VideoGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function videogroup()
    {
        $videoGroups = VideoGroup::all();
        return view('videogroup.view_videogroup', compact('videoGroups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createVideogroup()
    {
        return view('videogroup.create_videogroup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeVideogroup(Request $request)
    {
        $request->validate([
            'group_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $videoGroup = [
            'group_name' => $request->input('group_name'),
            'price' => $request->input('price'),
        ];

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageFileName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move('video_groups', $imageFileName); // Store video file in 'storage/app/videos' folder
            $videoGroup["image"] = $imageFileName;
        }

        VideoGroup::create($videoGroup);

        return redirect()->route('video-group');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editVideogroup(string $id)
    {
        $videoGroup = VideoGroup::find($id);
       
        return view('videogroup.create_videogroup', compact('videoGroup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateVideogroup(Request $request, string $id)
    {
        // Validate the incoming request
        $request->validate([
            'group_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:10240', // Validate the image file
        ]);
    
        try {
            // Find the VideoGroup by ID
            $videoGroup = VideoGroup::findOrFail($id);
    
            // Update the VideoGroup attributes
            $videoGroup->update([
                'group_name' => $request->input('group_name'),
                'price' => $request->input('price'),
            ]);
    
            // Handle image file upload if present
            if ($request->hasFile('image')) {
                $imageFile = $request->file('image');
                $imageFileName = time() . '_' . $imageFile->getClientOriginalName();
                $imageFile->move('video_groups/', $imageFileName); // Move file to public/video_groups directory
                $videoGroup->image = $imageFileName; // Update the image attribute of VideoGroup
                $videoGroup->save(); // Save the changes to the database
            }
    
            // Redirect back to the video group listing page
            return redirect()->route('video-group')->with('success', 'Video group updated successfully');
        } catch (\Exception $e) {
            // Handle any exceptions that occur
            return redirect()->back()->with('error', 'Failed to update video group: ' . $e->getMessage());
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroyVideogroup(string $id)
    {
        $videoGroup = VideoGroup::find($id);
        $videoGroup->delete();
        session()->flash('danger', 'Video Delete successfully!');
        return redirect()->back();
    }
}
