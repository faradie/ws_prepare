<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\BlogCategory;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Validation\Rule;
use App\Jobs\SubscribeJob;
use App\Models\Subscription;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $models = Blog::all();
            return DataTables::of($models)
                ->addColumn('action', function($model){
                    $test = '
                    <div class="btn-group">
                        <button type="button" onclick="blog_edit('."'".route('blogs.show',$model->id)."'".')" class="btn btn-info">Edit</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" onclick="delete_data('."'".route('blogs.destroy',$model->id)."'".","."'".csrf_token()."'".","."'".
                            'blogs_datatable'."'".","."'".'blogs'."'".')">Delete</a>
                        </div>
                    </div>
                    ';
                    return $test;
                })
                ->addIndexColumn()
                ->escapeColumns([])
                ->rawColumns(['action'])
                ->make(true);

        }
        $categories = Category::all();
        return view('pages.blogs.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
    
            $this->validate($request, [
                'title' => 'required|unique:blogs',
                'categories' => 'required',
                'body' => 'required',
            ]);


            $data = Blog::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'body' => $request->body
            ]);

            foreach ($request->categories as $key => $value) {
                BlogCategory::create([
                    'blog_id' => $data->id,
                    'category_id' => $value
                ]);
            }

            // disini menambahkan trigger subscribe email

            // 1. mendapatkan list email subscriber
            $subscribes = Subscription::all();
            foreach ($subscribes as $key => $value) {
                # code...
                $this->dispatch(new SubscribeJob($request->title,'Sahabatku',$value->email,'Ada yg baru loh!'));
            }

            return response()->json([
                'message' => 'success',
                'code' => 201,
                'data' =>$data,
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if($request->ajax()){
            $data = Blog::with(['categories'])->find($id);

            return response()->json([
                'message' => 'success',
                'code' => 200,
                'data' =>$data,
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if($request->ajax()){
            $data = Blog::find($id);
            $slug = Str::slug($request->title);
            
            $this->validate($request, [
                'title' => $data->title !== $request->title ? 'required|unique:blogs' : 'required',
                'categories' => 'required',
                'body' => 'required',
            ]);
    
            $data->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'body' => $request->body
            ]);

            $datas = $request->categories;

            if ($datas == null || count($datas) == 0) {
                BlogCategory::where('blog_id', '=', $id)->delete();
            } else {
                BlogCategory::whereNotIn('category_id', $request->categories)->where('blog_id', '=', $id)->delete();
                foreach ($datas as $key => $value) {
                    BlogCategory::updateOrCreate([
                        'category_id' => $value,
                        'blog_id' => $id
                    ]);
                }
            }

            return response()->json([
                'message' => 'success',
                'code' => 201,
                'data' =>$data,
            ], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $data = Blog::find($id);
            
            $data->delete();

            return response()->json([
                'message' => 'success',
                'code' => 202,
                'data' =>$data,
            ], 202);
        }
    }
}
