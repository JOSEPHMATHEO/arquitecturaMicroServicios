<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\LibraryService;
use Illuminate\Http\Response;

class LibraryController extends Controller
{
    use ApiResponser;

    public $libraryService;

    public function __construct(LibraryService $libraryService)
    {
        $this->libraryService = $libraryService;
    }

    public function index()
    {
        return $this->successResponse($this->libraryService->obtainLibraries());
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->libraryService->createLibrary($request->all()), Response::HTTP_CREATED);
    }

    public function show($library)
    {
        return $this->successResponse($this->libraryService->obtainLibrary($library));
    }

    public function update(Request $request, $library)
    {
        return $this->successResponse($this->libraryService->editLibrary($request->all(), $library));
    }

    public function destroy($library)
    {
        return $this->successResponse($this->libraryService->deleteLibrary($library));
    }

}
