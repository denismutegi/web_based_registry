<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //display all recent records
        $data = Data::latest()->paginate(15);

        return view('data.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate request data
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'age' => 'required|integer',
            'idno' => 'required|integer',
            'gender' => 'required|string',
            'place_of_birth' => 'required|string',
            'address' => 'required|string',
        ]);

        // save data into db
        $data = new Data;

        $data->uuid = Str::random(11); 
        $data->firstname = Str::of($request->firstname)->title(); 
        $data->lastname = Str::of($request->lastname)->title();
        $data->age = $request->age; 
        $data->idno = $request->idno; 
        $data->gender = $request->gender; 
        $data->place_of_birth = Str::of($request->place_of_birth)->title(); 
        $data->address = Str::of($request->address)->title(); 
        $data->save();

        alert()->success('Record successfully created')->autoclose(3000);

        return redirect()->route('data.index');
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
        //find single record
        $data = Data::findOrFail($id);

        if($data != null)
        {
            return view('data.edit', compact('data'));
        }
        else
        {
            return redirect()->back();
        }
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
        //validate request data
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'age' => 'required|integer',
            'idno' => 'required|integer',
            'gender' => 'required|string',
            'place_of_birth' => 'required|string',
            'address' => 'required|string',
        ]);
        
        //find single record
        $data = Data::findOrFail($id);
        
        if($data != null)
        {
            //update record
            $data->firstname = Str::of($request->firstname)->title(); 
            $data->lastname = Str::of($request->lastname)->title();
            $data->age = $request->age; 
            $data->idno = $request->idno; 
            $data->gender = $request->gender; 
            $data->place_of_birth = Str::of($request->place_of_birth)->title(); 
            $data->address = Str::of($request->address)->title();  
            $data->save();

            alert()->success('Record successfully updated')->autoclose(3000);

            return redirect()->route('data.index');
        }
        else
        {
            return redirect()->back();
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find single record
        $data = Data::findOrFail($id);
        //delete record if found
        if($data != null)
        {
            $data->delete();

            alert()->success('Record successfully deleted')->autoclose(3000);

            return redirect()->route('data.index');
        }
        else
        {
            return redirect()->back();
        }
    }
}
