<?php

namespace App\Http\Controllers\Admin\GeneralRapport;

use Carbon\Carbon;
use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Models\AnnualRapport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GeneralRapportController extends Controller
{
    //
    public function index($id)
    {
        // Retrieve the apartment
        $apartment = Apartment::findOrFail($id);

        // Retrieve the "Rapport de Gestion" records for the apartment
        $rapports = $apartment->AnnualRapportDeGestions;

        return view('admin.general-rapport.index', compact('rapports', 'apartment'));
        
    }

    public function create()
    {
        if (session()->has('new_apt_id')) {
            $apartment = Apartment::findOrFail(session('new_apt_id'));
            return view('admin.general-rapport.create', compact('apartment'));
        }
    
        return redirect()->route('admin.apartments.index');
    }

    public function store(Request $request, $id)
    {
        // Retrieve the apartment
        $apartment = Apartment::findOrFail($id);
        $property_id = $apartment->property->id;
    
        // Validate the uploaded PDF document
        $request->validate([
            'pdf_document' => 'required|mimes:pdf',
        ]);
    
        // Handle the PDF document
        if ($request->hasFile('pdf_document')) {
            $pdfDocument = $request->file('pdf_document');
            
            // Get the original filename
            $originalFilename = $pdfDocument->getClientOriginalName();
            
            // Generate a unique string
            $uniqueString = uniqid();
            
            // Extract the file extension
            $extension = $pdfDocument->getClientOriginalExtension();
            
            // Remove spaces and special characters from the original filename
            $originalFilename = preg_replace('/[^A-Za-z0-9\-_.]/', '', $originalFilename);
            
            // Combine the original filename, unique string, and file extension
            $filename = $originalFilename . '_' . $uniqueString . '.' . $extension;
    
            // Store the PDF document
            $pdfDocument->storeAs('Rapport', $filename, 'public');
    
            // Save the PDF document information to the database
            $rapport = new AnnualRapport();
            $rapport->rapport = $filename;
            $rapport->path = 'pdf_documents/' . $filename;
    
            // Assign the apartment ID
            $rapport->apartment_id = $id;
            $rapport->property_id = $property_id;
    
            $rapport->save();
    
            // Return a response or redirect as needed
            return redirect()->route('admin.generalrapportIndex', ['id' => $apartment->id])->with('success', 'Le document PDF a été téléchargé avec succès.');
        }
    }

    public function edit($id)
    {
        $rapport = AnnualRapport::findOrFail($id);
        $apartment = $rapport->apartment;

        return view('admin.general-rapport.edit', compact('rapport', 'apartment'));
    }


    public function destroy($id)
    {
        $rapport = AnnualRapport::findOrFail($id);
        
        // Delete the file from storage
        Storage::disk('public')->delete('Rapport/' . $rapport->rapport);
        
        // Delete the record from the database
        $rapport->delete();
        
        return redirect()->route('admin.generalrapportIndex', ['id' => $rapport->apartment_id])->with('success', 'Le document PDF a été supprimé avec succès.');
    }

}