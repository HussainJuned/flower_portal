<div class="card p-5 product_box my-5">
    <div class="row mb-3">
        <div class="col-sm-6 mb-3">
            <a href="{{ route('userinfos.show', ['userinfo' => $seller->userinfo->id]) }}">
                <h5>
                    <strong>{{ $seller->name }}</strong>
                </h5>
            </a>
        </div>
        <div class="col-sm-6 mb-3">

            <p>email: {{ $seller->email }}</p>
            <p>name: {{ $seller->userinfo->first_name }} {{ $seller->userinfo->first_name }}</p>
            @if ($seller->products->first()->reviews()->exists())
                <p>Reviews: ({{ round($seller->products->first()->reviewsAvg->first()->avg_quality, 2) }} / 5)</p>
                @else
                <p>Reviews: no review yet</p>
            @endif

        </div>
    </div>
</div>