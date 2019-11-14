<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        // Retrieving Tenant Details
        return view('invoices.create');
    }}
