<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Images;
use Auth;
use File;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $loginUserId;

    public function index()
    {
        return view('admin.imageModule.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.imageModule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->loginUserId = Auth::user()->id;
        $this->validate($request,[
                'image'=>'required|image|mimes:jpeg,png,bmp,jpg'
            ]);

        $image = $request->file('image');

        $createPath = public_path('images/upload');

        //check image is already uploaded or not
        $checkImage = Images::where('user_id',$this->loginUserId)->get()->count();
        
        if($checkImage > 0){
            Images::where('user_id',$this->loginUserId)->delete();
        }
        else
        {
            if(!File::exists($createPath.'/'.$this->loginUserId))
            {
                File::makeDirectory($createPath.'/'.$this->loginUserId,0775);
            }
        }
        $destination_path = public_path('images/upload/'.$this->loginUserId);

        $small_file = '32_'.$image->getClientOriginalName();
        $small_img = Image::make($image->getRealPath())->resize(32, 32);
        $small_img->save($destination_path.'/'.$small_file);
        
        $medium_file = '200_'.$image->getClientOriginalName();
        $medium_img = Image::make($image->getRealPath())->resize(200,200);
        $medium_img->save($destination_path.'/'.$medium_file);

        $large_file = 'large_'.$image->getClientOriginalName();
        $image->move($destination_path,$large_file);

        $data = [
            0 => [
                'size' => 'small',
                'name' => $small_file
            ],
            1 => [
                'size' => 'medium',
                'name' => $medium_file
            ],
            2 => [
                'size' => 'large',
                'name' => $large_file
            ]            
        ];

        //insert image into database
        foreach($data as $key=>$value)
        {
            $insert = new Images;
            $insert->user_id = $this->loginUserId;
            $insert->size = $value['size'];
            $insert->name = $value['name'];
            $insert->save();
        }
        return redirect('image')->with('success','Image Upload Successfully');
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
}
