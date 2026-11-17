
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Revisi - BoostCV</title>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background: #FBFAF7;
            color: #1C2434;
            font-family: 'Inter', sans-serif;
        }

        .main { max-width: 1150px; margin: auto; padding: 45px 25px; }

        h3, h5 { font-family: 'Fraunces', serif; color: #16264A; }
        h3 { font-size: 30px; margin-bottom: 8px; }

        .subtitle { color: #687184; font-size: 14px; line-height: 1.7; }

        .card {
            background: white;
            border: 1px solid #E4E1D8;
            border-radius: 14px;
            padding: 25px;
            margin-top: 25px;
            box-shadow: 0 5px 20px rgba(22,38,74,.05);
        }

        .table-responsive { overflow-x: auto; }

        table { width: 100%; min-width: 750px; border-collapse: collapse; }

        th {
            background: #F4F2EC;
            color: #223A66;
            text-align: left;
            font-size: 12px;
            padding: 15px 12px;
        }

        td {
            padding: 16px 12px;
            border-bottom: 1px solid #EEECE6;
            font-size: 13px;
            line-height: 1.6;
        }

        .badge {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .badge-requested { background: #FFF0CF; color: #946000; }
        .badge-approved { background: #DFF2E5; color: #247443; }
        .badge-rejected { background: #FCE4E4; color: #A52B2B; }
        .badge-completed { background: #E2EAF8; color: #223A66; }
        .badge-default { background: #EAECEF; color: #555E6B; }

        .btn {
            display: inline-block;
            padding: 9px 16px;
            border-radius: 8px;
            background: #223A66;
            color: white;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
        }

        .btn:hover { background: #16264A; color: white; }

        .empty { text-align: center; padding: 50px 15px; }
        .empty h5 { font-size: 22px; margin-bottom: 10px; }
        .empty p { color: #687184; font-size: 13px; }

        @media(max-width: 600px) {
            .main { padding: 25px 14px; }
            h3 { font-size: 25px; }
            .card { padding: 15px; }
        }
    </style>
</head>
<body>

<main class="main">

    <h3>Pengajuan Revisi</h3>
    <p class="subtitle">
        Pantau semua permintaan revisi hasil CV yang pernah kamu ajukan.
    </p>

    <div class="card">

        @if($revisions->count() > 0)

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Pesanan</th>
                            <th>Layanan</th>
                            <th>Deskripsi Revisi</th>
                            <th>Status</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($revisions as $revision)
                            @php
                                $statusLabels = [
                                    'requested' => 'Menunggu',
                                    'approved' => 'Disetujui',
                                    'rejected' => 'Ditolak',
                                    'completed' => 'Selesai'
                                ];

                                $statusColors = [
                                    'requested' => 'requested',
                                    'approved' => 'approved',
                                    'rejected' => 'rejected',
                                    'completed' => 'completed'
                                ];
                            @endphp

                            <tr>
                                <td>{{ $loop->iteration + ($revisions->currentPage() - 1) * $revisions->perPage() }}</td>
                                <td>{{ optional($revision->order)->order_number ?? '-' }}</td>
                                <td>{{ optional($revision->order)->service_title ?? '-' }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($revision->request_description, 45) }}</td>
                                <td>
                                    <span class="badge badge-{{ $statusColors[$revision->status] ?? 'default' }}">
                                        {{ $statusLabels[$revision->status] ?? ucfirst($revision->status) }}
                                    </span>
                                </td>
                                <td>{{ $revision->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('customer.revisions.show', $revision->id) }}" class="btn">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-top:20px;">
                {{ $revisions->links() }}
            </div>

        @else

            <div class="empty">
                <h5>Belum Ada Pengajuan Revisi</h5>
                <p>Permintaan revisi yang kamu ajukan akan ditampilkan di sini.</p>
            </div>

        @endif

    </div>

</main>
</body>
</html>
