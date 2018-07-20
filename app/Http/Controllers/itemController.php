<?php

namespace App\Http\Controllers;
use App; // to call use app/model
use Illuminate\Support\Facades\Redirect; // use redirect
use Illuminate\Http\Request;
use DB; // to call database
use App\borrowers;  // call model
use App\borrower_details; // call model

class itemController extends Controller
{
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
    public function update(Request $request, $id)
    {
    	// update for borrower_details
        App\borrower_details::where('borrower_id',$id)
        					->update(['status' => 'RETURNED',
        							  'returned_date'=> date("m/d/Y H:i:s")]);
        session()->flash('notif-update','Succesfully Updated!');
        return redirect()->back();
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
