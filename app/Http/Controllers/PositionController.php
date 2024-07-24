<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequests\DeletePositionRequest;
use App\Http\Requests\PositionRequests\GetPositionRequest;
use App\Http\Requests\PositionRequests\PostPositionRequest;
use App\Http\Requests\PositionRequests\PutPositionRequest;
use App\Models\Position;
use App\Services\PositionService;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PositionController extends Controller
{
    public function __construct(
        readonly PositionService $service
    ) {
    }

    public function index()
    {
        return view('position.index', ['positions' => $this->service->getAllPositions()]);
    }

    public function create()
    {
        return view('position.create');
    }

    /**
     * @throws UnknownProperties
     */
    public function store(PostPositionRequest $request)
    {
        $this->service->createPosition($request->getDTO());

        return redirect(route('position.index'));
    }

    /**
     * @throws UnknownProperties
     */
    public function edit(GetPositionRequest $request)
    {
        return view('position.edit', ['position' => $this->service->findPosition($request->getDTO())]);
    }

    /**
     * @throws UnknownProperties
     */
    public function update(PutPositionRequest $request)
    {
        $this->service->updatePosition($request->getDTO());

        return redirect()->route('position.index');
    }

    /**
     * @throws UnknownProperties
     */
    public function destroy(DeletePositionRequest $request)
    {
        $this->service->deletePosition($request->getDTO());

        return redirect()->route('position.index');
    }
}
