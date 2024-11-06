<?php

namespace App\Jobs;

use App\Mail\TaskMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    private $task;
    private $action;
    private $lastTask;
    public function __construct($task,$action)
    {
        //
        $this->task = $task;
        $this->action = $action;
        // $this->lastTask = $lastTask;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $mailer = new TaskMail($this->task,$this->action);
        Mail::to("kechaf.abdo.ka.2018@gmail.com")->send($mailer);
    }
}
