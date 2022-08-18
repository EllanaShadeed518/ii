@extends('layouts.app' , ['section_title' => 'Books Want To Rent'])
@section('content')


<form action="{{ url('charge') }}" method="post">
    @csrf

    <input  type="text" name="amount"/>


    <input type="submit" name="submit" value="Pay Now">
   <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">NameOfBook</th>

            <th scope="col">RentPrice</th>
            <th scope="col">TotalPrice</th>

        </tr>

    </thead>
    <tbody>

    <tr>
        <th scope="row">#</th>
        <td>{{ $book->name_book }}</td>
        <td>{{ $book->rent_price}}</td>
        <td>{{ $total}}</td>
    </tr>
</tbody>

</table>
</form>
@endsection
