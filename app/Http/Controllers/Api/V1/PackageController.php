<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Contracts\PackageRepository;
use Illuminate\Http\Request;

class PackageController extends Controller
{
	protected $repository;

	public function __construct(PackageRepository $repository)
	{
		$this->repository = $repository;
	}

	public function getAll()
	{
		try {
			$package = $this->repository->all();
			return $this->responseSuccess($package);
		} catch (\Exception $exception) {
			return $this->responseError(500, $exception->getMessage());
		}
	}

	public function getOne($id)
	{
		try {
			$package = $this->repository->find($id)->load("package.coupons");
			return $this->responseSuccess($package);
		} catch (\Exception $exception) {
			return $this->responseError(500, $exception->getMessage());
		}
	}

	public function create(Request $request)
	{
		try {
			$package = $this->repository->create($request->all());
			return $this->responseSuccess($package);
		} catch (\Exception $exception) {
			return $this->responseError(500, $exception->getMessage());
		}
	}

	public function update(Request $request)
	{

	}
}
