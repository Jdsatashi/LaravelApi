<?php

namespace App\Console\Commands;

use App\Mail\MailNotify;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CommandEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    private string $email = 'jdsatashi@gmail.com';

    public function handle()
    {
        $email = $this->argument('email');
        // Gửi email tới địa chỉ $email ở đây
        if(!$email){
            $email = $this->email;
        }
        $this->info("Email sent to: $email");
        Mail::to($email)->send(new MailNotify(null));
    }

    protected function configure()
    {
        $this->setName('email:send')
            ->setDescription('Send an email to the specified email address.')
            ->addArgument('email', null, 'The email address to send the email to.');
    }
}
