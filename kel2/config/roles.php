<?php
return [
    'roles' => [
        'user' => [
            'listBuku',
            'pengajuan.create',
            'pengajuan.store',
            'buku.detail',
            'profile.profile',
            'profile.update',
            'user.dashboard',
        ],
        'staff' => [
            'staff.dashboard',
            'listBuku',
            'staff.detail',
            'approve',
            'showapprove',
            'reject',

        ],
        'editor' => [
            'profile',
            'editor.detail',
            'editor.dashboard',
            'editor.TerimaTugas',
            'editor.TolakTugas',
        ],
    ],
];
