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
            if(is_array($request->video))
            {
                $videoFileName = "";
                $flag = true;
                foreach ($request->video as $video) {
                    if($flag)
                    {
                        $videoFileName .= time() . '_' . $video->getClientOriginalName();
                        $flag = !$flag;
                    }
                    else
                    {
                        $videoFileName .= "," . time() . '_' . $video->getClientOriginalName();
                    }
                    $video->move(public_path('videos'), $videoFileName);
                }
            }
            else if ($request->hasFile('video')) {
                    $videoFile = $request->file('video');
                    $videoFileName = time() . '_' . $videoFile->getClientOriginalName();
                    $videoFile->move(public_path('videos'), $videoFileName);
            }

            $previewFileName = "";
            if(is_array($request->preview))
            {
                $flag = true;
                foreach ($request->preview as $preview) {
                    if($flag)
                    {
                        $previewFileName .= time() . '_' . $preview->getClientOriginalName();
                        $flag = !$flag;
                    }
                    else
                    {
                        $previewFileName .= "," . time() . '_' . $preview->getClientOriginalName();
                    }
                    $preview->move(public_path('previews'), $previewFileName);
                }
            }
            else if ($request->hasFile('preview')) {
                $previewFile = $request->file('preview');
                $previewFileName = time() . '_' . $previewFile->getClientOriginalName();
                $previewFile->move(public_path('previews'), $previewFileName);
            }

            $video = Video::create([
                'category_id' => $request->input('category_id'),
                'sub_category_id' => $request->input('sub_category_id'),
                'popular_topic_id' => $request->input('popular_topic_id'),
                'video_course_name' => $request->input('video_course_name'),
                'video' => $videoFileName,
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'author' => $request->input('author'),
                'perview' => $previewFileName,
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

    public function Updatevideo(Request $request, $id)
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
            $video = Video::findOrFail($id);

            // Handle multiple video uploads
            $videoFiles = [];
            if ($request->hasFile('videos')) {
                foreach ($request->file('videos') as $videoFile) {
                    $videoFileName = time() . '_' . $videoFile->getClientOriginalName();
                    $videoFile->move(public_path('videos'), $videoFileName);
                    $videoFiles[] = $videoFileName;
                }
            }

            // Update existing videos if provided
            if ($request->has('existing_videos')) {
                foreach ($request->input('existing_videos') as $existingVideo) {
                    // Process each existing video if needed (e.g., update properties)
                }
            }

            // Handle preview image upload
            if ($request->hasFile('preview')) {
                $previewFile = $request->file('preview');
                $previewFileName = time() . '_' . $previewFile->getClientOriginalName();
                $previewFile->move(public_path('previews'), $previewFileName);

                // Delete the old preview file if it exists
                if ($video->preview && file_exists(public_path('previews/' . $video->preview))) {
                    unlink(public_path('previews/' . $video->preview));
                }

                $video->preview = $previewFileName;
            } else if ($request->input('existing_preview')) {
                // Keep the existing preview file name
                $video->preview = $request->input('existing_preview');
            }

            // Update the video record
            $video->update([
                'category_id' => $request->input('category_id'),
                'sub_category_id' => $request->input('sub_category_id'),
                'popular_topic_id' => $request->input('popular_topic_id'),
                'video_course_name' => $request->input('video_course_name'),
                'price' => $request->input('price'),
                'author' => $request->input('author'),
                'description' => $request->input('description'),
            ]);

            // Attach new video files to the video record
            foreach ($videoFiles as $fileName) {
                $video->videos()->create(['file_name' => $fileName]);
            }

            session()->flash('success', 'Video updated successfully');
            return response()->json(['success' => true, 'message' => 'Video updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function Destroyvideo($id)
    {
        $video = Video::find($id);
        $video->delete();
        session()->flash('danger', 'Video Delete successfully!');
        return redirect()->back();
    }
}
