<?php

require('meetup_request.php');
 
class MeetupRequestTests extends PHPUnit_Framework_TestCase
{
  
  private $meetup_request;

  protected function setUp()
  {
  }

  protected function tearDown()
  {
    $this->meetup_request = NULL;
  }

  public function searchDataProvider() {
    return array(
      array('80302', 'group'),
      array('4407', 'event'),
    );
  }

  /**
     * @dataProvider searchDataProvider
     */

  public function testsearch($zip, $type)
  {
    $this->meetup_request = new MeetupRequest($zip, $type);
    $result = $this->meetup_request->search();
    $this->assertArrayHasKey('id', $result[0]);
    $this->assertNotNull($result);
  }
 
}