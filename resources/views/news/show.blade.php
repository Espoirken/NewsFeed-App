@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <p><b>ID:</b> {{$news->id}}</p>
                <p><b>Title:</b> {{$news->title}}</p>
                <p><b>Content:</b> {{$news->content}}</p>
                <p><b>Date Published:</b> {{ $news->published }}</p>
                <p><b>Author:</b> {{$news->author}}</p>
                 
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $('#date_published').daterangepicker({
                autoApply: true,
                singleDatePicker: true,
            });
        </script>
    @endpush
@endsection
