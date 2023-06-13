<?php

namespace App\Modules\Recover\Console;

use Arr;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CreateGroupsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recover:groups';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create groups for recover exercises';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    static function getCombinations($arrays) {
        $result = [[]];
        $c=0;
        foreach ($arrays as $key => $values) {
            $append = [];
            foreach ($result as $product) {
                foreach ($values as $item) {
                    $product[$key] = $item;
                    $append[] = $product;
                }
            }
            $c+=1;
            $result = $append;
            if ($c==13) dd($result);
        }

        return $result;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $config = \Config::get('data_for_groups_recover');

        $res = self::getCombinations($config);
        dd($res);

    }
}
