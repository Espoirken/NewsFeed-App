@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if (auth()->user()->role == 'admin')
                    <a href="{{route('news.create')}}" class="btn btn-success mb-2">Add</a>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Short Details</th>
                            <th>Date Published</th>
                            <th>Author</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $new)
                            <tr id="{{$new->id}}">
                                <td class="clickable-row">{{ $new->id }}</td>
                                <td class="clickable-row">{{ $new->title }}</td>
                                <td class="clickable-row">{{ Str::limit($new->content, $limit = 50, $end = '...') }}</td>
                                <td class="clickable-row">{{ $new->published }}</td>
                                <td class="clickable-row">{{ $new->author }}</td>
                                <td><a href="{{ route('news.edit', ['news' => $new->id ]) }}" class="btn btn-primary">Edit</td>
                                @if (auth()->user()->role == 'admin')
                                    <td><a href="#" class="btn btn-danger deleteItem" id="{{$new->id}}">Delete</a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $(document).ready(function() {
                $(".clickable-row").click(function() {
                    let id = $(this).closest('tr').attr('id');
                    window.location = `/news/${id}`;
                });

                $(".deleteItem").click((e) => {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            let id = e.currentTarget.id
                            let url = `/news/delete/${id}`;
                            
                            axios.delete(url)
                            .then(function (response) {
                                window.location.reload()
                            });
                        }
                    })
                })
            });
        </script>
    @endpush
@endsection
