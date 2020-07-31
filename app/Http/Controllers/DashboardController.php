<?php

namespace App\Http\Controllers;

use App\Upload;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
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
            'meme_image' => 'required|mimes:jpeg,jpg,png|max:1024',
        ])->validate();

        // Capture Files for upload
        $meme_image = $request->file('meme_image')->getRealPath();

        Cloudder::upload($meme_image, null);

        $cloudinary_image = Cloudder::getResult();

        $upload = Upload::create([
            'user_id' => Auth::user()->id,
            'title' => $request['title'] != "" ? $request['title'] : Str::random(50),
            'type' => 'image',
            'points' => '1',
            'image' => $cloudinary_image['url'],
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
}
