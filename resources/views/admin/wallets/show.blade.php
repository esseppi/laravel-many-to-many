@extends('layouts.app1')

@section('content')
    <main class="my-3">
        <div class="container">
            {{-- @dd($wallets) --}}
            <div class="row row-cols-5">
                <div class="card-body">
                    SLUG-WALLET:{{ $wallet->slug }} <br> Owner {{ $wallet->user->name }}
                    <ul>
                        @foreach ($trades as $trade)
                            <li>
                                <ol>
                                    <li>
                                        {{ $trade->baseCoin->name }}
                                        {{ $trade->baseAmount }}
                                    </li>
                                    <li>
                                        {{ $trade->foreignCoin->name }}
                                        {{ $trade->foreignAmount }}
                                    </li>

                                </ol>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
