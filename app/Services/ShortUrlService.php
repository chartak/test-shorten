<?php

namespace App\Services;


use App\Models\ShortUrl;

class ShortUrlService
{
    public function createShortUrl($parameters): string {

            $input['full_link'] = $parameters->full_link;
            $input['short_url'] = env('SHORT_URL');
            $input['short_code'] = $this->StrRandom();
            ShortUrl::create($input);

            $data = ShortUrl::orderBy('id', 'DESC')->limit(10)->get();

            $shortUrlListHTML = view("dt-table", compact('data'))->render();

            return  $shortUrlListHTML;
    }

    private function strRandom(): string
    {
        $i = "a";
        $data = ShortUrl::orderBy('id', 'DESC')->limit(1)->get();

        if ($data) {
            $i = $data[0]->short_code;
        }

        return ++$i;
    }
}