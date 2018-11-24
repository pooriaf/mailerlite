<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriberRequest;
use App\Http\Requests\SubscriberUpdateRequest;
use App\Http\Resources\SubscriberCollection;
use App\Http\Resources\SubscriberResource;
use App\Services\Subscribers\SubscribersManagerInterface;

/**
 * Class SubscriberController
 * @package App\Http\Controllers\API
 */
class SubscriberController extends Controller
{
    /**
     * @var SubscribersManagerInterface
     */
    private $subscriberManager;

    /**
     * SubscriberController constructor.
     * Subscribers service is injected to the constructor, It is bound through Laravel container
     *
     * @param SubscribersManagerInterface $subscribersManager
     */
    public function __construct(SubscribersManagerInterface $subscribersManager)
    {
        $this->subscriberManager = $subscribersManager;
    }

    /**
     * Display a listing of the Subscribers.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $subscribers = $this->subscriberManager->subscriberRepository->getAll();
        return (new SubscriberCollection($subscribers))->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubscriberRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SubscriberRequest $request)
    {
        $newSubscriber = $this->subscriberManager->subscribe($request->all());
        return (new SubscriberResource($newSubscriber))->response()->setStatusCode(201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SubscriberUpdateRequest $request
     * @param $subscriberId
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SubscriberUpdateRequest $request, $subscriberId)
    {
        $updatedSubscriber = $this->subscriberManager->update($subscriberId, $request->all());
        return (new SubscriberResource($updatedSubscriber))->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy($subscriber)
    {
        $this->subscriberManager->subscriberRepository->model->destroy($subscriber);
        return response()->make('', 200);
    }
}
