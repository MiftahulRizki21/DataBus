<div class="pagination-container fade-in">
    <!-- Tombol Previous -->
    @if ($listBuku->onFirstPage())
        <span class="previous round fade-in disabled">&#8249;</span>
    @else
        <a href="{{ $listBuku->previousPageUrl() }}" class="previous round fade-in">&#8249;</a>
    @endif

    <!-- Buku -->
    <div class="rekom-books">
        @foreach ($listBuku as $listbuku)
            <div class="book-item fade-in">
                <a href="{{ route('detailBuku_show', $listbuku->id) }}">
                    <img src="{{ Storage::url($listbuku->foto) }}" alt="{{ $listbuku->judul_buku }}">
                </a>
            </div>
        @endforeach
    </div>

    <!-- Tombol Next -->
    @if ($listBuku->hasMorePages())
        <a href="{{ $listBuku->nextPageUrl() }}" class="next round fade-in">&#8250;</a>
    @else
        <span class="next round fade-in disabled">&#8250;</span>
    @endif
</div>
