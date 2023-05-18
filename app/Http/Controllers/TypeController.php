<?php
    namespace App\Http\Controllers;

    use App\Models\Type;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;
    use App\Http\Resources\TypeDetailResource;
    use Illuminate\Http\Request;

    class TypeController extends Controller
    {
        public function index()
        {
            $types = Type::All();
            return TypeDetailResource::collection($types->loadMissing('dealers:id,username'));
        }

        public function show($id)
        {
            $types = Type::with('dealers:id,username')->findOrFail($id);
            return new TypeDetailResource($types);
        }

        // For EagerLoading {Buat melihat lebih detailnya lagi dalam datanya}
        public function show2($id)
        {
            $types = Type::findOrFail($id);
            return new TypeDetailResource($types);
        }

        public function store(Request $request)
        {

            $validated = $request->validate([
                'name_clothes' => 'required|max:255',
                'type_clothes' => 'required|max:255',
                'price' => 'required|max:100'
            ]); 
                    $image = null;
                    if ($request->file){
                    $fileName = $this->generateRandomString();

                    $extension = $request->file->extension();

                    $image = $fileName.'.'.$extension;

                    Storage::putFileAs('file', $request->file, $image);
                }

                $request['image'] = $image;

                $request['seller'] = Auth::user()->id;

                $types = Type::create($request->all());
                return new TypeDetailResource($types->loadMissing('dealers:id,username'));
            }

        public function update(Request $request, $id)
        {

            $validated = $request->validate([
                'name_clothes' => 'required|max:255',
                'type_clothes' => 'required|max:255',
                'price' => 'required|max:100'

            ]);

            $type = Type::findOrFail($id);
            $type->update($request->all());

            return new TypeDetailResource($type->loadMissing('dealers:id,username'));
        }

        public function destroy($id)
        {
            $types = Type::findOrFail($id);
            $types->delete();

            return new TypeDetailResource($types->loadMissing('dealers:id,username'));
        }

   
        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
            return $randomString;
        }


        

    }
