<?php
return [
    'roles' => [
        'user' => [
            'listBuku',
            'pengajuan.index',
            'buku.detail'
        ],
        'staff' => [
            'staff.dashboard',
            'listBuku',
            'buku.detail'
        ],
        'editor' => [
            'profile',
            'editor.dashboard',
        ],
    ],
];
