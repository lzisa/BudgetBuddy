<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(): jsonResponse
    {
        $transaction = Transaction::with(['subcategory', 'user'])->get();
        return response()->json($transaction, 200);
    }

    public function getTransactionsOfUser($user_id): jsonResponse
    {
        $transaction = Transaction::with(['subcategory', 'user'])
            ->where('user_id', $user_id)
            ->get();
        return response()->json($transaction, 200);
    }

    public function save(Request $request): JsonResponse
    {
        $request = $this->parseRequest($request);
        DB::beginTransaction();
        try {
            $transaction = Transaction::create($request->all());
            DB::commit();
            return response()->json($transaction, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json("saving transaction failed: " . $e->getMessage(), 420);
        }
    }

    public function delete(string $id): JsonResponse
    {
        $transaction = Transaction::where('id', $id)->first();
        if ($transaction != null) {
            $transaction->delete();
            return response()->json('transaction (' . $id . ') successfully deleted', 200);
        } else
            return response()->json('transaction could not be deleted - it does not exist', 422);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $transaction = Transaction::where('id', $id)->first();
            if ($transaction != null) {
                $request = $this->parseRequest($request);
                $transaction->update($request->all());
                $transaction->save();
            }

            DB::commit();
            $transaction1 = Transaction::with(['user', 'subcategory'])
                ->where('id', $id)->first();
            // return a vaild http response
            return response()->json($transaction1, 201);
        } catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating book failed: " . $e->getMessage(), 420);
        }
    }

    private function parseRequest(Request $request): Request
    {
        $date = new \DateTime($request->created_at);
        $request['published'] = $date->format('Y-m-d H:i:s');
        return $request;
    }
}
