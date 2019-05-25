<?php

namespace App\Http\Controllers;

use App\BuyerAddress;
use App\User;
use App\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.buyer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(array $request, $user_id)
    {

        /*$validatedData = Validator::make($request, [

        ]);*/

        $userinfo = new Userinfo();
        $userinfo->company_name = $request['company_name'];
        $userinfo->title = $request['title'];
        $userinfo->first_name = $request['first_name'];
        $userinfo->last_name = $request['last_name'];
        $userinfo->country = $request['country'];
        $userinfo->state = $request['state'];
        $userinfo->city = $request['city'];
        $userinfo->delivery_address_1 = $request['delivery_address_1'];
        $userinfo->delivery_address_2 = $request['delivery_address_2'];
        $userinfo->zip = $request['zip'];
        $userinfo->telephone = $request['telephone'];
        $userinfo->business_type = $request['business_type'];
        $userinfo->hear_about_us = $request['hear_about_us'];
        $userinfo->user_id = $user_id;
        $userinfo->language = $request['language'];
        $userinfo->website = $request['website'];
        $userinfo->fax = $request['fax'];
        $userinfo->payment_type = $request['payment_type'];
        $userinfo->save();

//        $address = new BuyerAddress;



//        return redirect()->route('home')->with('message', 'Userinfo Registration Completed Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Userinfo  $userinfo
     * @return \Illuminate\Http\Response
     */
    public function show(Userinfo $userinfo)
    {
        if(!$userinfo) {
            return redirect()->back()->withErrors(['not_found' => 'User not found']);
        }

        if(auth()->id() === $userinfo->user_id) {
            return view('pages.user_infos.view', compact('userinfo'));
        } else {
            switch ($userinfo->status) {
                case 1:
                    return view('pages.user_infos.view', compact('userinfo'));
                    break;
                case 2:
                    return 'can not view. account is inactive';
                    break;
                case 3:
                    return 'can not view. account is suspended';
                    break;
                default:
                    return redirect()->back()->withErrors('Error: something went wrong');

            }
        }
        return view('pages.user_infos.view', compact('userinfo'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Userinfo  $userinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Userinfo $userinfo)
    {
        if(auth()->user()->userinfo->id !== $userinfo->id) {
            return redirect()->route('home')->withErrors('Invalid Action');
        }
        return view('pages.user_infos.edit', compact('userinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Userinfo  $userinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userinfo $userinfo)
    {
        if(auth()->user()->userinfo->id !== $userinfo->id) {
            return redirect()->route('home')->withErrors('Invalid Action');
        }
        $validatedData = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'delivery_address_1' => 'required|string|max:255',
            'delivery_address_2' => 'nullable|string|max:255',
            'zip' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'business_type' => 'required|string|max:255',
            'hear_about_us' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'language' => 'required|string|max:255',
            'fax' => 'nullable|string|max:255',
        ]);

        $userinfo->company_name = $request['company_name'];
        $userinfo->title = $request['title'];
        $userinfo->first_name = $request['first_name'];
        $userinfo->last_name = $request['last_name'];
        $userinfo->country = $request['country'];
        $userinfo->state = $request['state'];
        $userinfo->city = $request['city'];
        $userinfo->delivery_address_1 = $request['delivery_address_1'];
        $userinfo->delivery_address_2 = $request['delivery_address_2'];
        $userinfo->zip = $request['zip'];
        $userinfo->telephone = $request['telephone'];
        $userinfo->business_type = $request['business_type'];
        $userinfo->hear_about_us = $request['hear_about_us'];
        $userinfo->language = $request['language'];
        $userinfo->website = $request['website'];
        $userinfo->fax = $request['fax'];
        $userinfo->save();

        return redirect()->back()->with('message', 'Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Userinfo  $userinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userinfo $userinfo)
    {
        //
    }

}
