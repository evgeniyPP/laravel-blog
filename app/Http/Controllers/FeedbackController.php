<?php

namespace App\Http\Controllers;

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

        $mailTemplate = view('mail.feedback', [
            'data' => $request->all()
        ])->render();

        Mail::raw($mailTemplate, function ($message) {
            $message->from('aysanru@gmail.com', 'Laravel');
            $message->to('amenat12@mail.ru');
            $message->setContentType('text/html');
            $message->subject('Письмо: обратная связь');
        });

        return redirect()->route('feedback_success');
    }

    public function success()
    {
        return view('feedback.success');
    }
}
