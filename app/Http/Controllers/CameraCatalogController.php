<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use App\Models\Server;
use App\Models\Brand;
use App\Models\CameraVariant;
use App\Models\CameraType;
use App\Models\Company;
use App\Models\Location;
use App\Models\SubLocation;
use App\Models\CameraCategory;
use Illuminate\Http\Request;

class CameraCatalogController extends Controller
{
    public function index(Request $request)
    {
        // Get filter data
        $servers = Server::with(['type', 'brand'])->get();
        $brands = Brand::all();
        $variants = CameraVariant::all();
        $types = CameraType::all();
        $companies = Company::all();
        $locations = Location::with('company')->get();
        $subLocations = SubLocation::with('location')->get();
        $categories = CameraCategory::all();

        // Build camera query with filters
        $query = Camera::with([
            'server.type',
            'server.brand',
            'brand',
            'cameraVariant',
            'type',
            'category',
            'subLocation.location.company'
        ]);

        // Enhanced Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                // Camera fields
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('noAsset', 'like', "%{$search}%")
                    ->orWhere('model', 'like', "%{$search}%")
                    ->orWhere('ipAddress', 'like', "%{$search}%")
                    ->orWhere('purpose', 'like', "%{$search}%")
                    
                    // Brand
                    ->orWhereHas('brand', function ($subQ) use ($search) {
                        $subQ->where('name', 'like', "%{$search}%");
                    })
                    
                    // Camera Variant
                    ->orWhereHas('cameraVariant', function ($subQ) use ($search) {
                        $subQ->where('name', 'like', "%{$search}%");
                    })
                    
                    // Camera Type
                    ->orWhereHas('type', function ($subQ) use ($search) {
                        $subQ->where('name', 'like', "%{$search}%");
                    })
                    
                    // Camera Category
                    ->orWhereHas('category', function ($subQ) use ($search) {
                        $subQ->where('name', 'like', "%{$search}%");
                    })
                    
                    // Server (No Asset, Name, IP Address)
                    ->orWhereHas('server', function ($subQ) use ($search) {
                        $subQ->where('noAsset', 'like', "%{$search}%")
                            ->orWhere('name', 'like', "%{$search}%")
                            ->orWhere('ipAddress', 'like', "%{$search}%");
                    })
                    
                    // Sub Location
                    ->orWhereHas('subLocation', function ($subQ) use ($search) {
                        $subQ->where('name', 'like', "%{$search}%")
                            
                            // Location
                            ->orWhereHas('location', function ($locQ) use ($search) {
                                $locQ->where('name', 'like', "%{$search}%")
                                    
                                    // Company
                                    ->orWhereHas('company', function ($compQ) use ($search) {
                                        $compQ->where('name', 'like', "%{$search}%");
                                    });
                            });
                    });
            });
        }

        // Server filter
        if ($request->filled('servers')) {
            $query->whereIn('server_id', $request->servers);
        }

        // Brand filter
        if ($request->filled('brands')) {
            $query->whereIn('brand_id', $request->brands);
        }

        // Variant filter
        if ($request->filled('variants')) {
            $query->whereIn('camera_variant_id', $request->variants);
        }

        // Type filter
        if ($request->filled('types')) {
            $query->whereIn('type_id', $request->types);
        }

        // Category filter
        if ($request->filled('categories')) {
            $query->whereIn('category_id', $request->categories);
        }

        // Sub Location filter
        if ($request->filled('sub_locations')) {
            $query->whereIn('sub_location_id', $request->sub_locations);
        }

        // Location filter (through sub_location relationship)
        if ($request->filled('locations')) {
            $query->whereHas('subLocation', function ($q) use ($request) {
                $q->whereIn('location_id', $request->locations);
            });
        }

        // Company filter (through sub_location -> location relationship)
        if ($request->filled('companies')) {
            $query->whereHas('subLocation.location', function ($q) use ($request) {
                $q->whereIn('company_id', $request->companies);
            });
        }

        // Get offset from request (for infinite scroll)
        $offset = $request->get('offset', 0);
        $limit = 6; // Load 6 cameras at a time

        // Get total count for checking if more data exists
        $totalCount = $query->count();
        
        // Get cameras with offset and limit
        $cameras = $query->skip($offset)->take($limit)->get();
        
        // Calculate if there are more cameras to load
        $hasMore = ($offset + $limit) < $totalCount;

        // If it's an infinite scroll request, return only the camera cards HTML
        if ($request->ajax() || $request->wantsJson() || $request->has('load_more')) {
            return response()->json([
                'html' => view('partials.camera-cards', compact('cameras'))->render(),
                'hasMore' => $hasMore,
                'nextOffset' => $offset + $limit,
                'totalCount' => $totalCount
            ]);
        }

        return view('welcome', compact(
            'cameras',
            'servers',
            'brands',
            'variants',
            'types',
            'companies',
            'locations',
            'subLocations',
            'categories',
            'totalCount'
        ));
    }

    public function show($id)
    {
        $camera = Camera::with([
            'server',
            'server.type',
            'brand',
            'cameraVariant',
            'type',
            'category',
            'subLocation.location.company',
            'cameraDetails'
        ])->findOrFail($id);

        return view('camera.show', compact('camera'));
    }
}