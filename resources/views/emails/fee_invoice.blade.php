<!DOCTYPE html>
<html>
<head>
    <title>Test Fee Challan</title>
</head>
<body style="font-family: sans-serif; padding: 20px; background: #f4f4f4;">
    <div style="background: white; padding: 20px; border-radius: 8px;">
        <h2>School Management System - Test</h2>
        <p>Assalam-o-Alaikum,</p>
        <p>Aapke bache <strong>{{ $studentName }}</strong> ki fees generate ho chuki hai.</p>
        <p>Total Amount: <strong>Rs. {{ $feeAmount }} /-</strong></p>
        <p>Yeh sirf aik background queue aur SMTP ka test mail hai.</p>
    </div>
</body>
</html>