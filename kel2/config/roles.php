<?php
return [
    'roles' => [
        'user' => [
            'listBuku',
            'pengajuan.create',
            'pengajuan.store',
            'buku.detail',
            'profile.profile',
            'user.dashboard',
        ],
        'staff' => [
            'staff.dashboard',
            // 'listBuku',
            'buku.detail'
        ],
        'editor' => [
            'profile',
            'editor.dashboard',
        ],
    ],
];
