<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("http://localhost:8765/");
  }

  public function testMyTestCase()
  {
  	//pruebas por partición de equivalencias
    $this->open("/users/add");
    $this->type("id=first-name", "Carolina");
    $this->type("id=last-name", "Mesa M.");
    $this->type("id=username", "cmesa");
    $this->type("id=password", "Carito.2016");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->type("id=username", "cmesa");
    $this->type("id=password", "Carito.2016");
    $this->click("css=button.btn.btn-default");
    $this->waitForPageToLoad("30000");
    $this->click("xpath=(//a[contains(text(),'cmesa')])[2]");
    $this->waitForPageToLoad("30000");
    $this->type("id=first-name", "111111111122222222223333333334");
    $this->type("id=last-name", "111111111122222222223333333334");
    $this->type("id=username", "11111111112222222222");
    $this->type("id=password", "111111111122222222223333333334");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    
    //Pruebas por valores limites
    $this->type("id=username", "111111111122222222223333333334");
    $this->type("id=password", "111111111122222222223333333334");
    $this->click("css=button.btn.btn-default");
    $this->waitForPageToLoad("30000");
    $this->click("css=button.btn.btn-default");
    $this->waitForPageToLoad("30000");
    $this->type("id=username", "11111111112222222222333333333");
    $this->type("id=password", "11111111112222222222333333333");
    $this->click("css=button.btn.btn-default");
    $this->waitForPageToLoad("30000");
    $this->type("id=first-name", "Carolina");
    $this->type("id=last-name", "Mesa M.");
    $this->type("id=last-name", "");
    $this->type("id=first-name", "");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->type("id=first-name", "11111111112222222222333333333");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->type("id=first-name", "111111111122222222223333333334");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->type("id=last-name", "11111111112222222222333333333");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->type("id=last-name", "111111111122222222223333333334");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->type("id=username", "11111111112222222222");
    $this->type("id=password", "111111111122222222223333333334");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->type("id=username", "11111111112222222222");
    $this->type("id=password", "111111111122222222223333333334");
    $this->click("css=button.btn.btn-default");
    $this->waitForPageToLoad("30000");
    $this->click("link=Salir");
    $this->waitForPageToLoad("30000");
  }
}
?>