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
        @foreach($pengajuans as $pengajuan)
        @if ($pengajuan->editor_id == $user->id)
            p   
        @endif
            <tr>
                <td>{{ $pendaftars->name }}</td>
                <td>{{ $pendaftars->email }}</td>
                <td>{{ $pendaftars->role }}</td>
                <td>{{ $pendaftars->password }}</td>
                <td>
                    <a href="{{ route('approve', $pendaftars->id) }}" class="btn btn-success" method="POST">Setujui</a>
                </td>
                <td>
                    <a href="{{ route('reject', $pendaftars->id) }}" class="btn btn-success" method="POST">tolak</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
