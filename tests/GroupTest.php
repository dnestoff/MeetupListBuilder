<?php

require('group.php');
 
class GroupTests extends PHPUnit_Framework_TestCase
{
  
  private $group;

  protected function setUp()
  {
    $group_data = array('name' => "Johnny's Team", 'url' => 'https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/', 'description' => 'blah blah blah blah blah', 'category' => 'Business', 'organizer_name' => "Jane Beach");
    $this->group = new Group($group_data);
  }

  protected function tearDown()
  {
    $this->group = NULL;
  }

  public function groupDataProvider() {
    return array(
      array('name'),
      array('organizer_name'),
      array('category'),
      array('url')
    );
  }

  /**
     * @dataProvider groupDataProvider
     */

  public function testgroupHasAttributes($attribute)
  {
    $this->assertClassHasAttribute($attribute, 'Group');
  }

  /**
     * @dataProvider groupDataProvider
     */
  
  public function testgroupAttributesNotEmpty($attribute)
  {
    $this->assertNotEquals('', $this->group->$attribute);
  }


  public function testdisplay()
  {
    $expected = "\nName: Johnny's Team\nOrganizer name: Jane Beach\nCategory: Business\nUrl: https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/\n";
    $result = $this->group->display();
    
    $this->assertEquals($expected, $result);
  }

 
}