<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventBlock;
use App\Models\Event;

class Emails4Seeder extends Seeder
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
        // Wire Confirmation
        $event = Event::get()->where('name', 'Wire Confirmation')->first();
        
        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TEXT_BLOCK,
            'block_content' => '<div class="bg-white rounded my-10 px-15 py-20">
                <h6 class="display-6">We received your money!</h6>
                <p class="display-6 fw-lighter my-10">
                    As a courtesy, we are informing you we have received your wire transferred funds. Thank you for sending and please know your funds are safe with Trademark!
                </p>
                <p class="display-6 fw-lighter my-10">
                    If you have additional questions pertaining to your closing, please contact your Closing Team.
                </p>
                <p class="display-6 fw-lighter my-10">
                    Sincerely,
                </p>
                <h6 class="display-6">Trademark Title - Accounting Department</h6>
            </div>',
            'block_title' => 'Buyer',
            'audience' => '{"buyer":{"desc":"Buyer","checked":true},"listing_agent":{"desc":"Listing Agent","checked":false},"lender":{"desc":"Lender","checked":false},"seller":{"desc":"Seller","checked":false},"buying_agent":{"desc":"Buying Agent","checked":false},"settlement_agent":{"desc":"Settlement Agent","checked":false},"title_company":{"desc":"Title Company","checked":false}}',
            'order' => 1,
            'user_id_created' => 1
        ]);

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TITLE_BLOCK,
            'block_content' => 'Wire Confirmation',
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
            'block_content' => 'media/event-show/image-lg-8.png',
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
