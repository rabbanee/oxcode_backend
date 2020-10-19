<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Attraction\ListResource;
use App\Models\Attraction;
use App\Http\Controllers\Controller;
use App\Http\Resources\Attraction\DetailResource;
use Illuminate\Http\Request;

class AttractionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attractions = Attraction::paginate(12);
        return ListResource::collection($attractions);
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
     * @param  \App\Models\Attraction  $attraction
     * @return \Illuminate\Http\Response
     */
    public function show(Attraction $attraction)
    {
        // return $attraction->pinPoint;
        return new DetailResource($attraction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attraction  $attraction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attraction $attraction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attraction  $attraction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attraction $attraction)
    {
        //
    }

    public function popular()
    {
        $attractions = Attraction::where('popular', true)->get();

        return ListResource::collection($attractions);
    }

    public function filter(Request $request, Attraction $attraction)
    {
        // return $request->input('type_of_attractions');
        // Search for a attraction based on type of attractions
        if ($request->has('type_of_attractions')) {
            // return $request->input('type_of_attractions')['from'];
            $attraction->whereHas('type_of_attractions', function ($query) use ($request) {
                $query->where('from', $request->input('type_of_attractions')['from']);
                $query->where('to', $request->input('type_of_attractions')['to']);
            });
        }

        // return Attraction::all();
    }
}