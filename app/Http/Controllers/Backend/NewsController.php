<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\NewsModel;
use DB;

class NewsController extends Controller
{
    public function index()
    {
        $data['news'] = NewsModel::get();
        $data['active'] = "news";
        return view('backend/page/news/index', $data);
    }

    public function store(Request $request, NewsModel $news)
    {
        $request->validate([
            'news_title'     => 'required',
            'news'       => 'required', 
        ]);
        $news->news_title = $request->input('news_title');
        $news->news = $request->input('news');
        $news->news_status = 'off';
        $news->save();

        return redirect()
            ->route('news')
            ->with('message', 'Data berhasil ditambahkan');
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
    public function destroy(NewsModel $news)
    {
        $news->forceDelete();
        return redirect()
            ->route('news')
            ->with('message', 'Data berhasil dihapus');
    }

    public function active(Request $request)
    {
        DB::table('news')
        ->where('news_id', $request->id)
        ->update(['news_status' => 'on']);

        return response()->json([
            'message' => 'INFO TELAH DI AKTIFKAN',
        ], 200);
    }
    public function non_active(Request $request)
    {
        DB::table('news')
            ->where('news_id', $request->id)
            ->update(['news_status' => 'off']);

        return response()->json([
            'message' => 'INFO TELAH DI NONAKTIFKAN',
        ], 200);
    }
}
