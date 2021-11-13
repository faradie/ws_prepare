<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $models = Product::all();
            return DataTables::of($models)
                ->addColumn('action', function($model){
                    $test = '
                    <div class="btn-group">
                        <button type="button" onclick="product_edit('."'".route('products.show',$model->id)."'".')" class="btn btn-info">Edit</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" onclick="delete_data('."'".route('products.destroy',$model->id)."'".","."'".csrf_token()."'".","."'".
                            'products_datatable'."'".","."'".'products'."'".')">Delete</a>
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
        return view('pages.products.index');
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
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'details' => 'required',
        ]);

        $data = Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'image' => 'https://picsum.photos/200/200',
        ]);

        foreach ($request->details as $key => $value) {
            ProductDetail::create([
                'product_id' => $data->id,
                'detail' => $value,
            ]);
        }

        return response()->json([
            'message' => 'success',
            'code' => 201,
            'data' =>$data,
        ], 201);
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
            $data = Product::with(['details'])->find($id);

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
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'details' => 'required',
        ]);

        $data = Product::find($id);
        
        $data->update([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'image' => 'https://picsum.photos/200/200',
        ]);

        ProductDetail::where('product_id', $id)->delete();
        foreach ($request->details as $key => $value) {
            ProductDetail::create([
                'product_id' => $data->id,
                'detail' => $value,
            ]);
        }

        return response()->json([
            'message' => 'success',
            'code' => 201,
            'data' =>$data,
        ], 201);
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
            $data = Product::find($id);
            
            $data->delete();

            return response()->json([
                'message' => 'success',
                'code' => 202,
                'data' =>$data,
            ], 202);
        }
    }
}
