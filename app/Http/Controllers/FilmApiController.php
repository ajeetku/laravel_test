<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class FilmApiController extends Controller
{
    protected $request;
    /**
     *
     * @param Request $request
     * @param Product $user
     */
    public function __construct(Request $request) {
        $this->request = $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allFilms = DB::table('films')->get();
        return response()->json(['data' => $allFilms,
            'status' => Response::HTTP_OK]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->request->all();
        $id = DB::table('films')->insertGetId([
                        'name' => $data['name'],
                        'description' => $data['description'],
        'realease_date' => $data['realease_date'],
        'rating' => $data['rating'],
        'ticket_price' => $data['ticket_price'],
        'country' => $data['country'],
        'genre' => $data['genre'],
        'photo' => $data['photo'],
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
                        ]);
        return response()->json(['status' => Response::HTTP_CREATED]);
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
        $data = $this->request->all();
        $id = DB::table('films')->where('id',$id)->update([
                        'name' => $data['name'],
                        'description' => $data['description'],
        'realease_date' => $data['realease_date'],
        'rating' => $data['rating'],
        'ticket_price' => $data['ticket_price'],
        'country' => $data['country'],
        'genre' => $data['genre'],
        'photo' => $data['photo'],
        'updated_at' => date("Y-m-d H:i:s"),
                        ]);

        return response()->json(['status' => Response::HTTP_OK]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('films')->where('id',$id)->delete();
        return response()->json(['status' => Response::HTTP_OK]);
    }
}
