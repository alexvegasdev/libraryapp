<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Services\RecordService;
use App\Http\Resources\RecordResource;
use App\Http\Requests\Record\RecordStoreRequest;
use App\Http\Requests\Record\RecordUpdateRequest;
use App\Http\Resources\RecordCollection;

class RecordController extends Controller
{

    public function __construct(private RecordService $recordService)
    {
        $this->recordService = $recordService;
        $this->middleware('can:records.index')->only('index');
        $this->middleware('can:records.show')->only('show');
        $this->middleware('can:records.store')->only('store');
        $this->middleware('can:records.update')->only('update');
        $this->middleware('can:records.destroy')->only('destroy');
    }

    public function index()
    {
        $records = $this->recordService->getRecordsWithCopies();
        return new RecordCollection($records);
    }

    public function show($id)
    {
        $record = $this->recordService->getRecordWithCopiesById($id);
        return new RecordResource($record);
    }

    public function store(RecordStoreRequest $request)
    {
        try {
            $result = $this->recordService->createRecordWithCopies($request->except('copy_ids'), $request->copy_ids);

            return (new RecordResource($result['record']))
                ->additional(['successful_copies' => $result['successful_copies'], 'failed_copies' => $result['failed_copies']])
                ->response()
                ->setStatusCode(201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function update(RecordUpdateRequest $request, $id)
    {
        $recordData = $request->except('copy_ids');

        try {
            $copyIds = $request->has('copy_ids') ? $request->copy_ids : null;
            $record = $this->recordService->updateRecordWithCopies($id, $recordData, $copyIds);

            return new RecordResource($record);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }


    public function destroy($id)
    {
        try {
            $this->recordService->deleteRecordWithCopies($id);
            return response()->json(['message' => 'Record eliminado con éxito.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
