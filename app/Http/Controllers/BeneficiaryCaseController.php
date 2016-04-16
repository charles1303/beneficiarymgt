<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BeneficiaryCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('layouts/beneficiary/mypendingcases');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //return view('beneficiary.create');
        return view('layouts/beneficiary/createbeneficiary');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BeneficiaryFormRequest $request)
    {
        //$beneficiary = new Beneficiary();

        //$beneficiary->firstname = $request->get('name');

        //$beneficiary->save();


        //return \View::make('layouts/beneficiary/createbeneficiary')->with('status', 'Successful.');

        //return \Redirect::to('beneficiary')->with('status', 'Login Failed');

        //return redirect()->route('beneficiary', ['status'=>'Login Failed']);

        \Session::flash('message', 'My message');

        return \Redirect::to('beneficiary');


        //return redirect()->back()->with('status', 'Login Failed');

        //return redirect()->back()->withInput();

        //return redirect()->action('BeneficiaryController@show')->with('status', 'Profile updated!');

        //return redirect()->route('beneficiary.show',array('name' =>'The Name'))->with('status', 'Profile updated!');

        /*return \Redirect::route('beneficiary.show',
            array(3))
            ->with('message', 'Your beneficiary has been created!');*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($name = null)
    {
        //return view('hello',array('name' => $name));
        return view('layouts/beneficiary/show',array('name' => $name,'message' =>'Your beneficiary has been created!'));
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
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
