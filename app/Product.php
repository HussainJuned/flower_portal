<?php

namespace App;

use Carbon\Carbon;
use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Taggable;

    protected $guarded = [];
    protected $appends = ['ad'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoryR(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }


    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function reviewsAvg()
    {
        return $this->reviews()
            ->selectRaw('avg(quality) as avg_quality, product_id')
            ->groupBy('product_id');
    }

    public function availableDates()
    {
        $date_from = $this->available_date_start;
        $date_from = strtotime($date_from); // Convert date to a UNIX timestamp

        // Specify the end date. This date can be any English textual format
        $date_to = strtotime($this->available_date_end); // Convert date to a UNIX timestamp

        $dates = [];

        // Loop from the start date to end date and output all dates inbetween
        for ($i=$date_from; $i<=$date_to; $i+=86400) {
            $today = strtotime(today());
            if($i >= $today) {
                array_push($dates,date("d-m-Y", $i));
            }

        }

        return $dates;
    }

    public function getAdAttribute()
    {
        return $this->availableDates();
    }

    public function fToStr() {
        $f = $this->feature;
        switch ($f) {
            case 0:
                return 'None';
            case 1:
                return 'Special';
            case 2:
                return 'Low Price';
            case 3:
                return 'Exclusive';
            case 4:
                return 'Limited';

        }
    }
}
