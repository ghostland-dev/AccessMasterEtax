<?php

namespace App\Http\Controllers\Pipeline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StepsController extends Controller
{


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eligibilityTest()
    {
        return view('pipeline.eligibilityTest')
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eligibilityClient()
    {
        return view('pipeline.customereligibility')
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contractSend()
    {
        return view('pipeline.contractSend')
    }


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contractAccepted()
    {
        return view('pipeline.contractAccepted')
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function folderIncompleted()
    {
        return view('pipeline.folderIncompleted')
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function folderBuilding()
    {
        return view('pipeline.folderBuilding')
    }



         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function folderSentCouncil()
    {
        return view('pipeline.folderSentCouncil')
    }




         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CouncilConfirmation()
    {
        return view('pipeline.confirmationReception')
    }



         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CustomerRefund()
    {
        return view('pipeline.CustomerRefund')
    }



         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ServiceInvoice()
    {
        return view('pipeline.serviceInvoice')
    }


             /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function folderStatus()
    {
        return view('pipeline.folderStatus')
    }


             /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reducedTaxReqSupp()
    {
        return view('pipeline.reducedTaxReqSupp')
    }


 



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
        //
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
