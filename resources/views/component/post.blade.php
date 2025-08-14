<section id="posts" class="posts-section">
    <div class="container">
        <h2 class="section-title">Berita & Artikel Terbaru</h2>
        <div class="row g-4">
            @foreach ($GetPost as $gp)
                <div class="col-lg-4 col-md-6">
                    <div class="post-card">
                        <div class="card-img">
                            <img class="img-fluid" src="{{ asset('storage/' . $gp->thumbnail) }}" alt="{{ $gp->title }}">
                        </div>
                        <div class="post-content">
                            <h3 class="post-title">{{ $gp->title }}</h3>
                            <p class="post-excerpt">
                                {{ Str::limit(strip_tags($gp->content), 120, '...') }}
                            </p>
                            <div class="post-date">
                                <i class="fas fa-calendar"></i>
                                {{ \Carbon\Carbon::parse($gp->published_at)->format('d M Y') }}
                            </div>
                            <div class="post-date">
                                <i class="fas fa-user"></i>
                                {{ $gp->author->name ?? 'Tidak diketahui' }}
                            </div>
                            <div class="post-category">
                                <i class="fas fa-folder"></i>
                                {{ $gp->category }}
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('berita.show', $gp->slug) }}" class="btn btn-warning rounded-pill">
                                    Lihat Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
