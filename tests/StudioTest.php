<?php

class StudioTest extends TestCase {

  public function testValidateReturnsFalseIfYogaClassNameIsMissing()
  {
    $validation = \App\Models\Studio::validate([]);
    $this->assertEquals($validation->passes(), false);
  }

  public function testValidateReturnsTrueIfYogaClassNameIsPresent()
  {
    $validation = \App\Models\Studio::validate([
      'studio_name' => 'Runyon Yoga'
    ]);
    $this->assertEquals($validation->passes(), true);
  }
  
}