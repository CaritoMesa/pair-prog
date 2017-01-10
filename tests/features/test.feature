Feature: Drupal.org search
  In order to find modules on Drupal.org
  As a Drupal user
  I need to be able tu use Drupal.org search

  Scenario: Searching for "behat"                   
    Given I go to "http://drupal.org"
    When I fill in "Search Drupal.org" with "behat"
    And I press "Search"
    Then I should see "Behat Drupal Extension"