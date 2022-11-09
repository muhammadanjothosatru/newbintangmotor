<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $invoice->name }}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <style type="text/css" media="screen">
            html {
                font-family: sans-serif;
                line-height: 1;
                margin: 0;
            }
            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                text-align: left;
                background-color: #fff;
                font-size: 10px;
                margin-left: 36pt;
                margin-right: 36pt;
                margin-top: 16pt;
                margin-bottom: 8pt;
            }
            h4 {
                margin-top: 0;
                margin-bottom: 0.5rem;
            }
            p {
                margin-top: 0.5rem;
                margin-bottom: 0.5rem;
            }
            strong {
                font-weight: bolder;
            }
            img {
                vertical-align: middle;
                border-style: none;
            }
            table {
                border-collapse: collapse;
                border-spacing: 0;
            }
            td {
                border-top: none;
                border-bottom: none;
            }
            th {
                text-align: inherit;
            }
            h4, .h4 {
                margin-bottom: 0.5rem;
                font-weight: 500;
                line-height: 1.2;
            }
            h4, .h4 {
                font-size: 1rem;
            }
            .table {
                width: 100%;
                color: #212529;
            }
            .table th,
            .table td {
                padding: 0.25rem;
                vertical-align: center;
                border-collapse: collapse;
                border-spacing: 0;
                line-height: 6pt;
            }
            .table.table-items td {
                border-collapse: collapse;
                border-spacing: 0;
                line-height: 6pt;
            }
            .table thead th {
                vertical-align: center;
                border-collapse: collapse;
                border-spacing: 0;
                line-height: 6pt;
            }
            .mt-5 {
                margin-top: 3rem !important;
            }
            .pr-0,
            .px-0 {
                padding-right: 0 !important;
            }
            .pl-0,
            .px-0 {
                padding-left: 0 !important;
            }
            .text-right {
                text-align: right !important;
            }
            .text-center {
                text-align: center !important;
            }
            .logo {
                padding-top: 0 !important;
                margin-top: 0 !important;
            }
            .text-uppercase {
                text-transform: uppercase !important;
            }
            * {
                font-family: "DejaVu Sans";
            }
            body, h1, h2, h3, h4, h5, h6, table, th, tr, td, p, div {
                line-height: 1.1;
            }
            .party-header {
                font-size: 1.5rem;
                font-weight: 400;
            }
            .total-amount {
                font-size: 10px;
                font-weight: 700;
            }
            .border-0 {
                border: none !important;
            }
            .cool-gray {
                color: #6B7280;
            }
            span {
                content: "\00B1";
            }
            .nominal {
                font-size: 11px;
                font-weight: 700;
                border-width:1px;
                padding: 0.5em;
                margin: 0;
                background-color: #02213e50;
            }
            .body {
                overflow: hidden;
                position: relative;
            }
            .demo-bg {
                opacity: 0.1;
                position: absolute;
            }

            .demo-content {
                position: relative;
            }
        </style>
    </head>

    <body>
        <div width="100%" class="text-center logo">
            <img class="demo-bg center" src="{{ $invoice->getBgKwitansi() }}" alt="bg_kwitansi" width="90%">
        </div>

        <div class="demo-content">
        {{-- Header --}}
            <div class="text-center logo">
                @if($invoice->logo)
                <img class="center" src="{{ $invoice->getLogo() }}" alt="logo" height="30">
                @endif
            </div>

            <p class="text-center" style="font-size: 12px; margin-bottom: -5px;"><strong>Jual Beli Sepeda Motor / Mobil - Cash - Kredit / Tukar Tambah<strong></p>
            <p class="text-center">
            SHOW ROOM: Jl. Basuki Rahmad No. 129 Lamongan (0322) 314810 / 085780938091<br>
            (<span>&#177;</span> 100 meter barat Kantor BRI Lamongan)<br>
            CABANG BABAT: Jl. Bedahan No. 11A Barat Pasar Baru <span>&#177;</span> 100 meter Babat (0322) 456463</p>
 
            <hr width="100%" align="right" noshade>

            <h4 class="text-center"><strong>TELAH DITERIMA OLEH "UD. BINTANG MOTOR"</strong></h4>
            {{-- Table --}}

            
            @foreach($invoice->items as $item)
            @if($item->lunas=="0")
            <p class="nominal"> Uang sebanyak: {{ $invoice->getDPinWords($item->dptunai) }}</p>
            @elseif($item->lunas=="1" || $item->metpembayaran == "Kredit")
            <p class="nominal"> Uang sebanyak: {{ $invoice->getTotalAmountInWords() }}</p>
            @endif
            <table class="table table-items mb-0">
                <tbody>
                    <tr>
                        <td colspan="2" class="text-left pl-0 total-amount">Pembayaran 1 (Satu) Unit {{$item->jenis}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="20%" class="text-left pl-0">Merk/Type</td>
                        <td class="text-left pr-0 total-amount">: {{$item->title}}</td>
                        <td colspan="2" class="text-left pl-0 total-amount">Keterangan Pembayaran Kendaraan</td>
                    </tr>
                    <tr>
                        <td width="20%" class="text-left pl-0">Warna</td>
                        <td class="text-left pr-0 total-amount">
                        : {{$item->warna}}
                        </td>
                        
                        @if($item->metpembayaran=="Tunai")
                        <td width="20%" class="text-left pl-0">Pelunasan</td>
                        @if($item->lunas=="0")
                        <td class="text-left pr-0 total-amount">: Belum Lunas</td>
                        @elseif($item->lunas=="1")
                        <td class="text-left pr-0 total-amount">: Sudah Lunas</td>
                        @endif
                        @elseif($item->metpembayaran=="Kredit")
                            <td width="20%" class="text-left pl-0">Bank Pembayaran</td>
                            <td class="text-left pr-0 total-amount">
                            : {{$item->keterangan}}
                            </td>
                        @endif
                    </tr>
                    <tr>
                        <td width="20%" class="text-left pl-0">Tahun</td>
                        <td class="text-left pr-0 total-amount">
                        : {{$item->tahun}}
                        </td>
                        @if($item->metpembayaran=="Tunai")
                            <td width="20%" class="text-left pl-0">Harga Kendaraan</td>
                            <td class="text-left pr-0 total-amount">
                            : {{$invoice->formatCurrency($invoice->total_amount)}}
                            </td>
                        @endif
                        
                    </tr>
                    <tr>
                        <td width="20%" class="text-left pl-0">No. Pol.</td>
                        <td class="text-left pr-0 total-amount">
                        : {{$item->nopol}}
                        </td>
                        @if($item->metpembayaran=="Tunai")
                        <td width="20%" class="text-left pl-0">Telah Dibayar</td>
                        @if($item->lunas=="0")
                            <td class="text-left pr-0 total-amount">
                            : {{$invoice->formatCurrency(($item->dptunai))}}
                            </td>
                        @elseif($item->lunas=="1")
                            <td class="text-left pr-0 total-amount">
                                : {{$invoice->formatCurrency(($invoice->total_amount))}}
                            </td>
                        @endif
                        @endif
                    </tr>
                    <tr>
                        <td width="20%" class="text-left pl-0">No. Ka.</td>
                        <td class="text-left pr-0 total-amount">
                        : {{$item->noka}}
                        </td>
                        @if($item->metpembayaran=="Tunai")
                        <td width="20%" class="text-left pl-0">Biaya Yang Perlu Dilunasi</td>
                        @if($item->lunas=="0")
                            <td class="text-left pr-0 total-amount">
                            : {{$invoice->formatCurrency(($invoice->total_amount-$item->dptunai))}}
                            </td>
                        @elseif($item->lunas=="1")
                            <td class="text-left pr-0 total-amount">
                            : Rp 0
                            </td>
                        @endif
                        @endif
                    </tr>
                    <tr>
                        <td width="20%" class="text-left pl-0">No. Sin.</td>
                        <td class="text-left pr-0 total-amount">
                        : {{$item->nosin}}
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="20%" class="text-left pl-0">No. BPKBP</td>
                        <td class="text-left pr-0 total-amount">
                        : {{$item->nobpkb}}
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="20%" class="text-left pl-0">Keterangan</td>
                        <td class="text-left pr-0 total-amount">
                        : {{$item->ketlain}}
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table pl-0 ml-0 table-items">
                <tbody>
                    <tr class="mb-0">
                        <td colspan="5" class="pl-0 ml-0">
                            <p class="nominal">
                                @if($item->lunas=="0")
                                {{ trans('invoices::invoice.amount_in_words') }}:  {{ $invoice->formatCurrency($item->dptunai) }}
                                @elseif($item->lunas=="1" || $item->metpembayaran == "Kredit")
                                {{ trans('invoices::invoice.amount_in_words') }}:  {{ $invoice->formatCurrency($invoice->total_amount) }}
                                @endif
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="border-0 pl-0">
                            <p> <strong>Lamongan, {{ $invoice->getDate() }}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td></td>
                        <td></td>
                        <td><strong>UD. BINTANG MOTOR</strong></td>
                        <td class="border-0 pl-0"><strong>Pembeli</strong></td>
                    </tr>
                    <tr><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr>
                        <td>

                        </td>
                        <td></td>
                        <td></td>
                        <td>______________________________</td>
                        <td class="border-0 pl-0">______________________________</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>