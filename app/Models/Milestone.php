<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Topic;

class Milestone extends Model
{
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getTopicsAttribute()
    {
        $topicIds = json_decode($this->topics_including, true);

        if (!$topicIds || !is_array($topicIds)) {
            return collect(); // return empty collection if no topic IDs found
        }

        return Topic::select('topic_name')->whereIn('id', $topicIds)->get();
    }


    
}
