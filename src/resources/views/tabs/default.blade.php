<div class="product-group">
    @foreach ($products as $product)
        <a class="product-card" href="/product/{{ $product->id }}">
            <img class="product-card__image" src="{{ asset('storage/' . $product->image) }}" alt="画像">
            
            <p class="product-card__name">{{ $product->name }}</p>

            @if($product->buy_user_id)
                <div class="sold-label">Sold</div>
            @endif   
        </a>
    @endforeach
</div>
