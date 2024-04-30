<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Loan\LoanStoreRequest;
use App\Http\Requests\Loan\LoanUpdateRequest;
use App\Http\Resources\LoanCollection;
use App\Http\Resources\LoanResource;
use App\Models\Loan;
use App\Services\LoanService;

class LoanController extends Controller
{
    /**
     * LoanController constructor.
     *
     * @param LoanService $loanService
     */
    public function __construct(private LoanService $loanService)
    {
        $this->loanService = $loanService;
        $this->middleware('can:loans.index')->only('index');
        $this->middleware('can:loans.show')->only('show');
        $this->middleware('can:loans.store')->only('store');
        $this->middleware('can:loans.update')->only('update');
        $this->middleware('can:loans.destroy')->only('destroy');
    }

    /**
     * Display a listing of loans.
     *
     * @return LoanCollection Returns a collection of loans with associated copies.
     */
    public function index()
    {
        $loans = $this->loanService->getLoansWithCopies();
        return new LoanCollection($loans);
    }

    /**
     * Display the specified loan with its associated copies.
     *
     * @param Loan $loan The loan model instance.
     * @return LoanResource Returns a resource with loan details and copies.
     */
    public function show(Loan $loan)
    {
        $loan = $this->loanService->getLoanWithCopies($loan);
        return new LoanResource($loan);
    }

    /**
     * Store a newly created loan in the database.
     *
     * @param LoanStoreRequest $request The request containing the data needed to create the loan.
     * @return LoanResource Returns the newly created loan resource.
     */
    public function store(LoanStoreRequest $request)
    {
        $loan = $this->loanService->createLoanWithCopies($request->validated(), $request->copy_ids);
        return new LoanResource($loan);
    }

    /**
     * Update the specified loan in the database.
     *
     * @param LoanUpdateRequest $request The request containing update data.
     * @param Loan $loan The loan model to update.
     * @return LoanResource Returns a resource with the updated loan details.
     */
    public function update(LoanUpdateRequest $request, Loan $loan)
    {
        $loanData = $request->validated();
        $copyIds = $request->input('copy_ids', null);

        $updatedLoan = $this->loanService->updateLoanWithCopies($loan, $loanData, $copyIds);
        return new LoanResource($updatedLoan);
    }

    /**
     * Remove the specified loan from storage.
     *
     * @param Loan $loan The loan model to delete.
     * @return \Illuminate\Http\JsonResponse Returns a JSON response indicating success.
     */
    public function destroy(Loan $loan)
    {
        $this->loanService->deleteLoanWithCopies($loan);
        return response()->json(['success' => 'Deleted loan.'], 200);
    }
}

