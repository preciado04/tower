<?php

/**
 * @file
 * Contains Tower.php file.
 */

/**
 * Builds a tower.
 */
class Tower {

  /**
   * The tower height.
   *
   * @var height
   */
  public $height;

  /**
   * Constructs a Tower instance.
   *
   * @param int $height
   *   The height for the tower.
   */
  public function __construct($height) {
    $this->height = $height;
  }

  /**
   * Buils the tower.
   */
  public function build() {
    $result = '';

    // Create result based on height.
    for ($i = 0; $i < $this->height; $i++) {
      $result .= $this->addFloor($i);
    }

    return $result;
  }

  /**
   * Adds a floor to the tower.
   */
  protected function addFloor($floor) {
    $result = '';

    // Calc margin and start variables.
    $margin = $this->height - $floor - 1;
    $star = $floor + $floor + 1;

    // Create result based on margins and starts.
    $result .= $this->addMargins($margin, FALSE);
    $result .= $this->addStars($star);
    $result .= $this->addMargins($margin, TRUE);

    return $result;
  }

  /**
   * Adds margins to the floor.
   */
  protected function addMargins($margin, $line_break) {
    $result = '';

    // Add margins based on margin parameter.
    for ($i = 0; $i < $margin; $i++) {
      $result .= '&nbsp;';
    }

    // Add line break to result.
    if ($line_break) {
      $result .= '<br>';
    }

    return $result;
  }

  /**
   * Adds stars to the floor.
   */
  protected function addStars($star) {
    $result = '';

    // Add stars based on star parameter.
    for ($i = 0; $i < $star; $i++) {
      $result .= '★';
    }

    return $result;
  }

}
