<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ChildEvent;
use App\Models\Event;
use App\Models\Order;
use App\Models\OrganizerPayment;
use App\Models\UserOrder;
use App\Models\User;

use Illuminate\Support\Facades\DB;


Route::get('/events', function (Request $request) {
$events = DB::table('events')
    ->join('child_events', 'events.event_id', '=', 'child_events.event_id')
    ->select('child_events.child_event_id', 'events.organizer_id', 'events.event_id', 'events.event_name', 'events.created_at', 'child_events.amount', 'child_events.location', 'child_events.version')
    ->whereIn('child_events.version', function ($query) {
        $query->select(DB::raw('MAX(version)'))
            ->from('child_events')
            ->whereColumn('child_events.event_id', 'events.event_id');
    })
    ->get();

    return response()->json($events, 200);
});

Route::post('/child_event', function (Request $request) {
    $validated = $request->validate([
        'event_id' => 'required|string',
        'amount' => 'required|integer',
        'location' => 'required|string',
    ]);

    $childEvent = ChildEvent::create($validated);

    return response()->json([
        'message' => 'Child Event Added Successfully',
    ], 200);
});

Route::post('/event', function (Request $request) {
    $validated = $request->validate([
        'organizer_id' => 'required|integer',
        'event_id' => 'required|string',
        'event_name' => 'required|string',
        'created_at' => 'required|date',
    ]);

    $event = Event::create($validated);

    return response()->json([
        'message' => 'Event Added Successfully',
    ], 200);
});

Route::post('/order', function (Request $request) {
    $validated = $request->validate([
        'user_id' => 'required|integer',
        'event_id' => 'required|string',
        'order_id' => 'required|string',
        'amount' => 'required|integer',
        'timestamp' => 'required|date',
        'status' => 'required|string',
    ]);

    $order = Order::create($validated);

    return response()->json([
        'message' => 'Order Added Successfully',
    ], 200);
});

Route::post('/organizer_payment', function (Request $request) {
    $validated = $request->validate([
        'order_id' => 'required|string',
        'amount' => 'required|numeric',
        'timestamp' => 'required|date',
        'status' => 'required|string',
    ]);

    $organizerPayment = OrganizerPayment::create($validated);

    return response()->json([
        'message' => 'Organizer Payment Added Successfully',
    ], 200);
});

Route::post('/user_order', function (Request $request) {
    $validated = $request->validate([
        'order_id' => 'required|string',
        'amount' => 'required|numeric',
        'timestamp' => 'required|date',
        'status' => 'required|string',
    ]);

    $userOrder = UserOrder::create($validated);

    return response()->json([
        'message' => 'User Order Added Successfully',
    ], 200);
});

Route::post('/user', function (Request $request) {
    $validated = $request->validate([
        'user_id' => 'required|integer',
        'name' => 'required|string',
    ]);

    $user = User::create($validated);

    return response()->json([
        'message' => 'User Added Successfully',
    ], 200);
});

Route::get('/test-api', function () {
    return response()->json([
        'message' => 'API Responded Successfully',
    ], 200);
});


Route::get('/child_event', function () {
    $childEvents = ChildEvent::all();
    return response()->json($childEvents, 200);
});


Route::get('/order', function () {
    $orders = Order::all();
    return response()->json($orders, 200);
});

// Route to get all organizer payments
Route::get('/organizer_payments', function () {
    $organizerPayments = OrganizerPayment::all();
    return response()->json($organizerPayments, 200);
});

// Route to get all user orders
Route::get('/user_orders', function () {
    $userOrders = UserOrder::all();
    return response()->json($userOrders, 200);
});

// Route to get all users
Route::get('/users', function () {
    $users = User::all();
    return response()->json($users, 200);
});