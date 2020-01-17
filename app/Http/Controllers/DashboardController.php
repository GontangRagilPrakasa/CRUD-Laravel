<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = 'http://erporate.siaji.com/bootcamp/ajax/pariwisata';
        $request = $this->client->get($url);
        $result = json_decode($request->getBody()->getContents());
        // return response()->json([
        //     'data' => $result->data
        // ]);

        return view('index', ['data' => $result->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pariwisata_nama' => ['required', 'string'],
            'pariwisata_alamat' => ['required', 'string'],
            'pariwisata_detail' => ['required', 'string'],
            'pariwisata_gambar' => ['required', 'mimes:jpg,jpeg,png'],
        ]);

        $url = 'http://erporate.siaji.com/bootcamp/ajax/pariwisata';
        $req = $this->client->request('POST', $url, [
            'headers' => [
                'X-CSRF-TOKEN' => csrf_token(),
                'Accept' => 'application/json'
            ],
            'multipart' => [
                [
                    'name' => 'pariwisata_nama',
                    'contents' => $request->pariwisata_nama
                ], [
                    'name' => 'pariwisata_alamat',
                    'contents' => $request->pariwisata_alamat
                ], [
                    'name' => 'pariwisata_detail',
                    'contents' => $request->pariwisata_detail
                ], [
                    'name' => 'pariwisata_gambar',
                    'contents' => fopen($request->pariwisata_gambar, 'r')
                ]
            ],
            // 'exceptions' => false
        ]);

        $result = json_decode($req->getBody()->getContents());

        if($result->status){
            return redirect('/');
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'headers' => $req->getHeaders(),
                'body' => json_decode($req->getBody()->getContents()),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
