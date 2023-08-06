@php
    $sn=1;
@endphp
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="basic-btn" class="table mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td class="align-middle">
                                {{ $sn++ }}
                            </td>
                            <td class="align-middle">
                                {{ $row->name }}
                            </td>
                            <td class="align-middle">
                                {{ $row->phone }}
                            </td>
                            <td class="align-middle">
                                {{ $row->email }}
                            </td>
                            <td class="align-middle">
                                {{ strtoupper($row->type) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>