<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use App\Http\Requests\StoreShortUrlRequest;
use App\Http\Requests\UpdateShortUrlRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class ShortUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ShortUrl::orderBy('id', 'DESC')->limit(10)->get();

        return view('index', compact('data'));
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

        $validator = Validator::make($request->all(), [
            'full_link' => 'required|url',
        ]);

        if ($validator->passes()) {

            $input['full_link'] = $request->full_link;
            $input['short_url'] = env('SHORT_URL');
            $input['short_code'] = ShortUrl::StrRandom();
            ShortUrl::create($input);

            $data = ShortUrl::orderBy('id', 'DESC')->limit(10)->get();

            $returnHTML = view("dt-table", compact('data'))->render();

            return response()->json(['ht' => $returnHTML, 'success'=>'Shorten Link Generated Successfully!']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShortUrl $shortUrl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShortUrl $shortUrl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShortUrlRequest $request, ShortUrl $shortUrl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShortUrl $shortUrl)
    {
        //
    }

    public function shortenLink($code)
    {
        $find = ShortUrl::where('short_code', $code)->first();

        return redirect($find->full_link);
    }
}
