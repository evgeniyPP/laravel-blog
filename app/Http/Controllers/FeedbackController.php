<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function get()
    {
        $form = app()->make('FeedbackForm');

        return view('feedback.feedback', [
            'form' => $form
        ]);
    }

    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), Config::get('validations.feedbackValidation'));

        if ($validator->fails()) {
            return redirect()
                ->route('feedback_get')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        Mail::to('amenat12@mail.ru')
            ->send(new FeedbackMail($request->all()));

        return redirect()->route('feedback_success');
    }

    public function success()
    {
        return view('feedback.success');
    }
}
