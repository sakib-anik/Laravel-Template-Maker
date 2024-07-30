<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoucherTemplate;

class VoucherTemplateController extends Controller
{
    public function index()
    {
        $templates = VoucherTemplate::all();
        return view('voucher-templates.index', compact('templates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'css_code' => 'required|string',
            'html_code' => 'required|string',
        ]);

        VoucherTemplate::create([
            'name' => $request->name,
            'css_code' => $request->css_code,
            'html_code' => $request->html_code,
        ]);

        return redirect()->route('voucher-templates.index');
    }

    public function view($id)
    {
        $template = VoucherTemplate::findOrFail($id);
        return view('voucher-templates.view', compact('template'));
    }

    public function edit($id)
    {
        $template = VoucherTemplate::findOrFail($id);
        return view('voucher-templates.edit', compact('template'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'css_code' => 'required|string',
            'html_code' => 'required|string',
        ]);

        $template = VoucherTemplate::findOrFail($id);
        $template->name = $request->input('name');
        $template->css_code = $request->input('css_code');
        $template->html_code = $request->input('html_code');
        $template->save();

        return redirect()->route('voucher-templates.index')->with('success', 'Template updated successfully');
    }

    public function destroy($id)
    {
        $template = VoucherTemplate::findOrFail($id);
        $template->delete();

        return redirect()->route('voucher-templates.index');
    }
}