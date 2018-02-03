<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cmgmyr\Messenger\Models\Thread as ThreadModel;
use App\Message;

class Thread extends ThreadModel
{
    public function messages()
    {
        return $this->hasMany(Message::class, 'thread_id', 'id');
    }
}
