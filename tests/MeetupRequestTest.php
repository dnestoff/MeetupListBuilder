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
      array('group', '80302'),
      array('event', '44070'),
    );
  }

  /**
     * @dataProvider searchDataProvider
     */

  public function testsearch($type, $zip)
  {
    $this->meetup_request = new MeetupRequest($type, $zip);
    $result = $this->meetup_request->search();
    $this->assertArrayHasKey('id', $result[0]);
    $this->assertNotNull($result);
  }
 
}