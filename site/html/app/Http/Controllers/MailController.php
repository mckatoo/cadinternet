<?php

namespace App\Http\Controllers;

use App\Mail\ResetSenhas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;

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
    	if (\App\User::where('email',$request->email)->count() === 1) {
	    	\App\PasswordResets::where('email',$request->input('email'))->delete();

			$passwordreset = new \App\PasswordResets();
			$passwordreset->email = $request->email;
			$passwordreset->token = $request->_token;
			$passwordreset->save();

	        Mail::to($request->input('email'))
	        	->send(new ResetSenhas($request));

	    	return view('auth.login', ['sucesso' => 'Email enviado com sucesso!']);
    	} else {
    		return back()->with('erro','Email não encontrado!');
    	}


    }
}
