<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    //

    public function statusForOthers(){
        return $this->hasMany(MessageUser::class)
        ->where('recipient_id', '!=', auth()->id());
    }
}
