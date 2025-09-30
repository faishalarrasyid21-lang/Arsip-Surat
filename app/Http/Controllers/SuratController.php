<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Surat::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nomor_surat', 'like', "%$search%")
                  ->orWhere('perihal', 'like', "%$search%")
                  ->orWhere('pengirim', 'like', "%$search%")
                  ->orWhere('kategori', 'like', "%$search%");
            });
        }

        // Filter by category
        if ($request->has('kategori') && $request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        $surats = $query->orderBy('created_at', 'desc')->paginate(10);
        $categories = Kategori::orderBy('nama_kategori')->pluck('nama_kategori');

        return view('surat.index', compact('surats', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        return view('surat.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string',
            'nomor_surat' => 'required|string|unique:surats',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
            'pengirim' => 'required|string',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,raw,txt,xls,xlsx,ppt,pptx,zip,rar,bmp,gif,tiff,webp|max:10240',
            'nama_anda' => 'nullable|string',
            'nim_anda' => 'nullable|string'
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('surat_files', $filename, 'public');
            $data['file_path'] = $path;
        }

        Surat::create($data);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Surat $surat)
    {
        return view('surat.show', compact('surat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat)
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        return view('surat.edit', compact('surat', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {
        $request->validate([
            'kategori' => 'required|string',
            'nomor_surat' => 'required|string|unique:surats,nomor_surat,' . $surat->id,
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
            'pengirim' => 'required|string',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,raw,txt,xls,xlsx,ppt,pptx,zip,rar,bmp,gif,tiff,webp|max:10240',
            'nama_anda' => 'nullable|string',
            'nim_anda' => 'nullable|string'
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($surat->file_path && Storage::disk('public')->exists($surat->file_path)) {
                Storage::disk('public')->delete($surat->file_path);
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('surat_files', $filename, 'public');
            $data['file_path'] = $path;
        }

        $surat->update($data);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        // Delete file if exists
        if ($surat->file_path && Storage::disk('public')->exists($surat->file_path)) {
            Storage::disk('public')->delete($surat->file_path);
        }

        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus');
    }

    /**
     * Download file
     */
    public function download(Surat $surat)
    {
        if (!$surat->file_path || !Storage::disk('public')->exists($surat->file_path)) {
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }

        return Storage::disk('public')->download($surat->file_path);
    }
}
