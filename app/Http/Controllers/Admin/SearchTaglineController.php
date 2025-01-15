<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\SearchTaglineRepositoryInterface;
use App\Models\SearchTagline;

class SearchTaglineController extends Controller
{
    private $searchTaglineRepository;

    public function __construct(SearchTaglineRepositoryInterface $searchTaglineRepository)
    {
        $this->searchTaglineRepository = $searchTaglineRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = $request->keyword ?? '';
        $query = SearchTagline::query();
        // dd($query);
        // Apply search filter based on the keyword (search in title or desc)
        $query->when($keyword, function($query) use ($keyword) {
            $query->where('title', 'like', '%'.$keyword.'%');
        });
        // dd($query);
        // Paginate results
        $searchTaglines = $query->latest('id')->paginate(25);
    
        return view('admin.search_tagline.index', compact('searchTaglines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.search_tagline.add');
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
            'title' => 'required|string|max:255|unique:search_taglines,title',
        ]);
        

        $this->searchTaglineRepository->create($request->all());
        return redirect()->route('admin.search-tagline.list.all')->with('success', 'Search Tagline created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $searchTagline = $this->searchTaglineRepository->findById($id);
        return view('admin.search_tagline.show', compact('searchTagline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->searchTaglineRepository->findById($id);
        return view('admin.search_tagline.edit', compact('data'));
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
            'title' => 'required|string|max:255|unique:search_taglines,title,' . $id,

        ]);
    
        $this->searchTaglineRepository->update($id, $request->all());
        return redirect()->route('admin.search-tagline.list.all')->with('success', 'Search Tagline updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->searchTaglineRepository->delete($id);
        return redirect()->route('admin.search-tagline.list.all')->with('success', 'Search Tagline deleted successfully.');
    }

    public function BlogStatus(Request $request, $id)
    {
        $data = $this->searchTaglineRepository->findById($id);
        $data->status = ($data->status == 1) ? 0 : 1;
        $data->update();
        return response()->json([
            'status' => 200,
            'message' => 'Status updated',
        ]);
    }
    
}
