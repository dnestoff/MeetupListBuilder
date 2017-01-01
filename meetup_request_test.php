<?php

require('meetup_request.php');
 
class MeetupRequestTests extends PHPUnit_Framework_TestCase
{
  
  private $meetup_request;

  protected function setUp()
  {
    $this->meetup_request = new MeetupRequest('80302');
  }

  protected function tearDown()
  {
    $this->meetup_request = NULL;
  }

  public function eventSearchDataProvider() {
    return array(
      array(80302),
      array(4407),
    );
  }

  /**
     * @dataProvider eventSearchDataProvider
     */

  public function testeventSearch()
  {
    $result = $this->meetup_request->eventSearch();
    $this->assertArrayHasKey('id', $result[0]);
    $this->assertNotNull($result);
  }

  public function groupSearchDataProvider() {
    return array(
      array(80302),
      array(4407),
    );
  }

  /**
     * @dataProvider groupSearchDataProvider
     */

  public function testgroupSearch()
  {
    $result = $this->meetup_request->groupSearch();
    $this->assertArrayHasKey('id', $result[0]);
    $this->assertNotNull($result);
  }

 
}