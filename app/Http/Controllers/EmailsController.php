<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\ContactsMail;

class EmailsController extends Controller
{
	public function contacts(Request $request)
	{
		$value = $request->get('value');

		$contact = Email::add($request->all());
		$contact->saveValue(json_encode($value));

		Mail::to(env('APP_MAIL'))->send(new ContactsMail($value['name'], $value['email'], $value['subject'], $value['msg']
		));

		return $data = array('status' => 'ok');
	}
}
