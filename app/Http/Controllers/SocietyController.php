<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Society;
use App\Models\Admin_log;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SocietyImport;
use \Exception;

class SocietyController extends Controller
{
    public function index(Request $request)
    {
        try {
            //$society = Society::all();
            $society = Society::where(function ($query) use ($request) {
                if ($request->search) {
                    $query->where('society_name', 'LIKE', '%' . $request->search . '%');
                }
            })->paginate(5);
            return view('societies.index', compact('society'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
    public function create()
    {
        try {
            return view('societies.create');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            $user = auth()->user();

            $storeData = $request->validate([
                'society_name' => 'required|max:255',

            ]);
            $society = Society::create($storeData);
            Admin_log::create([
                'user_id' => $user->id, 'type_id' => 2, 'action_type_id' => 1,
                'request_id' => $society->id, 'message' => 'Society Added.'
            ]);
            return redirect()->route('societies.index')->with('success', 'Society has been Added!');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function show(Society $society)
    {
        try {
            return view('societies.show', compact('society'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $society = Society::findOrFail($id);
            return view('societies.edit', compact('society'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = auth()->user();

            $updateData = $request->validate([
                'society_name' => 'required|max:255',
            ]);

            $old_data = Society::where('id', $id)->first();
            Society::whereId($id)->update($updateData);
            Admin_log::create([
                'user_id' => $user->id, 'type_id' => 2, 'action_type_id' => 2,
                'request_id' => $id, 'message' => 'Society Updated.', 'edit_old_data' => json_encode($old_data),
                'edit_new_data' => json_encode($updateData)
            ]);
            return redirect()->route('societies.index')->with('success', 'Society has been updated');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $user = auth()->user();

            $society = Society::where('id', $id);
            $society->delete();
            Admin_log::create([
                'user_id' => $user->id, 'type_id' => 2, 'action_type_id' => 3,
                'request_id' => $id, 'message' => 'Society Deleted.'
            ]);
            return redirect()->route('societies.index')->with('success', 'Society has been deleted');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function fileImportExport()
    {
        try {
            return view('societies.file_import');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function fileImport(Request $request)
    {
        try {
            Excel::import(new SocietyImport, $request->file('file')->store('temp'));
            return redirect()->route('societies.index')->with('success', 'Import Successfully!.');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
}
