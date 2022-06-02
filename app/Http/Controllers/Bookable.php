<?php

namespace App\Http\Controllers;

use App\Models\Bookable as ModelsBookable;
use Illuminate\Http\Request;

class Bookable extends Controller
{
    public function index() {
        return ModelsBookable::all();
    }

    public function find($id) {
        return ModelsBookable::findOrFail($id);
    }

}
