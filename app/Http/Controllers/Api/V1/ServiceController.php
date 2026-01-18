<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\ServiceRequest;
use App\Http\Resources\V1\ServiceResource;
use App\Models\Service;
use App\Models\ServiceImages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;
class ServiceController extends Controller
{

    public function index()
    {
        $service = Service::query()->with('serviceCat')->get();
        return ServiceResource::collection($service);
    }

    public function store(ServiceRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title']);
        $filePrefix = $data['slug'];
        $quality = 80;

        // Single image upload
        if ($request->hasFile('image')) {
            $data['image'] = '/storage/' . $request->file('image')->store('uploads', 'public');
        }

        $service = Service::create($data);

        //save product images
        if (isset($data['images'])) {
            $files = $data['images'];
            $uploadedFiles = multipleFileUpload(
                $files,
                $filePrefix,
                $quality
            );
            $imageData = array_map(function ($filePath) use ($service) {
                return [
                    'url' => $filePath,
                    'service_id' => $service->id
                ];
            }, $uploadedFiles);
            if (!empty($imageData)) {
                ServiceImages::insert($imageData);
            }
        }

        return ServiceResource::make($service);
    }



    public function show(string $id)
    {
        $service = Service::query()->with('serviceCat', 'images')->findOrFail($id);
        return ServiceResource::make($service);
    }

    public function update(ServiceRequest $request, string $id)
    {
        $service = Service::query()->findOrFail($id);
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        $filePrefix = $data['slug'];
        $quality = 80;
        if ($request->hasFile('image')) {
            $data['image'] = '/storage/' . $request->file('image')->store('uploads', 'public');
        }
        $service->update($data);

        if (isset($data['newImages'])) {
            $files = $data['newImages'];
            $uploadedFiles = multipleFileUpload(
                $files,
                $filePrefix,
                $quality
            );
            $imageData = array_map(function ($filePath) use ($service) {
                return [
                    'url' => $filePath,
                    'service_id' => $service->id
                ];
            }, $uploadedFiles);
            if (!empty($imageData)) {
                ServiceImages::insert($imageData);
            }
        }

        return ServiceResource::make($service);
    }

    public function deleteImage(string $id)
    {
        $image = ServiceImages::findOrFail($id);
        if ($image) {
            if (File::exists(public_path($image->url))) {
                File::delete(public_path($image->url));
            }
            $image->delete();

            return Response::HTTP_OK;
        }
    }

    public function destroy(string $id)
    {
        $service = Service::query()->findOrFail($id);
        $service->delete();

        return Response::HTTP_OK;
    }
}
