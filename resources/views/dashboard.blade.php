<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SaweuMIPA Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f7ff;
            color: #0f172a;
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(180deg, #071b3a, #0b2550);
            position: fixed;
            left: 0;
            top: 0;
            padding: 24px 18px;
            color: white;
            border-radius: 0 28px 28px 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 34px;
        }

        .brand-icon {
            width: 45px;
            height: 45px;
            border-radius: 16px;
            background: linear-gradient(135deg, #6d5dfc, #38bdf8);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .brand h4 {
            margin: 0;
            font-weight: 700;
            font-size: 20px;
        }

        .brand small {
            color: #b8c7e8;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 16px;
            border-radius: 15px;
            color: #dbeafe;
            text-decoration: none;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .menu-link.active,
        .menu-link:hover {
            background: linear-gradient(135deg, #4f46e5, #2563eb);
            color: white;
        }

        .logout-box {
            position: absolute;
            bottom: 24px;
            left: 18px;
            right: 18px;
            background: rgba(255,255,255,.08);
            border-radius: 15px;
            padding: 14px 16px;
            color: #e5e7eb;
            text-decoration: none;
        }

        .main {
            margin-left: 260px;
            padding: 28px;
        }

        .topbar {
            background: white;
            border-radius: 22px;
            padding: 16px 22px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, .06);
            margin-bottom: 26px;
        }

        .search-box {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 10px 16px;
            width: 360px;
        }

        .stat-card {
            border: 0;
            border-radius: 24px;
            box-shadow: 0 10px 28px rgba(15, 23, 42, .08);
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
        }

        .icon-box {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
        }

        .soft-blue { background: #e8f0ff; color: #2563eb; }
        .soft-green { background: #dcfce7; color: #16a34a; }
        .soft-purple { background: #f3e8ff; color: #7c3aed; }
        .soft-orange { background: #ffedd5; color: #f97316; }

        .content-card {
            background: white;
            border-radius: 26px;
            border: 0;
            box-shadow: 0 10px 28px rgba(15, 23, 42, .08);
        }

        .event-box {
            background: #f8fbff;
            border-radius: 20px;
            padding: 18px;
        }

        .btn-gradient {
            background: linear-gradient(135deg, #7c3aed, #2563eb);
            color: white;
            border: 0;
            border-radius: 14px;
            padding: 12px;
            font-weight: 600;
        }

        .count-box {
            background: #f3f6ff;
            border-radius: 18px;
            padding: 18px;
            text-align: center;
            min-width: 88px;
        }

        .count-box h3 {
            font-weight: 800;
            margin: 0;
        }

        .table {
            font-size: 14px;
        }

        @media (max-width: 992px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
                border-radius: 0;
            }

            .logout-box {
                position: static;
                margin-top: 20px;
            }

            .main {
                margin-left: 0;
            }

            .search-box {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="brand">
        <div class="brand-icon">
            <i class="bi bi-calendar-event"></i>
        </div>
        <div>
            <h4>SaweuMIPA</h4>
            <small>Admin Panel</small>
        </div>
    </div>

    <a href="/dashboard" class="menu-link active">
        <i class="bi bi-grid"></i> Dashboard
    </a>
    <a href="#" class="menu-link">
        <i class="bi bi-calendar3"></i> Event
    </a>
    <a href="#" class="menu-link">
        <i class="bi bi-people"></i> Participants
    </a>
    <a href="#" class="menu-link">
        <i class="bi bi-tags"></i> Kategori
    </a>
    <a href="#" class="menu-link">
        <i class="bi bi-bar-chart"></i> Laporan
    </a>
    <a href="#" class="menu-link">
        <i class="bi bi-gear"></i> Pengaturan
    </a>

    <a href="#" class="logout-box">
        <i class="bi bi-box-arrow-left text-danger me-2"></i> Logout
    </a>
</aside>

<main class="main">

    <div class="topbar d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <i class="bi bi-list fs-4"></i>
            <input type="text" class="search-box" placeholder="Cari event, peserta, dll...">
        </div>

        <div class="d-flex align-items-center gap-4">
            <i class="bi bi-bell fs-5"></i>
            <div class="d-flex align-items-center gap-2">
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width:42px;height:42px;">
                    A
                </div>
                <div>
                    <strong>Admin Dekan</strong><br>
                    <small class="text-muted">Administrator</small>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <h2 class="fw-bold">Halo, Admin Dekan! 👋</h2>
        <p class="text-muted">Kelola event Fakultas MIPA dengan mudah.</p>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card stat-card p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box soft-blue">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                    <div>
                        <small class="text-muted">Total Event</small>
                        <h3 class="fw-bold mb-0">{{ $totalEvents }}</h3>
                        <small class="text-muted">Event dibuat</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box soft-green">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <small class="text-muted">Total Participants</small>
                        <h3 class="fw-bold mb-0">{{ $totalParticipants }}</h3>
                        <small class="text-muted">Peserta terdaftar</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box soft-purple">
                        <i class="bi bi-clock"></i>
                    </div>
                    <div>
                        <small class="text-muted">Upcoming Event</small>
                        <h3 class="fw-bold mb-0">{{ $events->count() }}</h3>
                        <small class="text-muted">Akan datang</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box soft-orange">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <div>
                        <small class="text-muted">Event Selesai</small>
                        <h3 class="fw-bold mb-0">0</h3>
                        <small class="text-muted">Telah selesai</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-5">
            <div class="content-card p-4">
                <h5 class="fw-bold mb-3">Daftar Event</h5>

                    <form method="GET" action="/dashboard" class="mb-3">
                        <select name="status" class="form-select rounded-4" onchange="this.form.submit()">
                            <option value="upcoming" {{ $status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                            <option value="ongoing" {{ $status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="done" {{ $status == 'done' ? 'selected' : '' }}>Done</option>
                        </select>
                    </form>
                        @if ($events->count() > 0)

                            @foreach ($events as $event)

                                <div class="event-box mb-3">

                                    <h5 class="fw-bold">{{ $event->title }}</h5>

                                    <p>
                                        <i class="bi bi-calendar3 text-primary me-2"></i>
                                        <strong>Tanggal:</strong> {{ $event->event_date }}
                                    </p>

                                    <p>
                                        <i class="bi bi-geo-alt text-primary me-2"></i>
                                        <strong>Lokasi:</strong> {{ $event->location }}
                                    </p>

                                    <p>
                                        <i class="bi bi-tag text-primary me-2"></i>
                                        <strong>Status:</strong> {{ ucfirst($event->status) }}
                                    </p>

                                    <a href="#" class="btn btn-gradient w-100 mt-2">
                                        Lihat Detail Event
                                    </a>

                                </div>ok

                            @endforeach

                        @else

                            <p class="text-muted">Belum ada event pada status ini.</p>

                        @endif
            </div>
        </div>

        <div class="col-lg-7">
            <div class="content-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Peserta Terbaru</h5>
                    <a href="#" class="text-decoration-none small">Lihat semua</a>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr class="text-muted">
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Event</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Rizky Ananda</td>
                                <td>rizky@email.com</td>
                                <td>{{ $selectedEvent->title ?? '-' }}</td>
                                <td><span class="badge bg-success-subtle text-success">Terverifikasi</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Siti Nurhaliza</td>
                                <td>siti@email.com</td>
                                <td>{{ $selectedEvent->title ?? '-' }}</td>
                                <td><span class="badge bg-success-subtle text-success">Terverifikasi</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Muhammad F.</td>
                                <td>m.fikri@email.com</td>
                                <td>{{ $selectedEvent->title ?? '-' }}</td>
                                <td><span class="badge bg-warning-subtle text-warning">Menunggu</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>