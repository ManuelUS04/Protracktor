<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventBlock;
use App\Models\Event;

class Emails6Seeder extends Seeder
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
        // Final Policy
        $event = Event::get()->where('name', 'Final Policy')->first();
        
        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TEXT_BLOCK,
            'block_content' => '<div class="bg-white rounded my-10 px-15 py-20">
                <h6 class="display-6">Hi there homeowner!</h6>
                <p class="display-6 fw-lighter my-10">
                    Remember when we mentioned at closing that the title to your property is insured and a policy would come to you after closing? With everything going on, we are guessing not, but that’s okay…we remembered! 
                </p>
                <p class="display-6 fw-lighter my-10">
                Your Owner’s Title Insurance Policy is now available. Make sure to retain this critical policy in your personal records if you ever need to make a claim.
                </p>
                <div class="d-flex">
                    <button class="btn btn-secondary flex-fill p-8">
                        <span class="display-6">Download Your Policy  
                        </span>
                    </button>
                </div>
                <p class="display-6 fw-lighter my-10">
                NOTE: The link to access your policy will expire in 6 months. Should you ever need a copy and forgot to download it it, we got you covered! You can always reach out to us for another copy.
                </p>
                <p class="display-6 fw-lighter my-10">
                Congrats again on your purchase and know your title is well protected with Trademark Title!
                </p>
            </div>',
            'block_title' => 'Buyer',
            'audience' => '{"buyer":{"desc":"Buyer","checked":true},"listing_agent":{"desc":"Listing Agent","checked":false},"lender":{"desc":"Lender","checked":false},"seller":{"desc":"Seller","checked":false},"buying_agent":{"desc":"Buying Agent","checked":false},"settlement_agent":{"desc":"Settlement Agent","checked":false},"title_company":{"desc":"Title Company","checked":false}}',
            'order' => 1,
            'user_id_created' => 1
        ]);

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TEXT_BLOCK,
            'block_content' => '<div class="bg-white rounded my-10 px-15 py-20">
                <h6 class="display-6">Hi there!</h6>
                <p class="display-6 fw-lighter my-10">
                    The Lender&apos;s Policy is completed and is being mailed via USPS to your noted post-closing contacts in the Closing Instructions.
                </p>
                <p class="display-6 fw-lighter my-10">
                    Thank you for partnering with Trademark Title Services, Inc. and we look forward to working with you again!
                </p>
            </div>',
            'block_title' => 'Lender',
            'audience' => '{"buyer":{"desc":"Buyer","checked":false},"listing_agent":{"desc":"Listing Agent","checked":false},"lender":{"desc":"Lender","checked":true},"seller":{"desc":"Seller","checked":false},"buying_agent":{"desc":"Buying Agent","checked":false},"settlement_agent":{"desc":"Settlement Agent","checked":false},"title_company":{"desc":"Title Company","checked":false}}',
            'order' => 1,
            'user_id_created' => 1
        ]);


        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TITLE_BLOCK,
            'block_content' => 'Final Policy',
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
            'block_content' => 'media/event-show/image-lg-10.png',
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
