<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventBlock;
use App\Models\Event;

class Emails3Seeder extends Seeder
{
    private const BG_BLOCK = 1;
    private const LOGO_BLOCK = 2;
    private const TEXT_BLOCK = 3;
    private const TITLE_BLOCK = 5;
    private const SUBTITLE_BLOCK = 6;

    private const LOGO_BLOCK_ASSET = 7;
    private const BG_BLOCK_ASSET = 8;
    private const TEAM_INTRO = 9;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Signing Reminder
        $event = Event::get()->where('name', 'Signing Reminder')->first();
        
        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TEXT_BLOCK,
            'block_content' => '<div class="bg-white rounded my-10 px-15 py-20">
                <h6 class="display-6">Hey there!</h6>
                <p class="display-6 fw-lighter my-10">
                A quick and friendly reminder…don’t forget about your closing appointment below.  See you then!
                </p>
            </div>',
            'block_title' => 'Buyer/Seller',
            'audience' => '{"buyer":{"desc":"Buyer","checked":true},"listing_agent":{"desc":"Listing Agent","checked":false},"lender":{"desc":"Lender","checked":false},"seller":{"desc":"Seller","checked":true},"buying_agent":{"desc":"Buying Agent","checked":false},"settlement_agent":{"desc":"Settlement Agent","checked":false},"title_company":{"desc":"Title Company","checked":false}}',
            'order' => 1,
            'user_id_created' => 1
        ]);

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TEXT_BLOCK,
            'block_content' => '<div class="bg-white rounded my-10 d-flex">
                <div class="w-25 py-10 rounded-start" style="background-color: #B4D9ED;">
                    <h6 class="display-6 text-center fw-bold">TUESDAY</h6>
                    <h5 class="display-5 text-center fw-bolder text-primary">JULY</h5>
                    <h5 class="display-5 text-center fw-bolder">14</h5>
                    <div class="text-center fw-bold" style="font-size: 2rem; font-weight: bold;">
                        3:30 - 4:30 PM
                    </div>
                </div>
                <div class="flex-fill py-6">
                    <div class="fw-bolder text-center my-5" style="font-size: 1.8rem;">Trademark Title Savage</div>
                    <div class="fw-bolder text-center my-1" style="font-size: 1.5rem;">13875 Hwy 13 South Front Rd,</div>
                    <div class="fw-bolder text-center my-1" style="font-size: 1.5rem;">Suite #126,</div>
                    <div class="fw-bolder text-center my-1" style="font-size: 1.5rem;">Savage, MN 55378</div>
                    <div class="fw-bolder text-center my-5" style="font-size: 1.5rem;">
                        <a href="#">Driving Directions</a>
                    </div>
                </div>
                <div class="w-25 p-10">
                    <img src="/assets/media/event-show/image-closing-notice.png" class="img-fluid shadow-sm rounded" alt="image"/>
                </div>
            </div>',
            'block_title' => 'Appointment',
            'audience' => '{"buyer":{"desc":"Buyer","checked":true},"listing_agent":{"desc":"Listing Agent","checked":true},"lender":{"desc":"Lender","checked":true},"seller":{"desc":"Seller","checked":true},"buying_agent":{"desc":"Buying Agent","checked":true},"settlement_agent":{"desc":"Settlement Agent","checked":true},"title_company":{"desc":"Title Company","checked":true}}',
            'order' => 1,
            'user_id_created' => 1
        ]);

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TITLE_BLOCK,
            'block_content' => 'Signing Reminder',
            'block_title' => 'Title',
            'user_id_created' => 1
        ]);

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::SUBTITLE_BLOCK,
            'block_content' => 'Trademark Title',
            'block_title' => 'Subtitle',
            'user_id_created' => 1
        ]);

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::LOGO_BLOCK_ASSET,
            'block_content' => 'media/event-show/home.png',
            'block_title' => 'Logo',
            'user_id_created' => 1
        ]);

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::BG_BLOCK_ASSET,
            'block_content' => 'media/event-show/image-lg-7.png',
            'block_title' => 'Background',
            'user_id_created' => 1
        ]);

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TEAM_INTRO,
            'block_content' => 'Questions? Contact the Closing Team',
            'block_title' => 'Team intro',
            'user_id_created' => 1
        ]);
    }
}
