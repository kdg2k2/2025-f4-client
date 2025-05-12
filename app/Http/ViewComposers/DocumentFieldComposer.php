<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\DocumentFieldService;

class DocumentFieldComposer
{
    protected $documentFieldService;

    public function __construct(DocumentFieldService $documentFieldService)
    {
        $this->documentFieldService = $documentFieldService;
    }

    public function compose(View $view)
    {
        $data = $this->documentFieldService->getAll();

        $chunks = $data->split(3);
        $col1 = $chunks[0];
        $col2 = $chunks[1];
        $col3 = $chunks[2];
        $view->with([
            'documentFieldCol1' => $col1,
            'documentFieldCol2' => $col2,
            'documentFieldCol3' => $col3,
        ]);
    }
}
