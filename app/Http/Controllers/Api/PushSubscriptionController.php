<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PushSubscription;
use Illuminate\Http\Request;
use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\WebPush;

class PushSubscriptionController extends Controller
{
    /**
     * Subscription by clients
     */
    public function pushSubscribe(Request $request)
    {
        try {
            PushSubscription::create([
                'data' => $request->getContent()
            ]);
            return $this->successResponse(null);
        } catch (\Exception $e) {
            return $this->failsResponse('Failed to subscribe', $e->getMessage());
        }
    }

    /**
     * Get subscription list
     */
    public function getSubscriptions()
    {
        $data = PushSubscription::all();
        return response()->json($data);
    }

    /**
     * Notify the subscription
     */
    public function sendNotification(Request $request, $subscriptionId)
    {
        $pushSubscription = PushSubscription::find($subscriptionId);
        $webPush = new WebPush([
            "VAPID" => [
                "publicKey" => "BCKU6syjcBdoV3EO3w-k8nior__YBYCTtBPDeD5oqGTwG5D6WVCOdGk2TCOaMQhcJK6-9MvNSAqlb_97CWXshmU",
                "privateKey" => "ongKJvvPRVBWXF_KFWrPZt4eRaRoV7gXc15kSDwp-sY",
                "subject" => "http://localhost:5173"
            ]
        ]);

        $result = $webPush->sendOneNotification(
            Subscription::create(json_decode($pushSubscription->data, true)),
            json_encode($request->input())
        );

        dd($result);
    }
}
