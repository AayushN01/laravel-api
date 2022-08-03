<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Author;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::get();
        return $publications;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publication = new Publication();
        $publication->publication_name = $request->publication_name;
        $publication->author_id = $request->author_id;
        $publication->save();
        return $publication;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publication = Publication::with('author')->find($id);
        $data = [
            'name' => $publication->publication_name,
            'author' => $publication->author->name,
        ];
        return $data; 
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
        $publication = Publication::find($id);
        $publication->publication_name = $request->publication_name;
        $publication->save();
        return $publication;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publication = Publication::find($id);
        $publication->delete();
        return "Deleted!";
    }
}
