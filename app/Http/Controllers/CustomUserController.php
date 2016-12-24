<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Posts;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;;
class CustomUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('posts')->paginate();
        //dd($data);
        return view('admin.customUser.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customUser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'content'=>'required|max:50'
                ]);

        $login_user_id = Auth::User()->id;
        $data = $request->content;

        $custom_user = new Posts;
        $custom_user->content = $request->content;
        $custom_user->user_id = $login_user_id;
        if($custom_user->save())
        {
            return redirect('customUser/create')->with('success','Content inserted!');
        }
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
        $post_data = Posts::find($id);
        return view('admin.customUser.create',compact('post_data'));
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
        $this->validate($request,[
            'content' => 'required|max:50'
        ]);

        Posts::find($id)->update($request->all());

        return redirect('customUser')->with('update','Content update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posts::destroy($id);

        return redirect()->back();
    }
}
