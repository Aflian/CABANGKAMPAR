<section id="struktur" class="structure-section">
    <div class="container">
        <h2 class="section-title">Struktur Organisasi</h2>
        <div class="org-chart">

            {{-- Ketua Umum --}}
            @php
                $ketua = $struktur->firstWhere('jabatan', 'KETUA UMUM');
            @endphp
            @if($ketua)
            <div class="row justify-content-center mb-4">
                <div class="col-lg-6">
                    <div class="position-card text-center">
                        <img class="card-img mb-2" width="100" height="140px"
                             src="{{ asset('storage').'/'.$ketua->foto ?? 'logoimm.png' }}" alt="">
                        <div class="position-title">{{ $ketua->jabatan }}</div>
                        <div class="position-name">{{ $ketua->nama }}</div>
                    </div>
                </div>
            </div>
            @endif

            {{-- Wakil Ketua Umum + Sekretaris Umum --}}
            <div class="row mb-4">
                @foreach($struktur->whereIn('jabatan', ['Bendahara Umum','Sekretaris Umum']) as $p)
                <div class="col-lg-6">
                    <div class="position-card text-center">
                        <img class="card-img mb-2" width="100" height="140px"
                             src="{{ asset('storage'.'/'.$p->foto ?? 'logoimm.png') }}" alt="">
                        <div class="position-title">{{ $p->jabatan }}</div>
                        <div class="position-name">{{ $p->nama }}</div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Bendahara + Ketua Bidang --}}
            <div class="row">
                @foreach($struktur->whereNotIn('jabatan', ['KETUA UMUM','Sekretaris Umum','Bendahara Umum']) as $p)
                <div class="col-lg-4 mb-3">
                    <div class="position-card text-center">
                        <img class="card-img mb-2" width="100" height="140px"
                             src="{{ asset('storage').'/'.$p->foto ?? 'logoimm.png' }}" alt="">
                        <div class="position-title">{{ $p->jabatan }}</div>
                        <div class="position-name">{{ $p->nama }}</div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>
