<?php
/**
 * My controller
 */
namespace Drupal\qldc\Controller;
use Drupal\Core\Datetime\DrupalDateTime;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Component\Utility\Xss;
use Drupal\Core\Entity\Element\EntityAutocomplete;
use PhpOffice\PhpWord\Settings;
/**
 * Defines a route controller for watches autocomplete form elements.
 */
class DonXacNhanController{
    public function nodeWord($node = null)
    {   Settings::loadConfig();

        Settings::setOutputEscapingEnabled(true);

        $path = drupal_get_path('module', 'qldc');

        $temp_doc = $path . '/MauDonXNDS.docx';

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($temp_doc);

        $now = new DrupalDateTime('now');  // grab current dateTime
        $n = $now->format('d');
        $t = $now->format('n');
        $nam = $now->format('Y');

        $ngaysinh = DrupalDateTime::createFromFormat('Y-m-d',$node->field_ngaysinh->value);
        $templateProcessor->setValue('hovaten', $node->title->value);            // On section/content
        $templateProcessor->setValue('ngaysinh', $ngaysinh->format('d/m/Y'));            // On section/content
        $templateProcessor->setValue('noithuongtru', $node->field_noithuongtru->value);            // On section/content
        $templateProcessor->setValue('noidungxacnhan', $node->field_noidungxacnhan->value);            // On section/content
        $templateProcessor->setValue('n', $n);            // On section/content
        $templateProcessor->setValue('t', $t);            // On section/content
        $templateProcessor->setValue('nam', $nam);            // On section/content

        $file_name  =$node->id() . '.docx';

        $doc_filename = \Drupal::service('file_system')->realpath('public://'.$file_name);

        $templateProcessor->saveAs($doc_filename);

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment;filename="' . $file_name . '"');
        header('Content-Transfer-Encoding: binary');
        header('Connection: Keep-Alive');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($doc_filename));
        ob_clean();
        flush();
        readfile($doc_filename);
        unlink($doc_filename);
        drupal_exit();
    }
}
