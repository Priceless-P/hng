<?php

namespace App\Http\Controllers;

use App\Models\Https;
use App\Traits\HttpResponse;


class HttpsController extends Controller
{
    use HttpResponse;
  public function index() {
      $data = ['slackUsername', 'backend', 'age', 'bio'];
      $response = Https::where('id', 1)->get($data)->first();
      return response()->json($response);
  }
}
