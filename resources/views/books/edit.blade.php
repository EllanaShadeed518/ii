@extends('layouts.app', ['section_title' => 'Edit Book'])
@section('content')
    <form action="{{ route('books.update', ['book' => $book->id]) }}" class="w-50" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">BookName</label>
            <input type="text" name="name_book" value="{{ $book->name_book }}" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">AutherName</label>
            <input type="text" name="auther_name" value="{{ $book->auther_name }}" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">PlaceOfPuplication</label>
            <input type="text" name="place_of_publication" value="{{ $book->place_of_publication }}" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Number_Of_Pages</label>
            <input type="number" name="number_of_pages" value="{{ $book->number_of_pages }}" class="form-control"
                id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Number_Of_Aviable_Book</label>
            <input type="number" name="number_of_aviable_book" value="{{ $book->number_of_aviable_book }}"
                class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Rent_Price</label>
            <input type="text" name="rent_price" class="form-control" value="{{ $book->rent_price }}"
                id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
