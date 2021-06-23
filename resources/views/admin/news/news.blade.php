@extends('admin.layout')

@section('admin-title') News @endsection

@section('admin-content')
{!! breadcrumbs(['Admin Panel' => 'admin', 'News' => 'admin/news']) !!}

<h1>News</h1>

<p>You can create new news posts here. Creating a news post alerts every user that there is a new post, unless the post is marked as not viewable (see the post creation page for details).</p>

<div class="text-right mb-3">
  <a class="btn btn-primary" href="{{ url('admin/news/create') }}"><i class="fas fa-plus"></i> Create New Post</a>
  <a class="btn btn-primary" href="{{ url('admin/bulletins/create') }}"><i class="fas fa-plus"></i> Create New Staff Bulletin</a>
</div>
@if(!count($newses))
    <p>No news found.</p>
@else
    {!! $newses->render() !!}
      <div class="row ml-md-2">
        <div class="d-flex row flex-wrap col-12 pb-1 px-0 ubt-bottom">
          <div class="col-12 col-md-5 font-weight-bold">Title</div>
          <div class="col-6 col-md-3 font-weight-bold">Posted At</div>
          <div class="col-6 col-md-3 font-weight-bold">Last Edited</div>
        </div>
        @foreach($newses as $news)
        <div class="d-flex row flex-wrap col-12 mt-1 pt-2 px-0 ubt-top">
          <div class="col-12 col-md-5">
              @if(!$news->is_visible)
                  @if($news->post_at)
                      <i class="fas fa-clock mr-1" data-toggle="tooltip" title="This post is scheduled to be posted in the future."></i>
                  @else
                      <i class="fas fa-eye-slash mr-1" data-toggle="tooltip" title="This post is hidden."></i>
                  @endif
              @endif
              <a href="{{ $news->url }}">{{ $news->title }}</a>
          </div>
          <div class="col-6 col-md-3">{!! pretty_date($news->post_at ? : $news->created_at) !!}</div>
          <div class="col-6 col-md-3">{!! pretty_date($news->updated_at) !!}</div>
          <div class="col-12 col-md-1 text-right"><a href="{{ url('admin/news/edit/'.$news->id) }}" class="btn btn-primary py-0 px-2 w-100">Edit</a></div>
        </div>
        @endforeach
      </div>
    <table class="table table-sm page-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Posted At</th>
                <th>Last Edited</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($newses as $news)
                <tr>
                    <td>
                        @if(!$news->is_visible)
                            @if($news->post_at)
                                <i class="fas fa-clock mr-1" data-toggle="tooltip" title="This post is scheduled to be posted in the future."></i>
                            @else
                                <i class="fas fa-eye-slash mr-1" data-toggle="tooltip" title="This post is hidden."></i>
                            @endif
                        @endif
                        @if($news->staff_bulletin)
                            <i class="fas fa-crown mr-1" data-toggle="tooltip" title="This is a staff bulletin. Only staff can read it."></i>
                        @endif
                        <a href="{{ $news->url }}">{{ $news->title }}</a>
                    </td>
                    <td>{!! format_date($news->post_at ? : $news->created_at) !!}</td>
                    <td>{!! format_date($news->updated_at) !!}</td>
                    <td class="text-right">
                        <a href="{{ $news->staff_bulletin ? url('admin/bulletins/edit/'.$news->id) : url('admin/news/edit/'.$news->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    {!! $newses->render() !!}

    <div class="text-center mt-4 small text-muted">{{ $newses->total() }} result{{ $newses->total() == 1 ? '' : 's' }} found.</div>

@endif

@endsection
