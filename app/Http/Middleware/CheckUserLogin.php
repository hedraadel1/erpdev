<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use App\Utils\ModuleUtil;
use App\Utils\BusinessUtil;
use Modules\Superadmin\Entities\ServerSubscriptions;
use Carbon\Carbon;


class CheckUserLogin
{
    protected $moduleUtil; // Define the $moduleUtil property.

    public function __construct(ModuleUtil $moduleUtil)
    {
        $this->moduleUtil = $moduleUtil;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->sleepMiddlewareExecuted) {
            $business_id = request()->session()->get('user.business_id');

            $package = \Modules\Superadmin\Entities\ServerSubscriptions::active_ServerSubscriptions($business_id);

            if (empty($package)) {
                /**
                 * By Hedra Adel, Software Architect and Technical Lead:  
                 */
                Log::info([
                    'message' => 'Date and time: ' . Carbon::now()->format('Y-m-d H:i:s') . ' | Method name: ' . __FUNCTION__ . ' | File path: ' . __FILE__,
                    '|' . __FUNCTION__ . '|' => ' Date For: ', $package
                ]);
            }

            /*     //Check if subscribed or not, then check for users quota
        if (!$this->moduleUtil->isServerSubscribed($business_id)) {
        
        } */

            // run middleware
            $start = microtime(true);
            $sleepSeconds = rand(2, 7);

            sleep($sleepSeconds);



            $end = microtime(true);
            $executionTime = $end - $start;

            Log::info("Sleep middleware executed in {$executionTime} seconds");

            $request->sleepMiddlewareExecuted = true;
        }
        if ($request->user()->user_type != 'user' || $request->user()->allow_login != 1) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
