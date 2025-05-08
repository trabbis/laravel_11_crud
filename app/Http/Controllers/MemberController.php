<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class MemberController extends Controller
{
    protected $memberData;

    public function showBasicInfo(): View
    {
        $response = Http::get('https://0dcfac10-1e98-45d3-9fdf-c0d3a5460bb9.mock.pstmn.io/memebership');
        $this->memberData = $response->json();

        return view('member.basic-info', [
            'firstName' => $this->memberData['firstName'] ?? '',
            'lastName' => $this->memberData['lastName'] ?? ''
        ]);
    }

    public function storeBasicInfo(Request $request)
    {
        // $validated = $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'date_of_birth' => 'required|date',
        //     'gender' => 'required|in:male,female,other',
        // ]);

        // Store in session for multi-step form
//        session(['member.basic_info' => $validated]);
//        $request->session()->put('member.basic_info', $validated);


        return redirect()->route('member.contact-info');
    }

    public function showContactInfo(): View
    {
        return view('member.contact-info');
    }

    public function storeContactInfo(Request $request)
    {
        // $validated = $request->validate([
        //     'email' => 'required|email|max:255',
        //     'phone' => 'required|string|max:20',
        //     'address' => 'required|string|max:255',
        //     'city' => 'required|string|max:255',
        //     'postal_code' => 'required|string|max:20',
        // ]);

        // Store in session for multi-step form
//        session(['member.contact_info' => $validated]);

        return redirect()->route('member.additional-info');
    }

    public function showAdditionalInfo(): View
    {
        return view('member.additional-info');
    }

    public function storeAdditionalInfo(Request $request)
    {
        $validated = $request->validate([
            'occupation' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'interests' => 'nullable|array',
            'preferences' => 'nullable|array',
        ]);

        // Store in session for multi-step form
        session(['member.additional_info' => $validated]);

        return redirect()->route('member.review');
    }

    public function showReview(): View
    {
        // Get all stored information from session
        $basicInfo = session('member.basic_info', []);
        $contactInfo = session('member.contact_info', []);
        $additionalInfo = session('member.additional_info', []);

        return view('member.review', compact('basicInfo', 'contactInfo', 'additionalInfo'));
    }

    public function submit(Request $request)
    {
        // Get all stored information from session
        $memberData = array_merge(
            session('member.basic_info', []),
            session('member.contact_info', []),
            session('member.additional_info', [])
        );

        // Here you would typically:
        // 1. Create/update the member record in the database
        // 2. Clear the session data
        // 3. Send confirmation email
        // 4. etc.

        // Clear the session data
        session()->forget(['member.basic_info', 'member.contact_info', 'member.additional_info']);

        return redirect()->route('member.success')->with('success', 'Member information has been successfully updated!');
    }
} 