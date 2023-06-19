@extends('dashboard/apk')
@section('konten4')
    <div>
        <style>
            .qty {
                width: 20%;
                display: inline;
            }
        </style>
        <div class="card border-primary mb-3">
        <div class="card-body">
            <div class="form-group row pb-6">
                <form class="row g-3 mt-3" action="/transaksi/submit" method="POST">
                    @csrf
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Product</label>
                    <div class="col-sm-8">
                        <select class="form-control  " name="barangs" id="barangs"
                            required>
                            <option>-- Pilih Product --</option>
                            @foreach ($barangs as $brg)
                                 <option  value="{{ $brg->id }}">  {{ $brg->nama_barang  }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4 ">
                        <button type="submit" class="btn btn-success w-100 text-center ">Submit</button>
                    </div>
                </form>
            </div>

            {{-- @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif --}}

            <div class="card-body border-top pb-5 p-0 mt-3">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">qty</th>
                            <th scope="col">Harga/Qty</th>
                            <th scope="col" style="width: 200px;">Total</th>
                            <th scope="col" style="width: 10px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $trans)
                            <tr>
                                <td>  
                                    {{ $loop->iteration }} 
                                </td>
                                <td> 
                                    {{ $trans->barang->nama_barang }}
                                 </td>
                                <td>
                                    <div>
                                        @if ($trans->qty > 1)
                                            <span class="btn btn-danger btn-sm"
                                               >-</span>
                                        @endif
                                        <input type="text" class="form-control qty" value=" {{ $trans->qty }}"
                                            readonly>
                                        <span class="btn btn-success btn-sm" onclick="increment({{ $trans->id }}) }}">+</span>
                                    </div>
                                </td>
                                <td>Rp. {{ number_format($trans->barang->harga) }} </td>
                                <td>
                                    Rp. {{ number_format($trans->barang->harga * $trans->qty) }} 
                                </td>
                                <td>
                                    <button type="button" wire:click="deleteTransaction
                                    {{-- ({{ $transaction->id }}) --}}
                                    "
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align:right;">Total Pembelian</td>
                        <td>
                           Rp. {{ $transaksis->sum('total') }}
                        </td>
                        <tr>
                            <td style="border:none;"></td>
                            <td style="border:none;"></td>
                            <td style="border:none;"></td>
                            <td style="text-align:right;">Pembayaran</td>
                            <td style="text-align:right;">
                                <input type="number" wire:model="pembayaran" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td style="border:none;"></td>
                            <td style="border:none;"></td>
                            <td style="border:none;"></td>
                            <td style="text-align:right;">Kembalian</td>
                            <td style="text-align:left;">
                                Rp. -{{ $transaksis->sum('total') }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <div class="">
                    <button type="button" wire:click="save" class="btn btn-success btn-sm float-right">Submit</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
