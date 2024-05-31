<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request): \Illuminate\Http\JsonResponse
	{
		$request->validate(['email' => 'required|email']);

		$credentials = $request->only('email');

		$status = Password::sendResetLink($credentials);

		$message = trans($status); // lang

		$data = [
			'success' => true,
			'message' => $message,
			'result'  => null,
			'extra'   => [
				'codeSentTo' => 'email',
			],
		];

		return $status === Password::RESET_LINK_SENT
			? response()->json($data)
			: response()->json(['success'=>false,'message' => $message]);
	}
}
