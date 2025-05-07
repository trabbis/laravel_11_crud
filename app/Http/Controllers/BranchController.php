<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class BranchController extends Controller
{
    public function index(): View
    {
        try {
            $response = Http::get('https://1644dbbb-3aaa-4c5c-bb98-642b4880ffe6.mock.pstmn.io/users');
            
            if ($response->successful()) {
                $branches = $response->json();
            } else {
                // Fallback to empty array if the request fails
                $branches = [];
            }
        } catch (\Exception $e) {
            // Log the error and fallback to empty array
            \Log::error('Failed to fetch branches: ' . $e->getMessage());
            $branches = [];
        }

        return view('branches.index', compact('branches'));
    }
} 