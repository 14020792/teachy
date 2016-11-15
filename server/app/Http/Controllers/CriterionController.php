<?php

namespace App\Http\Controllers;

use App\Criterion;
use Illuminate\Http\Request;

use App\Http\Requests;
use Reply;

class CriterionController extends Controller
{
    public function index() {
        $criteria = Criterion::all();
        return Reply::reply(1, 'get_criteria_success', $criteria, 200);
    }
}
