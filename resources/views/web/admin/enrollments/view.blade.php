@extends('web.admin.layout');

@section('page-content')
<!-- Responsive Table -->
<div class="card">
    <h5 class="card-header">List of Enrolled Beneficiaries</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="text-nowrap">
            <th>Full Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Marital Status</th>
            <th>Phone Number</th>
            <th>Local Government Area</th>
            <th>Ward</th>
            <th>Facilities</th>
            <th>Category</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($enrollments as $enrollment)
          <tr>
              <td>{{ $enrollment->full_name}}</td>
              <td>{{ $enrollment->gender }}</td>
              <td>{{ $enrollment->date_of_birth }}</td>
              <td>{{ $enrollment->marital_status }}</td>
              <td>{{ $enrollment->phone_number }}</td>
              <td>{{ $enrollment->lga }}</td>
              <td>{{ $enrollment->ward }}</td>
              <td>{{ $enrollment->facility }}</td>
              <td>{{ $enrollment->category }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex p-2">
        {!! $enrollments->links() !!}
      </div>
    </div>
  </div>
@endsection
