@extends('layouts.app' , ['section_title' => 'Create Book'])
@section('content')
<form action="{{ route('books.store') }}" class="w-50" method="post">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">BookName</label>
        <input type="text" name="name_book" value="{{ old('name_book') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('name_book')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">AutherName</label>
        <input type="text" name="auther_name" value="{{ old('auther_name') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('auther_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">PlaceOfPuplication</label>
        <input type="text" name="place_of_publication" value="{{ old('place_of_publication') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('place_of_publication')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Number_Of_Pages</label>
        <input type="number" name="number_of_pages" value="{{ old('number_of_pages') }}" class="form-control" id="exampleInputPassword1">
        @error('number_of_pages')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Number_Of_Aviable_Book</label>
        <input type="number" name="number_of_aviable_book" value="{{ old('number_of_aviable_book') }}" class="form-control" id="exampleInputPassword1">
        @error('number_of_aviable_book')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Rent_Price</label>
        <input type="text" name="rent_price" value="{{ old('rent_price') }}" class="form-control" id="exampleInputPassword1">
        @error('rent_price')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
