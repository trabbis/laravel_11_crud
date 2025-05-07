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
            $response = Http::get('https://0dcfac10-1e98-45d3-9fdf-c0d3a5460bb9.mock.pstmn.io/branches');
            
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