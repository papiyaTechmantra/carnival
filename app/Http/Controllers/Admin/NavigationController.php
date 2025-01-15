<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\NavigationRepositoryInterface;
use App\Models\Navigation;

class NavigationController extends Controller
{
    private $navigationRepository;

    public function __construct(NavigationRepositoryInterface $navigationRepository)
    {
        $this->navigationRepository = $navigationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = $request->keyword ?? '';
        $query = Navigation::query();
        // Apply search filter based on the keyword (search in title or desc)
        $query->when($keyword, function($query) use ($keyword) {
            $query->where('title', 'like', '%'.$keyword.'%');
        });
        // Paginate results
        $navigations = $query->latest('id')->paginate(25);
    
        return view('admin.navigation.index', compact('navigations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.navigation.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:navigations,title',
        ]);
        

        $this->navigationRepository->create($request->all());
        return redirect()->route('admin.navigation.list.all')->with('success', 'Navigation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $navigation = $this->navigationRepository->findById($id);
        return view('admin.navigation.show', compact('navigation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->navigationRepository->findById($id);
        return view('admin.navigation.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:navigations,title,' . $id,

        ]);
    
        $this->navigationRepository->update($id, $request->all());
        return redirect()->route('admin.navigation.list.all')->with('success', 'Navigation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->navigationRepository->delete($id);
        return redirect()->route('admin.navigation.list.all')->with('success', 'Navigation deleted successfully.');
    }

    public function BlogStatus(Request $request, $id)
    {
        $data = $this->navigationRepository->findById($id);
        $data->status = ($data->status == 1) ? 0 : 1;
        $data->update();
        return response()->json([
            'status' => 200,
            'message' => 'Status updated',
        ]);
    }
    
}
