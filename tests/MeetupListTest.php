<?php

require('meetup_list.php');
 
class MeetupListTests extends PHPUnit_Framework_TestCase
{
  
  private $list;
  private $event_data = array('name' => "Let's get out and get moving!",
      'time' => 1483552800000,
      'utc_offset' => -25200000,
      'group' => array('created' => 1428507043000,
                  'name' => "Front Range Mind & Body Fitness"),
      'link' => "https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/",
      'description' => "<p>Walking is the super food of movement, but like any super food the way you consume it matters.");
  private $group_data = array(
      'name' => "Women's Development Council (WDC)",
      'link' => "https://www.meetup.com/womensdevelopmentcouncil/",
      'description' => "<p>Develop, organize and promote activities that educate, encourage, support and enhance the development of women in business.",
      'organizer' => array( 'id' => 26790202,
            'name' => "Jennifer McRae",
            'bio' => "I began my career in travel in 1988 after receiving a degree in Travel."),
      'category' => array('id' => 2,
             'name' => "Career & Business"));

  protected function setUp()
  {
  }

  protected function tearDown()
  {
    $this->list = NULL;
  }

  public function displayListDataProvider() {
    return array(
      array('/Name:/'),
      array('/Url:/'),
      array('/Group name:/'),
      array('/Time:/')
    );
  }

   /**
     * @dataProvider displayListDataProvider
     */

  public function testdisplayListReturnsString($expected)
  {
    $this->list = new MeetupList('event');
    $this->list->add($this->event_data);
    $this->list->add($this->event_data);
    $result = $this->list->displayList();
    $this->assertRegexp($expected, $result);
  }

  public function testdisplayListReturnsNoDataMessageIfNoData()
  {
    $this->list = new MeetupList('group');
    $result = $this->list->displayList();
    $this->assertEquals('This search did not return any results.', $result);
  }

  public function testaddEvent()
  {
    $this->list = new MeetupList('event');
    $this->list->add($this->event_data);
    $this->list->add($this->event_data);

    $this->assertEquals(count($this->list->items), 2);
  }

  public function testaddGroup()
  {
    $this->list = new MeetupList('group');
    $result = $this->list->add($this->group_data);
    
    $this->assertEquals(count($this->list->items), 1);
  }

 
}

?>