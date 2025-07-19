<x-layout-dashboard>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    <div class="col-10 col-12 mt-3 container-fluid">
    <h2 class="fw-semibold fs-3">Hasil Voting {{ $event->name }}</h2>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="event-status-message" class="mb-4">
                        {{-- Pesan status event --}}
                        @if ($eventEnded)
                            <div class="bg-gray-100 border border-gray-400 text-gray-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Event Sudah Berakhir!</strong>
                                <span class="block sm:inline">Ini adalah hasil final.</span>
                            </div>
                        @else
                            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Sedang Berlangsung!</strong>
                            </div>
                        @endif
                    </div>


                    <h3 class="text-lg font-medium text-gray-900 mb-4">Perolehan Suara</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="candidates-vote-counts">
                        {{-- Data akan ditampilkan dari awal --}}
                        @forelse ($candidatesWithVotes as $candidate)
                            <div class="p-4 border rounded-md shadow-sm candidate-card" data-candidate-id="{{ $candidate->id }}">
                                <h4 class="text-xl font-semibold">{{ $candidate->name }}</h4>
                                @if($candidate->image)
                                    <img src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}" class="mt-2 w-full h-32 object-cover rounded-md">
                                @endif
                                <p class="mt-3 text-2xl font-bold text-indigo-600">
                                    <span class="vote-count" id="vote-count-{{ $candidate->id }}">{{ $candidate->votes_count }}</span> Suara
                                </p>
                            </div>
                        @empty
                            <p>Belum ada kandidat atau suara yang tercatat untuk event ini.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layout-dashboard>