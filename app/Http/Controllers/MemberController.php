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
        if (!session()->has('memberData')) {
            $response = Http::get('https://0dcfac10-1e98-45d3-9fdf-c0d3a5460bb9.mock.pstmn.io/memebership');
            session(['memberData' => $response->json()]);
        }

        $this->memberData = session('memberData');

        return view('member.basic-info', [
            'firstName' => $this->memberData['firstName'] ?? '',
            'lastName' => $this->memberData['lastName'] ?? '',
            'address' => $this->memberData['address'] ?? '',
        ]);
    }

    public function storeBasicInfo(Request $request)
    {
        $validated = $request->validate([
            // 'first_name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            // 'date_of_birth' => 'required|date',
            // 'gender' => 'required|in:male,female,other',
            'correct' => 'required|in:yes,no',
        ]);

        if ($validated['correct'] === 'no') {
            return redirect()->back()
                ->withErrors(['correct' => 'Because your address or name needs updating, you will have to visit a library branch in person to renew your card.'])
                ->withInput();
        }

        // Store in session for multi-step form
        $request->session()->put('member.basic_info', $validated);

        return redirect()->route('member.contact-info');
    }

    public function showContactInfo(): View
    {
        $this->memberData = session('memberData');

        return view('member.contact-info', [
            'address' => $this->memberData['address'] ?? '',
        ]);
    }

    public function storeContactInfo(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $this->memberData = session('memberData');
        $originalEmail = $this->memberData['address']['email'] ?? '';

        // Store in session for multi-step form
        $request->session()->put('member.contact_info', $validated);

        // Check if email has been changed
        if ($validated['email'] !== $originalEmail) {
            return redirect()->route('member.additional-info')
                ->with('email_changed', 'Please check your email for confirmation.');
        }

        return redirect()->route('member.additional-info');
    }

    public function showAdditionalInfo(): View
    {
        $this->memberData = session('memberData');

        return view('member.additional-info', [
            'address' => $this->memberData['address'] ?? '',
            'personalInfo' => $this->memberData['personalInfo'] ?? '',
        ]);
    }

    public function storeAdditionalInfo(Request $request)
    {
        //TODO phone number validation
        $validated = $request->validate([
            'phone' => 'required|max:255',
            'gender' => 'required|in:male,female,DNIDENTIFY,preferNotToSay',
        ]);

        // Store in session for multi-step form
        session(['member.additional_info' => $validated]);

        //TODO for now go to the first page
        return redirect()->route('member.basic-info');
//        return redirect()->route('member.review');
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