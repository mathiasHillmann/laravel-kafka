<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;

class KafkaProducer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kafka:producer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // DB::update("SET search_path TO santoamaro");

        // $skus = DB::select("SELECT s.id_sku
        // FROM sku AS s
        // WHERE s.fase_vida < 3
        // AND s.idade > 0
        // AND EXISTS (SELECT 1 FROM hist_movimentacao_sku AS z WHERE s.id_sku = z.id_sku AND z.quantidade_venda > 0)
        // AND EXISTS (SELECT 1 FROM hist_movimentacao_sku_m AS z WHERE s.id_sku = z.id_sku)");

        // $skusProcessed = [];
        // foreach ($skus as $sku) {
        //     $skusProcessed[] = $sku->id_sku;
        // }

        // foreach (array_chunk($skusProcessed, 100) as $chunk) {
        //     $str = implode(",", $chunk);
        //     Kafka::publishOn('192.168.1.231', 'santoamaro')
        //     ->withBodyKey('task', 'Forecast')
        //     ->withBodyKey('Params', ['skuFilter' => $str])
        //     ->send();
        // }
        Kafka::publishOn('192.168.1.231', 'santoamaro')
            ->withBodyKey('task', 'Forecast')
            ->withBodyKey('Params', ['skuFilter' => '252082,234393,236420,255011,254359,253315,242017,252623,253051,219025,214561,225772,253916,217581,230674,256330,251768,256387,253807,216904,217057,220341,225100,234472,253457,253460,253459,254050,255454,219689,254250,256132,253422,227210,254711,216942,236390,236569,237251,255970,254682,225350,227173,220347,214442,218424,242703,252635,233883,218114,219105,222177,217736,218120,218661,254610,253116,253016,254057,221199,221216,251736,221023'])
            ->send();
    }
}
