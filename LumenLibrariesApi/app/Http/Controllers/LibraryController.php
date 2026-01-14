<?php

namespace App\Http\Controllers;

use App\Library;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LibraryController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return libraries list
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $libraries = Library::all();
        return $this->successResponse($libraries);
    }

    /**
     * Return an specific library
     * @return Illuminate\Http\Response
     */
    public function show($library)
    {
        $library = Library::findOrFail($library);
        return $this->successResponse($library);
    }

    /**
     * Create an instance of Library
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'max:50',
            'email' => 'email|max:255',
        ];

        $this->validate($request, $rules);

        $library = Library::create($request->all());

        return $this->successResponse($library, Response::HTTP_CREATED);
    }

    /**
     * Update the information of an existing library
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $library)
    {
        $rules = [
            'name' => 'max:255',
            'address' => 'max:255',
            'phone' => 'max:50',
            'email' => 'email|max:255',
        ];

        $this->validate($request, $rules);

        $library = Library::findOrFail($library);

        $library->fill($request->all());

        if ($library->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $library->save();

        return $this->successResponse($library);
    }

    /**
     * Removes an existing library
     * @return Illuminate\Http\Response
     */
    public function destroy($library)
    {
        $library = Library::findOrFail($library);

        $library->delete();

        return $this->successResponse($library);
    }
}
