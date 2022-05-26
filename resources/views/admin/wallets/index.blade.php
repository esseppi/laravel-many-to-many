@extends('layouts.app1')

@section('content')
    <main class="my-3">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($wallets as $wallet)
                    <div class="col">
                        <div class="card h-100">
                            <a href="{{ route('admin.wallets.show', $wallet) }}">
                                <div class="card-header">{{ $wallet->slug }}</div>
                                <div class="card-body">
                                    <h5 class="card-title">Owner: {{ $wallet->user->name }}</h5>
                                    <p class="card-text">
                                        @foreach ($trades as $trade)
                                            @if ($trade->wallet_id == $wallet->id)
                                                {{ $trade->slug }}
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- @dd($wallets) --}}
        </div>
    </main>
@endsection
