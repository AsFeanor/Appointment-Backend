<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all appointments
        return Appointment::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data first
        $request->validate([
            'customer_name' => 'required',
            'customer_surname' => 'required',
            'customer_email' => 'required',
            'customer_phone' => 'required',
        ]);



        // create a appointment
        return Appointment::create($request->all());
    }

    public function getUserAppointment($user_id) {
        return Appointment::find($user_id);
//        echo $user_id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $appointment_id
     * @return \Illuminate\Http\Response
     */
    public function show($appointment_id)
    {
        // show a appointment
        return Appointment::find($appointment_id);
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
        // update a appointment
        $post = Appointment::find($id);
        $post -> update($request->all());
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete a appointment
        return Appointment::destroy($id);
    }
}

