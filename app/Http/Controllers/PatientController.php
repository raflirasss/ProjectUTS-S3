<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index()
	{
        # menggunakan model Patient untuk select data
		$patients = Patient::all();

		if (!empty($patients)) {
			$response = [
				'message' => 'Menampilkan Data Semua Patient',
				'data' => $patients,
			];
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data tidak ada'
			];
			return response()->json($response, 200);
		}
	}

	public function store(Request $request) 
	{

		// $input = [
		// 	'nama' => $request->nama,
		// 	'alamat' => $request->alamat,
        //  'kondisi' => $request->kondisi,
		// ];

		$patient = Patient::create($request->all());

		$response = [
			'message' => 'Data Patient Berhasil Dibuat',
			'data' => $patient,
		];

		return response()->json($response, 201);
	}

public function show($id)
	{
		$patient = Patient::find($id);

		if ($patient) {
			$response = [
				'message' => 'Get detail patient',
				'data' => $patient
			];
	
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];
			
			return response()->json($response, 404);
		}
	}

	public function update(Request $request, $id)
	{
		$patient = Patient::find($id);

		if ($patient) {
			$response = [
				'message' => 'Patient is updated',
				'data' => $patient->update($request->all())
			];
	
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
	}

	public function destroy($id)
	{
		$patient = Patient::find($id);

		if ($patient) {
			$response = [
				'message' => 'Patient is delete',
				'data' => $patient->delete()
			];

			return response()->json($response, 200); 
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
	}
}