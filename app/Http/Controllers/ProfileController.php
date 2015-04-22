<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MiaReto\Repositories\ProfileRepository;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Lib\TimelineHistory\History;

class ProfileController extends Controller {


    /**
     * @var ProfileRepository
     */
    private $ProfileRepository;

    public function __construct(ProfileRepository $ProfileRepository){

        $this->ProfileRepository = $ProfileRepository;
    }
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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug, History $history)
    {
        $profile = $this->ProfileRepository->GetProfileWithSlug($slug)->first();
        if(!$profile) App::abort(404);

        $history->repository()->add($profile);
        $history = $history->repository()->all();

        $messages   = Message::IdDescending()->FromProfile($profile)->with('profile','profile.profileimage')->limit(30)->get();

        return view("profile.profile")->with(compact('profile','messages','history'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
