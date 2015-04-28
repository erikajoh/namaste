<?php

class YogaClassTest extends TestCase {

  public function testValidateReturnsFalseIfYogaClassNameIsMissing()
  {
    $validation = \App\Models\YogaClass::validate([]);
    $this->assertEquals($validation->passes(), false);
  }

  public function testValidateReturnsTrueIfYogaClassNameIsPresent()
  {
    $validation = \App\Models\YogaClass::validate([
      'name' => 'Yoga with Steve'
    ]);
    $this->assertEquals($validation->passes(), true);
  }
  
}