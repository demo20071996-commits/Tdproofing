
<?php
namespace Drupal\jobshedular\Plugin\QueueWorker;

use Drupal\Core\Queue\QueueWorkerBase;

/**
 * @QueueWorker(
 *   id = "jobshedular_queue",
 *   title = @Translation("Job Shedular Queue"),
 *   cron = {"time" = 30}
 * )
 */
class JobShedularQueueWorker extends QueueWorkerBase {

  public function processItem($data) {
    $jid = $data['jid'];

    \Drupal::database()->update('jobshedular_jobs')
      ->fields(['status' => 'running'])
      ->condition('id', $jid)
      ->execute();

    try {
      $path = $this->exportUsers();

      \Drupal::database()->update('jobshedular_jobs')
        ->fields([
          'status' => 'completed',
          'file_path' => $path,
          'processed' => time(),
        ])
        ->condition('id', $jid)
        ->execute();
    }
    catch (\Exception $e) {
      \Drupal::database()->update('jobshedular_jobs')
        ->fields(['status' => 'failed', 'message' => $e->getMessage()])
        ->condition('id', $jid)
        ->execute();
    }
  }

  private function exportUsers() {
    $path = 'public://users_export_' . time() . '.csv';
    $handle = fopen($path, 'w');
    fputcsv($handle, ['UID', 'Username', 'Email']);

    $uids = \Drupal::entityQuery('user')->condition('status', 1)->execute();
    $users = \Drupal\user\Entity\User::loadMultiple($uids);

    foreach ($users as $user) {
      fputcsv($handle, [$user->id(), $user->getAccountName(), $user->getEmail()]);
    }

    fclose($handle);
    return $path;
  }
}
