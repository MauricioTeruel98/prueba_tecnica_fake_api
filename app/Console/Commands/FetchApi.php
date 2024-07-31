<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FakeStoreService;

class FetchApi extends Command
{
    protected $signature = 'fetch:products';
    protected $description = 'Fetch products from Fake Store API and store them in the database';

    protected $fakeStoreService;

    public function __construct(FakeStoreService $fakeStoreService)
    {
        parent::__construct();
        $this->fakeStoreService = $fakeStoreService;
    }

    public function handle()
    {
        $this->fakeStoreService->fetchAndStoreProducts();
        $this->info('Products fetched and stored successfully.');
    }
}
