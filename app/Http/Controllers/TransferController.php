<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Account;
use App\Transfer;
use App\User;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class TransferController extends Controller
{
    private $result_action;
    private $err;

    function __construct () {
        $this->file = __DIR__ . "/../../../transfers.json";
        $this->modelTransfer = new Transfer();
    }

    //do transfer
	public function do_transfer(Request $request) {
		if ($request->isMethod("post")) {
			$this->validate($request, [
						'number_of_account' => 'required|integer|max:100000000000',
						'money_for_transfer' => 'required|integer|max:1000000000000',
			]);
			$data = $this->modelTransfer->do_transfer($request);
			$this->result_action = $data['result_action'];
			$this->err = $data['err'];
		}
		return view('my/transfer/do', ['result_action' => $this->result_action, 'err' => $this->err]);
	}


	//show log of user operation
	public function show(Request $request, $session_user_id) {
		$data = $this->modelTransfer-> show($request, $session_user_id);
		$transfers_from = $data['transfers_from'];
		$transfers_to = $data['transfers_to'];
		return view('my/transfer/show', ['transfers_from' => $transfers_from, 'transfers_to' => $transfers_to]);
	}

}
