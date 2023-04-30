<?php


namespace App\Services;

use App\Http\Resources\Mobile\UserResource;
use App\Models\User;
use App\Repositories\DefaultModelInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class CommonService
{
    /**
     * @var array
     * */
    protected $requestCapture;
    protected $rules;
    protected $updateRules;
    protected $fields;

    /**
     * @var DefaultModelInterface
     * */
    protected $mainRepository;

    public function __construct(DefaultModelInterface $mainRepository = null, array $request = [])
    {
        $this->mainRepository = $mainRepository;
        $this->requestCapture = $request;
    }

    protected function process(callable $callback)
    {
        $rData = $this->requestCaptureEjector();
        try {
            DB::beginTransaction();
            $model = $callback($rData);
            DB::commit();
            return $model;
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage() . ' ' . $exception->getFile() . ' ' . $exception->getLine());
            throw $exception;
        }
    }

    protected function requestCaptureEjector(): array
    {
        return $this->requestCapture;
    }

    protected function setRequestCapture(array $capture)
    {
        $this->requestCapture = $capture;
    }

    public function ajaxValidate(Request $request, $rules)
    {
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    public function errorResponse(Exception $e)
    {
        if ($e instanceof ValidationException) {
            return response()->json(['status' => 'error', 'message' => 'Məlumatları düzgün daxil edin', 'errors' => $e->validator->errors()], 422);
        }
        return response(['status' => 'error', 'message' => $e->getMessage()], 400);
    }

    public function succesResponse(string $message = 'Məlumat əlavə edildi')
    {
        return response(['status' => 'success', 'message' => $message], 200);
    }
}
