<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Blog;
use App\Models\Config;
use App\Models\Product;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required|email',
            ],[
                'title.required' => 'Email is required',
                'title.email' => 'Email is not valid',
            ]);

            $data = Subscription::create([
                'email' => $request->email
            ]);

            return redirect()->back()->with('message', 'Subscribe succeed '.$request->email.'!');
        } catch (Exception $e) {
            return redirect()->back()->with('erro_login', 'Subscribe failed!');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function landing()
    {
        $blogs = Blog::paginate(2);
        $products = Product::with(['details'])->get();
        $config = Config::first();
        return view('pages.welcome',compact(['blogs','config','products']));
    }

    public function detail_blog(Request $request, $slug)
    {
        $blog = Blog::where('slug',$slug)->first();
        return view('pages.detail_blog',compact(['blog']));
    }

}
