<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventBlock;
use App\Models\Event;

class Emails2Seeder extends Seeder
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
        // Closing Notice
        $event = Event::get()->where('name', 'Closing Notice')->first();
        
        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TEXT_BLOCK,
            'block_content' => '<div class="bg-white rounded my-10 px-15 py-20">
                <h6 class="display-6">It’s time to close!</h6>
                <p class="display-6 fw-lighter my-10">
                    Your closing date is right around the corner! We’ve checked with everyone involved to confirm date, time and location, and now all we need from you is to carefully review the details and requirements below to keep your closing on track. 
                </p>
            </div>',
            'block_title' => 'Buyer 1',
            'audience' => '{"buyer":{"desc":"Buyer","checked":true},"listing_agent":{"desc":"Listing Agent","checked":false},"lender":{"desc":"Lender","checked":false},"seller":{"desc":"Seller","checked":false},"buying_agent":{"desc":"Buying Agent","checked":false},"settlement_agent":{"desc":"Settlement Agent","checked":false},"title_company":{"desc":"Title Company","checked":false}}',
            'order' => 1,
            'user_id_created' => 1
        ]);

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TEXT_BLOCK,
            'block_content' => '<div class="bg-white rounded my-10 px-15 py-20">
                <h6 class="display-6">It’s time to close!</h6>
                <p class="display-6 fw-lighter my-10">
                    To protect everyone’s privacy, you will be signing all your closing documents separately from the buyer and PRIOR to the actual closing date. Don’t worry though…we hold everything in safe keeping until the day of closing!
                </p>
                <p class="display-6 fw-lighter my-10">
                    All we need from you is to carefully review the details and requirements below to keep the closing on track.
                </p>
            </div>',
            'block_title' => 'Seller 1',
            'audience' => '{"buyer":{"desc":"Buyer","checked":false},"listing_agent":{"desc":"Listing Agent","checked":false},"lender":{"desc":"Lender","checked":false},"seller":{"desc":"Seller","checked":true},"buying_agent":{"desc":"Buying Agent","checked":false},"settlement_agent":{"desc":"Settlement Agent","checked":false},"title_company":{"desc":"Title Company","checked":false}}',
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
            'block_type' => self::TEXT_BLOCK,
            'block_content' => '<div class="bg-white rounded my-10 px-15 py-20">
                <p class="display-6 fw-lighter my-10">
                    Here is everything we will need when we see you:
                </p>
                <ol class="display-6 fw-lighter my-10 ms-5">
                    <li class="my-15">Funds for closing - <span class="fw-bold">IMPORTANT</span>
                        <ul class="display-6 fw-lighter my-20 ms-5" style="list-style-type: disc;">
                            <li class="my-10">The final Closing Disclosure and amount needed will be provided to you by your lender.</li>
                            <li class="my-10">Wired funds are <span class="fw-bold">REQUIRED</span> for all amounts exceeding $25,000.00.*</li>
                            <li class="my-10">Funds up to $25,000.00 will only be accepted in the form of wire, cashier’s, certified or title company check payable to Trademark Title.</li>
                            <li class="my-10"><a href="#">Click here</a> to securely access  wire information and step-by-step instructions.</li>
                        </ul>
                    </li>
                    <li class="my-15">Valid Non-Expired Photo I.D. (passport, driver&#39;s license, or state-issued identification card)</li>
                    <li class="my-15">Social Security Number or Tax ID Number (card not required)</li>
                </ol>
                <p class="display-6 fw-lighter my-10">
                    *Believe it or not…wiring funds is the safest way to send money. Just know, it takes diligence by the sender to verify the information is correct and <span class="fw-bold">NEVER</span> accept changes to our wire information over email.
                </p>
            </div>',
            'block_title' => 'Buyer 2',
            'audience' => '{"buyer":{"desc":"Buyer","checked":true},"listing_agent":{"desc":"Listing Agent","checked":false},"lender":{"desc":"Lender","checked":false},"seller":{"desc":"Seller","checked":false},"buying_agent":{"desc":"Buying Agent","checked":false},"settlement_agent":{"desc":"Settlement Agent","checked":false},"title_company":{"desc":"Title Company","checked":false}}',
            'order' => 1,
            'user_id_created' => 1
        ]);
        
        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TEXT_BLOCK,
            'block_content' => '<div class="bg-white rounded my-10 px-15 py-20">
                <p class="display-6 fw-lighter my-10">
                    Here is everything we will need when we see you:
                </p>
                <ol class="display-6 fw-lighter my-10 ms-5">
                    <li class="my-15">Valid Non-Expired Photo I.D. (passport, driver&#39;s license, or state-issued identification card)</li>
                    <li class="my-15">Social Security Number or Tax ID Number (card not required)</li>
                    <li class="my-15">Funds for closing (if applicable)
                        <ul class="display-6 fw-lighter my-20 ms-5" style="list-style-type: disc;">
                            <li class="my-10">The final amount needed will be provided to you by your closing team</li>
                            <li class="my-10">Wired funds are REQUIRED for all amounts needed at closing*</li>
                            <li class="my-10">Funds up to $25,000.00 will only be accepted in the form of wire, cashier’s, certified or title company check payable to Trademark Title.</li>
                            <li class="my-10"><a href="#">Click here</a> to securely access wire information and step-by-step instructions.</li>
                        </ul>
                    </li>
                </ol>
                <p class="display-6 fw-lighter my-10">
                    *Believe it or not…wiring funds is the safest way to send money. Just know, it takes diligence by the sender to verify the information is correct and NEVER accept changes to our wire information over email.
                </p>
            </div>',
            'block_title' => 'Seller 2',
            'audience' => '{"buyer":{"desc":"Buyer","checked":false},"listing_agent":{"desc":"Listing Agent","checked":false},"lender":{"desc":"Lender","checked":false},"seller":{"desc":"Seller","checked":true},"buying_agent":{"desc":"Buying Agent","checked":false},"settlement_agent":{"desc":"Settlement Agent","checked":false},"title_company":{"desc":"Title Company","checked":false}}',
            'order' => 1,
            'user_id_created' => 1
        ]);

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TEXT_BLOCK,
            'block_content' => '<div class="bg-white rounded my-10 px-15 py-20">
                <h6 class="display-6 text-center">&lt;Additional Notes&gt;</h6>
            </div>',
            'block_title' => 'Additional Notes',
            'audience' => '{"buyer":{"desc":"Buyer","checked":true},"listing_agent":{"desc":"Listing Agent","checked":true},"lender":{"desc":"Lender","checked":true},"seller":{"desc":"Seller","checked":true},"buying_agent":{"desc":"Buying Agent","checked":true},"settlement_agent":{"desc":"Settlement Agent","checked":true},"title_company":{"desc":"Title Company","checked":true}}',
            'order' => 1,
            'user_id_created' => 1
        ]);

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TITLE_BLOCK,
            'block_content' => 'Closing Notice',
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
            'block_content' => 'media/event-show/image-lg-6.png',
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
