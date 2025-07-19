<x-layout-dashboard>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    <div class="col-10 col-12 mt-3 container-fluid">
    <h2 class="fw-semibold fs-3">Welcome, {{ Auth::user()->name }}!</h2>
    </div>
    <div class="container mt-5">
        <div class="row g-4 mb-4">
            @can('admin')    
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 text-white $bg shadow py-2 bg-primary">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 ">
                                <div class="text-xs font-weight-bold text-uppercase mb-1"></div>
                                <div class="h5 mb-0 font-weight-bold">{{ $Users->count() }} Users</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas $icon fa-2x text-white card-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-end">
                        <a href="$link" class="text-dark text-decoration-none small">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            @endcan
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 text-white $bg shadow py-2 bg-success">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 ">
                                <div class="text-xs font-weight-bold text-uppercase mb-1"></div>
                                <div class="h5 mb-0 font-weight-bold">{{ $Votes->count() }} Votes</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas $icon fa-2x text-white card-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-end">
                        <a href="$link" class="text-dark text-decoration-none small">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            @can('admin')
                
            
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 text-white $bg shadow py-2 bg-danger">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 ">
                                <div class="text-xs font-weight-bold text-uppercase mb-1"></div>
                                <div class="h5 mb-0 font-weight-bold">{{ $activeEventCount  }} Active Events</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas $icon fa-2x text-white card-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-end">
                        <a href="$link" class="text-dark text-decoration-none small">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            @endcan
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 text-white $bg shadow py-2 bg-warning">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 ">
                                <div class="text-xs font-weight-bold text-uppercase mb-1"></div>
                                <div class="h5 mb-0 font-weight-bold">{{ $Events->count() }} Events</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas $icon fa-2x text-white card-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-end">
                        <a href="$link" class="text-dark text-decoration-none small">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

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