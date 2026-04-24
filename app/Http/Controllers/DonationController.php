<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class DonationController extends Controller
{
    public function index() {
        return view('donation_form');
    }

    public function notification(Request $request) {
    \Log::info("Notifikasi masuk dari Midtrans!");
    return response()->json(['status' => 'ok']);
}

    public function store(Request $request) {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $donation = Donation::create([
            'order_id' => 'DONASI-' . uniqid(),
            'bencana' => $request->bencana,
            'nama_donatur' => $request->nama_donatur,
            'nominal' => $request->nominal,
        ]);

        $params = [
    'transaction_details' => [
        'order_id' => $donation->order_id,
        'gross_amount' => $donation->nominal,
    ],
    'item_details' => [
        [
            'id' => 'bencana-001',
            'price' => $donation->nominal,
            'quantity' => 1,
            'name' => 'Donasi Peduli ' . $request->bencana, 
        ]
    ],
    'customer_details' => [
        'first_name' => $donation->nama_donatur,
    ],
];

        $snapToken = Snap::getSnapToken($params);
        $donation->update(['snap_token' => $snapToken]);

        return view('checkout', compact('donation', 'snapToken'));
    }
}