<?php

namespace App\Http\Controllers;

use App\Http\Services\MailchimpNewsletter;
use App\Http\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'email' => 'required|email'
        ]);

//        getListMembersInfo($list_id);
//    updateListMember($list_id, "jaagupss1@gmail.com", [
//        "status" => "subscribed"
//    ]);
//        dd(\request('email'));
        try {
            $newsletter->subscribe(\request('email'));
            return back()->with('success', 'You have subscribed!');
        }
        catch (\Exception $e) {
            throw ValidationException::withMessages([
                'newsletter-email' => 'This Email is not valid for the newsletter'
            ]);
        }

    }
//    public function store()
//    {
//    }
}
