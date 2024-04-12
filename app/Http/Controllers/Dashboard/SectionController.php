<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Sections\SectionRepositoryInterface;

class SectionController extends Controller
{
 

    private $sections;
  
    public function __construct(SectionRepositoryInterface $sections)
    {
        $this->sections = $sections;
    }


    public function index()
    {
       return $this->sections->index();
    }

  
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

  
    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }

  
    public function update(Request $request, string $id)
    {
        //
    }

 
    public function destroy(string $id)
    {
        //
    }
}
