<?php   

namespace  App\Repository\Sections;   
use Illuminate\Http\Request;

use App\Models\Section;
use App\Interfaces\Sections\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface 
{     
    public function index(){
        $sections = Section::paginate(10);
        return view('dashboard.sections.index',compact('sections'));
    }

    public function store( $request)
    {
        $data = $request->validate([
            'name'=> 'required|string|min:2|max:30',
        ]);
        $name = $request->name;
        Section::create($data);
        return redirect()->route('sections.index')->with('add', 'تم أضافة قسم '. $name);
    }



    public function edit($id){
        $section = Section::find($id);

       return view('admin.pages.post.edit', ['section'=>$section ]);
   } 


   public function update( $request)
   {
       $data = $request->validate([
        'name'=> 'required|string|min:2|max:30',
       ]);
       $name = $request->name;
       Section::findOrFail($request->id)->update($data);
       return redirect()->route('sections.index')->with('edit', 'تم تعديل قسم الى '. $name);
    }




    public function destroy( $request)
    {
        // Find the post by its ID
         Section::findOrFail($request->id)->delete();

         // Return a response indicating success
         return redirect()->route('sections.index')->with('delete', 'تم حذف القسم بنجاح ');
        }
}

