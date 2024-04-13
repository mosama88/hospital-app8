<?php   

namespace  App\Repository\Sections;   
use Illuminate\Http\Request;

use App\Models\Section;
use App\Interfaces\Sections\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface 
{     
    public function index(){
        $sections = Section::get();
        return view('dashboard.sections.index',compact('sections'));
    }

    public function store( $request)
    {
        $data = $request->validate([
            'name'=> 'required|string|min:2|max:30',
        ]);
        $name = $request->name;
        Section::create($data);
        return redirect()->route('sections.index')->with('success', 'تم أضافة قسم '. $name);
    }
}

