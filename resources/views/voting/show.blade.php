<x-layout-dashboard>
    <x-slot:title>
        Voting {{ $event->name }}
    </x-slot:title>

    <div class="col-10 col-12 mt-3 container-fluid">
        <h2 class="fw-semibold fs-3">Voting untuk Event: {{ $event->name }}</h2>
    </div>

    <div class="container mt-5">
        <div class="card shadow mb-4">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <p class="mb-4">{{ $event->description }}</p>

                    @if ($event->start_time)
                        <p class="text-muted small">Mulai: {{ $event->start_time->format('d M Y H:i') }}</p>
                    @else
                        <p class="text-muted small">Mulai: Tanggal tidak ditentukan</p>
                    @endif

                    @if ($event->end_time)
                        <p class="text-muted small mb-4">Berakhir: {{ $event->end_time->format('d M Y H:i') }} (Waktu tersisa: {{ $event->end_time->diffForHumans() }})</p>
                    @else
                        <p class="text-muted small mb-4">Berakhir: Tanggal tidak ditentukan</p>
                    @endif

                @if ($hasVoted)
                    {{-- Tampilan jika mahasiswa sudah vote --}}
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Terima Kasih!</h4>
                        <p>Anda sudah berhasil memberikan suara untuk event ini. Anda tidak bisa vote lagi.</p>
                        <hr>
                        <p class="mb-0">Periksa <a href="{{ route('result.show', $event) }}" class="alert-link">hasil sementara</a>.</p>
                    </div>
                @else
                    {{-- Form voting jika mahasiswa belum vote --}}
                    <h4 class="fw-semibold mb-3">Pilih Kandidat Anda:</h4>
                    <form action="/voting/vote" method="POST">
                        @csrf
                        <div class="row g-4 mb-4">
                            @forelse ($event->candidates as $candidate)
                                <div class="col-md-4">
                                    <div class="card h-100 shadow-sm cursor-pointer candidate-card"
                                         onclick="this.querySelector('input[type=radio]').checked = true; this.classList.add('border-primary'); this.classList.remove('border-gray');"
                                         style="border: 2px solid #e2e8f0;">
                                        <div class="card-body text-center">
                                            @if($candidate->image)
                                                <img src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}" class="img-fluid rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mb-3 mx-auto" style="width: 120px; height: 120px;">
                                                    <i class="fas fa-user-circle fa-4x text-muted"></i>
                                                </div>
                                            @endif
                                            <h5 class="card-title fw-bold">{{ $candidate->name }}</h5>
                                            <p class="card-text small text-muted">{{ Str::limit($candidate->description, 80) }}</p>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="radio" name="candidate_id" id="candidate{{ $candidate->id }}" value="{{ $candidate->id }}" required>
                                                <label class="form-check-label" for="candidate{{ $candidate->id }}">
                                                    Pilih Ini
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-center text-muted">Belum ada kandidat untuk event ini. Silakan hubungi admin.</p>
                                </div>
                            @endforelse
                        </div>

                        @error('candidate_id')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror

                        <div class="text-center mt-5">
                            @if ($event->candidates->isNotEmpty()) {{-- Pastikan ada kandidat sebelum menampilkan tombol submit --}}
                                <button type="submit" class="btn btn-primary btn-lg">Kirim Suara Saya</button>
                            @endif
                            <a href="/result" class="btn btn-secondary btn-lg ms-3">Kembali ke event</a>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-layout-dashboard>