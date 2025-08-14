<section id="rekap" class="stats-section">
    <div class="container">
        <h2 class="section-title">Rekap Kader & Kegiatan</h2>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <i class="fas fa-users stats-icon"></i>
                    <div class="stats-number"> {{ $TotalKader }} </div>
                    <div class="stats-label">Total Kader</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <i class="fas fa-building stats-icon"></i>
                    <div class="stats-number"> {{ $TotalKomisariat }} </div>
                    <div class="stats-label">Komisariat</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <i class="fas fa-calendar-alt stats-icon"></i>
                    <div class="stats-number"> {{$TotalPost}} </div>
                    <div class="stats-label">Kegiatan/Tahun</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <i class="fas fa-trophy stats-icon"></i>
                    <div class="stats-number">12</div>
                    <div class="stats-label">Prestasi</div>
                </div>
            </div>
        </div>
    </div>
</section>