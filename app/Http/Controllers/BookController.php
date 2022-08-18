<?php

namespace App\Http\Controllers;

use App\Models\Book;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::all();
        return view('books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
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
            'name_book' =>['required'],
            'auther_name' => ['required'],
            'place_of_publication' => ['required'],
            'number_of_pages' => ['required'],
            'number_of_aviable_book' => ['required'],
            'rent_price' => ['required']
        ]);
        Book::create($request->all() + ['user_id' => Auth::id()]);
        //dd($request->all());
        return redirect()->route('books.index')->with(['status' => true , "message" => 'book created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book , Request $request)
    {
        $from_day   = new Carbon($request->from_day) ;
        $to_day     = new Carbon($request->to_day) ;
        $days = $to_day->diffInDays($from_day);
        $total_price = $book->rent_price * $days;
        return view('books.show' , compact('book' , 'total_price'));
    }


    public function rent(Book $book)
    {
        $total=0;
        return view('payment' , compact('book','total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return redirect()->route('books.index')->with(['status' => true , "message" => 'book updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with(['status' => true , "message" => 'book deleted successfully']);
    }
}
