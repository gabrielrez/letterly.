<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class ServeWithNpm extends Command
{
    protected $signature = 'serve:dev';
    protected $description = 'Inicia o servidor Laravel e o npm run dev juntos';

    public function handle()
    {
        $port = 8000;

        $laravel = new Process(['php', 'artisan', 'serve', '--port=' . $port]);
        $npm = new Process(['npm', 'run', 'dev']);

        $laravel->setTimeout(null);
        $npm->setTimeout(null);

        $laravel->start();
        $npm->start();

        $this->info('🚀 Laravel e NPM rodando...');
        $this->info("🔗 Acesse: \033[1;34mhttp://127.0.0.1:$port\033[0m");

        while ($laravel->isRunning() || $npm->isRunning()) {
            usleep(500000);
        }
    }
}
