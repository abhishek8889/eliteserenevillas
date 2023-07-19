<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Log;

use Sabre\VObject\Reader;
use League\Csv\Writer;
use App\Models\Reservation;
use DateTime;
use App\Models\VillaIcs;
use App\Models\Villas;

class UpdateVillaIcsNew extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updatevillaicsnew:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    //////////////////////////////////////////

        $villas = Villas::all();
        foreach($villas as $villa){
            $villa_ics_detail  = VillaIcs::where('villa_id',$villa->id)->first();
            if(!empty($villa_ics_detail)){
                $villas_ics_url = $villa_ics_detail->ics_url;
                // get content from link :
                // Reservation delete
                $delete_all_reservation = Reservation::where('villa_id', $villa->id)->delete();
                try{
                $icalendar = Reader::read(file_get_contents($villas_ics_url));
                $events = $icalendar->getComponents('VEVENT');
                foreach($events as $ev){
                    $summary = $ev->SUMMARY;
                    $startDate = date('Y-m-d', strtotime($ev->DTSTART));
                    $endDate = date('Y-m-d', strtotime($ev->DTEND));
                    $description = str_replace("\n"," ",$ev->DESCRIPTION);
                    $uid = $ev->UID;
                    
                    $event = new Reservation;
                    $event->title = $summary;
                    $event->start = $startDate;
                    $event->end = $endDate;
                    $event->descirption = $description;
                    $event->uid = $uid;
                    $event->villa_id = $villa->id;
                    $event->save();
                }  
                }catch(\Exception $e){
                
                }
            }
            /////////////////////////////////////////

            \Log::info("Testing Cron is update villas ics new Running ... !");
            return Command::SUCCESS;
        }
    }
}