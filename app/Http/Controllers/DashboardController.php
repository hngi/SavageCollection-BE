<?php

namespace App\Http\Controllers;

use App\Upload;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('dashboard.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function newUpload()
    {
        return view('dashboard.new_upload');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function myUploads()
    {
        return view('dashboard.my_uploads');
    }

    public function newImageUpload(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'sometimes|max:255',
            'meme_image' => 'required|image|max:1024',
        ])->validate();

        // Capture Files for upload
        $meme_image = $request->file('meme_image');
        // Generate Random Name
        $save_as_name_meme_image = Str::random(35) . "." . $meme_image->getClientOriginalExtension();
        // Set Folder to move file
        $upload_path_meme_image = public_path().'/uploads/memes';
        // Move File
        $move_meme_image = $meme_image->move( $upload_path_meme_image, $save_as_name_meme_image );

        $upload = Upload::create([
            'user_id' => Auth::user()->id,
            'title' => $request['title'] != "" ? $request['title'] : Str::random(50),
            'type' => 'image',
            'points' => '1',
            'image' => $save_as_name_meme_image,
        ]);

        return redirect()->back()->with('success', 'Upload Successful ✔');
    }

    public function newTextUpload(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'sometimes|max:255',
            'meme_text' => 'required|string|max:255',
        ])->validate();

        $upload = Upload::create([
            'user_id' => Auth::user()->id,
            'title' => $request['title'] != "" ? $request['title'] : Str::random(50),
            'type' => 'text',
            'points' => '1',
            'text' => $request['meme_text'],
        ]);

        return redirect()->back()->with('success', 'Upload Successful ✔');
    }

    public function edit(Upload $upload, $id){

        $data = $upload->where("id", $id)->get();
        return view('dashboard.update')->with("data", $data);
    }

    public function update(Request $request, Upload $upload, $id){
        Validator::make($request->all(), [
            'title' => 'required|sometimes|max:255',
            'meme_text' => 'required|string|max:255',
        ])->validate();        
        
        $data = $upload->where("id", $id)->update([
            "title" => $request["title"],
            "text" => $request["meme_text"]
        ]);

        if($data){
           return redirect()->route('dashboard.my_uploads')->with("success", "Update Successful");
        }else {
            return back()->with("error", "Update failed");
        }
    }

    public function delete($id){

        $data = Upload::findOrfail($id);

        $data->delete();
        return redirect()->route('dashboard.home');
    }
}
