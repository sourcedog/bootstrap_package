<?php

use Behat\Behat\Context\ClosuredContextInterface,
	Behat\Behat\Context\TranslatedContextInterface,
	Behat\Behat\Context\BehatContext,
	Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
	Behat\Gherkin\Node\TableNode;

use Behat\MinkExtension\Context\MinkContext;

/**
 * Features context.
 */
class FeatureContext extends MinkContext {

	/**
	 * Initializes context.
	 * Every scenario gets it's own context object.
	 *
	 * @param array $parameters context parameters (set them up through behat.yml)
	 */
	public function __construct(array $parameters) {
		// Initialize your context here
	}

	/**
	 * @Given /^I select the "([^"]*)" radio button$/
	 */
	public function iSelectTheRadioButton($radio_label) {
		$radio_button = $this->getSession()->getPage()->findField($radio_label);
		if (null === $radio_button) {
			throw new ElementNotFoundException(
				$this->getSession(), 'form field', 'id|name|label|value', $field);
		}
		$value = $radio_button->getAttribute('value');
		$this->fillField($radio_label, $value);
	}

	/**
	 * @Given /^I wait "([^"]*)" seconds$/
	 */
	public function iWaitSeconds($seconds) {
		sleep($seconds);
	}
}

?>