<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect; // use redirect
use Illuminate\Http\Request;
use DB; // to call database
use App\borrowers;  // call model
use App\borrower_details; // call model
class articlesController extends Controller
{
    public function index(){
    	// $borrowers = borrowers::all();
    	// return view('create')->with("borrowers",$borrowers);
        $datas = DB::table('borrowers')->orderBy('borrowers.id','DESC')
            ->join('borrower_details','borrowers.id','=','borrower_details.borrower_id')
            ->where('borrower_details.status', '=', 'NOT RETURNED')
            ->select('borrowers.*','borrower_details.*')
            ->get();
        return view('create', ['datas' => $datas]);
        // $datas = DB::table('borrowers')
        // ->join('borrower_details','borrowers.id','=','borrower_details.borrower_id')
        // ->select('borrowers.*','borrower_details.*')
        // return view('table', ['name' => $datas]);
        // ->get();
    }
    public function store(Request $request){
    	//process ng adding
        $borrowers = new borrowers;
        $input = $request->all();
        $data = array();
        $borrowers->name = $request->input('name');
    	$borrowers->purpose = $request->input('purpose');
        if ($borrowers->save()) {
            $id = $borrowers->id;   
            for ($i=0; $i < count($input['item']); $i++) { 
                $data[] = [
                    'borrower_id' =>$id,
                    'serial_number'   => $input['sn'][$i],
                    'item' => $input['item'][$i],
                    'qty' => $input['qty'][$i],
                    'status' => 'NOT RETURNED',
                    'date_borrowed' =>date("m/d/Y H:i:s"),
                    'returned_date' =>null,
                    'released_by' =>'mark',
                ];
            }
            borrower_details::insert($data);
        }
        session()->flash('notif-create','Succesfully Added!');
        return redirect()->back();
    }
    public function create(){
    	//showing add form
    	return view('table');
    }
    public function show($id){
    	$borrower = borrowers::find($id);
        $datas = DB::table('borrowers')
            ->join('borrower_details','borrowers.id','=','borrower_details.borrower_id')
            ->where('borrowers.id', '=', $id)
            ->select('borrowers.*','borrower_details.*')
            ->get();
        return view('show', ['datas' => $datas, 'borrower'=>$borrower]);
    	// return view('show')->with("borrowers",$datas);
    }
    public function edit($id){
    	$borrowers = borrowers::find($id);
    	return view('editform')->with("borrowers",$borrowers);
    }
    public function update(Request $request, $id){
    	$borrowers = borrowers::find($id);
    	$borrowers->name = $request->name;
    	if ($borrowers->save()) {
    		session()->flash('notif-update','Succesfully Updated!');
       return redirect('create');
    	}
    }
    public function destroy($id){
        DB::table('borrower_details')->where('borrower_id', '=', $id)->delete();
        borrowers::destroy($id);
    	session()->flash('notif-delete','Succesfully deleted!');
        return redirect()->back();
    }
    public function table(){
        $returned_items = DB::table('borrowers')
                            ->join('borrower_details','borrowers.id','=','borrower_details.borrower_id')
                            ->where('status','=','RETURNED')
                            ->get();
        return view('table', ['items'=>$returned_items]);
    }
}
