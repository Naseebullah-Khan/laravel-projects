<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('message.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel("online", function ($users) {
    return $users->toArray();
});
