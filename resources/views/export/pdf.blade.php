<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Export PDF' }}</title>
    <style>
        body { font-family: sans-serif; color: #333; font-size: 14px; margin: 10px; }
        .header { margin-bottom: 25px; border-bottom: 2px solid #333; padding-bottom: 8px; }
        .header h2 { margin: 0 0 5px 0; }
        .header p { margin: 0; color: #666; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; page-break-inside: auto; }
        tr { page-break-inside: avoid; page-break-after: auto; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f5f5f5; font-weight: bold; text-transform: capitalize; }
        tr:nth-child(even) { background-color: #fafafa; }
    </style>
</head>
<body>

    <div class="header">
        <h2>{{ $title ?? 'Report Document' }}</h2>
        <p>Generated on: {{ now()->format('Y-m-d H:i:s') }}</p>
    </div>

    @php
        $computedHeadings = [];
        if (isset($headings) && is_array($headings) && count($headings) > 0) {
            $computedHeadings = $headings;
        } elseif (isset($data) && count($data) > 0) {
            $firstRow = $data->first();
            if ($firstRow) {
                $computedHeadings = is_array($firstRow) ? array_keys($firstRow) : array_keys($firstRow->toArray());
            }
        }
    @endphp

    <table>
        <thead>
            <tr>
                @foreach($computedHeadings as $heading)
                    <th>{{ str_replace('_', ' ', $heading) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    @foreach($computedHeadings as $heading)
                        @php
                            $displayValue = is_array($row) ? ($row[$heading] ?? '') : ($row->{$heading} ?? '');
                        @endphp
                        <td>{{ $displayValue }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>