<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cmgmyr\Messenger\Models\Message as MessageModel;

class Message extends MessageModel
{
    protected $fillable = ['thread_id', 'user_id', 'body'];
    protected $touches = ['thread'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function files()
    {
        return $this->hasMany(\App\MessageFile::class);
    }
}
