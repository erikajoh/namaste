<?php

class StudioTest extends TestCase {

  public function testValidateReturnsFalseIfStudioNameIsMissing()
  {
    $validation = \App\Models\Studio::validate([]);
    $this->assertEquals($validation->passes(), false);
  }

  public function testValidateReturnsTrueIfStudioNameIsPresent()
  {
    $validation = \App\Models\Studio::validate([
      'studio_name' => 'Runyon Yoga'
    ]);
    $this->assertEquals($validation->passes(), true);
  }
  
}