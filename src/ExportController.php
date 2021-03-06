<?php

namespace jarda256\NovaExportCard;


use Laravel\Nova\Http\Requests\NovaRequest;

class ExportController
{
    public function handle(NovaRequest $request)
    {
        $resource = $request->newResource();
        $exporterClass = $resource::$exporter ?? null;
        if($exporterClass != null){
            return (new $exporterClass())->download();
        }
        return true;
    }

}
