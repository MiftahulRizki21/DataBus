<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pendaftar as $pendaftars)
            <tr>
                <td>{{ $pendaftars->name }}</td>
                <td>{{ $pendaftars->email }}</td>
                <td>{{ $pendaftars->role }}</td>
                <td>{{ $pendaftars->password }}</td>
                <td>
                    <a href="{{ route('approve', $pendaftars->id) }}" class="btn btn-success" method="POST">Setujui</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
