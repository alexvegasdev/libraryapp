<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Loan;

class LoanService
{
      /**
       * Retrieve all loans with their associated copies.
       *
       * @return \Illuminate\Database\Eloquent\Collection Returns a collection of Loan models with related copies.
       */
      public function getLoansWithCopies()
      {
            return Loan::with('copies')->get();
      }

      /**
       * Get a specific loan's details with associated copies.
       *
       * @param Loan $loan The loan model instance.
       * @return Loan Returns the loan model loaded with related copies.
       */
      public function getLoanWithCopies(Loan $loan)
      {
            return $loan->load('copies');
      }

      /**
       * Create a new loan and associate copies to it.
       *
       * @param array $loanData Data for creating the loan.
       * @param array $copyIds IDs of copies to associate with the loan.
       * @return Loan Returns the newly created loan model with copies relations established.
       */
      public function createLoanWithCopies(array $loanData, array $copyIds)
      {
            $loan = Loan::create($loanData);
            $loan->copies()->sync($copyIds);
            return $loan;
      }

      /**
       * Update a loan's details and optionally its associated copies.
       *
       * @param Loan $loan The loan model instance.
       * @param array $loanData Updated data for the loan.
       * @param array|null $copyIds Optional array of copy IDs to associate with the loan.
       * @return Loan Returns the updated loan model loaded with current copies.
       */
      public function updateLoanWithCopies(Loan $loan, array $loanData, array $copyIds = null)
      {
            $loan->update($loanData);
            if ($copyIds !== null) {
                  $loan->copies()->sync($copyIds);
            }
            return $loan->load(['copies']);
      }

      /**
       * Delete a loan and detach its associated copies.
       *
       * @param Loan $loan The loan model to delete.
       */
      public function deleteLoanWithCopies(Loan $loan)
      {
            $loan->copies()->detach();
            $loan->delete();
      }
}
