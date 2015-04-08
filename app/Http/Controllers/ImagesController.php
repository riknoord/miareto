<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image AS intImage;
use Illuminate\Http\Response;

class ImagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

    /**
     * Create a new path, if it doesnt exist.
     * Update current profile image to be a normal image.
     * Insert new image wich will be the new profile image.
     * @param Request $request
     * @return mixed
     */
    public function addProfileImage(Request $request){
        $user = Auth::user();

        $id = $user->profile->id;
        $name = md5($id.time()).".jpg";
        $path = 'images/profiles/'.$id;

        File::makeDirectory($path, 0775, true, true);

        $image = intImage::make($request->file('file'))->fit(250)->save($path."/".$name);

        $user->profile->images()->update(["is_profile_image" => '0']);

        $img = new Image(['image' => $name,'is_profile_image' => '1']);
        $img = $user->profile->images()->save($img);

        return response()->json(['files' =>[['name' => $path."/".$name]]]);
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
        $profile = Auth::user()->profile;
        return view('images.edit')->with(['profile' => $profile]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
