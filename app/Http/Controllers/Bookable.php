<?php

namespace App\Http\Controllers;

use App\Models\Bookable as ModelsBookable;
use Illuminate\Http\Request;

class Bookable extends Controller
{
    public function index() {
        return ModelsBookable::all();
    }

    public function show($id) {
        return ModelsBookable::findOrFail($id);
    }

}
