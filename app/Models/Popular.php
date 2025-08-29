<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Popular extends Model
{
    protected $fillable = ['title', 'url','image', 'banner_image','banner_heading', 'description','per_month_fee','annual_fee','discount_fee'];
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class, 'popular_id')->where('status', 1);
    }
}
