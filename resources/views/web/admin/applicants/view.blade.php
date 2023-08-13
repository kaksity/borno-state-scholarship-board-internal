@extends('web.admin.layout');

@section('page-content')
<!-- Responsive Table -->
<div class="card">
    <h5 class="card-header">List of {{$programme}} Applicants</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="text-nowrap">
            <th>Surname</th>
            <th>Other Names</th>
            <th>Programme</th>
            <th>Email Address</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($applicants as $applicant)
          <tr>
              <td>{{ $applicant->surname}}</td>
              <td>{{ $applicant->other_names }}</td>
              <td>{{ $applicant->programme }}</td>
              <td>{{ $applicant->email }}</td>
              <td>{{ $applicant->status }}</td>
              <td>
                <form action="">
                  @method('DELETE')
                  <a class="btn btn-primary" href="{{ route('admin.applicants.show', [$applicant->id]) }}">Details</a>
                  <button type="submit" class="btn btn-danger" >Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex p-2">
        {!! $applicants->links() !!}
      </div>
    </div>
  </div>
@endsection
