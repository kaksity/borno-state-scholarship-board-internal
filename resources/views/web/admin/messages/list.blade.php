@extends('web.admin.layout');

@section('page-content')
<!-- Responsive Table -->
<div class="card">
    <h5 class="card-header">List of recieved messages</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="text-nowrap">
            <th>Full Name</th>
            <th>Email Address</th>
            <th>Subject</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($messages as $message)
          <tr>
              <td>{{ $message->full_name}}</td>
              <td>{{ $message->email_address }}</td>
              <td>{{ $message->subject }}</td>
              <td>
                <a href="{{ route('web.admin.messages.show', [$message->id]) }}" class="btn btn-primary">View</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex p-2">
        {!! $messages->links() !!}
      </div>
    </div>
  </div>
@endsection
