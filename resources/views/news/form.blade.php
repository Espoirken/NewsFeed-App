@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ isset($news) ? route('news.update', ['news' => $news->id]) : route('news.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{$news->title ?? ''}}" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" id="content" cols="30" rows="10">{!! $news->content ?? '' !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Date Published</label>
                        <input type="text" name="date_published" class="form-control" id="date">
                        <input type="text" id="date_published" value="{{  $news->date_published ?? '' }}" hidden>
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" name="author" value="{{$news->author ?? ''}}" class="form-control" id="author">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            let startDate = $('#date_published').val()

            if(startDate == ''){
                startDate = new Date();
            } else {
                startDate = new Date(startDate);
            }

            $('#date').daterangepicker({
                startDate: startDate,
                autoApply: true,
                singleDatePicker: true,
            });
        </script>
    @endpush
@endsection
