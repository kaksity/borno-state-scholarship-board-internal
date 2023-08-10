@extends('web.admin.layout');

@section('page-content')
<!-- Responsive Table -->
<div class="card">
  <h5 class="card-header">List of News</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>Title</th>
          <th>Is Published</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($news as $new)
        <tr>
          <td>{{ $new->title}}</td>
          <td>{{ $new->is_published === true ? 'Yes' : 'No' }}</td>
          <td>
            <div class="d-flex">
              <div><a href="{{ route('web.admin.news.edit', [$new->id]) }}" class="btn btn-secondary">Edit</a></div>
              <div class="mr-1">
                <form action="{{ route('news.destroy', [$new->id]) }}" method="post">
                  @csrf
                  {{ method_field('DELETE') }}
                  <input type="submit" class="btn btn-danger" value="Delete" />
                </form>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex p-2">
      {!! $news->links() !!}
    </div>
  </div>
</div>
@endsection
