<?php

namespace App\Http\Controllers;

use App\Author;
use App\Journal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Exception;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $journals = Journal::with('authors')->get();

        return view('journals.index', compact('journals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();

        return view('journals.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'created_date' => 'required',
            'author' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'error',
            ],400);
        }

        $picture_name = saveImage($request);

        $created_date = Carbon::parse($request->created_date)->format('Y-m-d');
        $data['image'] = $picture_name;
        $data['created_date'] = $created_date;

        $journal = Journal::create($data);

        if($journal) {
            try {
                $journal->authors()->attach($request->author);
                return response()->json([
                    'status' => 'success',
                ],200);
            } catch (Exception $e) {
                return response()->json([
                    'status' => 'error',
                ],400);
            }
        }

        return response()->json([
            'status' => 'error'
        ],400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $journal = Journal::with('authors')->find($id);

        if($journal) {
            return view('journals.show', compact('journal'));
        }
        else {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $journal = Journal::with('authors')->find($id);
        $authors = Author::all();
        $journal_authors = $journal->authors->pluck('id');
        $journal_authors->all();
        $journal_authors = $journal_authors->toArray();

        return view('journals.edit', compact('journal', 'authors','journal_authors'));
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
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'created_date' => 'required',
            'author' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
            ],400);
        }

        $journal = Journal::with('authors')->find($id);

        if($journal) {
            $created_date = Carbon::parse($request->created_date)->format('Y-m-d');
            $old_pic_name = $journal->image;
            $data['image'] = $old_pic_name;
            $data['created_date'] = $created_date;

            // image section, delete last image and move to public
            if($request->hasFile('image')){

                $path = public_path('images\\'.$old_pic_name);
                if($old_pic_name){
                    unlink($path);
                };

                $picture_name = saveImage($request);

                $data['image'] = $picture_name;
            }

            $journal->fill($data);
            $update = $journal->save();

            // Detach from pivot table and attach new data
            if($update) {
                $old_authors = [];

                foreach($journal->authors as $author) {
                    $old_authors[] = $author->id;
                }

                try{
                    $journal->authors()->detach($old_authors);
                    $journal->authors()->attach($request->author);

                    return response()->json([
                        'image' => $data['image'],
                        'status' => 'success',
                    ],200);
                }
                catch (Exception $e) {
                    return response()->json([
                        'status' => 'error',
                    ],400);
                }
            }
        }

        return response()->json([
            'status' => 'error',
        ],400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $journal = Journal::find($id);

        if($journal) {
            $deleting = $journal->delete();
            if($deleting) {
                $path = public_path('images\\'.$journal->image);
                if($journal->image) {
                    unlink($path);
                }

                return response()->json([
                    'status' => 'success',
                ],200);
            }
        }

        return response()->json([
            'status' => 'error',
        ],400);
    }
}
