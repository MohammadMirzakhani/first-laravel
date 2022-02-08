<?php

namespace App\Http\Controllers\back;

use App\Models\OurTeam;
use Illuminate\Http\Request;
use Illuminate\support\facades\Storage;
use App\Http\Controllers\Controller;


class OurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourTeams=OurTeam::orderby('id','desc')->paginate('10');
        return view('back.OurTeam.OurTeam',compact('ourTeams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.OurTeam.OurTeamcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ourTeam=new OurTeam;
        if($request->file('path'))
        {
            $file=$request->file('path');
            $name=$file->getClientOriginalName();
           
               $file->move('Image',$name);
            $ourTeam->path=$name;
            $ourTeam->name=$request->name;
            $ourTeam->Reshte=$request->Reshte;
            $ourTeam->description=$request->description;
            $ourTeam->create([
                'name'=>$request->name,'Reshte'=>$request->Reshte,'description'=>$request->description,'path'=>$name
            ]);

        }
        else
        {
        $ourTeam->name=$request->name;
        $ourTeam->Reshte=$request->Reshte;
        $ourTeam->description=$request->description;
        $ourTeam->create([
            'name'=>$request->name,'Reshte'=>$request->Reshte,'description'=>$request->description,'path'=>' '
        ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OurTeam  $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function show(OurTeam $ourTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OurTeam  $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function edit(OurTeam $ourTeam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OurTeam  $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OurTeam $ourTeam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OurTeam  $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurTeam $ourTeam)
    {
        //
    }
}
