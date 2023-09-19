<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExportSupporters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'supporters:export {--format=csv} {--path=app/exports/}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export supporters to a file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $format = $this->option('format');
        $path = $this->option('path');
        $filename = now()->format('Y-m-d') . '-supporters.' . $format;
        switch ($format) {
            case 'csv':
                $this->exportToCsv($path . $filename);
                break;
            case 'json':
                $this->exportToJson($path . $filename);
                break;
            default:
                $this->error('Unsupported format: ' . $format);
                return Command::FAILURE;
        }
        return Command::SUCCESS;
    }

    /**
     * Export supporters to a CSV file
     */

    private function exportToCsv($filename)
    {
        $datafields = $this->getSupporterDataFields();
        $headers = array_merge(["id", "email"], $datafields, ["source", "lang", "email_verified_at"]);
        $supporters = \App\Models\Supporter::all(['id', 'email', 'data', 'source', 'locale', 'email_verified_at']);
        $file = fopen(storage_path($filename), 'w');
        fputcsv($file, $headers);
        foreach ($supporters as $supporter) {
            $row = [$supporter->id, $supporter->email];
            foreach ($datafields as $datafield) {
                $row[] = $supporter->data[$datafield] ?? '';
            }
	    $row[] = $supporter->source;
	    $row[] = $supporter->locale;
            fputcsv($file, $row);
        }
        fclose($file);
        $this->info('Supporters exported to ' . $filename);
    }

    /**
     * Export supporters to a JSON file
     */


    /**
     * Get the data fields for the supporters
     */
    private function getSupporterDataFields()
    {
        $supporters = \App\Models\Supporter::all();
        $datafields = [];
        foreach ($supporters as $supporter) {
            $datafields = array_merge($datafields, array_keys($supporter->data));
        }
        return array_unique($datafields);
    }

}
