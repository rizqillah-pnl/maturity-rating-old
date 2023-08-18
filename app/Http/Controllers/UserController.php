<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Akses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Cviebrock\EloquentSluggable\Services\SlugService;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->tahun)) {
            $request->session()->put('tahun', $request->tahun);
        } else if (!$request->session()->has('tahun')) {
            $request->session()->put('tahun', date('Y'));
        }

        return view('dashboard.admin.users', ['title' => 'Users']);
    }

    public function getUser(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with(['akses']);
            if ($request->filter) {
                $data = $data->where('akses_id', $request->filter);
            }
            if ($request->deleted_data == 'checked') {
                $data = $data->onlyTrashed();
            } else {
                $data = $data->withTrashed();
            }

            $akses = Akses::get();

            $data = Datatables::of($data);
            return $data
                ->editColumn('id', function ($model) {
                    return 'USR' . sprintf('%04d', $model->id);
                })
                ->editColumn('username', function ($model) {
                    return '@' . $model->username;
                })
                ->editColumn('akses.slug_akses', function ($model) {
                    return (in_array($model->akses->slug_akses, ['p3m', 'p4m', 'spi', 'tik', 'ulp', 'p2t', 'htk']) ? strtoupper($model->akses->slug_akses) : ucwords(str_replace('-', ' ', $model->akses->slug_akses)));
                })
                ->editColumn('akses.tipe', function ($model) {
                    return (in_array($model->akses->tipe, ['spi', 'upt']) ? strtoupper($model->akses->tipe) : ucwords($model->akses->tipe));
                })
                ->editColumn('created_at', function ($model) {
                    // return $model->created_at->diffForHumans();
                    return date('d-m-Y', strtotime($model->created_at));
                })
                ->editColumn('image', function ($model) {
                    if (isset($model->image)) {
                        return "<img src=" . url('storage/' .  $model->image) . " width='50' height='50'/>";
                    } else {
                        return "<img src=" . url('img/profil/default.png') . " width='50' height='50'/>";
                    }
                })
                ->editColumn('deleted_at', function ($model) {
                    if (!isset($model->deleted_at)) {
                        return '<span class="badge bg-success">Active</span>';
                    } else {
                        return '<span class="badge bg-danger">Deleted</span>';
                    }
                })
                ->setRowId(function ($model) {
                    return $model->id;
                })
                ->addColumn('action', function ($model) use ($akses) {
                    return view('dashboard.admin.utils.action', ['model' => $model, 'akses' => $akses]);
                })
                ->addIndexColumn()
                ->rawColumns(['deleted_at', 'action', 'image'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => ['required', 'min:5', 'max:50'],
            'akses_id' => ['required'],
            'contact_person' => ['required', 'min:10', 'max:16'],
            'image' => ['image', 'file', 'max:5024']
        ]);

        if ($request->file('image')) {
            $imageName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
            $imageName = str_replace(' ', '', $imageName);
            $extFile = $request->file('image')->getClientOriginalExtension();
            $imageName .= now()->timestamp . '.' . $extFile;
            $imageName = $request->file('image')->storeAs($request->path(), str_replace('-', '_', $imageName));
            $validatedData['image'] = $imageName;
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect()->back()->with('success', 'Berhasil Menambahkan User Baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = User::withTrashed()->where('id', $id)->get()[0];
        $rules = [
            'nama' => 'required|min:3|max:255',
            'akses_id' => 'required',
            'contact_person' => 'required|min:9|max:16',
        ];

        $imageName = null;
        if ($request->file('image')) {
            $rules['image'] = 'image|file|max:5024';
            $imageName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
            $imageName = str_replace(' ', '', $imageName);
            $extFile = $request->file('image')->getClientOriginalExtension();
            $imageName .= now()->timestamp . '.' . $extFile;
            $imageName = $request->file('image')->storeAs($request->path(), str_replace('-', '_', $imageName));

            Storage::delete($data->image);
        }

        if ($request->username !== $data->username) {
            $rules['username'] = 'required|min:3|max:255|unique:users';
        }

        $password = $data->password;
        if ($request->password) {
            $rules['password'] = 'required|min:5|max:50';
            $password = Hash::make($request->password);
        }

        $validatedData = $request->validate($rules);
        $validatedData['password'] = $password;
        if ($imageName != null) {
            $validatedData['image'] = $imageName;
        }

        User::withTrashed()->where('id', $data->id)->update($validatedData);
        return redirect()->back()->with('success', 'Berhasil Mengedit Data User!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = User::where('id', $id)->get()[0];
        Storage::delete($id->image);
        User::destroy($id->id);
        return redirect()->back()->with('success', 'Berhasil Menghapus Data!');
    }

    public function aktivasi($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->get()[0];
        if ($user->deleted_at) {
            User::withTrashed()->where('id', $id)->restore();
            return redirect()->back()->with('success', 'Berhasil Mengaktifasi User!');
        }
        return redirect()->back()->with('error', 'Data Tidak Ditemukan!');
    }

    public function checkUsername(Request $request)
    {
        $username = SlugService::createSlug(User::class, 'username', $request->nama);
        return response()->json(['username' => str_replace('-', '_', $username)]);
    }

    public function availableUsername($username)
    {
        $data = User::withTrashed()->where('username', $username)->exists();
        if (!$data) {
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
    public function availableNip($nip)
    {
        $data = User::withTrashed()->where('nip', $nip)->exists();
        if (!$data) {
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
