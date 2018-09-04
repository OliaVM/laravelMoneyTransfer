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
    public $transfers_log_string;
    public $file;
    private $result_action;
    private $err;

    function __construct () {
        $this->file = __DIR__ . "/../../../transfers.json";
    }

    //do transfer
	public function do_transfer(Request $request) {
		if ($request->isMethod("post")) {
			$this->validate($request, [
						'number_of_account' => 'required|integer|max:100000000000',
						'money_for_transfer' => 'required|integer|max:1000000000000',
			]);
			// get autentifacated_user_ID 
			$session_user_id = Auth::id();
			// get money_for_transfer
			$money_for_transfer = $request->input('money_for_transfer');
			//get money of sender
			$money_of_sender =$this->get_sender($session_user_id);

			try {
				//verify is there enough money to transfer
				if ($money_of_sender < 0 || $money_of_sender == 0) {
					throw new ModelNotFoundException('Не достаточно денег для перевода');
				}
				//verify rights of user for transfer - exsist auth or not exsist
				if ($money_for_transfer > $money_of_sender) {
					throw new ModelNotFoundException('Не достаточно денег');
				}

				//get date
				$time = date("Y-m-d H:i:s");
				
				//get recipient
				$number_of_account = $request->input('number_of_account');
				$recipient_data = $this->get_recipient($number_of_account);
				$arr_recipient = $recipient_data['arr_recipient'];
				$money_of_recipient = $recipient_data['money_of_recipient'];
				$recipient_id = $recipient_data['recipient_id'];

				//verify does the account number exist 
				if (!empty($arr_recipient)) {
					// Add transfer in TABLE TRANSFERS
					$transfer = Transfer::create([
						'from_user_id' => $session_user_id, 
						'to_user_id' => $recipient_id, 
						'count_money' => $money_for_transfer, 
						'created_at' => $time
						]);

					//update recipient 
					//calculate current money of recipient
					$current_count_money_of_recipient = $money_of_recipient + $money_for_transfer;
					//update count_money of recipient in TABLE ACCOUNTS
					$this->update_recipient($recipient_id, $current_count_money_of_recipient);
					
					//update sender
					$current_count_money_of_sender = $money_of_sender - $money_for_transfer;
					//update count_money of sender in TABLE ACCOUNTS
					$this->update_sender($session_user_id, $current_count_money_of_sender); 
					
					//add transfer of sender in LOG_FILE TRANSFERS
					$this->add_transfer_in_log($transfer);
					
			        $this->result_action = "Перевод успешно завершен";
		    	}
			} catch (ModelNotFoundException $exception) {
		        $this->err = $exception->getMessage();
		    }
		}
		return view('my/transfer/do', ['result_action' => $this->result_action, 'err' => $this->err]);
	}


	public function get_sender($session_user_id) {
		$array_sender = Account::where('user_id', '=', $session_user_id)->get();
		foreach ($array_sender as $row) {
			$money_of_sender = $row->count_money; 
		}
		return $money_of_sender;
	}


	public function get_recipient($number_of_account) {
		$arr_recipient = Account::where('number_of_account', '=', $number_of_account)->get();
		foreach ($arr_recipient as $row_recipient) {
			$recipient_id = $row_recipient->user_id;
			$money_of_recipient = $row_recipient->count_money;
		}
		return ['arr_recipient'=> $arr_recipient, 'money_of_recipient' => $money_of_recipient, 'recipient_id' => $recipient_id];
	}

	public function update_recipient($recipient_id, $current_count_money_of_recipient) {
		Account::where('user_id', $recipient_id)
				->update(['count_money' => $current_count_money_of_recipient]);
	}

	public function update_sender($session_user_id, $current_count_money_of_sender) {
		Account::where('user_id', $session_user_id)
				->update(['count_money' => $current_count_money_of_sender]);
	}

	public function add_transfer_in_log($transfer) {
    	$this->transfers_log_string = $transfer->toJson();;  
		File::append($this->file, $this->transfers_log_string);
	}

	//show log of user operation
	public function show(Request $request, $session_user_id) {
		$session_user_id = Auth::id();
		$transfers_from = $this->show_transfers_from($session_user_id); 
		$transfers_to = $this->show_transfers_to($session_user_id);
		$this->get_transfer_from_log();
		return view('my/transfer/show', ['transfers_from' => $transfers_from, 'transfers_to' => $transfers_to]);
	}


	public function show_transfers_from($session_user_id) {
		$transfers_from = Transfer::where('from_user_id', $session_user_id)
				->orderBy('created_at', 'desc')
				->get();
		return $transfers_from;
	}
	
	public function show_transfers_to($session_user_id) {
		$transfers_to = Transfer::where('to_user_id', $session_user_id)
				->orderBy('created_at', 'desc')
				->get();
		return $transfers_to;
	}

	public function get_transfer_from_log() {
		$string = File::get($this->file);
		return $string;
	}
}
