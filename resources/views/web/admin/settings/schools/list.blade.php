@extends('web.admin.layout');

@section('page-content')
<!-- Responsive Table -->
<div class="card">
  <div class="d-flex align-items-center">
    <div>
      <h5 class="card-header">List of Schools</h5>
    </div>
    <div class="float-right">
      <a class="btn btn-primary" href="{{ route('admin.settings.schools.create') }}">Create School</a>
    </div>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>Country</th>
          <th>School</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($schools as $school)
        <tr>
          <td>{{ $school->country->name ?? 'Country was deleted'}}</td>
          <td>{{ $school->school_name}}</td>
          <td>
            <div class="d-flex mr-1">
              <div>
                <a href="{{ route('admin.settings.schools.edit', [$school->id]) }}" class="btn btn-secondary">
                  Edit
                </a>
              </div>
              <div class="ml-1">
                <form action="{{ route('admin.settings.schools.destroy', [$school->id]) }}" method="post">
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
