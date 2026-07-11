<?php

namespace App\Exports;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GenericExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */protected $data;
    protected $headings;

    public function __construct($data, array $headings)
    {
        $this->data = $data;
        $this->headings = $headings;
    }
    public function collection()
    {
            return new Collection($this->data);
    }
      public function headings(): array
    {
        return $this->headings;
    }
}
