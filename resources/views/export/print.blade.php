<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Export Print' }}</title>
    <style>
        body { font-family: sans-serif; color: #333; margin: 20px; }
        .header { margin-bottom: 20px; border-bottom: 2px solid #333; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f5f5f5; font-weight: bold; text-transform: capitalize; }
        tr:nth-child(even) { background-color: #fafafa; }
        @media print {
            .no-print { display: none; }
            body { margin: 0; }
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>{{ $title ?? 'Report' }}</h2>
        <p>Generated on: {{ now()->format('Y-m-d H:i:s') }}</p>
        <button class="no-print" onclick="window.print()" style="padding: 8px 15px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">
            Print Page
        </button>
    </div>

    @php
        // 💡 Agar background service se headings nahi aayin, toh pehli record ki keys utha lo
        $computedHeadings = [];
        if (isset($headings) && is_array($headings) && count($headings) > 0) {
            $computedHeadings = $headings;
        } elseif (isset($data) && count($data) > 0) {
            $firstRow = $data->first();
            if ($firstRow) {
                // Agar Eloquent object hai to attributes nikal lo, warna array keys
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
                            // Dono formats handle karne ke liye (Array aur Object)
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