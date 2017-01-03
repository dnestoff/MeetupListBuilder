<?php

require('list_controller.php');
 
class ListControllerTests extends PHPUnit_Framework_TestCase
{
  
  private $list_controller;

  protected function setUp()
  {
  }

  protected function tearDown()
  {
    $this->list = NULL;
  }

  public function runEventSearchDataProvider() {
    return array(
      array('event', '44070'),
      array('event', '80302'),
    );
  }

  /**
     * @dataProvider runEventSearchDataProvider
     */

  public function testrunAsEventSearch($type, $zip)
  {
    $controller = $this->getMockBuilder('ListController')
      ->setConstructorArgs(array($type, $zip))
      ->setMethods(array('getData'))
      ->getMock();
      
    $event_data = array(
      array('name' => "Let's get out and get moving!",
      'time' => 1483552800000,
      'utc_offset' => -25200000,
      'group' => array('created' => 1428507043000,
                  'name' => "Front Range Mind & Body Fitness"),
      'link' => "https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/",
      'description' => "<p>Walking is the super food of movement, but like any super food the way you consume it matters."));

    $expected = "\nName: Let's get out and get moving!\nGroup name: Front Range Mind & Body Fitness\nTime: 01-04-2017 @ 12:00\nUrl: https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/\n";


    $controller->expects($this->once())
      ->method('getData')
      ->will($this->returnValue($event_data));

    $result = $controller->run();
    $this->assertEquals($expected, $result);
  }


  public function runGroupSearchDataProvider() {
    return array(
      array('group', '44070'),
      array('group', '80302'),
    );
  }

   /**
     * @dataProvider runGroupSearchDataProvider
     */

  public function testrunAsGroupSearch($type, $zip)
  {
    $controller = $this->getMockBuilder('ListController')
      ->setConstructorArgs(array($type, $zip))
      ->setMethods(array('getData'))
      ->getMock();

    $groups_data = array(
      array(
      'name' => "Women's Development Council (WDC)",
      'link' => "https://www.meetup.com/womensdevelopmentcouncil/",
      'description' => "<p>Develop, organize and promote activities that educate, encourage, support and enhance the development of women in business.",
      'organizer' => array( 'id' => 26790202,
            'name' => "Jennifer McRae",
            'bio' => "I began my career in travel in 1988 after receiving a degree in Travel."),
      'category' => array('id' => 2,
             'name' => "Career & Business")));

    $expected = "\nName: Women's Development Council (WDC)\nOrganizer name: Jennifer McRae\nCategory: Career & Business\nUrl: https://www.meetup.com/womensdevelopmentcouncil/\n";

    $controller->expects($this->once())
      ->method('getData')
      ->will($this->returnValue($groups_data));

    $result = $controller->run();
    $this->assertEquals($expected, $result);
  }
 
}


?>