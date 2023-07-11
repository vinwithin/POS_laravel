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
                <div class="form-group row pb-4">
                    <form class="row g-3 mt-3" action="/transaksi/submit" method="POST">
                        @csrf
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Product</label>
                        <div class="col-sm-8">
                            <select class="form-control  " name="barangs" id="barangs" required>
                                <option>-- Pilih Product --</option>
                                @foreach ($barangs as $brg)
                                    <option value="{{ $brg->id }}"> {{ $brg->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div style="text-align: center">
                            <button type="submit" class="btn btn-success w-100 float-right ">Submit</button>
                        </div>
                    </form>
                </div>

                {{-- @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif --}}

                <div class="card-body border-top pb-5 p-0 mt-1">
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
                                        <input type="text" class="form-control" value="{{  $trans->barang->nama_barang  }}" name="nama_barang" readonly>
                                    </td>
                                    <td>
                                        {{-- <form action="/transaksi/update"> --}}
                                        <div>
                                            {{-- @if ($trans->qty > 1) --}}
                                            <span class="qty1 btn btn-danger btn-sm" id="qty-">-</span>

                                            <input type="text" name="qty" id="qty+"
                                                class="qty+ form-control qty">
                                            <span class="qty2 btn btn-success btn-sm" id="qtyplus">+</span>
                                        </div>
                                        {{-- </form> --}}
                                    </td>
                                    <td><span>Rp. <a class="harga1">{{ $trans->barang->harga }}</a></span> </td>
                                    <td>
                                        <span>Rp. <a class="totalHarga"> </a></span>
                                    </td>
                                    <td>

                                        {{-- ({{ $transaction->id }}) --}}

                                        <a href="transaksi/delete/{{ $trans->id }}" class="btn btn-danger btn-sm"><i
                                                class="fa fa-trash"></i>

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
                                <span>Rp. <a id="totals"> </a></span>


                            </td>
                            <tr>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="text-align:right;">Pembayaran</td>
                                <td style="text-align:right;">
                                    <input oninput="myInput()" autocomplete="off" id="pembayaran" type="number"
                                        class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="text-align:right;">Kembalian</td>
                                <td style="text-align:left;">
                                    <a id="kembalian">Rp. </a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <form action="transaksi/delete" method="get">
                        <div style="text-align: right">
                            <p id="demo"></p>
                            <button class="btn btn-success btn-sm float-right">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script>
        //let pembayaran = document.getElementById('pembayaran').value;
        //let kembalian = document.getElementById('kembalian');
        //kembalian.innerHTML = pembayaran - total;
        function myInput() {
            let text = document.getElementById('pembayaran').value;
            document.getElementById('kembalian').innerHTML = "Rp. " + (text - total);
        }
        const totalHarga1 = document.getElementsByClassName('totalHarga');
        const Harga = document.getElementsByClassName('harga1');
        const totalCount = document.getElementsByClassName('qty+');
        const kurang = document.getElementsByClassName('qty1');
        const tambah = document.getElementsByClassName('qty2');
        const totals = document.getElementById('totals');




        let count = 1;

        for (var i = 0; i < totalCount.length; i++) {

            totalCount[i].value = count;
            totalHarga1[i].innerText = parseInt(Harga[i].innerHTML) * parseInt(totalCount[i].value)
        }
        //increment algorithms
        for (var i = 0; i < tambah.length; i++) {

            tambah[i].addEventListener('click', handleClick);
            //alert('You clicked element #' + i);
        }


        function handleClick(event) {
            // Get the index of the clicked button
            var index = Array.prototype.indexOf.call(tambah, event.target);
            var buttonValue = parseInt(totalCount[index].value);
            // var hargaValue = parseInt(Harga[index].innerText);
            // var totalValue = parseInt(totalHarga1[index].innerText);

            // Increment the value
            var result = parseInt(Harga[index].innerHTML) * (parseInt(totalCount[index].value) + 1);
            var incrementedValue = buttonValue + 1;

            // Update the button value
            totalCount[index].value = incrementedValue;

            totalHarga1[index].innerHTML = result;

            total = 0;
            totals.innerHTML = total;
            for (i = 0; i < totalHarga1.length; i++) {
                total += parseInt(totalHarga1[i].innerHTML);
                totals.innerHTML = total;
            }
        }
        // decrement algorithms
        for (var j = 0; j < kurang.length; j++) {

            kurang[j].addEventListener('click', handleClickDecrement);
            //alert('You clicked element #' + i);
        }


        function handleClickDecrement(e) {
            // Get the index of the clicked button
            var index1 = Array.prototype.indexOf.call(kurang, e.target);
            //get value input by id
            var buttonValue = parseInt(totalCount[index1].value);
            //var hargaValue = Harga[index1].innerHTML;
            if (buttonValue <= 1) {
                kurang[i].disabled = true;
            } else {
                // decrement the value
                var decrementValue = buttonValue - 1;

                // Update the button value
                totalCount[index1].value = decrementValue;
                var result = parseInt(Harga[index1].innerHTML) * parseInt(totalCount[index1].value);
                totalHarga1[index1].innerHTML = result
                total = 0;
            totals.innerHTML = total;
            for (i = 0; i < totalHarga1.length; i++) {
                total += parseInt(totalHarga1[i].innerHTML);
                totals.innerHTML = total;
            }
            }
        }
        var total = 0;
        for (i = 0; i < totalHarga1.length; i++) {
            total += parseInt(totalHarga1[i].innerHTML);
            totals.innerHTML = total;
        }



        // for (var j = 0; j < tambah.length; j++) {

        //             totalCount[i].value = count++;

        //             // totalCount.value = count;

        //     }.bind(null, i));
        // }

        //document.addEventListener("click", qtyTambah);
        // function qtyTambah() {
        //     count++;
        //     // for (var j = 0; j < tambah.length; j++) {
        //     for (var i = 0; i < totalCount.length; i++) {
        //         totalCount[i].value = count;
        //         // totalCount.value = count;
        //     }

        // }

        // function qtyKurang() {

        //     for (var i = 0; i < totalCount.length; i++) {
        //         if (totalCount[i].value <= 1) {
        //             for (var j = 0; j < kurang; j++) {
        //                 kurang[j].disabled = true;
        //             }
        //         } else {
        //             count--;
        //             // for (var j = 0; j < tambah.length; j++) {
        //             for (var i = 0; i < totalCount.length; i++) {
        //                 totalCount[i].value = count;
        //                 // totalCount.value = count;
        //             }
        //         }

        //     }
    </script>
@endsection
