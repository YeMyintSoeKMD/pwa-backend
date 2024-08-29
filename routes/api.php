<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\PushSubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

# Blog 
Route::apiResource('blogs', BlogController::class);

# PushSubscription
// get subscription list
Route::get('get-subscriptions', [PushSubscriptionController::class, 'getSubscriptions']);
// for just client
Route::post('push-subscribe', [PushSubscriptionController::class, 'pushSubscribe']);
// Notify to single subscription
Route::post('send-notification/{subscriptionId}', [PushSubscriptionController::class, 'sendNotification']);

// Notify to multi subscriptions
Route::post('send-notifications', [PushSubscriptionController::class, 'sendNotifications']);
