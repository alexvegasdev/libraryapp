<?php

namespace App\Models;
namespace App\Services;

use App\Models\Copy;
use App\Models\Record;


class RecordService
{
      public function getRecordsWithCopies()
      {
            return Record::with(['copies.book.author'])->get();
      }

      public function getRecordWithCopiesById($id)
      {
            return Record::with(['copies.book.author'])->findOrFail($id);
      }

      public function createRecordWithCopies($recordData, $copyIds)
      {
            $canBeAssociated = false;
            foreach ($copyIds as $copyId) {
                  $copy = Copy::find($copyId); 
                  if ($copy && $copy->status_id == 1) {
                        $canBeAssociated = true;
                        break;
                  }
            }

            if (!$canBeAssociated) {
                  throw new \Exception('Ninguna de las copias puede ser asociada al registro. Todas están reservadas.', 409);
            }

            $record = Record::create($recordData);
            $successfulCopies = [];
            $failedCopies = [];

            foreach ($copyIds as $copyId) {
                  $copy = Copy::findOrFail($copyId);
                  if ($copy->status_id == 1) {
                        $record->copies()->attach($copyId);
                        $copy->status_id = 2;
                        $copy->save();

                        $pivotInfo = $record->copies()->where('copies.id', $copyId)->first()->pivot;
                        array_push($successfulCopies, $pivotInfo);
                  } else {
                        array_push($failedCopies, ['copy_id' => $copyId, 'message' => 'La copia ya está reservada y no se puede asociar a este registro.']);
                  }
            }

            return ['record' => $record, 'successful_copies' => $successfulCopies, 'failed_copies' => $failedCopies];
      }

      public function updateRecordWithCopies($id, $recordData, $copyIds = null)
      {
            $record = Record::findOrFail($id);-
            $record->update($recordData);

            if (!is_null($copyIds)) {
                  $currentCopyIds = $record->copies()->pluck('copies.id')->toArray();
                  $record->copies()->sync($copyIds);

                  foreach ($copyIds as $copyId) {
                        $copy = Copy::findOrFail($copyId);
                        $copy->status_id = 2;
                        $copy->save();
                  }

                  $copiesToReset = array_diff($currentCopyIds, $copyIds);
                  foreach ($copiesToReset as $copyId) {
                        $copy = Copy::findOrFail($copyId);
                        $copy->status_id = 1; 
                        $copy->save();
                  }
            }

            return $record->load('copies.book.author');
      }

      public function deleteRecordWithCopies($id)
      {
            $record = Record::findOrFail($id);
            $copies = $record->copies;

            foreach ($copies as $copy) {
                  $copy->status_id = 1; 
                  $copy->save();
            }

            $record->copies()->detach(); 
            $record->delete();

            return ['message' => 'Record eliminado con éxito.'];
      }

}