<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*firefox");
    $this->setBrowserUrl("http://icinfvm.cl/");
  }

  public function testMyTestCase()
  {
    $this->open("/carolina_meza/users/add");
    $this->type("id=first-name", "Usuario");
    $this->type("id=last-name", "testing");
    $this->type("id=lti-user-id", "2301");
    $this->type("id=username", "testing");
    $this->type("id=password", "holamundo");
    $this->click("css=button[type=\"submit\"]");
    $this->waitForPageToLoad("30000");
    $this->type("id=lti-user-id", "");
    $this->type("id=password", "probando");
    $this->click("css=button[type=\"submit\"]");
    $this->waitForPageToLoad("30000");
    $this->type("id=username", "admin");
    $this->type("id=password", "admin");
    $this->click("css=button[type=\"submit\"]");
    $this->waitForPageToLoad("30000");
    $this->click("css=button[type=\"submit\"]");
    $this->waitForPageToLoad("30000");
    $this->type("id=password", "123456");
    $this->click("css=button[type=\"submit\"]");
    $this->waitForPageToLoad("30000");
    $this->type("id=password", "12345");
    $this->click("css=button[type=\"submit\"]");
    $this->waitForPageToLoad("30000");
    $this->click("xpath=(//a[contains(text(),'Eliminar')])[7]");
    $this->assertTrue((bool)preg_match('/^¿Esta seguro de eliminar # 8[\s\S]$/',$this->getConfirmation()));
  }
}
?>