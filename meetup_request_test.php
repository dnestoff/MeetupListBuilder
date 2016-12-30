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

  public function addDataProvider() {
    return array(
      array(1, 2, 3),
      array(0, 0, 0),
      array(-1, -1, -2),
    );
  }

  /**
     * @dataProvider addDataProvider
     */

  public function testeventSearch($a, $b, $expected)
  {
    $result = $this->meetup_request->eventSearch();
    $this->assertEquals($expected, $result);
  }

  public function testgroupSearch()
  {
    $result = $this->meetup_request->groupSearch();
    $this->assertEquals($expected, $result);
  }
 
}