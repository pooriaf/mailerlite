<?php

namespace App\Services\Subscribers;

use App\Repositories\Eloquent\FieldRepository;
use App\Repositories\Eloquent\SubscriberRepository;

/**
 * A Class to manage subscribers
 */
class SubscribersManager implements SubscribersManagerInterface
{
    /**
     * @var SubscriberRepository
     */
    public $subscriberRepository;
    /**
     * @var FieldRepository
     */
    private $fieldRepository;

    /**
     * SubscribersManager constructor.
     * Injecting service dependencies, this service depends on resources
     * NOTE: I could use laravel container and bind repository classes to interfaces, One step further toward a real repository pattern
     *
     */
    public function __construct()
    {
        // It is possible to use interface and inversion of control here to inject related repository.
        $this->subscriberRepository = new SubscriberRepository();
        $this->fieldRepository = new FieldRepository();
    }

    /**
     * Responsibility of this method is to handle the process user subscription
     *
     * @param $subscriberData
     * @return mixed
     */
    public function subscribe($subscriberData)
    {
        // Add New Subscriber Resource
        $subscriber = $this->subscriberRepository->model->create($subscriberData);
        // Attach Additional Fields
        $subscriber->fields()->attach($this->processExtraFields($subscriberData));

        return $this->subscriberRepository->getFull($subscriber->id);
    }


    /**
     * Responsibility of this method is to handle the process user subscription update
     *
     * @param $email
     * @param $subscriberData
     * @return mixed
     */
    public function update($email, $subscriberData)
    {
        // Update Subscriber Resource
        $freshSubscriber = $this->subscriberRepository->updateInfo($email, $subscriberData);
        // Sync Additional Fields
        $freshSubscriber->fields()->sync($this->processExtraFields($subscriberData));
        return $this->subscriberRepository->getFull($freshSubscriber->id);
    }

    /**
     * Eloquent many to many relationship has sync and attach methods to add extra fields data to intermediate table (field_subscriber),
     * those methods need special data structure and input user data does not contain fields ids so this method catch ids and creates suitable structure for eloquent.
     *
     * @param $subscriberData
     * @return array
     */
    public function processExtraFields($subscriberData)
    {
        // To catch field IDs for passing to eloquent sync and attach methods
        $extraFields = $this->fieldRepository->getFields(array_keys($subscriberData));

        // Transform to compatible structure for eloquent
        $processedExtraFields = [];
        foreach ($extraFields as $extraField) {
            $processedExtraFields[$extraField->id]['value'] = $subscriberData[$extraField->title];
        }

        return $processedExtraFields;
    }
}