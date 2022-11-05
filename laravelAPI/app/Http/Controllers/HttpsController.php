<?php

namespace App\Http\Controllers;

use App\Enums\OperationType;
use App\Models\Https;
use App\Models\Compute;
use App\Traits\EnumValueMangager;
use function dd;
use function in_array;
use function str_contains;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;



class HttpsController extends Controller
{
    use HttpResponse;

    public function index()
    {
        $data = ['slackUsername', 'backend', 'age', 'bio'];
        $response = Https::where('id', 1)->get($data)->first();
        return response()->json($response);
    }

    public function compute(Request $request)
    {
        $possible_addition_words = ["Add", "add", "Adding", "adding", "sum", "Sum", "Addition", "addition"];
        $possible_subtraction_words = ['minus', 'Minus', 'subtracting', 'Subtracting', 'subtract',
            'Subtract', 'subtraction', 'Subtraction', 'Difference', 'difference'];
        $possible_multiplication_words = ['multiply', 'Multiply','multiplying', 'Multiplying', 'Multiplication',
            'multiplication', 'product', 'Product'];

        $find_Operator = $request->input('operation_type');

        foreach ($possible_addition_words as $addition_word) {
            if (str_contains($find_Operator, $addition_word)) {
                $x = $request->input('x');
                $y = $request->input('y');
                (integer)$result = $x + $y;

                Compute::create([
                    "slackUsername" => "Priceless-Prisca",
                    "result" => $result,
                    "operation_type" => OperationType::Addition->value
                ]);

                $data = ['slackUsername', 'result', 'operation_type'];
                $response = Compute::orderBy('created_at', 'desc')->get($data)->first();
                return response()->json($response);
            }
        }

        foreach ($possible_subtraction_words as $subtraction_word) {
            if (str_contains($find_Operator, $subtraction_word)) {
                $x = $request->input('x');
                $y = $request->input('y');
                (integer)$result = $x - $y;

                Compute::create([
                    "slackUsername" => "Priceless-Prisca",
                    "result" => $result,
                    "operation_type" => OperationType::Subtraction->value
                ]);

                $data = ['slackUsername', 'result', 'operation_type'];
                $response = Compute::orderBy('created_at', 'desc')->get($data)->first();
                return response()->json($response);
            }
        }

        foreach ($possible_multiplication_words as $multiplication_word) {
            if (str_contains($find_Operator, $multiplication_word)) {
                $x = $request->input('x');
                $y = $request->input('y');
                (integer)$result = $x * $y;

                Compute::create([
                    "slackUsername" => "Priceless-Prisca",
                    "result" => $result,
                    "operation_type" => OperationType::Addition->value
                ]);

                $data = ['slackUsername', 'result', 'operation_type'];
                $response = Compute::orderBy('created_at', 'desc')->get($data)->first();
                return response()->json($response);
            }
        }
        if ($find_Operator != $addition_word && $find_Operator != $subtraction_word && $find_Operator != $multiplication_word)
        {
            return "Keyword not found. Please rephrase your sentence and try again";
        }
    }
}
