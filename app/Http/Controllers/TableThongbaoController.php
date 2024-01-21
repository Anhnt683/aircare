<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\table_thongbao;
use Illuminate\Http\Request;

class TableThongbaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
        {


        }

        public function addThongBao(Request $request){
            try {
                $dataArray = $request->date('data');
                dd($dataArray);
                foreach ($dataArray as $data) {
                    Booking::create([
                        'given_name' => $data['your-name'],
                        'family_name' => $data['famimy-name'],
                        'mobile_number' => $data['tel-123'],
                        'email_address' => $data['your-email'],
                        'home_office' => $data['text-236'],
                        'floor' => $data['floor'],
                        'flat' => $data['flat'],
                        'tower' => $data['tower'],
                        'street' => $data['street'],
                        'road' => $data['road'],
                        'building' => $data['building'],
                        'village' => $data['village'],
                        'district' => $data['District'],
                        'social' => $data['social'],
                        'first_preference' => $data['FirstPreference'],
                        'second' => $data['Second'],
                        'split_type_AC' => $data['menu-849'],
                        'window_AC' => $data['menu-442'],
                        'duct_AC' => $data['menu-903'],
                        'cassette_AC' => $data['menu-864'],
                        'behind_grills' => $data['radio-5'],
                        'meters_above' => $data['radio-851'],
                        'any_stairs' => $data['radio-113'],
                        'any_water' => $data['radio-905'],
                        'any_AC' => $data['radio-169'],
                        'visitor_car' => $data['radio-441'],
                        'exterior_cleaning' => $data['text-69'],
                        'hourly_rate' => $data['text-232'],
                        'hear_about' => $data['menu-619'],
                        'discount_code' => $data['radio-919'],
                        'repeat_customer' => $data['radio-312'],
                        'other_notes' => $data['menu-209'],
                        'cleaning_product' => $data['splittypeac-992'],
                        'email' => $data['email'],
                    ]);
                }
                return response()->json(['message' => $data]);
                // Log success
                \Log::info('Data added successfully: ' . json_encode($data));
            } catch (\Exception $e) {
                // Log error
                \Log::error('Error adding data: ' . $e->getMessage());

                // Rethrow the exception to see the full stack trace in the response
                throw $e;
            }


        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $index = table_thongbao::query()->pluck('noidung');
        $index1 = table_thongbao::query()->pluck('ten');
        return view('index', compact('index','index1'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(table_thongbao $table_thongbao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(table_thongbao $table_thongbao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, table_thongbao $table_thongbao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(table_thongbao $table_thongbao)
    {
        //
    }
}
