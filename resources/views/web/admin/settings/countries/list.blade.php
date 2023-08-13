@extends('web.admin.layout');

@section('page-content')
<!-- Responsive Table -->
<div class="card">
  <div class="d-flex align-items-center">
    <div>
      <h5 class="card-header">List of Countries</h5>
    </div>
    <div class="float-right">
      <a class="btn btn-primary" href="{{ route('admin.settings.countries.create') }}">Create Country</a>
    </div>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($countries as $country)
        <tr>
          <td>{{ $country->name}}</td>
          <td>
            <div class="d-flex mr-1">
              <div>
                <a href="{{ route('admin.settings.countries.edit', [$country->id]) }}" class="btn btn-secondary">
                  Edit
                </a>
              </div>
              <div class="ml-1">
                <form action="{{ route('admin.settings.countries.destroy', [$country->id]) }}" method="post">
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
  </div>
</div>
@endsection
