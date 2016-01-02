<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\User;
use App\Http\Requests;
use App\Jobs\SendReminderEmail;
use App\Http\Controllers\Controller;

class StaffEmailController extends Controller
{
    /**
     * Send an e-mail reminder to the user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function sendEmailReminder(Request $request, $id)
    {
        $user = User::findOrFail($id);
		
        // $job = (new SendReminderEmail($user))->onQueue('emails');
// 
        // $this->dispatch($job);

        Mail::laterOn('emails',10, 'emails.mailCompose', ['name' => $user], function ($m) use ($user) {
            $m->from('$request->btnFrom', 'Your Application');
			$m->to($request->btnTo);
			$message->cc($request->btnCC, $name = null);
			$message->subject($subject);
			$message->attach($pathToFile, array $options = []);
			
			// Get the underlying SwiftMailer message instance...
			$message->getSwiftMessage();
        });
    }
	 
}
