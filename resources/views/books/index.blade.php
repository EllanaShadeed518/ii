@extends('layouts.app' , ['section_title' => 'Index Page'])

@section('content')
    @if (Auth::user()->is_admin)
        <a href="{{ route('books.create') }}" class="btn btn-outline-success">Create</a>
    @endif

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NameOfBook</th>
                <th scope="col">AutherName</th>
                <th scope="col">PlaceOfPuplication</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>

                    <td>{{ $book->name_book }}</td>
                    <td>{{ $book->auther_name }}</td>
                    <td>{{ $book->place_of_publication }}</td>
                    @if (Auth::user()->is_admin)
                        <td>
                            <div class="d-flex">
                                <form action="{{ route('books.edit', ['book' => $book->id]) }}" method="GET">
                                    @csrf
                                    <button class="btn btn-sm btn-info">Edit</button>
                                </form>


                                <form class="ms-2" action="{{ route('books.destroy', ['book' => $book->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger">Delete</button>

                                </form>
                            </div>
                        </td>
                    @else
                        <td>
                            <form class="ms-2" action="{{ route('books.show', ['book' => $book->id]) }}" method="get">
                                @csrf
                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"  data-bs-target="#exampleModal-{{ $book->id }}">Select</button>

                                {{-- date modal --}}
                                <div class="modal fade" id="exampleModal-{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $book->name_book }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="from_day" class="form-label">From</label>
                                                            <input type="date" name="from_day" class="form-control" required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="to_day" class="form-label">To</label>
                                                            <input type="date" name="to_day" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Show Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    @endif

                </tr>
            @empty
                <tr>
                    <td  colspan='5'>No Books Yet</td>
                </tr>
            @endforelse

        </tbody>
    </table>


@endsection
