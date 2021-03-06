<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Preview\Trustedcomms\Business\Brand\BrandedChannel;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class ChannelTest extends HolodeckTestCase {
    public function testCreateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->trustedComms->businesses("BXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                                ->brands("BZXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                                ->brandedChannels("BWXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                                ->channels->create("PNXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX", "phone_number");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = [
            'PhoneNumberSid' => "PNXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
            'PhoneNumber' => "phone_number",
        ];

        $this->assertRequest(new Request(
            'post',
            'https://preview.twilio.com/TrustedComms/Businesses/BXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Brands/BZXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/BrandedChannels/BWXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Channels',
            null,
            $values
        ));
    }

    public function testCreateResponse(): void {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "business_sid": "BXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "brand_sid": "BZaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "branded_channel_sid": "BWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "phone_number_sid": "PNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "phone_number": "+15000000000",
                "url": "https://preview.twilio.com/TrustedComms/Businesses/BXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Brands/BZaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/BrandedChannels/BWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels"
            }
            '
        ));

        $actual = $this->twilio->preview->trustedComms->businesses("BXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                                      ->brands("BZXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                                      ->brandedChannels("BWXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                                      ->channels->create("PNXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX", "phone_number");

        $this->assertNotNull($actual);
    }
}