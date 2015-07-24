<?php
/**
 * @testcase
 */

namespace Test;

$container = require __DIR__ . '/bootstrap.php';

use NBrowserKit\Client;
use Nette\DI\Container;
use Tester\Assert;
use Tester\TestCase;



class ExampleTest extends TestCase
{

	/**
	 * @var Container
	 */
	private $container;

	/**
	 * @var Client
	 */
	private $client;



	function __construct(Container $container)
	{
		$this->container = $container;
	}



	function setUp()
	{
		$this->client = new Client;
		$this->client->setContainer($this->container);
	}



	function testSignInWithCorrectCredentials()
	{
		$crawler = $this->client->request('GET', '/sign/in');
		Assert::contains('Sign in', $crawler->filter('h1')->text());

		$signInForm = $crawler->selectButton('Sign in')->form();
		$signInForm['username'] = 'foo';
		$signInForm['password'] = 'bar';
		$crawler = $this->client->submit($signInForm);

		Assert::same('/', $this->client->getRequest()->getUrl()->getPath());
		Assert::contains('You have been sucessfully signed in.', $crawler->filter('.flash')->text());
	}



	function testSignInWithWrongCredentials()
	{
		$crawler = $this->client->request('GET', '/sign/in');
		Assert::contains('Sign in', $crawler->filter('h1')->text());

		$signInForm = $crawler->selectButton('Sign in')->form();
		$signInForm['username'] = 'foo';
		$signInForm['password'] = 'fuck';
		$crawler = $this->client->submit($signInForm);

		Assert::same('/sign/in', $this->client->getRequest()->getUrl()->getPath());
		Assert::contains('The password is incorrect.', $crawler->filter('form .error')->text());
	}

}



$test = new ExampleTest($container);
$test->run();
