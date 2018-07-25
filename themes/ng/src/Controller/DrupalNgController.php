<?php
namespace Drupal\ng\Controller;
use Drupal\Core\Controller\ControllerBase;

class DrupalNgController extends ControllerBase {

  public function viewDrupalNg() {
    echo 'ok';
    // $title = t('Hello!');
    // $build['myelement'] = array(
    //   '#theme' => 'ng_view',
    //   '#title' => $title,
    // );
    // $build['myelement']['#attached']['library'][] = 'ng/inline.bundle';
    // $build['myelement']['#attached']['library'][] = 'ng/polyfills.bundle';
    // $build['myelement']['#attached']['library'][] = 'ng/styles.bundle';
    // $build['myelement']['#attached']['library'][] = 'ng/vendor.bundle';
    // $build['myelement']['#attached']['library'][] = 'ng/main.bundle';
    // return $build;
  }

}
