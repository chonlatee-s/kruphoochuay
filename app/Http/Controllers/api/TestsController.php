<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($data)
    {
        if (strlen($data)=='1') {

            $tests = DB::table('tests')
            ->select('id', 'question', 'ch1', 'ch2', 'ch3', 'ch4')
            ->where('mode', '=', $data)
            ->inRandomOrder()
            ->get();
            return response() -> json($tests);
        }else{
            $data_obj = json_decode($data);
            $id_list=[];

            foreach($data_obj as $obj){
                $id_list[] = $obj->id;
            }

            $tests = DB::table('tests')
            ->select('id', 'question', 'ch1', 'ch2', 'ch3', 'ch4','answer','ref')
            ->whereIn('id', $id_list)
            ->get();
            return response() -> json($tests);
        }
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
