<?php


namespace LaravelSupercontrol\API\V3;

class ApiManager extends AbstractManager
{
    protected $dataExport = null;

    public function dataExport(): DataExportManager
    {
        if (! $this->dataExport) {
            $this->dataExport = \app(DataExportManager::class, ['client' => $this->client]);
        }

        return $this->dataExport;
    }
}
