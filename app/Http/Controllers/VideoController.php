<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\PopularTopics;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function video()
    {
        $videos = Video::all();
        return view('video.view_video', compact('videos'));
    }

    public function createvideo()
    {
        $categorys = Category::all();
        $subcategorys = SubCategory::all();
        $populartopics = PopularTopics::pluck('id', 'popular_topics_name');
        return view('video.create_video', compact('categorys', 'subcategorys', 'populartopics'));
    }

    public function storevideo(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'popular_topic_id' => 'required|exists:popular_topics,id',
            'video_course_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
         
        ]);

        try {
            if ($request->hasFile('video')) {
                $videoFile = $request->file('video');
                $videoFileName = time() . '_' . $videoFile->getClientOriginalName();
                $videoFile->move('videos', $videoFileName); // Store video file in 'storage/app/videos' folder
            }

            if ($request->hasFile('preview')) {
                $previewFile = $request->file('preview');
                $previewFileName = time() . '_' . $previewFile->getClientOriginalName();
                $previewFile->move('previews', $previewFileName); // Store preview image in 'storage/app/previews' folder
            }

            Video::create([
                'category_id' => $request->input('category_id'),
                'sub_category_id' => $request->input('sub_category_id'),
                'popular_topic_id' => $request->input('popular_topic_id'),
                'video' => $videoFileName, // Store video file name in database
                'video_course_name' => $request->input('video_course_name'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'author' => $request->input('author'),
                'preview' => $previewFileName, // Store preview image file name in database
            ]);

            session()->flash('success', 'Video inserted successfully');
            return response()->json(['success' => true, 'message' => 'Video inserted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


    public function Editvideo($id)
    {
        $video = Video::find($id);
        $categorys = Category::all();
        $subcategorys = SubCategory::all();
        $populartopics = PopularTopics::pluck('id', 'popular_topics_name');
        return view('video.create_video', compact('video', 'categorys', 'subcategorys', 'populartopics'));
    }

    public function Updatevideo(Request $request,)
    {
        
    }

    public function Destroyvideo()
    {
    }
}
