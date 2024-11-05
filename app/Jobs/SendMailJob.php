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
    public function __construct($task,$action)
    {
        //
        $this->task = $task;
        $this->action = $action;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->task->action = $this->action;
        $mailer = new TaskMail($this->task,$this->action);
        Mail::to("yejueyzjjik@gmail.com")->send($mailer);
    }
}
