<?php
namespace App\Interfaces\Sections;



interface SectionRepositoryInterface
{

    public function index();
    public function store($request);
    
}
