
<?php

namespace Drupal\jobshedular\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;

class JobListController extends ControllerBase {

  public function list() {
    $rows = [];
    $jobs = \Drupal::database()->select('jobshedular_jobs', 'j')
      ->fields('j')
      ->execute();

    foreach ($jobs as $job) {
      $rows[] = [
        $job->id,
        $job->job_type,
        $job->status,
        $job->file_path ? [
          'data' => [
            '#type' => 'link',
            '#title' => 'Download',
            '#url' => Url::fromUri(file_create_url($job->file_path)),
          ],
        ] : '-',
      ];
    }

    return [
      '#type' => 'table',
      '#header' => ['ID', 'Type', 'Status', 'File'],
      '#rows' => $rows,
    ];
  }
}
