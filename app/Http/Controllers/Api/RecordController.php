<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Services\RecordService;
use App\Http\Resources\RecordResource;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    protected $recordService;

    public function __construct(RecordService $recordService)
    {
        $this->recordService = $recordService;
    }

    public function index()
    {
        $records = $this->recordService->getRecordsWithCopies();
        return RecordResource::collection($records);
    }

    public function show($id)
    {
        $record = $this->recordService->getRecordWithCopiesById($id);
        return new RecordResource($record);
    }


    public function store(Request $request)
    {
        $request->validate([
            'copy_ids' => 'required|array|min:1',
            'copy_ids.*' => 'exists:copies,id',
        ]);

        try {
            $result = $this->recordService->createRecordWithCopies($request->except('copy_ids'), $request->copy_ids);

            return (new RecordResource($result['record']))
                ->additional(['successful_copies' => $result['successful_copies'], 'failed_copies' => $result['failed_copies']])
                ->response()
                ->setStatusCode(201);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode() ?? 400);
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'copy_ids' => 'sometimes|required|array|min:1',
            'copy_ids.*' => 'exists:copies,id',
        ]);

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
