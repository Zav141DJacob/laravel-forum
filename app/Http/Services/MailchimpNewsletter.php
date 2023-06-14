<?php

namespace App\Http\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client)
    {

    }

    public function subscribe(string $email, string $list_id = null)
    {
        $list_id ??= config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember($list_id, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }
//    protected function client()
//    {
//        return $this->client->setConfig([
//            'apiKey' => config('services.mailchimp.key'),
//            'server' => 'us11'
//        ]);
//    }
}
