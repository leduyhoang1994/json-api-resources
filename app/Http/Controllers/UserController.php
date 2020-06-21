<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Contracts\UserRepository;
use App\Models\User;
use App\Models\UserRole;
use Prettus\Validator\Exceptions\ValidatorException;
use Validator;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Client as OClient;

class UserController extends Controller
{
	public $successStatus = 200;
	protected $repository;

	public function __construct(UserRepository $userRepository)
	{
		$this->repository = $userRepository;
    }

	public function getAllAgent()
	{
		$agents = User::where("role_id", UserRole::AGENT)->with("role")->get();
		return $this->responseSuccess($agents);
	}

	public function getAll()
	{
		$agents = $this->repository->getDataBy([
			'with-agent-groups' => true
		]);
		return $this->responseSuccess($agents);
	}

	public function getOne($id)
	{
		$agents = $this->repository->getDataBy([
			'id' => $id,
			'with-agent-groups' => true
		]);
		return $this->responseSuccess($agents);
	}

	public function update(Request $request, $id)
	{
		try {
			$agentGroup = $this->repository->update($id, $request->all());
			return $this->responseSuccess($agentGroup);
		} catch (ValidatorException $exception) {
			return $this->responseError(400, $exception->getMessageBag()->first());
		} catch (\Exception $exception) {
			return $this->responseError(400, $exception->getMessage());
		}
	}

	public function login()
	{
		if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
			$oClient = OClient::where('password_client', 1)->first();
			return $this->getTokenAndRefreshToken($oClient, request('email'), request('password'));
		} else {
			return $this->responseError(401, "Wrong credentials");
		}
	}

	public function register(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required',
			'c_password' => 'required|same:password',
		]);

		if ($validator->fails()) {
			return response()->json(['error' => $validator->errors()], 401);
		}

		$password = $request->password;
		$input = $request->all();
		$input['password'] = bcrypt($input['password']);
		$user = User::create($input);
		$oClient = OClient::where('password_client', 1)->first();
		return $this->getTokenAndRefreshToken($oClient, $user->email, $password);
	}

	public function getTokenAndRefreshToken(OClient $oClient, $email, $password)
	{
		$oClient = OClient::where('password_client', 1)->first();
		$http = new Client;
		$response = $http->request('POST', env('APP_URL') . '/oauth/token', [
			'form_params' => [
				'grant_type' => 'password',
				'client_id' => $oClient->id,
				'client_secret' => $oClient->secret,
				'username' => $email,
				'password' => $password,
				'scope' => '*',
			],
		]);

		$result = json_decode((string)$response->getBody(), true);
		return $this->responseSuccess($result);
	}

	public function details()
	{
		$user = Auth::user();
		return response()->json($user, $this->successStatus);
	}

	public function logout(Request $request)
	{
		$request->user()->token()->revoke();
		return response()->json([
			'message' => 'Successfully logged out'
		]);
	}

	public function unauthorized()
	{
		return response()->json("unauthorized", 401);
	}

	public function refreshToken(Request $request)
	{
		$refresh_token = $request->header('Refreshtoken');
		$oClient = OClient::where('password_client', 1)->first();
		$http = new Client;

		try {
			$response = $http->request('POST', env('APP_URL') . '/oauth/token', [
				'form_params' => [
					'grant_type' => 'refresh_token',
					'refresh_token' => $refresh_token,
					'client_id' => $oClient->id,
					'client_secret' => $oClient->secret,
					'scope' => '*',
				],
			]);
			return json_decode((string)$response->getBody(), true);
		} catch (Exception $e) {
			return response()->json("unauthorized", 401);
		}
	}

	public function addGroups($id, Request $request)
	{
		if (!$request->has('groups') || !is_array($request->get('groups'))) {
			return $this->responseError(400, 'Groups array is required');
		}

		$user = $this->repository->find($id);
		$user->agentGroups()->sync($request->get('groups'));
		$user = $user->load('agentGroups');

		return $this->responseSuccess($user);
	}
}
