<?php

use MailchimpMarketing\ApiClient;

class ConvertKitNewsletter implements \App\Http\Services\Newsletter
{
    public function __construct(protected ApiClient $client)
    {

    }

    public function subscribe(string $email, string $list_id = null)
    {
//        $list_id ??= config('services.mailchimp.lists.subscribers');
//
//        return $this->client->lists->addListMember($list_id, [
//            "email_address" => $email,
//            "status" => "subscribed",
//        ]);
    }
}
