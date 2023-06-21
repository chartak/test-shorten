<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    use HasFactory;

    public $table = 'short_urls';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'short_url',
        'short_code',
        'full_link',
        'created_at',
        'updated_at',
    ];


    public static function strRandom(): string
    {
        $i = "a";
        $data = ShortUrl::orderBy('id', 'DESC')->limit(1)->get();

        if ($data) {
            $i = $data[0]->short_code;
        }

        return ++$i;
    }
}

