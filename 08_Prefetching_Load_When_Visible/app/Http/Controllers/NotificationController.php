<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $newnotifications = $request->newnotifications ?? 1;
        return Inertia::render('Notifications/Index', [
            'notifications' => Notification::orderBy('created_at', 'asc')
                ->take($newnotifications)
                ->get(),
        ]);
    }

     public function pollingHelper(Request $request)
    {
       // faker to create new notifications
       Notification::factory()->count(1)->create();
        return Inertia::render('Notifications/Index', [
            'notifications' => Notification::orderBy('created_at', 'desc')->get(),
        ]);
    }
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
