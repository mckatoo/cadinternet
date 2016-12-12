<?php

namespace App\Http\Controllers;

use App\Mail\ResetSenhas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
	public function indexReset()
	{
		return view('auth.passwords.resetenviar');
	}

    public function resetEnviar(Request $request)
    {

    	/**
	     * Ship the given order.
	     *
	     * @param  Request  $request
	     * @param  int  $orderId
	     * @return Response
	     */

    	try {
	        Mail::to($request->input('email'))
	        	->send(new ResetSenhas($request));

	    	return view('auth.login', ['sucesso' => 'Email enviado com sucesso!']);
    	} catch (Exception $erro) {
	    	return back()->compact('erro');
    	}
    }
}
