<?php

namespace App\Services\Subscribers;


use App\Models\Subscriber;

interface SubscribersManagerInterface
{
    /**
     * @param $email
     * @return mixed
     */
    public function subscribe($subscriberData);

    /**
     * @param $email
     * @param $state
     * @return mixed
     */
    public function update($email, $subscriberData);
}