<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventBlock;
use App\Models\Event;

class EmailsSeeder extends Seeder
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
        // Introduction
        $event = Event::get()->where('name', 'Introduction')->first();
        
        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TEXT_BLOCK,
            'block_content' => '<div class="bg-white rounded my-10 px-15 py-20">
            <h6 class="display-6">Client Name Here, 👋</h6>
            <p class="display-6 fw-lighter my-10">
                What an exciting time…your offer has been accepted and you are getting ready to close. This is where we come into the picture, your title and closing team!
            </p>
            <p class="display-6 fw-lighter my-10">
                We are the ones you will meet at the closing table to sign the final paperwork. More importantly, we are working diligently behind the scenes alongside the real estate professionals to review the title to the property, making sure everything is clear so ownership can be transferred legally and efficiently. Want to know more about us? Check us out at <a href="#">www.trademarktitle.com</a>!
            </p>
            <p class="display-6 fw-lighter my-10">
                Look for these valuable communications along the way while we direct you to the finish line!
            </p>
            <div class="d-flex justify-content-center">
                <img src="/assets/media/event-show/image-status.png" alt="image-status"
                    style="width: 45em;"/>
            </div>
            <div class="d-flex justify-content-center mt-15">
                <div>
                    <div class="my-2">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="align-top">
                            <circle cx="17" cy="17" r="17" fill="#227FC4"/>
                        </svg>
                        <span class="display-6 ms-10">REQUIRED DISCLOSURE</span>
                    </div>
                    <div class="my-2">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="align-top">
                            <circle cx="17" cy="17" r="17" fill="#20C6A6"/>
                        </svg>
                        <span class="display-6 ms-10">CONSUMER AWARENESS</span>
                    </div>
                    <div class="my-2">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="align-top">
                            <circle cx="17" cy="17" r="17" fill="#4288D3"/>
                        </svg>
                        <span class="display-6 ms-10">COMMIMENT DELIVERY</span>
                    </div>
                    <div class="my-2">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="align-top">
                            <circle cx="17" cy="17" r="17" fill="#0E285B"/>
                        </svg>
                        <span class="display-6 ms-10">CLOSING NOTICE</span>
                    </div>
                    <div class="my-2">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="align-top">
                            <circle cx="17" cy="17" r="17" fill="#2F5F98"/>
                        </svg>
                        <span class="display-6 ms-10">SIGNING REMINDER</span>
                    </div>
                    <div class="my-2">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="align-top">
                            <circle cx="17" cy="17" r="17" fill="#31356E"/>
                        </svg>
                        <span class="display-6 ms-10">WIRE CONFIRMATION RECEIVED</span>
                    </div>
                    <div class="my-2">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="align-top">
                            <circle cx="17" cy="17" r="17" fill="#41B8D5"/>
                        </svg>
                        <span class="display-6 ms-10">CONGRATULATIONS</span>
                    </div>
                    <div class="my-2">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="align-top">
                            <circle cx="17" cy="17" r="17" fill="#6CE5E8"/>
                        </svg>
                        <span class="display-6 ms-10">FINAL POLICY</span>
                    </div>
                </div>
            </div>
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
            <h6 class="display-6">Client Name Here, 👋</h6>
            <p class="display-6 fw-lighter my-10">
                You have accepted an offer on your house and you are getting ready to close. This is where we come into the picture, your title and closing team!
            </p>
            <p class="display-6 fw-lighter my-10">
                We are the ones you will meet at the closing table to sign the final paperwork. More importantly, we are working diligently behind the scenes alongside the real estate professionals to review the title to the property, making sure everything is clear so ownership can be transferred legally and efficiently. Want to know more about us? Check us out at <a href="www.trademarktitle.com">www.trademarktitle.com</a>!
            </p>
            <p class="display-6 fw-lighter my-10">
                Look for these valuable communications along the way while we direct you to the finish line!
            </p>
            <div class="d-flex justify-content-center">
                <img src="/assets/media/event-show/image-status.png" alt="image-status"
                    style="width: 45em;"/>
            </div>
            <div class="d-flex justify-content-center mt-15">
                <div>
                    <div class="my-2">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="align-top">
                            <circle cx="17" cy="17" r="17" fill="#227FC4"/>
                        </svg>
                        <span class="display-6 ms-10">REQUIRED DISCLOSURE</span>
                    </div>
                    <div class="my-2">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="align-top">
                            <circle cx="17" cy="17" r="17" fill="#20C6A6"/>
                        </svg>
                        <span class="display-6 ms-10">CONSUMER AWARENESS</span>
                    </div>
                    <div class="my-2">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="align-top">
                            <circle cx="17" cy="17" r="17" fill="#4288D3"/>
                        </svg>
                        <span class="display-6 ms-10">COMMIMENT DELIVERY</span>
                    </div>
                    <div class="my-2">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="align-top">
                            <circle cx="17" cy="17" r="17" fill="#0E285B"/>
                        </svg>
                        <span class="display-6 ms-10">SELLER AFFIDAVIT</span>
                    </div>
                    <div class="my-2">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="align-top">
                            <circle cx="17" cy="17" r="17" fill="#2F5F98"/>
                        </svg>
                        <span class="display-6 ms-10">CLOSING NOTICE</span>
                    </div>
                    <div class="my-2">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="align-top">
                            <circle cx="17" cy="17" r="17" fill="#31356E"/>
                        </svg>
                        <span class="display-6 ms-10">SIGNING REMINDER</span>
                    </div>
                    <div class="my-2">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="align-top">
                            <circle cx="17" cy="17" r="17" fill="#41B8D5"/>
                        </svg>
                        <span class="display-6 ms-10">CONGRATULATIONS</span>
                    </div>
                </div>
            </div>
        </div>',
            'block_title' => 'Seller',
            'audience' => '{"buyer":{"desc":"Buyer","checked":false},"listing_agent":{"desc":"Listing Agent","checked":false},"lender":{"desc":"Lender","checked":false},"seller":{"desc":"Seller","checked":true},"buying_agent":{"desc":"Buying Agent","checked":false},"settlement_agent":{"desc":"Settlement Agent","checked":false},"title_company":{"desc":"Title Company","checked":false}}',
            'order' => 1,
            'user_id_created' => 1
        ]);

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TITLE_BLOCK,
            'block_content' => 'Welcome Home!',
            'block_title' => 'Title',
            'user_id_created' => 1
        ]);

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::SUBTITLE_BLOCK,
            'block_content' => 'Welcome to Trademark Title',
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
            'block_content' => 'media/event-show/image-lg-1.png',
            'block_title' => 'Background',
            'user_id_created' => 1
        ]);

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TEAM_INTRO,
            'block_content' => 'Meet the Closing Team',
            'block_title' => 'Team intro',
            'user_id_created' => 1
        ]);

        // Required Disclosures
        $event = Event::get()->where('name', 'Required Disclosures')->first();

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TEXT_BLOCK,
            'block_content' => '<div class="bg-white rounded my-10 px-15 py-20">
            <h6 class="display-6">Hi There!</h6>
            <p class="display-6 fw-lighter my-10">
                Another thing about Trademark Title you may not have known...we are an insurance company. As such, we are required to provide certain disclosures prior to your actual closing.
            </p>
            <p class="display-6 fw-lighter my-10">
                Please review carefully and reach out to us should you have any questions. No further action is needed!
            </p>
            <ul class="display-6 fw-lighter my-10 ms-5">
                <li class="my-10">
                    §  You will be charged an <span style="text-decoration: underline;">estimated Settlement Fee</span> of $390. This will be reflected on your final closing statement of fees.
                </li>
                <li class="my-10">
                    Trademark Title Services, Inc., or its agent, acting as Real Estate Closing agent in the above transaction, under applicable state law, may not express opinions regarding the legal effect of the closing documents or of the closing itself.
                </li>
            </ul>
            <div class="d-flex">
                <button class="btn btn-secondary flex-fill p-8">
                    <span class="display-6">Review Privacy Disclosure
                    </span>
                </button>
            </div>
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
            <h6 class="display-6">Hi There!</h6>
            <p class="display-6 fw-lighter my-10">
                Another thing about Trademark Title you may not have known...we are an insurance company. As such, we are required to provide certain disclosures prior to your actual closing.
            </p>
            <p class="display-6 fw-lighter my-10">
                Please review carefully and reach out to us should you have any questions. No other action is needed!
            </p>
            <ul class="display-6 fw-lighter my-10 ms-5">
                <li class="my-10">
                    §  You will be charged an <span style="text-decoration: underline;">estimated Settlement Fee</span> of $410. This will be reflected on your final closing statement of fees.
                </li>
                <li class="my-10">
                    Trademark Title Services, Inc., or its agent, acting as Real Estate Closing agent in the above transaction, under applicable state law, may not express opinions regarding the legal effect of the closing documents or of the closing itself.
                </li>
            </ul>
            <div class="d-flex">
                <button class="btn btn-secondary flex-fill p-8">
                    <span class="display-6">Review Privacy Disclosure
                    </span>
                </button>
            </div>
        </div>',
            'block_title' => 'Seller',
            'audience' => '{"buyer":{"desc":"Buyer","checked":false},"listing_agent":{"desc":"Listing Agent","checked":false},"lender":{"desc":"Lender","checked":false},"seller":{"desc":"Seller","checked":true},"buying_agent":{"desc":"Buying Agent","checked":false},"settlement_agent":{"desc":"Settlement Agent","checked":false},"title_company":{"desc":"Title Company","checked":false}}',
            'order' => 1,
            'user_id_created' => 1
        ]);

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TITLE_BLOCK,
            'block_content' => 'Required Disclosures',
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
            'block_content' => 'media/event-show/image-lg-2.png',
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

        // Consumer Awareness
        $event = Event::get()->where('name', 'Consumer Awareness')->first();

        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TEXT_BLOCK,
            'block_content' => '<div class="bg-white rounded my-10 px-15 py-20">
            <h6 class="display-6">Something to seriously think about,</h6>
            <p class="display-6 fw-lighter my-10">
                The world of real estate is highly targeted by fraudsters and scammers, which is why we take every measure possible to exceed Best Practice recommendations of our industry to keep your information safe and secure. Here are some valuable tools and tips to keep the bad folks away:
            </p>
            <ul class="display-6 fw-lighter my-10 ms-5">
                <li class="my-10">
                    <span class="fw-bold">NEVER</span> accept instructions in an email telling you our wire information has changed.
                </li>
                <li class="my-10">
                    <span class="fw-bold">ALWAYS</span> look at the sender’s email address if you are asked to send money. You will only see our emails ending in Trademarktitle.com!
                </li>
                <li class="my-10">
                    We <span class="fw-bold">ALWAYS</span> send our wire information to you via secured/encrypted methods.
                </li>
                <li class="my-10">
                    We encourage you to <span class="fw-bold">CALL</span> us at a verified number to confirm our wire instructions.
                </li>
            </ul>
            <p class="display-6 fw-lighter my-10">
                Check out these useful videos and links and know your transaction is safe with Trademark!
            </p>
            <div class="my-10 d-flex">
                <span class="w-30px">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="align-top">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20 35.75C22.0683 35.75 24.1164 35.3426 26.0273 34.5511C27.9381 33.7596 29.6744 32.5995 31.1369 31.1369C32.5995 29.6744 33.7596 27.9381 34.5511 26.0273C35.3426 24.1164 35.75 22.0683 35.75 20C35.75 17.9317 35.3426 15.8836 34.5511 13.9727C33.7596 12.0619 32.5995 10.3256 31.1369 8.86307C29.6744 7.40055 27.9381 6.24041 26.0273 5.4489C24.1164 4.65739 22.0683 4.25 20 4.25C15.8228 4.25 11.8168 5.90937 8.86307 8.86307C5.90937 11.8168 4.25 15.8228 4.25 20C4.25 24.1772 5.90937 28.1832 8.86307 31.1369C11.8168 34.0906 15.8228 35.75 20 35.75ZM20 39.25C30.6313 39.25 39.25 30.6313 39.25 20C39.25 9.36875 30.6313 0.75 20 0.75C9.36875 0.75 0.75 9.36875 0.75 20C0.75 30.6313 9.36875 39.25 20 39.25Z" fill="#2A559D"/>
                        <path d="M27 20L16.5 27.5775V12.4225L27 20Z" fill="#2A559D"/>
                    </svg>
                </span>
                <span class="display-6 fw-normal ms-10">PROTECT YOUR MONEY FROM WIRE FRAUD SCHEMES</span>
            </div>
            <div class="my-10 d-flex">
                <div class="w-30px">
                    <svg width="30" height="38" viewBox="0 0 30 38" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="align-top">
                        <path d="M0.299999 33.7C0.299999 34.8139 0.742498 35.8822 1.53015 36.6698C2.3178 37.4575 3.38609 37.9 4.5 37.9H25.5C26.6139 37.9 27.6822 37.4575 28.4698 36.6698C29.2575 35.8822 29.7 34.8139 29.7 33.7V4.29998C29.7 3.18607 29.2575 2.11778 28.4698 1.33013C27.6822 0.542474 26.6139 0.0999756 25.5 0.0999756H4.5C3.38609 0.0999756 2.3178 0.542474 1.53015 1.33013C0.742498 2.11778 0.299999 3.18607 0.299999 4.29998V33.7ZM25.5 8.49998H15V6.39998H25.5V8.49998ZM25.5 12.7H15V10.6H25.5V12.7ZM25.5 16.9H15V14.8H25.5V16.9ZM4.5 27.4H25.5V29.5H4.5V27.4ZM4.5 23.2H25.5V25.3H4.5V23.2ZM4.5 19H25.5V21.1H4.5V19ZM4.5 6.39998H12.9V16.9H4.5V6.39998Z" fill="#2A559D"/>
                    </svg>
                </div>
                <span class="display-6 fw-normal ms-10">BEWARE: EMAIL PHISHING SCAMS</span>
            </div>
            <div class="my-10 d-flex">
                <div class="w-30px">
                    <svg width="30" height="38" viewBox="0 0 30 38" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="align-top">
                        <path d="M0.299999 33.7C0.299999 34.8139 0.742498 35.8822 1.53015 36.6698C2.3178 37.4575 3.38609 37.9 4.5 37.9H25.5C26.6139 37.9 27.6822 37.4575 28.4698 36.6698C29.2575 35.8822 29.7 34.8139 29.7 33.7V4.29998C29.7 3.18607 29.2575 2.11778 28.4698 1.33013C27.6822 0.542474 26.6139 0.0999756 25.5 0.0999756H4.5C3.38609 0.0999756 2.3178 0.542474 1.53015 1.33013C0.742498 2.11778 0.299999 3.18607 0.299999 4.29998V33.7ZM25.5 8.49998H15V6.39998H25.5V8.49998ZM25.5 12.7H15V10.6H25.5V12.7ZM25.5 16.9H15V14.8H25.5V16.9ZM4.5 27.4H25.5V29.5H4.5V27.4ZM4.5 23.2H25.5V25.3H4.5V23.2ZM4.5 19H25.5V21.1H4.5V19ZM4.5 6.39998H12.9V16.9H4.5V6.39998Z" fill="#2A559D"/>
                    </svg>
                </div>
                <span class="display-6 fw-normal ms-10">WARRANTY DEED MAIL SCAM</span>
            </div>
        </div>',
            'block_title' => 'Buyer/Seller',
            'audience' => '{"buyer":{"desc":"Buyer","checked":true},"listing_agent":{"desc":"Listing Agent","checked":false},"lender":{"desc":"Lender","checked":false},"seller":{"desc":"Seller","checked":true},"buying_agent":{"desc":"Buying Agent","checked":false},"settlement_agent":{"desc":"Settlement Agent","checked":false},"title_company":{"desc":"Title Company","checked":false}}',
            'order' => 1,
            'user_id_created' => 1
        ]);
        
        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TITLE_BLOCK,
            'block_content' => 'Consumer Awareness',
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
            'block_content' => 'media/event-show/image-lg-3.png',
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
        
        // Seller Affadavit
        $event = Event::get()->where('name', 'Seller Affadavit')->first();
        
        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TEXT_BLOCK,
            'block_content' => '<div class="bg-white rounded my-10 px-15 py-20">
                <h6 class="display-6">We need you!</h6>
                <p class="display-6 fw-lighter my-10">
                    You hold the key to a bit of critical information needed before closing.
                </p>
                <p class="display-6 fw-lighter my-10">
            
                    In order for us to obtain required information in order to close, we ask that you complete the attached form immediately to prepare for your closing.
                </p>
                <p class="display-6 fw-lighter my-10">
            
                    Please complete the Seller’s affadavitt form securely at the link below
                </p>
                <p class="display-6 fw-lighter my-10">
                    Rest assured, protecting your personal information is top of mind and is kept safe and secure with Trademark Title!
                </p>
                <div class="d-flex">
                    <button class="btn btn-secondary flex-fill p-8">
                        <span class="display-6">Complete Seller Affadavit Form
                        </span>
                    </button>
                </div>
            
            </div>',
            'block_title' => 'Main',
            'audience' => '{"buyer":{"desc":"Buyer","checked":true},"listing_agent":{"desc":"Listing Agent","checked":true},"lender":{"desc":"Lender","checked":true},"seller":{"desc":"Seller","checked":true},"buying_agent":{"desc":"Buying Agent","checked":true},"settlement_agent":{"desc":"Settlement Agent","checked":true},"title_company":{"desc":"Title Company","checked":true}}',
            'order' => 1,
            'user_id_created' => 1
        ]);
        
        EventBlock::create([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::TITLE_BLOCK,
            'block_content' => 'Seller Affadavit',
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
            'block_content' => 'media/event-show/image-lg-5.png',
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
