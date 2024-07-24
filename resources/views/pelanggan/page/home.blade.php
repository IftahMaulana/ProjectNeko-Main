@extends('pelanggan.layout.index')

@section('content')
    @if ($best->count() == 0)
        <div class="container"></div>
    @else
        <h4 class="mt-5">Best Menu</h4>
        <div class="container mt-3 mb-5">
            <div class="row">
                @foreach ($best as $b)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card" style="width: 100%;">
                            <div class="card-header m-auto" style="height:100%;width:100%;">
                                <img src="{{ asset('assets/images/' . $b->foto) }}" alt="baju 1"
                                    style="width: 100%;height:200px; object-fit: cover; padding:0;">
                            </div>
                            <div class="card-body">
                                <p class="m-0 text-justify"> {{ $b->nama_product }} </p>
                            </div>
                            <div class="card-footer d-flex flex-row justify-content-between align-items-center">
                                <p class="m-0" style="font-size: 16px; font-weight:600;"><span>IDR
                                    </span>{{ number_format($b->harga) }}</p>
                                <button class="btn btn-outline-primary" style="font-size:24px">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <h4 class="mt-5">Menu</h4>
    <div class="container mt-3 mb-5">
        @if ($data->isEmpty())
            <h1>Belum ada product ...!</h1>
        @else
            <div class="row">
                @foreach ($data as $p)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card" style="width: 100%;">
                            <div class="card-header m-auto" style="height:100%;width:100%;">
                                <img src="{{ asset('assets/images/' . $p->foto) }}" alt="kopi 1"
                                    style="width: 100%;height:200px; object-fit: cover; padding:0;">
                            </div>
                            <div class="card-body">
                                <p class="m-0 text-justify"> {{ $p->nama_product }} </p>
                            </div>
                            <div class="card-footer d-flex flex-row justify-content-between align-items-center">
                                <p class="m-0" style="font-size: 16px; font-weight:600;"><span>IDR
                                    </span>{{ number_format($p->harga) }}</p>
                                <form action="{{route('addTocart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="idProduct" value="{{$p->id}}">
                                    <button type="submit" class="btn btn-outline-primary" style="font-size:24px">
                                        <i class="fa-solid fa-cart-plus"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="pagination d-flex flex-row justify-content-between">
            <div class="showData">
                Data ditampilkan {{ $data->count() }} dari {{ $data->total() }}
            </div>
            <div>
                {{ $data->links() }}
            </div>
        </div>
    @endif

@endsection
