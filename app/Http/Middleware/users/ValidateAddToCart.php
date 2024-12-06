<?php

namespace App\Http\Middleware\users;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ValidateAddToCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $request->validate([
                "colorId" => ["required"],
                "categoryId" => ["required"],
                "amount" => ["required", "integer"],
                "productId" => ["required", "integer"],
            ]);

            return $next($request);
        } catch (ValidationException $validationErrors) {
            $formattedErrors = [];
            foreach ($validationErrors->errors() as $key => $messages) {
                $formattedErrors["validate.$key"] = $messages;
            }
            return redirect()->back()->withErrors($formattedErrors)->withInput();
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Intern  al Server Error',
                'message' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
