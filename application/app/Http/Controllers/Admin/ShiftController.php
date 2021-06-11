<?php

namespace App\Http\Controllers\Admin;

use App\Shift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ShiftController extends Controller
{
    /**
     * Get Shift
     * @param Nill
     * @return View shifts
     * @author Shani Singh
     */
    public function getShifts()
    {
        $shifts = Shift::get();

        return View::make('admin.shifts.list')->with([
            'shifts' => $shifts
        ]);
    }

    /**
     * Create Shift
     * @param Nill
     * @return View Create Form
     * @author Shani Singh
     */
    public function createShift()
    {
        return View::make('admin.shifts.add');
    }

    /**
     * Store Shift
     * @param Nill
     * @return Response With Success
     * @author Shani Singh
     */
    public function storeShift(Request $request)
    {
        // Validate
        $request->validate([
            'shift_name' => 'required',
            'start_time' => 'required',
            'end_time'   => 'required'
        ]);
        try {
            $create_shift = Shift::create($request->all());
            if($create_shift){
                return redirect()->route('shift.list');
            }

            return redirect()->route('shift.add');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Edit Shift
     * @param Nill
     * @return View Edit Form
     * @author Shani Singh
     */
    public function editShift($shift_id)
    {
        $shift = Shift::findOrFail($shift_id);

        return View::make('admin.shifts.edit')->with(
            [
                'shift' => $shift
            ]
        );
    }

    /**
     * Update Shift
     * @param $shift_id, $request
     * @return Response With Success
     * @author Shani Singh
     */
    public function updateShift(Request $request, $shift_id)
    {
        // Validate
        $request->validate([
            'shift_name' => 'required',
            'start_time' => 'required',
            'end_time'   => 'required'
        ]);
        try {
            $create_shift = Shift::where('id', $shift_id)->update($request->except('_token'));
            if($create_shift){
                return redirect()->route('shift.list');
            }

            return redirect()->route('shift.edit', ['shift_id' => $shift_id]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    /**
     * Delete Shift
     * @param $shift_id, $request
     * @return Response With Success
     * @author Shani Singh
     */
    public function deleteShift($shift_id)
    {
        try {
            $create_shift = Shift::where('id', $shift_id)->delete();
            if($create_shift){
                return redirect()->route('shift.list');
            }

            return redirect()->route('shift.list');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
