<?php

namespace App\Http\Controllers\admin\Rapport;

use Carbon\Carbon;
use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Models\RapportDeGestion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RapportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // Retrieve the apartment
        $apartment = Apartment::findOrFail($id);

        // Retrieve the "Rapport de Gestion" records for the apartment
        $rapports = $apartment->rapportDeGestions;

        return view('admin.rapports.index', compact('rapports', 'apartment'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session()->has('new_apt_id')) {
            $apartment = Apartment::findOrFail(session('new_apt_id'));
            return view('admin.rapports.create', compact('apartment'));
        }
    
        return redirect()->route('admin.apartments.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // Retrieve the apartment
        $apartment = Apartment::findOrFail($id);
    
        // Check if a report has been uploaded for the apartment within the last week
        $lastWeek = now()->subWeek();
        $existingReport = RapportDeGestion::where('apartment_id', $id)
            ->where('created_at', '>', $lastWeek)
            ->exists();
    
        if ($existingReport) {
            return redirect()->route('admin.rapportIndex', ['id' => $id])
                ->with('error', 'Un seul téléchargement de document autorisé par semaine.');
        }
    
        // Validate the uploaded PDF document
        $request->validate([
            'pdf_document' => 'required|mimes:pdf',
        ]);
    
        // Handle the PDF document
        if ($request->hasFile('pdf_document')) {
            $pdfDocument = $request->file('pdf_document');
    
            // Generate a unique string
            $uniqueString = uniqid();
    
            // Get the original filename
            $originalFilename = $pdfDocument->getClientOriginalName();
    
            // Extract the file extension
            $extension = $pdfDocument->getClientOriginalExtension();
    
            // Remove spaces and special characters from the original filename
            $originalFilename = preg_replace('/[^A-Za-z0-9\-_.]/', '', $originalFilename);
    
            // Combine the original filename, unique string, and file extension
            $filename = $originalFilename . '_' . $uniqueString . '.' . $extension;
    
            // Store the PDF document
            $pdfDocument->storeAs('Rapport', $filename, 'public');
    
            // Save the PDF document information to the database
            $rapport = new RapportDeGestion();
            $rapport->rapport = $filename;
            $rapport->path = 'pdf_documents/' . $filename;
    
            // Assign the apartment ID and admin user ID
            $rapport->apartment_id = $id;
            $rapport->property_id = $apartment->property_id;
    
            $rapport->save();
    
            // Return a response or redirect as needed
            return redirect()->route('admin.rapportIndex', ['id' => $id])
                ->with('success', 'Le document PDF a été téléchargé avec succès.');
        }
    
        // Redirect to the index page of the apartment if no document was uploaded
        return redirect()->route('admin.rapportIndex', ['id' => $id])
            ->with('error', 'Veuillez sélectionner un document PDF à télécharger.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        $rapport = RapportDeGestion::findOrFail($id);
        $apartment = $rapport->apartment;

        return view('admin.rapports.edit', compact('rapport', 'apartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rapport = RapportDeGestion::findOrFail($id);
    
        // Validate the updated PDF document if provided
        if ($request->hasFile('pdf_document')) {
            $request->validate([
                'pdf_document' => 'required|mimes:pdf',
            ]);
    
            // Handle the updated PDF document
            $pdfDocument = $request->file('pdf_document');
            $uniqueString = uniqid();
    
            // Get the original filename without the extension
            $originalFilename = pathinfo($pdfDocument->getClientOriginalName(), PATHINFO_FILENAME);
    
            // Extract the file extension
            $extension = $pdfDocument->getClientOriginalExtension();
    
            // Remove spaces and special characters from the original filename
            $originalFilename = preg_replace('/[^A-Za-z0-9\-_.]/', '', $originalFilename);
    
            // Combine the original filename, unique string, and file extension
            $filename = $originalFilename . '_' . $uniqueString . '.' . $extension;
    
            // Delete the previous PDF document if it exists
            if ($rapport->rapport && Storage::disk('public')->exists('Rapport/' . $rapport->rapport)) {
                Storage::disk('public')->delete('Rapport/' . $rapport->rapport);
            }
    
            // Store the updated PDF document
            $pdfDocument->storeAs('Rapport', $filename, 'public');
    
            // Update the PDF document information in the database
            $rapport->rapport = $filename;
            $rapport->path = 'pdf_documents/' . $filename;
        }
    
        // Save any other updates to the RapportDeGestion model
        // ...
    
        $rapport->save();
    
        return redirect()->route('admin.rapportIndex', ['id' => $rapport->apartment->id])->with('success', 'Le document PDF a été mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $rapport = RapportDeGestion::findOrFail($id);
    
        // Delete the PDF document from storage
        $filePath = public_path('storage/Rapport/' . $rapport->rapport);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
    
        // Delete the RapportDeGestion record from the database
        $rapport->delete();
    
        return redirect()->back()->with('success', 'Le document PDF a été Supprimé avec succès.');
    }
}
