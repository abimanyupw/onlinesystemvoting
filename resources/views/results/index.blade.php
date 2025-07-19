    <x-layout-dashboard>
        <x-slot:title>
        {{ $title }}
    </x-slot:title>
    <div class="col-md-10 col-md-12 mt-5">
        <div class="container">
    <h3 class="fw-semibold fs-2 mb-4">Event Voting</h3>
            <div class="row g-4">
                @forelse($Events as $event)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">{{ $event->name }}</h4>
                            <p class="card-text text-muted">{{ Str::limit($event->description, 100) }}</p>
                            <ul class="list-unstyled small text-muted">
                                <li>Mulai: {{ $event->start_time->format('d M Y H:i') }}</li>
                                <li>Berakhir: {{ $event->end_time->format('d M Y H:i') }}</li>
                            </ul>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                @if ($event->start_time->isFuture())
                                    <span class="badge bg-warning">Akan Datang</span>
                                @elseif ($event->start_time->isPast() && $event->is_active === false )
                                 <span class="badge bg-secondary">Berakhir</span>
                               
                                @elseif($event->is_active === false)
                                    <span class="badge bg-danger">Tidak Aktif</span>
                                @else
                                    <span class="badge bg-success">Aktif</span>
                                @endif
                                <div>
                                     @if($event->is_active === false)
                                    <a href="" class="btn btn-sm btn-primary me-2 disabled">
                                        <i class="fas fa-poll me-1"></i> Vote
                                    </a>
                                    <a href="" class="btn btn-sm btn-info disabled">
                                        <i class="fas fa-chart-bar me-1"></i> Hasil
                                    </a>
                                    @else
                                     <a href="/voting/show" class="btn btn-sm btn-primary me-2">
                                        <i class="fas fa-poll me-1"></i> Vote
                                    </a>
                                    <a href="/result/{{ $event->name }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-chart-bar me-1"></i> Hasil
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @can('admin')      
                        <div class="card-footer bg-light text-end">
                                <a href="" class="btn btn-sm btn-warning me-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="" class="btn btn-sm btn-secondary me-2">
                                    <i class="fas fa-users"></i> Kandidat
                                </a>
                                <form action="" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus event ini? Semua kandidat dan suara terkait juga akan dihapus.')">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                        </div>
                         @endcan
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">Tidak ada event voting yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
        </div>
    </div>
    </div>
    </x-layout-dashboard>