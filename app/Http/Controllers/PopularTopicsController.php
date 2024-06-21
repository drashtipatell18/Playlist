<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\PopularTopics;

use Illuminate\Http\Request;

class PopularTopicsController extends Controller
{
    public function populartopics(){
        $populartopics = PopularTopics::with(['category', 'subCategory'])->get();
        return view('populartopics.view_popular_topic',compact('populartopics'));
    }

    public function createPopulartopics(){
        $categorys = Category::all();
        $subcategorys = SubCategory::all();
        return view('populartopics.create_popular_topic',compact('categorys','subcategorys'));
    }
    public function storePopulartopics(Request $request) {
        $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'popular_topics_name' => 'required',
        ]);
        
        PopularTopics::create([
            'category_id' => $request->input('category_id'),
            'sub_category_id' => $request->input('sub_category_id'),
            'popular_topics_name' => $request->input('popular_topics_name'),
        ]);

        session()->flash('success', 'Popular Topics added successfully!');
        return redirect()->route('populartopics');
    }
    public function EditPopulartopics($id)
    {
        $populartopic = PopularTopics::find($id);
        $subcategorys = SubCategory::all();
        $categorys = Category::all();
        return view('populartopics.create_popular_topic', compact('populartopic','subcategorys','categorys'));
    }

    public function UpdatePopulartopics(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'popular_topics_name' => 'required',
        ]);
    
        $populartopic = PopularTopics::find($id);
    
        $populartopic->update([
           'category_id' => $request->input('category_id'),
            'sub_category_id' => $request->input('sub_category_id'),
            'popular_topics_name' => $request->input('popular_topics_name'),
        ]);

        session()->flash('success', 'Popular Topics Updated successfully!');
        return redirect()->route('populartopics');
    }
    public function DestroyPopulartopics($id)
    {
        $populartopic = PopularTopics::find($id);
        $populartopic->delete();
        session()->flash('danger', 'Popular Topics Delete successfully!');
        return redirect()->back();
    }
}
