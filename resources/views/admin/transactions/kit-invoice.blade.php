@extends('layouts.admin')

@section('title', 'Kit Transaction List')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>


<!-- Invoice Area -->
<div class="page-wrapper">
  <div class="content" style="font-family: 'Roboto', sans-serif;">
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="mb-1">Invoice</h3>
        <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kit.transaction') }}">Kit Transaction</a></li>
            <li class="breadcrumb-item active">Invoice</li>
        </ol>
        </nav>
    </div>
    </div>
     <!-- Print Button (outside invoice area so it's excluded during print) -->
    <div class="flex justify-end mb-4">
    <button onclick="downloadInvoice()" class=" hover:bg-green-700 text-white px-4 py-2 rounded shadow btn-primary">
        Download PDF
    </button>
    </div>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow bg-gray-50 font-sans"  id="invoice-area">
    <?php 
     $data = \App\Models\School::find($kitdata->school_id);
    ?>
      <!-- Logo and Header -->
      <div class="flex items-center justify-between mb-6">
        <div class="flex items-center space-x-3">
          <img src="{{ asset('assets/web/images/9t9logopng-min.png') }}" alt="School Logo" class="w-16 h-16 object-contain" />
          <div>
            <h1 class="text-2xl font-bold text-indigo-700">{{$data->school_name ?? ''}}</h1>
            <p class="text-sm text-gray-600">{{$data->address ?? ''}} {{$data->city ?? ''}},{{$data->state?? ''}}{{$data->zip ?? ''}} </p>
            <p class="text-sm text-gray-600">Phone: {{$data->school_phone_1 ?? ''}}</p>
          </div>
        </div>

        @php
            $currentDate = date('dmy');
            $kitId = $kitdata->kit_id ?? '000';
        @endphp

        <div class="text-right text-gray-700">
          <p><span class="font-semibold">Invoice #:</span> INV-{{ $currentDate }}-000{{ $kitId }}</p>
          <p><span class="font-semibold">Date:</span> {{ date('d-m-y') }}</p>
        </div>
      </div>

      <!-- Bill To -->
      <div class="mb-4">
        <h2 class="font-semibold text-gray-700 mb-1">Bill To:</h2>
        <p>{{ $kitdata->name }}</p>
        <p>{{ $kitdata->address }}</p>
        <p>{{ $kitdata->city }}, {{ $kitdata->state }} {{ $kitdata->pincode }}</p>
        <p>Phone: {{ $kitdata->phone }}</p>
      </div>

      <!-- Items Table -->
      <table class="w-full border-collapse border border-gray-300 mb-6">
        <thead class="bg-indigo-100 text-indigo-700">
          <tr>
            <th class="border border-gray-300 px-3 py-2 text-left">Item</th>
            <th class="border border-gray-300 px-3 py-2 text-left">Description</th>
            <th class="border border-gray-300 px-3 py-2 text-right">Unit Price</th>
            <th class="border border-gray-300 px-3 py-2 text-right">Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="border border-gray-300 px-3 py-2">{{ \App\Models\Kit::find($kitdata->kit_id)?->title ?? '' }}</td>
            <td class="border border-gray-300 px-3 py-2">{{ \App\Models\Kit::find($kitdata->kit_id)?->desc ?? '' }}</td>
            <td class="border border-gray-300 px-3 py-2 text-right">₹{{ $kitdata->item_price }}</td>
            <td class="border border-gray-300 px-3 py-2 text-right">₹{{ $kitdata->total }}</td>
          </tr>
        </tbody>
      </table>

      <!-- Totals -->
      <div class="flex justify-end text-gray-700 space-x-8 text-sm font-semibold">
        <div class="w-40">
          <div class="flex justify-between border-b border-gray-300 py-1">
            <span>Subtotal:</span>
            <span>₹{{ $kitdata->total }}</span>
          </div>
          <div class="flex justify-between border-b border-gray-300 py-1">
            <span>Tax (0%):</span>
            <span>₹0.00</span>
          </div>
          <div class="flex justify-between py-2 text-lg text-indigo-700 font-bold">
            <span>Total:</span>
            <span>₹{{ $kitdata->total }}</span>
          </div>
        </div>
      </div>

      <p class="mt-8 text-center text-gray-500 text-xs">
        Thank you for your purchase! Contact us at (123) 456-7890 or info@sunrisehs.edu
      </p>

    </div>
  </div>
</div>

<!-- Print only #invoice-area -->
<script>

  function printInvoice() {
    const printContents = document.getElementById('invoice-area').innerHTML;
    const originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload();
  }

  function downloadInvoice() {
    const element = document.getElementById('invoice-area');
    const opt = {
      margin:       0.5,
      filename:     'invoice.pdf',
      image:        { type: 'jpeg', quality: 0.98 },
      html2canvas:  { scale: 2 },
      jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
    };
    html2pdf().set(opt).from(element).save();
  }
</script>




@endsection