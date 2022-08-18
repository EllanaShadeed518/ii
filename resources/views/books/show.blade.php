@extends('layouts.app', ['section_title' => 'Show Book'])
@section('content')
    <form class="ms-2" action="{{ url('charge') }}" method="post">

        @csrf
        <table class="table table-striped table-hover">
            <tr>

                <th>Name</th>
                <td>{{ $book->name_book }}</td>
            </tr>

            <tr>
                <th>Auther</th>
                <td>{{ $book->auther_name }}</td>
            </tr>

            <tr>
                <th>Number of pages</th>
                <td>{{ $book->number_of_pages }}</td>
            </tr>

            <tr>
                <th>Place of publication</th>
                <td>{{ $book->place_of_publication }}</td>
            </tr>

            <tr>
                <th>Rent price</th>
                <td>{{ $book->rent_price }}</td>
            </tr>

            <tr>
                <th>Total Price</th>
                <td>{{ $total_price }}</td>
            </tr>
        </table>
        <input type="hidden" name="amount" value="{{ $total_price }}">
        <div>
            <button type="submit" class="btn btn-outline-success">Rent</button>
        </div>
    </form>
@endsection
