<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Update;
use Illuminate\Http\Request;

class EditController extends Controller
{
    function show($id)
    {
        $checkout = Checkout::find($id);
        $stats = Update::all();

        return view('edit', [
            'checkouts' => $checkout,
            'statses' => $stats
        ]);
    }

    function update(Request $req)
    {
        $update = Checkout::find($req->id);

        $update->current_status = $req->current_status;
        $update->current_location = $req->current_location;
        $update->save();
        return redirect('status');
    }
}
