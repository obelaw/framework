<?php

namespace Obelaw\Framework\Reporting;

use Obelaw\Framework\Events\Reporting\SendReport;

class ExceptionReport
{
    public function notify($e, $request)
    {
        SendReport::dispatch($e, $request);
    }

    public function render($e, $request)
    {
        if ($e instanceof \Exception) {
            return response()->view('obelaw::errors.exception-blank', [
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
