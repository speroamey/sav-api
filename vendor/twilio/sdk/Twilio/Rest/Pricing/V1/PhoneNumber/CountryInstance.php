<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Pricing\V1\PhoneNumber;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string country
 * @property string isoCountry
 * @property string phoneNumberPrices
 * @property string priceUnit
 * @property string url
 */
class CountryInstance extends InstanceResource {
    /**
     * Initialize the CountryInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $isoCountry The iso_country
     * @return \Twilio\Rest\Pricing\V1\PhoneNumber\CountryInstance 
     */
    public function __construct(Version $version, array $payload, $isoCountry = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'country' => Values::array_get($payload, 'country'),
            'isoCountry' => Values::array_get($payload, 'iso_country'),
            'url' => Values::array_get($payload, 'url'),
            'phoneNumberPrices' => Values::array_get($payload, 'phone_number_prices'),
            'priceUnit' => Values::array_get($payload, 'price_unit'),
        );

        $this->solution = array('isoCountry' => $isoCountry ?: $this->properties['isoCountry']);
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Pricing\V1\PhoneNumber\CountryContext Context for this
     *                                                            CountryInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new CountryContext($this->version, $this->solution['isoCountry']);
        }

        return $this->context;
    }

    /**
     * Fetch a CountryInstance
     * 
     * @return CountryInstance Fetched CountryInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Pricing.V1.CountryInstance ' . implode(' ', $context) . ']';
    }
}